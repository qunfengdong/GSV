<?php
function watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile) {
   list($width, $height) = getimagesize($SourceFile);
   $image_p = imagecreatetruecolor($width, $height);
   $image = imagecreatefrompng($SourceFile);
   imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
   $black = imagecolorallocate($image_p, 0, 0, 0);
$transparency = 70;
	$black = imagecolorallocatealpha($image_p, 0, 0, 0,$transparency);    ##Black
   $font = 'Arial.ttf';
   $font_size = 10;
   $display_x_point = $width/2;
	imagettftext($image_p, $font_size, 0, $display_x_point, 20, $black, $font, $WaterMarkText);
//   if ($DestinationFile<>'') {
      imagepng ($image_p, $DestinationFile);
//   } else {
//      header('Content-Type: image/png');
//      imagepng($image_p, null, 100);
 //  }
  // imagedestroy($image);
   imagedestroy($image_p);
}

function LoadPNG($imgname)
{
    /* Attempt to open */
    $im = @imagecreatefrompng($imgname);

    /* See if it failed */
    if(!$im)
    {
        /* Create a blank image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Output an error message */
        imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
    }

    return $im;
}
/*
header('Content-Type: image/png');

$SourceFile = "syn/synteny_annotation_311571120115200000022640/Species1_Human19_311571120115200000022640_image_0.png";
$img = LoadPNG($SourceFile);

imagepng($img);
imagedestroy($img);
*/


$SourceFile = "syn/synteny_annotation_311571120115200000022640/Species1_Human19_311571120115200000022640_image_0.png";
$DestinationFile = "syn/synteny_annotation_311571120115200000022640/Species1_Human19_311571120115200000022640_image_0_1.png";
$WaterMarkText = 'Copyright phpJabbers.com';
watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile);
?>
