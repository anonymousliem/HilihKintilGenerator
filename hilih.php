<?php

$text = $_POST['text'];

$huruf = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$text = str_replace($huruf, "i", $text);
$image_width = 200; // pixels
text_to_image($text, $image_width);

function text_to_image($text, $image_width, $colour = array(255,255,255), $background = array(0,0,0))
{
    $font = 10;
    $line_height = 15;
    $padding= 10;
    $x = 100;
    $y = 240;
    $text = wordwrap($text, 30);
    $lines = explode("\n", $text);
    $imgPath = 'https://pbs.twimg.com/media/DFQgj4CUIAEgJhb.jpg';
    $image = imagecreatefromjpeg($imgPath);
    $background = imagecolorallocate($image, $background[0], $background[1], $background[2]);
    $colour = imagecolorallocate($image,$colour[0],$colour[1],$colour[2]);
    imagefill($image, 0, 0, $background);
    $i = $padding;
    foreach($lines as $line){
        imagestring($image, $font, $x, $y, trim($line), $colour);
        $y += $line_height;
    }
    header("Content-type: image/jpeg");
    imagejpeg($image);
    imagedestroy($image);
    exit;
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>