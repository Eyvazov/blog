<?php

function admin_controller($controllerName)
{
    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

function admin_view($viewName)
{
    return PATH . '/admin/view/' . $viewName . '.php';
}

function admin_url($url = false)
{
    return URL . '/admin/' . $url;
}

function admin_public_url($url = false)
{
    return URL . '/admin/public/' . $url;
}

function user_ranks($rankId = null)
{
    $ranks = [
        1 => 'Admin',
        2 => 'Redaktor',
        3 => 'İstifadəçi'
    ];
    return $rankId ? $ranks[$rankId] : $ranks;
}

function permission($url, $action)
{
    $permissions = json_decode(session('user_permissions'), true);
    if (isset($permissions[$url][$action])) {
        return true;
    }else{
        return false;
    }

}

function permission_page(){
    die('Səlahiyyətiniz yoxdur!');
}


function send_email($email, $name, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = setting('smtp_host');
        $mail->SMTPAuth = true;
        $mail->Username = setting('smtp_email');
        $mail->Password = setting('smtp_password');
        $mail->SMTPSecure = setting('smtp_secure');
        $mail->Port = setting('smtp_port');
        $mail->CharSet('UTF-8');

        //Recipients
        $mail->setFrom(setting('smtp_send_email'), setting('smtp_send_name'));
        $mail->addAddress($email, $name);


        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>
