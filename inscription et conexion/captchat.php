<?php
session_start();
$_SESSION['captcha'] = rand(1000,9999);
$img = imagecreatetruecolor(70,30);
$fill_color = imagecolorallocate($img,230,230,230);
imagefilledrectangle($img,0,0,70,30,$fill_color);
$text_color = imagecolorallocate($img, 10, 10, 10);
$font = './police.ttf'; // Spécifiez le chemin correct vers le fichier de police
imagettftext($img, 23, 0, 5, 25, $text_color, $font, $_SESSION['captcha']);

header("content-type:image/jpeg");
imagejpeg($img);
imagedestroy($img);
?>
