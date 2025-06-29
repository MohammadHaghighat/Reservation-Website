<?php
include_once "model/M$controller.php";
$obj = new news();
$errMsg = '';
switch ($action) {
    case "list" :
        $list = $obj->news_list();
        break;
    case "edit" :
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            $file = $_FILES;
            if ($obj->news_edit($data,$file, $id,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        $item = $obj->news_detail($id);
        break;
    case "add" :
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            $file = $_FILES;
            if ($obj->news_add($data,$file,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
    case "delete":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($obj->news_delete($id)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>