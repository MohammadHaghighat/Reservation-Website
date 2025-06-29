<?php
include_once "model/M$controller.php";
$setting = new setting();
$errMsg = '';
switch ($action) {
    case "edit" :
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($setting->setting_edit($data,$errMsg)) {
                $sucMsg = "اطلاعات شما با موفقیت ویرایش شد.";
            }
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>