<?php

if (!permission('categories', 'add')){
    permission_page();
}

if (post('submit')){
    $category_name = post('category_name');
    $category_url = permalink(post('category_url'));
    if (!post('category_url')){
    $category_url = permalink($category_name);
    }
    $category_seo = json_encode(post('category_seo'));

    if (!$category_name || !$category_url){
        $error = "Kateqoriya adı boş buraxıla bilməz!";
    }else{
        $query = $db->from('categories')->where('category_url', $category_url)->first();

        if ($query){
            $error = '<strong>' . $category_name . '</strong> adında kateqoriya hal hazırda mövcuddur. Başqa bir ad yoxlayın.';
        }else{
            $query = $db->insert('categories')->set([
               'category_name' => $category_name,
               'category_url' => $category_url,
                'category_seo' => $category_seo
            ]);

            if ($query){
                header('Location:' . admin_url('categories'));
            }else{
                $error = "Bir problem yarandı!";
            }
        }
    }
}

require admin_view('add-category');