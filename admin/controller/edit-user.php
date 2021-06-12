<?php
$id = get('id');

if (!$id){
    header('Location:' . admin_url('users'));
    exit;
}

$row = $db->from('users')->where('user_id', $id)->first();

if (!$row){
    header('Location:' . admin_url('users'));
    exit;
}


if (post('submit')){
    if ($data = form_control('user_email')){

        $data['user_url'] = permalink($data['user_name']);
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

require admin_view('edit-user');



?>
