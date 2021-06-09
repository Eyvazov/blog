<?php

    $meta = [
        'title' => 'Giriş'
    ];

    if (post('submit')){
        $username = post('user_name');
        $password = post('user_password');

        if (!$username){
            $error = 'Xahiş edirik istifadəçi adını qeyd edin';
        }elseif (!$password){
            $error = 'Xahiş edirik şifrənizi qeyd edin';
        }else{
            $row = user::userExist($username);
            if ($row){
                $password_verify = password_verify($password, $row['user_password']);
                if ($password_verify){
                    $success = 'Daxil oldunuz, Yönləndirilirsiniz';
                    user::Login($row);
                    header('Refresh:2;url=' . site_url());
                }else{
                    $error = 'Şifrə xətalıdır, xahiş edirik şifrənizi yoxlayın';
                }

            }else{
                $error = 'Qeyd etdiyiniz istifadəçi sistemdə qeydiyyatdan keçməyib';
            }
        }
    }

    require view('login');

?>