<?php
require_once("dbtools.php");
$link = create_connection();


$id_value = mysql_real_escape_string($_GET['id_value'],$link);
$annotationid1 = mysql_real_escape_string($_GET['annid'],$link);
$polygon = mysql_real_escape_string($_GET['polygon'],$link);
$annotationidimage = mysql_real_escape_string($_GET["annotationidimage"],$link);

$session_id = mysql_real_escape_string($_GET['session_id'],$link);
$session_id_gene = mysql_real_escape_string($_GET['session_id_gene'],$link);
$org1 = mysql_real_escape_string($_GET['ref'],$link);
$org2 = mysql_real_escape_string($_GET['query'],$link);
$id_ref = mysql_real_escape_string($_GET['zoomrefstart'],$link);
$hs19_position = mysql_real_escape_string($_GET['zoomrefend'],$link);
$id_query = mysql_real_escape_string($_GET['zoomquerystart'],$link);
$ce19_position = mysql_real_escape_string($_GET['zoomqueryend'],$link);
$width = mysql_real_escape_string($_GET['image'],$link);
$xyplotheight = mysql_real_escape_string($_GET['Height'],$link);
$change_color = mysql_real_escape_string($_GET['Color'],$link);
$get_track_id = mysql_real_escape_string($_GET['trackname'],$link);
$imagebgc = mysql_real_escape_string($_GET['imagebgc'],$link);
$colorchanged = mysql_real_escape_string($_GET['trackcolor'],$link);
$trackshapechanged = mysql_real_escape_string($_GET['trackshape'],$link);
$imagechanged = mysql_real_escape_string($_GET['imageid'],$link);
$finalrefvalue = mysql_real_escape_string($_GET['finalrefvalue'],$link);



if($annotationid1 == "1") {
showimage();
}
function draw_sign_value($a,$b,$c,$d) {
//global $colors[$ans[6]],$img,$xyplot_result_max[0],$xyplot_result_min[0];
imageline($b,1180,1,1180,50,$a);
//imagesetthickness($b, 4);
$mid_value = $c/2;
imageline($b,1180,2,1183,2,$a);
imagestring($b, 1, 1184, 2, $c, $a);
imageline($b,1180,28,1183,28,$a);
imagestring($b, 1, 1184, 24, $mid_value, $a);
imageline($b,1180,49,1183,49,$a);
imagestring($b, 1, 1184, 42, $d, $a);


ImagePNG($b);
imagedestroy($b);
}




