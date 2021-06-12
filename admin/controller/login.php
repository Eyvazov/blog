<?php

if (post('submit')){
    if ($data = form_control()){
        $row = $db->from('users')->where('user_url', permalink($data['user_name']))->where('user_rank', 3, '!=')->first();

        if (!$row){
            $error = "Qeyd etdiyiniz məlumatlar xətalıdır. Xahiş edirik yenidən daxil edin!";
        }else{
            $password_verify = password_verify($data['user_password'], $row['user_password']);
            if ($password_verify){
                if ($row['user_rank'] == 3){
                    $error = "Bu bölməyə daxil olmaq üçün səlahiyyətiniz yoxdur!";
                }else{
                User::Login($row);
                header('Location:' . admin_url());
                }
            }else{
                $error = "Qeyd etdiyiniz şifrə xətalıdır. Xahiş edirik şifrəni düzgün qeyd edin!";
            }
        }
    }else{
        $error = "Xahiş edirik məlumatlarınızı daxil edin!";
    }
}

require admin_view('login');
?>