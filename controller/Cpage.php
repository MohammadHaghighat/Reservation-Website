<?php
include_once "admin/model/M$controller.php";
$obj = new page();
$errMsg = '';
switch ($action) {
    case "detail" :
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else
          redirect('index.php');
        if(!($item = $obj->page_detail($id,'published')))
          redirect('index.php?controller=index&action=404');
        break;
}

require_once "view/layout/header.php";
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";
  else
  {
      $controller='index';
      $action='404';
      require_once "controller/C{$controller}.php";
  }
require_once "view/layout/footer.php";

?>