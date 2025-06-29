<?php
include_once "model/M$controller.php";
$obj = new page();
$errMsg = '';
switch ($action) {
    case "list" :
        $list = $obj->page_list();
        break;
    case "edit" :
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($obj->page_edit($data, $id,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        $item = $obj->page_list($id);
        break;
    case "add" :
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($obj->page_add($data,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
    case "delete":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($obj->page_delete($id)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>