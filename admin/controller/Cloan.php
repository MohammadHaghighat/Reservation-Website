<?php
include_once "model/M$controller.php";
$obj = new loan();
$errMsg = '';
switch ($action) {
    case "list" :
        $list = $obj->loans_list();
        break;
    case "edit" :
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else
            redirect("index.php?controller=$controller&action=list");
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($obj->loan_edit($data, $id,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        $item = $obj->loan_detail($id);
        break;
    case "add" :
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($obj->loan_add($data,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
            else{
                $errMsg .=PHP_EOL."وام اضافه نشد";
            }
        }
        break;
    case "delete":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($obj->loan_delete($id)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>