<?php

$name = post('name');
$email = post('email');
$post_id = post('post_id');
$comment = post('comment');
if (session('user_id')) {
    $name = session('user_name');
    $email = session('user_email');
}

if (!$name || !$email || !$post_id) {
    $json['error'] = "Xahiş edirik ad soyad və e-poçtunuzu qeyd edin!";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $json['error'] = "Xahiş edirik keçərli e-poçt qeyd edin!";
}else if(!$comment){
    $json['error'] = "Xahiş edirik rəyinizi bildirin!";
}else{
    if (session('user_id')){
        $status = setting('user_comment') == 1 ? 1 : 0;
    }else{
        $status = setting('visitor_comment') == 1 ? 1 : 0;
    }

    $row = Blog::findPostByID($post_id);

    if (!$row){
        $json['error'] = "Gözlənilməyən bir xəta baş verdi!";
    }else{

        $comment = [
            'comment_user_id' => session('user_id'),
            'comment_post_id' => $post_id,
            'comment_name' => $name,
            'comment_email' => $email,
            'comment_content' => $comment,
            'comment_status' => $status,
        ];

        $insert = $db->insert('comments')
            ->set($comment);

        if ($insert){
            if ($status == 0){
                $json['success'] = "Rəyiniz göndərildi, təsdiqləndikdən sonra göstəriləcəkdir. Təşəkkürlər.";
            }else{
                $comment['comment_date'] = date('Y-m-d H:I:S');
                ob_start();
                require view('static/comment');
                $output = ob_get_clean();
                $json['comment'] = $output;
            }
        }else{
            $json['error'] = "Rəyiniz əlavə edilərkən bir problem yarandı!";
        }
    }
}