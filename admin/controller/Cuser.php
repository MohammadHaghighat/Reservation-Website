<?php
include_once "model/M$controller.php";
$user = new user();
$errMsg = '';
switch ($action) {
    case "index" :
        if (isset($_POST['frmBtn'])) {
            $captcha = $_POST['frm']['captcha'];
            if ($user->isCorrectCaptcha($captcha)) {
                $data = $_POST['frm'];
                if ($user->isRegistered($data)) {
                    redirect("index.php");
                } else
                    $errMsg = "ایمیل یا رمز وارد شده نامعتبر است";
            } else {
                $errMsg = "کد امنیتی وارد شده نامعتبر است";
            }

        }
        break;
    case "logout" :
        if ($user->logout()) {
            redirect("../index.php");
        }
        break;
    case "register" :
        if (isset($_POST['frmBtn'])) {
            $captcha = $_POST['frm']['captcha'];
            if ($user->isCorrectCaptcha($captcha)) {
                $data = $_POST['frm'];
                if ($user->addUser($data, $errMsg)) {
                    $user->doLogin($data);
                    redirect("index.php");
                }
            } else {
                $errMsg = "کد امنیتی وارد شده نامعتبر است";
            }

        }
        break;
    case "edit" :
        if (isset($_GET['id']))
            $id = $_GET['id'];
        else
            $id = $_SESSION['userId'];
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            $file = $_FILES;
            if ($user->userEdit($id, $data, $file, $errMsg)) {
                $sucMsg = "اطلاعات شما با موفقیت ویرایش شد.";
            }
        }
        $item = $user->getUser($id);
        break;
    case "list" :
        $list = $user->getUsers();
        break;
    case "delete":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($user->userDelete($id)) {
                redirect("index.php?controller=$controller&action=list");
            }
        }
        break;
    case "add" :
        if (isset($_POST['frmBtn'])) {
            $data = $_POST['frm'];
            if ($user->addUser($data, $errMsg)) {
                redirect("index.php?controller=$controller&action=list");
            } else {
                $errMsg .= PHP_EOL . "کاربر اضافه نشد";
            }
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>