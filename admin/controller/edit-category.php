<?php

if (!permission('categories', 'edit')){
    permission_page();
}

$id = get('id');
if (!$id){
    header('Location:' . admin_url('categories'));
    exit;
}

$row = $db->from('categories')->where('category_id',$id)->first();

if (!$row){
    header('Location:' . admin_url('categories'));
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
        $query = $db->from('categories')->where('category_url', $category_url)->where('category_id', $id, '!=')->first();

        if ($query){
            $error = "<strong>' . $category_name . '</strong> adında kateqoriya hal hazırda mövcuddur. Başqa bir ad yoxlayın.";
        }else{
            $query = $db->update('categories')->where('category_id', $id)->set([
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

$category_seo = json_decode($row['category_seo'], true);

require admin_view('edit-category');