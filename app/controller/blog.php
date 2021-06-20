<?php

if (route(1) == 'kateqoriya') {
    require controller('blog-category');
} elseif (route(1) == 'axtar'){
    require controller('blog-search');
} else {
    if ($post_url = route(1)) {

        require controller('blog-detail');

    } else {

        $meta = [
            'title' => setting('blog_title'),
            'description' => setting('blog_description'),
        ];

        $totalRecord = $db->from('posts')
            ->where('post_status', 1)
            ->select('count(post_id) as total')
            ->total();

        $pageLimit = setting('blog_pagination');
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
    }
}



?>