<?php
if (!permission('comments', 'show')){
    permission_page();
}


$totalRecord = $db->from('comments')
    ->select('count(comment_id) as total')
    ->total();


$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('comments')
    ->join('posts', '%s.post_id = %s.comment_post_id')
    ->join('users', '%s.user_id = %s.comment_user_id', 'left')
    ->orderby('comment_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();



require admin_view('comments');