<?php
//  Autoload
function __autoload($class_name){
    if(file_exists($class_name . '.class.php')){
        require_once $class_name . '.class.php';
    }
}

if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['username'])){    
    $login = \controller\Login::getInstance($_POST);
    $check = $login->initSession();
}

if (!isset($_SESSION['username'])){
    require_once 'view/login.view.php';
}

?>