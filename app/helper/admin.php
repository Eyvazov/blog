<?php

function admin_controller($controllerName)
{
    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

function admin_view($viewName)
{
    return PATH . '/admin/view/' . $viewName . '.php';
}

function admin_url($url = false)
{
    return URL . '/admin/' . $url;
}

function admin_public_url($url = false)
{
    return URL . '/admin/public/' . $url;
}

function user_ranks($rankId = null)
{
    $ranks = [
        1 => 'Admin',
        2 => 'Redaktor',
        3 => 'İstifadəçi'
    ];
    return $rankId ? $ranks[$rankId] : $ranks;
}

function permission($url, $action)
{
    $permissions = json_decode(session('user_permissions'), true);
    if (isset($permissions[$url][$action])) {
        return true;
    }else{
        return false;
    }

}

function permission_page(){
    die('Səlahiyyətiniz yoxdur!');
}

?>
