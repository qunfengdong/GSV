<?php
$total_part_images = $_POST['num_of_images'];

for($i=0;$i<$total_part_images;$i++) {
if(is_numeric($_POST["idofimages$i"])){
$aa[] = $_POST["combinedimages$i"];
}
}

$combinedimage_path = $_POST['session_id'];

mergeImages($aa,$combinedimage_path);

function mergeImages($images,$path)

{

$imageData=array();

$len=count($images);

$wc=ceil(sqrt($len));

$hc=floor(sqrt($len/2));

$maxW=array();

$maxH=array();


for($i=0;$i<$len;$i++){
$imageData[$i]=getimagesize($images[$i]);

$found=false;

for($j=0;$j<$i;$j++){

if($imageData[$maxW[$j]][0]<$imageData[$i][0]){

$farr=$j>0?array_slice($maxW,$j-1,$i):array();

$maxW=array_merge($farr,array($i),array_slice($maxW,$j));

$found=true;

break;

}

}

if(!$found){

$maxW[$i]=$i;
}

$found=false;

for($j=0;$j<$i;$j++){

if($imageData[$maxH[$j]][1]<$imageData[$i][1]){

$farr=$j>0?array_slice($maxH,$j-1,$i):array();

$maxH=array_merge($farr,array($i),array_slice($maxH,$j));

$found=true;

break;

}

}

if(!$found){

$maxH[$i]=$i;

}

}


$width=0;

for($i=0;$i<$len;$i++){

$width=$imageData[$maxW[$i]][0];
}



$height=0;
for($i=0;$i<$len;$i++){

$height+=$imageData[$maxH[$i]][1];
}



$im=imagecreatetruecolor($width,$height);



$wCnt=0;

$startWFrom=0;

$startHFrom=0;
for($i=0;$i<$len;$i++){

$tmp=imagecreatefrompng($images[$i]);

imagecopyresampled($im,$tmp,$startWFrom,$startHFrom,0,0,$imageData[$i][0],$imageData[$i][1],$imageData[$i][0],$imageData[$i][1]);


if($imageData[$i][1] == 350) {
$startHFrom += 350;
}
else {
$startHFrom += 60;
}



}





imagepng($im,"syn/synteny_annotation_{$path}/combined_image.png");
imagedestroy($im);

}




?>
