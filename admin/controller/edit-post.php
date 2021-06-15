<?php

if (!permission('posts', 'edit')){
    permission_page();
}

$id = get('id');
if (!$id){
    header('Location:' . admin_url('posts'));
    exit;
}

$row = $db->from('posts')
    ->where('post_id', $id)
    ->first();
if (!$row){
    header('Location:' . admin_url('posts'));
    exit;
}

$categories = $db->from('categories')
    ->orderby('category_name', 'ASC')
    ->all();

if (post('submit')){

    $post_title = post('post_title');
    $post_url = permalink(post('post_url'));
    if (!post('post_url')) {
        $post_url = permalink($post_title);
    }
    $post_content = post('post_content');
    $post_short_content = post('post_short_content');
    $post_categories = implode(',', post('post_categories'));
    $post_status = post('post_status');
    $post_tags = post('post_tags');
    $post_seo = json_encode(post('post_seo'));

    if (!$post_url || !$post_content || !$post_status || !$post_categories ){
        $error = 'Xahiş edirik bütün sahələri doldurun.';
    } else {

        // konu var mı kontrol et
        $query = $db->from('posts')
            ->where('post_url', $post_url)
            ->where('post_id', $id, '!=')
            ->first();

        if ($query){
            $error = '<strong>' . $post_title . '</strong> adında məqalı var. Xahiş edirik başqa ad yoxlayın.';
        } else {

            $query = $db->update('posts')
                ->where('post_id', $id)
                ->set([
                    'post_title' => $post_title,
                    'post_url' => $post_url,
                    'post_content' => $post_content,
                    'post_short_content' => $post_short_content,
                    'post_categories' => $post_categories,
                    'post_seo' => $post_seo,
                    'post_status' => $post_status
                ]);

            if ($query){

                $postID = $id;

                $post_tags = explode("\n", $post_tags);
                foreach ($post_tags as $tag){

                    $row = $db->from('tags')
                        ->where('tag_url', permalink($tag))
                        ->first();

                    if (!$row){
                        $tagInsert = $db->insert('tags')
                            ->set([
                                'tag_name' => $tag,
                                'tag_url' => permalink($tag)
                            ]);
                        $tagId = $db->lastId();
                    } else {
                        $tagId = $row['tag_id'];
                    }

                    $row = $db->from('post_tags')
                        ->where('tag_post_id', $postID)
                        ->where('tag_id', $tagId)
                        ->first();

                    if (!$row){

                        $db->insert('post_tags')
                            ->set([
                                'tag_post_id' => $postID,
                                'tag_id' => $tagId
                            ]);

                    }

                }

                header('Location:' . admin_url('posts'));

            } else {

                $error = 'Bir problem yarandı.';

            }

        }

    }

}

// etiketler
$tags = $db->from('post_tags')
    ->join('tags', '%s.tag_id = %s.tag_id')
    ->where('tag_post_id', $id)
    ->all();

$seo = json_decode($row['post_seo'], true);

require admin_view('edit-post');