<?php
header("content-type:image/png");
$w = 90;
$h = 40;
$ltrs = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', "i", 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
$im = imagecreate($w, $h);
$bg = imagecolorallocate($im, rand(0, 100), rand(0, 100), rand(0, 100));
$textColor = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));
$textLength = rand(3, 5);
$text = "";
for ($i = 0; $i < $textLength; $i++) {
    $l = $ltrs[rand(0, sizeof($ltrs) - 1)];
    $chr_status = is_numeric($l) ? "num" : "char";
    if ($chr_status == "char") {
        $uper = rand(0, 1);
        if ($uper) {
            $text .= strtoupper($l);
        } else {
            $text .= $l;
        }
    }
    else{
        $text .= $l;
    }
}
session_start();
$_SESSION['captcha'] = $text;
$fontsize = 5;
$textWidth = imagefontwidth($fontsize) * $textLength;
$textHeight = imagefontheight($fontsize);
$posTop = ($h - $textHeight) / 2;
$posLeft = ($w - $textWidth) / 2;
/* create diffrent size of letter // You should remove Line 37
$text = str_split($text);
$step = 0;
foreach ($text as $letter) {
    $fontsize = rand(3, 5);
    $step += imagefontwidth($fontsize);
    $finalPosLeft = $posLeft + $step;
        imagestring($im, $fontsize, $finalPosLeft, $posTop, $letter, $textColor);
}
*/
imagestring($im, $fontsize, $posLeft, $posTop, $text, $textColor);
imagepng($im);
imagedestroy($im);
