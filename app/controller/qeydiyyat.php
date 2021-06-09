<?php

    $meta = [
        'title' => 'Qeydiyyatdan Keç'
    ];

    if (post('submit')){
        $username = post('user_name');
        $email = post('user_email');
        $password = post('user_password');
        $password_again = post('user_password_again');

        if (!$username){
            $error = 'Xahiş edirik istifadəçi adını qeyd edin';
        }elseif(!$email){
            $error = 'Xahiş edirik e-mail-inizi qeyd edin';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = 'Xahiş edirik e-mail-inizi düzgün qeyd edin';
        }elseif (!$password || !$password_again){
            $error = 'Xahiş edirik şifrənizi qeyd edin';
        }elseif($password != $password_again){
            $error = 'Qeyd etdiyiniz şifrələr eyni deyil';
        }else{
            // İstifadəçinin olub-olmamasını yoxla
            $row = user::userExist($username, $email);
            if ($row){
                $error = 'Bu istifadəçi adı və ya e-poçt-u artıq qeydiyyatdan keçmişdir. Xahiş edirik Başqa istifadəçi adı və ya e-poçt-dan isitifadə edin';
            }else{
                // İstifadəçini əlavə et
                $result = user::register([
                    'user_name' => $username,
                    'user_url' => permalink($username),
                    'user_email' => $email,
                    'user_password' => password_hash($password, PASSWORD_DEFAULT)
                ]);

                if ($result){
                    $success = 'Qeydiyyatdan keçdiniz, Yönləndirilirsiniz';
                    user::Login([
                        'user_id' => $db->lastInsertId(),
                        'user_name' => $username
                    ]);
                    header('Refresh:2;url=' . site_url());
                }else{
                    $error = 'Xəta yarandı, xahiş edirik birazdan yenidən yoxlayın';
                }
            }
        }
    }

    require view('register');

?>