<?php

function site_url($url = false)
{
    return URL . '/' . $url;
}

function public_url($url = false)
{
    return URL . '/public/' . setting('theme') . '/' . $url;
}

function error()
{
    global $error;
    return isset($error) ? $error : false;
}

function success()
{
    global $success;
    return isset($success) ? $success : false;
}

function menu($id)
{
    global $db;
    $query = $db->prepare('SELECT * FROM menu WHERE menu_id = :id');
    $query->execute([
        'id' => $id
    ]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $data = json_decode($row['menu_content'], true);
        return $data;
    }
    return false;
}

function cut_text($str, $limit = 200)
{
    $str = strip_tags(htmlspecialchars_decode($str));
    $lenght = strlen($str);
    if ($lenght > $limit) {
        $str = mb_substr($str, 0, $limit, 'UTF8') . '..';
    }
    return $str;
}

function menu_url($url)
{
    if (!strstr($url, 'http')) {
        $url = site_url($url);
    }
    return $url;
}


?>
