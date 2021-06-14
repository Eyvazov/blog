<?php

class Blog{
    public static function Categories(){
        global $db;
        $query = $db->from('categories')
        ->orderBy('category_order', 'ASC')
        ->all();
        return $query;
    }
}
