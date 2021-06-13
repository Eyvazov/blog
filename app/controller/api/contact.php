<?php


if ($data = form_control('phone')){

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $json['error'] = 'Xahiş edirik e-poçt ünvanını düzgün qeyd edin.';
    }else{

    $query = $db->insert('contact')->set([
        'contact_name' => $data['name'],
        'contact_email' => $data['email'],
        'contact_phone' => $data['phone'],
        'contact_subject' => $data['subject'],
        'contact_message' => $data['message']
    ]);
    if ($query){
        $json['success'] = 'Mesajınız göndərildi, təşəkkür edirik...';
    }else{
        $json['error'] = 'Xəta yarandı, mesajınız göndərilmədi';
    }
    }


}else{
    $json['error'] = 'Xahiş edirik bütün sahələri doldurun';
}