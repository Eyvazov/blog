<?php
if (!get('s')){
    header('Location:' . site_url('blog'));
    exit;
}

$meta = [
    'title' => sprintf(setting('blog_search_title'), get('s')),
    'description' => sprintf(setting('blog_search_description'), get('s'))
];

$totalRecord = $db->from('posts')
    ->where('post_status', 1)
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->select('count(DISTINCT post_id) as total')
    ->total();

$pageLimit = setting('search_pagination');
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('posts')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->where('post_status', 1)
    ->group(function ($db) {
        $db->where('post_title', get('s'), 'LIKE')
            ->or_where('post_content', get('s'), 'LIKE')
            ->or_where('post_short_content', get('s'), 'LIKE');
    })
    ->groupBy('posts.post_id')
    ->orderby('post_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();


require view('blog-search');
