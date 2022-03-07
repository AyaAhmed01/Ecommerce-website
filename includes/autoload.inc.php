<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $path = "classes/";
    $db_path = "DB/MysqliDb.php";
    $ext = '.class.php';

    if (strpos($url, 'classes') == true){
        $path = '';
        $db_path = '../'.$db_path;
    }

    if($className == "MysqliDb"){
        require $db_path;
    } else {
        require $path . $className . $ext;
    }
}

// in classes: SAME classes
// in includes: -
// outside: classes

// who needs db: index -> "DB/MysqliDb.php", classes -> "../DB/MysqliDb.php"