function showimage() {
require_once('createarrow.php');

global $annotationid1,$annotationid2,$org1,$org2,$session_id,$session_id_gene,$session_id_gene2,$width,$id_query,$id_ref,$hs19_position,$ce19_position,$annotationidimage,$annotationid2image,$polygon,$xyplotheight,$get_track_id,$imagebgc,$colorchanged,$database_name,$link,$finalrefvalue,$trackshapechanged,$imagechanged;

Header("Content-type: image/png");
/*
require_once("dbtools.php");
$link = create_connection();
*/
$height = "60";
$img = imagecreate($width, $height);
$navy = imagecolorallocate($img, 0, 0, 128);
$black = imagecolorallocate($img, 0, 0, 0);
$teal = imagecolorallocate($img,0,128,128);
$colors[purple] = imagecolorallocate($img, 128, 0, 128);    ##Purple
$colors[pink] = imagecolorallocate($img, 238, 213, 210);    ## Pink
$colors[crimson] = imagecolorAllocate($img, 220, 20, 60);	## crimson
$colors[olive] = imagecolorAllocate($img, 128, 128, 0);	## olive
$colors[sandybrown] = imagecolorAllocate($img, 244, 164, 96); 	## SandyBrown
$colors[firebrick] = imagecolorAllocate($img, 178, 34, 34);	## FireBrick
$colors[darkgray] = imagecolorAllocate($img, 169, 169, 169); 	## DarkGray
$colors[tomato] = imagecolorAllocate($img, 255, 99, 71); 	## Tomato
$colors[seagreen] = imagecolorAllocate($img, 46, 139, 87); 	## SeaGreen
$colors[peru] = imagecolorAllocate($img, 205, 133, 63); 	## Peru
$colors[lightsteelblue] = imagecolorAllocate($img, 176, 196, 222); 	## LightSteelBlue
$colors[salmon] = imagecolorAllocate($img, 250, 128, 114); 	## Salmon
$colors[khaki] = imagecolorAllocate($img, 240, 230, 140); 	## Khaki
$colors[skyblue] = imagecolorAllocate($img, 135, 206, 235); 	## SkyBlue
$colors[maroon] = imagecolorAllocate($img, 128, 0, 0);		## Maroon
$colors[silver] = imagecolorAllocate($img, 192, 192, 192); 	## Silver
$colors[gold] = imagecolorAllocate($img, 255, 215, 0); 	## Gold
$colors[darkgreen] = imagecolorAllocate($img, 0, 100, 0); 	## DarkGreen
$colors[orange] = imagecolorAllocate($img, 255, 165, 0); 	## Orange
$colors[chocolate] = imagecolorAllocate($img, 210, 105, 30); 	## Chocolate
$colors[darkcyan] = imagecolorAllocate($img, 0, 139, 139); 	## DarkCyan
$colors[tan] = imagecolorAllocate($img, 210, 180, 140); 	## Tan
$colors[darkviolet] = imagecolorAllocate($img, 148, 0, 211); 	## DarkViolet
$colors[indianred] = imagecolorAllocate($img, 205, 92, 92); 	## IndianRed
$colors[gainsboro] = imagecolorAllocate($img, 220, 220, 220); 	## Gainsboro
$colors[brown] = imagecolorAllocate($img, 165, 42, 42); 	## Brown
$colors[gray] = imagecolorAllocate($img, 128, 128, 128); 	## Gray
$colors[red] = imagecolorAllocate($img, 255, 0, 0);## Red
$colors[black] = imagecolorAllocate($img, 0, 0, 0);## Black
$colors[white] = imagecolorAllocate($img, 255, 255, 255);## White
$colors[aliceblue] = imagecolorAllocate($img, 240, 248, 255);## AliceBlue 
$colors[snow] = imagecolorAllocate($img, 255, 250, 250);## Snow
$colors[thistle] = imagecolorAllocate($img, 216,191,216);## Thistle
$colors[darkslategray] = imagecolorAllocate($img, 47, 79, 79);## DarkSlateGray
$colors[magenta] = imagecolorAllocate($img, 255, 0, 255);## Magenta
$colors[mediumslateblue] = imagecolorAllocate($img, 123, 104, 238);## MediumSlateBlue 
$watermark_black = imagecolorallocatealpha($img, 0, 0, 0,70);    ##For watermark on the upperimage

imagefilledrectangle($img,0, 0, $width, $height, $colors[$imagebgc]);

#######################XYPLOT parameters#####################
$xyplot_min = "select min(feature_value) from {$session_id_gene}annotation_1 where track_shape='xyplot'";
$xyplot_max = "select max(feature_value) from {$session_id_gene}annotation_1 where track_shape='xyplot'";
$result_xyplot_min = execute_sql($database_name,$xyplot_min,$link);
$result_xyplot_max = execute_sql($database_name,$xyplot_max,$link);
$xyplot_result_min = mysql_fetch_array($result_xyplot_min, MYSQL_NUM);
$xyplot_result_max = mysql_fetch_array($result_xyplot_max, MYSQL_NUM);
$y_axis_x_point = 0;
$x_axis_y_point = 0;
$plot_start_x_point = $y_axis_x_point;
$plot_line_y_point = $height - $x_axis_y_point;
$plot_width = $width - $plot_start_x_point;
$plot_height = $height - $x_axis_y_point;
$sort_start = 0;
//$sort_end = $xyplot_result_max[0];
$sort_end = $finalrefvalue;
//$sort_end = 60000;
//$sort_end = 60000000;
$sort_value = array($result_xyplot_max[0],0);
//$sort_value = array($finalrefvalue,$sort_start);
$plot_length = $sort_end - $sort_start;
$plot_value_height = $xyplot_result_max[0] - 0;
$previous_x_point = 550;
$previous_y_point = 700;
$previous_number = 0;
$newwidth = $width - 50;
$newwidth1 = $width - 47;
$newwidth2 = $width - 46;
################################################################
//echo $xyplot_result_min[0]; 
//echo $xyplot_result_max[0]; 


$ref_length = $hs19_position - $id_ref;

$query_length = $ce19_position - $id_query;

if($annotationidimage != '1') {

$alength = 5;
$awidth  = 5;
$geneid_y_position = 8;
$gene = array($org1);
$track_id = $get_track_id;
$hs19ce19start = array($id_ref);


$startandend = array($hs19_position);


$ref_query = array(30);
$z=0;
$j=0;
for($d=0;$d<1;$d++) {


$pointA[$z] = "select start,end,strand,feature_name,feature_value,track_shape,track_color,track_name from {$session_id_gene}annotation_1 where org_id='$gene[$d]' and track_name='$track_id' and (( start > $hs19ce19start[$d] and end < $startandend[$d] ) or ( start > $hs19ce19start[$d] and start < $startandend[$d] ) or (end > $hs19ce19start[$d] and end < $startandend[$d] ) or ( start < $hs19ce19start[$d] and end > $startandend[$d])) order by start asc";
$nextresult[$z] = execute_sql($database_name,$pointA[$z],$link);

$length[$d] = $startandend[$d] - $hs19ce19start[$d];

$arrowpos = $ref_query[$d];

($org1 == $gene[$d])? $arrowpos -= 10 : $arrowpos += 50;

$data = $nextresult[$j];
$compare1 = 0;
$compare2 = 0;
$w=0;
$ds=0;
$cols=0;
$encoding = 'Arial.ttf';
$compare1 = 0;
$compare2 = 0;
$pp=0;
$font_size = 10;
$display_x_point = $width/2;
while($ans = mysql_fetch_array($data, MYSQL_NUM)) {

$geneStartPos = floor((($ans[0]-$hs19ce19start[$d])/$length[$d])*$width);
$geneEndPos = $width - floor((($startandend[$d]-$ans[1])/$length[$d])*$width);

#####Upper to Lower#############
$ans[5] = strtolower($ans[5]);
$ans[6] = strtolower($ans[6]);
################################

####Track Color################
if($colorchanged == "default") {
$ans[6] = $ans[6];
}
elseif($ans[6] != $colorchanged) {
$ans[6] = $colorchanged;
}
###############################

####Track shape################
if($trackshapechanged == "default") {
$ans[5] = $ans[5];
}
elseif($ans[5] != $trackshapechanged) {
$ans[5] = $trackshapechanged;
}
###############################

$dist = $geneEndPos - $geneStartPos;
if($ans[5] == 'arrow') {
$acc_track_name = $ans[7];
$accup = "arrow";
$WaterMarkText = $acc_track_name."_".$org1;
imagestring($img, 2, 5, 45, $WaterMarkText, $watermark_black);
include('drawarrow.php');

}


if($ans[5] == 'dashline') {
$acc_track_name = $ans[7];
$accup = "dashline";
$WaterMarkText = $acc_track_name."_".$org1;
imagestring($img, 2, 5, 45, $WaterMarkText, $watermark_black);

include('drawdashline.php');

}

if($ans[5] == 'box') {
$acc_track_name = $ans[7];
$accup = "box";
$WaterMarkText = $acc_track_name."_".$org1;
imagestring($img, 2, 5, 45, $WaterMarkText, $watermark_black);
include('drawbox.php');

}

if($ans[5] == 'ellipse') {
$acc_track_name = $ans[7];
$accup = "ellipse";
$WaterMarkText = $acc_track_name."_".$org1;
imagestring($img, 2, 5, 45, $WaterMarkText, $watermark_black);
include('drawellipse.php');

}

if($ans[5] == 'christmasarrow') {
$acc_track_name = $ans[7];
$accup = "christmasarrow";
$WaterMarkText = $acc_track_name."_".$org1;
imagestring($img, 2, 5, 45, $WaterMarkText, $watermark_black);
include('drawchristmasarrow.php');

}

if($ans[5] == 'pentagram') {
$acc_track_name = $ans[7];
$accup = "pentagram";
$WaterMarkText = $acc_track_name."_".$org1;
imagestring($img, 2, 5, 45, $WaterMarkText, $watermark_black);
include('drawpolygon.php');

}

if($ans[5] == 'xyplot') {
if($ans[6] == '') {
    $ans[6] == "purple";
}

$acc_track_name = $ans[7];
$accup = "xyplot";
$WaterMarkText = $acc_track_name."_".$org1;
imagestring($img, 2, 5, 45, $WaterMarkText, $watermark_black);
$bar_start = floor((($ans[0]-$id_ref)/$ref_length)*$width);
$bar_end = floor((($ans[1]-$id_ref)/$ref_length)*$width);
$bar_height = $height - floor((($ans[4] - $sort_value[1]) / $plot_value_height) * $plot_height);

imageline($img,$newwidth,1,$newwidth,50,$colors[black]);
$mid_value = $xyplot_result_max[0]/2;
imageline($img,$newwidth,2,$newwidth1,2,$colors[black]);
imagestring($img, 1, $newwidth2, 0, $xyplot_result_max[0], $colors[black]);
imageline($img,$newwidth,28,$newwidth1,28,$colors[black]);
imagestring($img, 1, $newwidth2, 24, $mid_value, $colors[black]);
imageline($img,$newwidth,49,$newwidth1,49,$colors[black]);
imagestring($img, 1, $newwidth2, 42, $xyplot_result_min[0], $colors[black]);

$bar_gap = $height - $bar_height;


imagefilledrectangle($img, $bar_start, $bar_height, $bar_end,$bar_height+$bar_gap, $colors[$ans[6]]);

}



}


$geneid_y_position -= ($geneid_y_position*1.5);

}
}

mysql_close($link);
ImagePNG($img);
imagepng($img, "syn/synteny_annotation_{$session_id_gene}/{$acc_track_name}_{$org1}_{$session_id_gene}_image_{$imagechanged}.png");
imagedestroy($img);

}





?>
