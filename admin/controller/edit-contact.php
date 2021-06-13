<?php
if (!permission('contact', 'edit')){
    permission_page();
}

$id = get('id');

if (!$id){
    header('Location:' . admin_url('contact'));
    exit;
}

$row = $db->from('contact')->join('users', '%s.user_id = %s.contact_read_user', 'left')->where('contact_id', $id)->first();

if (!$row){
    header('Location:' . admin_url('contact'));
    exit;
}

if ($row['contact_read'] == 0){
    $db->update('contact')->where('contact_id', $id)->set([
        'contact_read' => 1,
        'contact_read_date' =>date('Y-m-d H:i:s'),
        'contact_read_user' => session('user_id')
    ]);
}


if (post('submit')){
    if ($data = form_control('user_permissions')){

        $data['user_url'] = permalink($data['user_name']);
        $data['user_permissions'] = json_encode($_POST['user_permissions']);
        $query = $db->update('users')->where('user_id', $id)->set($data);

        if ($query){
            header('Location:' . admin_url('users'));
        }else{
            $error = 'Problem yarandı. xahiş edirik yenidən cəhd edin!';
        }
    }else{
        $error = 'Boş buraxılmış xanalar var. Xahiş edirik xanaların hamısını doldurun!';
    }
}


require admin_view('edit-contact');
?>
