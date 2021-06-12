<?php

    function post($name)
    {
        if (isset($_POST[$name])){
            if (is_array($_POST[$name]))
                return array_map(function($item){
                    return htmlspecialchars(trim($item));
                }, $_POST[$name]);
            return htmlspecialchars(trim($_POST[$name]));
        }
    }

//    function post_arr($name, $subname){
//        $post = post($name);
//        if (isset($post[$subname])){
//            return $post[$subname];
//        }
//    }

    function get($name)
    {
        if (isset($_GET[$name])){
            if (is_array($_GET[$name]))
                return array_map(function($item){
                    return htmlspecialchars(trim($item));
                }, $_GET[$name]);
            return htmlspecialchars(trim($_GET[$name]));
        }
    }

    function form_control(...$except_these){
        unset($_POST['submit']);
        $data = [];
        $error = false;

        foreach ($_POST as $key => $val){
            if (!in_array($key, $except_these) && !post($key)){
                $error = true;
            }else{
                $data[$key] = post($key);
            }
        }
        if ($error){
            return false;
        }
        return $data;
    }

?>