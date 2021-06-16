<?php

$meta = [
    'title' => setting('title'),
    'description' => setting('description'),
    'keywords' => setting('keywords'),
    'author' => setting('author')
];

$totalRecord = $db->from('posts')
    ->where('post_status', 1)
    ->select('count(post_id) as total')
    ->total();

$pageLimit = 2;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('posts')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->where('post_status', 1)
    ->groupBy('posts.post_id')
    ->orderby('post_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();


require view('blog');

?>