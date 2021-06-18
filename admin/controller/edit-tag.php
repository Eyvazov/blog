<?php

if (!permission('tags', 'edit')){
    permission_page();
}

$allTags = $db->from('tags')
    ->orderBy('tag_id', 'DESC')
    ->all();

$tagsArr = [];
foreach ($allTags as $allTag){
    $tagsArr[] = trim(htmlspecialchars($allTag['tag_name']));
};

$id = get('id');

if (!$id){
    header('Location:' . admin_url('tags'));
    exit;
}

$row = $db->from('tags')->where('tag_id', $id)->first();

if (!$row){
    header('Location:' . admin_url('tags'));
    exit;
}

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
            ->where('tag_id', $id, '!=')
            ->where('tag_url', $tag_url)
            ->first();

        if ($query){
            $error = '<strong>' . $tag_name . '</strong> adında etiket hal hazırda mövcuddur. Başqa bir ad yoxlayın.';
        }else{
            $query = $db->update('tags')
                ->where('tag_id', $id)
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

$seo = json_decode($row['tag_seo'], true);

require admin_view('edit-tag');