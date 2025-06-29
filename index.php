<?php
require_once "controller/Clayout.php";
$controller = (isset($_GET['controller']) and !empty($_GET['controller'])) ? $_GET['controller'] : "index";
$action = (isset($_GET['action']) and !empty($_GET['action'])) ? $_GET['action'] : "index";
if (!($user->isLogin())) {
    if (!($controller == "user" and $action == "index")) {
        redirect("index.php?controller=user&action=index");
    }
}
else{
    if ($controller == "user" and $action == "index") {
        redirect("index.php");
    }
}
if (file_exists("controller/C{$controller}.php"))
    require_once "controller/C{$controller}.php";
else
    {
        $controller='index';
        $action='404';
        require_once "controller/C{$controller}.php";
    }

?>
