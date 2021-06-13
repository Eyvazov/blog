<?php
session_start();
ob_start();

date_default_timezone_set('Asia/Baku');

function loadClasses($classname)
{
    require __DIR__ . '/classes/' . strtolower($classname) . '.php';
}
spl_autoload_register('loadClasses');

$config = require __DIR__ . '/config.php';

try {
    $db = new BasicDB($config['db']['host'], $config['db']['name'], $config['db']['user'], $config['db']['pass']);
}catch (PDOException $e){
    die($e->getMessage());
}

require __DIR__ . '/settings.php';

foreach (glob(__DIR__ . '/helper/*.php') as $helperFile){
    require $helperFile;
}

?>