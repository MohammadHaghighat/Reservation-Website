<?php
include_once "model/M$controller.php";
$obj = new menu();
$errMsg = '';
switch ($action) {
    case "list" :
        $list = $obj->menu_list();
        break;
    case "edit" :
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($obj->menu_edit($data, $id,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        $item = $obj->menu_list($id);
        $list = $obj->sorted_menu_list();
        break;
    case "add" :
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($obj->menu_add($data,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        $list = $obj->sorted_menu_list();
        break;
    case "delete":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($obj->menu_delete($id)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>