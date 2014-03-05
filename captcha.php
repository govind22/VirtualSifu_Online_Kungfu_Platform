
<?php
session_start();

$passwd = "";

for ($i=0;$i<4; $i++)
	$passwd .= chr(rand(97, 122));

$_SESSION["captcha"] = $passwd;

header('Content-type: image/jpeg');

$img = imagecreatetruecolor(150, 50);
$bg = imagecolorallocate($img, rand(210, 255), rand(210, 255), rand(210, 255));
imagefilledrectangle($img, 0, 0, 200, 60, $bg);

$right = rand(10, 30);
$left = 0;
$width = 150;

while ($left < $width)
{
	$poly_points = array($left, 0, $right, 0, rand($right - 25, $right + 25), 60, rand($left - 15, $left + 15), 60);
	$c = imagecolorallocate($img, rand(210, 255), rand(210, 255), rand(210, 255));
	imagefilledpolygon($img, $poly_points, 4, $c);
	$random_amount = rand(10, 30);
	$left += $random_amount;
	$right += $random_amount;
}

$spacing = ($width / 6);
$x = $spacing;

for ($i = 0; $i < strlen($passwd); $i++)
{
	$letter = $passwd[$i];
	$size = rand(20, 30);
	$rotation = rand(-30, 30);
	$y = rand(60 * .70, 60 - $size - 4);
	$font = "./fonts/AARDC.TTF";
	
	$r = rand(100, 255);
	$g = rand(100, 255);
	$b = rand(100, 255);
	
	$color = imagecolorallocate($img, $r, $g, $b);
	$shadow = imagecolorallocate($img, $r/3, $g/3, $b/3);
	imagettftext($img, $size, $rotation, $x, $y, $shadow, $font, $letter);
	imagettftext($img, $size, $rotation, $x-1, $y-3, $color, $font, $letter);
	$x += rand($spacing, $spacing * 1.5);
}

imagejpeg($img);
imagedestroy($img);

exit();
?>