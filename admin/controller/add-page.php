<?php

if (!permission('pages', 'add')){
    permission_page();
}

if (post('submit')){
    $page_title = post('page_title');
    $page_url = permalink(post('page_url'));
    $page_content = post('page_content');
    if (!post('page_url')){
    $page_url = permalink($page_title);
    }
    $page_seo = json_encode(post('page_seo'));

    if (!$page_url || !$page_content){
        $error = "Xahiş edirik bütün sahələri doldurun!";
    }else{
        $query = $db->from('pages')->where('page_url', $page_url)->first();

        if ($query){
            $error = '<strong>' . $page_title . '</strong> adında səhifə hal hazırda mövcuddur. Başqa bir ad yoxlayın.';
        }else{
            $query = $db->insert('pages')->set([
               'page_title' => $page_title,
               'page_content' => $page_content,
               'page_url' => $page_url,
                'page_seo' => $page_seo
            ]);

            if ($query){
                header('Location:' . admin_url('pages'));
            }else{
                $error = "Bir problem yarandı!";
            }
        }
    }
}

require admin_view('add-page');