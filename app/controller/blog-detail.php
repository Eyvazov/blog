<?php
$row = Blog::findPost($post_url);

if (!$row) {
    header('Location:' . site_url('404'));
    exit;
}

$seo = json_decode($row['post_seo'], true);

$meta = [
    'title' => $seo['title'] ? $seo['title'] : $row['post_title'],
    'description' => $seo['description'] ? $seo['description'] : cut_text($row['post_short_content'])
];

require view('blog-detail');
