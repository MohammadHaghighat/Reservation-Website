<?php
require_once "controller/Clayout.php";
$controller = (isset($_GET['controller']) and !empty($_GET['controller'])) ? $_GET['controller'] : "index";
$action = (isset($_GET['action']) and !empty($_GET['action'])) ? $_GET['action'] : "index";
/*if ($user->isLogin()) {
    if ($controller == "user" and in_array("$action", array("index", "register"))) {
        redirect("index.php");
    }
} else {
    redirect('../index.php?controller=user&action=index');
}*/


///force login
$_SESSION['loginStatus'] = true;
$_SESSION['userId'] = 1;

require_once "view/layout/header.php";
if (file_exists("controller/C{$controller}.php"))
    require_once "controller/C{$controller}.php";
else
    {
        $controller='index';
        $action='404';
        require_once "controller/C{$controller}.php";
    }
require_once "view/layout/footer.php";
?>