<?php
switch ($action) {
    case "index" :
        break;
    case "404":
        break;
}

require_once "view/layout/header.php";
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";
else
{
    $controller='index';
    $action='404';
    require_once "view/$controller/$action.php";
}
require_once "view/layout/footer.php";
?>