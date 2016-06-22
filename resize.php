<?php
// The file
$filename = 'syn/synteny_annotation_311371720111400000021073/Species1_Human19_311371720111400000021073_image_0.png';
$filename1 = 'syn/synteny_annotation_311371720111400000021073/Species5_Human19_311371720111400000021073_image_1.png';
$filename2 = 'syn/synteny_annotation_311371720111400000021073/Species4_Human19_311371720111400000021073_image_2.png';
$percent = 0.5;

// Content type
header('Content-type: image/png');

// Get new dimensions
list($width, $height) = getimagesize($filename);
$new_width = $width;
$new_height = $height;
$new_height1 = $height + 50;

// Resample
$image_p = imagecreatetruecolor($new_width, 150);
$image = imagecreatefrompng($filename);
$image1 = imagecreatefrompng($filename1);
$image2 = imagecreatefrompng($filename2);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagecopyresampled($image_p, $image1, 0, 50, 0, 0, $new_width, $new_height, $width, $new_height);
imagecopyresampled($image_p, $image2, 0, 100, 0, 0, $new_width, $new_height, $width, $new_height);

// Output
//imagejpeg($image_p, null, 100);
imagepng($image_p);
?>

