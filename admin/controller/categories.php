<?php
if (!permission('categories', 'show')){
    permission_page();
}


$totalRecord = $db->from('users')
    ->select('count(user_id) as total')
    ->total();



$query = $db->from('categories')
    ->orderby('category_order', 'ASC')
    ->all();



require admin_view('categories');