<?php
if ($data = form_control()){

    $send = send_email($data['email'], $data['name'], $data['subject'], nl2br($data['message']));
    if ($send){
        $json['success'] = "Mesajınız göndərildi.";
    }else{
        $json['error'] = "Mesaj göndəriləndə bir xəta yarandı.";
    }
}else{
    $json['error'] = "Xahiş edirik bütün məlumatları doldurun!";
}