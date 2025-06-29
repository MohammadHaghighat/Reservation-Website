<?php
include_once "model/M$controller.php";
$obj = new location();
$errMsg = '';
switch ($action) {
    case "list" :
        $list = $obj->locations_list();
        break;
    case "edit" :
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else
            redirect("index.php?controller=$controller&action=list");
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            $files = $_FILES;
            /*var_dump($_FILES);
            var_dump($data);die;*/
            if ($obj->location_edit($data, $id,$files,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        $item = $obj->location_detail($id);
        $files_path = unserialize($item['images']);
        break;
    case "add" :
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            $files = $_FILES;
            if ($obj->location_add($data,$files,$errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            }
            else{
                $errMsg .=PHP_EOL."مکان اقامتی اضافه نشد";
            }
        }
        break;
    case "delete":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($obj->location_delete($id)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>