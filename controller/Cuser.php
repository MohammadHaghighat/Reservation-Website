<?php
switch ($action) {
    case "index" :
        if (isset($_POST['frmBtn'])) {
            $captcha = $_POST['frm']['captcha'];
            if ($user->isCorrectCaptcha($captcha)) {
                $data = $_POST['frm'];
                if ($user->isRegistered($data)) {
                    redirect("index.php");
                } else
                    $errMsg = "نام کاربری یا کلمه عبور وارد شده نامعتبر است";
            } else {
                $errMsg = "کد امنیتی وارد شده نامعتبر است";
            }

        }
        break;
        case "logout" :
            if ($user->logout()) {
                redirect("index.php");
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
        case "edit" :
            if (isset($_POST['frmBtn'])) {
                $data = $_POST['frm'];
                $file = $_FILES;
                if ($user->userEdit($id, $data, $file, $errMsg)) {
                    $sucMsg = "اطلاعات شما با موفقیت ویرایش شد.";
                }
            }
            $id = $_SESSION['userId'];
            $item = $user->getUser($id);
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