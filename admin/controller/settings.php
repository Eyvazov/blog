<?php

if (!permission('settings', 'show')){
    permission_page();
}

$allTags = $db->from('tags')
    ->orderBy('tag_id', 'DESC')
    ->all();

$tagsArr = [];
foreach ($allTags as $allTag){
    $tagsArr[] = trim(htmlspecialchars($allTag['tag_name']));
};

$themes = [];

foreach (glob(PATH . '/app/view/*/') as $folder) {
    $folder = explode('/', rtrim($folder,'/'));
    $themes[] =  end($folder);
}

if (post('submit')){

    if (!permission('settings', 'edit')){
        $error = "Tənzimləmələri redaktə etmək səlahiyyətiniz yoxdur!";
    }else{
    $html = '<?php' . PHP_EOL.PHP_EOL;
    foreach (post('settings') as $key => $val){
        $html .= '$settings["' . $key .'"] = "' . $val .'";' . PHP_EOL;
    }
    file_put_contents(PATH . '/app/settings.php', $html);
    header('Location:' . admin_url('settings'));
    }
}

require admin_view('settings');