<?php
define('PATH', realpath('.'));
define('SUBFOLDER_NAME', trim(dirname($_SERVER['SCRIPT_NAME']), '/'));
define('URL', 'http://' . $_SERVER['SERVER_NAME'] . '/' . SUBFOLDER_NAME);

return [
    'db' => [
        'name' => 'prototurk',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => ''
    ]
];

?>
