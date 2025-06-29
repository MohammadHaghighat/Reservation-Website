<?php
require_once "config.php";
require_once "jdf.php";
function redirect($url)
{
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}

function uploadFile($file, $folder, &$errMsg = null, $title = null)
{
    $path = "public/";
    if (!file_exists($path)) {
        $path = "../public/";
    }
    $path .= "admin/images";
    if (!file_exists($path)) {
        mkdir($path);
    }
    if (!file_exists("$path/$folder")) {
        mkdir("$path/$folder");
    }
    $newPath = "$path/$folder/";
    if ($title) {
        if (!file_exists("$path/$folder/$title")) {
            mkdir("$path/$folder/$title");
        }
        $newPath = "$path/$folder/$title/";
    }
    $oldPath = $file['tmp_name'];
    $oldFileName = $file['name'];
    $nameSplitedArray = explode(".", $oldFileName);
    $ext = end($nameSplitedArray);
    if (!in_array($ext, array("gif", "png", "jpg", "jpeg", "bmp"))) {
        $errMsg .= "پسوند فایل ارسالی غیر مجاز است";
        return false;
    }
    $newFileName = "img-" . rand(1000, 9999) . "." . $ext;
    if (move_uploaded_file($oldPath, $newPath . $newFileName)) {
        $image_path = $newPath . $newFileName;
        if (substr($image_path, 0, 3) === "../") {
            $image_path = substr($image_path, 3);
        }
        return $image_path;
    } else {
        $errMsg .= "عکس ارسالی آپلود نشد";
        return false;
    }
}

function ta_persian_num($string)
{
    //arrays of persian and latin numbers
    $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $latin_num = range(0, 9);

    $string = str_replace($latin_num, $persian_num, $string);

    return $string;
}

function numberformat($str, $sep = ',')
{
    $result = '';
    $c = 0;
    $num = strlen("$str");
    for ($i = $num - 1; $i >= 0; $i--) {
        if ($c == 3) {
            $result = $sep . $result;
            $result = $str[$i] . $result;
            $c = 0;
        } else {
            $result = $str[$i] . $result;
        }

        $c++;
    }

    return $result;
}
function mostVisitedPro()
{
    global $db;
    $sql = "SELECT MAX(id) FROM $db->productsTable";
    $result = $db->query($sql);
    $row = $result->fetch();
    $mostVisited = array();
    $maxid = $row[0]; // gharar dadan an dar $maxid
    for ($id = 1; $id <= $maxid; $id++) {
        if (isset($_SESSION['view' . $id])) {
            $mostVisited[$id] = $_SESSION['view' . $id];
        }
    }
    if (!$mostVisited)
        return false;
    $i = 0;
    arsort($mostVisited);
    foreach ($mostVisited as $key=>$value){
        $mostVisitedPros[$i] = $key;
        $i++;
    }
    $i = 0;
    $pros = [];
    do {
        global $db;
        $sql = "SELECT * FROM $db->productsTable WHERE id =$mostVisitedPros[$i]";
        $result = $db->query($sql);
        $pros[] = $result->fetch(2);
        $i++;
    } while ($i < count($mostVisitedPros));
    return $pros;
}
function alert($msg){
    print('<script>');
    print("alert('{$msg}')");
    print('</script>');
}