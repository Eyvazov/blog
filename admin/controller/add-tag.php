<?php

if (!permission('tags', 'add')){
    permission_page();
}

$allTags = $db->from('tags')
    ->orderBy('tag_id', 'DESC')
    ->all();

$tagsArr = [];
foreach ($allTags as $allTag){
    $tagsArr[] = trim(htmlspecialchars($allTag['tag_name']));
};



if (post('submit')){
    $tag_name = post('tag_name');
    $tag_url = permalink(post('tag_url'));
    if (!post('tag_url')){
        $tag_url = permalink($tag_name);
    }
    $tag_seo = json_encode(post('tag_seo'));

    if (!$tag_url){
        $error = "Xahiş edirik bütün sahələri doldurun!";
    }else{
        $query = $db->from('tags')
            ->where('tag_url', $tag_url)
            ->first();

        if ($query){
            $error = '<strong>' . $tag_name . '</strong> adında etiket hal hazırda mövcuddur. Başqa bir ad yoxlayın.';
        }else{
            $query = $db->insert('tags')
                ->set([
               'tag_name' => $tag_name,
               'tag_url' => $tag_url,
                'tag_seo' => $tag_seo
            ]);

            if ($query){
                header('Location:' . admin_url('tags'));
            }else{
                $error = "Bir problem yarandı!";
            }
        }
    }
}


require admin_view('add-tag');