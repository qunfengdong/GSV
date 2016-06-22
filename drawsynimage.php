<?php
$annotationid1 = $_GET['annid'];
if($annotationid1 == '') {
$annotationid1 = $_POST['annid'];
}
$session_id = $_GET['session_id'];
if($session_id == '') {
$session_id = $_POST['session_id'];
}
$org1 = $_GET['ref'];
if($org1 == '') {
$org1 = $_POST['ref'];
}

$org2 = $_GET['query'];
if($org2 == '') {
$org2 = $_POST['query'];
}

$id_ref = $_GET['zoomrefstart'];
if($id_ref == '') {
$id_ref = $_POST['zoomrefstart'];
}

$hs19_position = $_GET['zoomrefend'];
if($hs19_position == '') {
$hs19_position = $_POST['zoomrefend'];
}

$id_query = $_GET['zoomquerystart'];
if($id_query == '') {
$id_query = $_POST['zoomquerystart'];
}

$ce19_position = $_GET['zoomqueryend'];
if($ce19_position == '') {
$ce19_position = $_POST['zoomqueryend'];
}
$width = $_GET['image'];
if($width == '') {
$width = $_GET['imageWidth'];
}
$polygon = $_GET['polygon'];
if($polygon == '') {
$polygon = $_POST['polygon'];
}

$FinalRefEnd = $_GET['finalrefend'];
if($FinalRefEnd == '') {
$FinalRefEnd = $_POST['finalrefend'];
}

$FinalQueryEnd = $_GET['finalqueryend'];
if($FinalQueryEnd == '') {
$FinalQueryEnd = $_POST['finalqueryend'];
}

$filtersyntypes = $_GET['filtertypes'];
if($filtersyntypes == '') {
$filtersyntypes = $_POST['filtertypes'];
}


$filtersynsign = $_GET['filtersign'];
if($filtersynsign == 'default') {
$filtersynsign = ">=";
}
if($filtersynsign == '') {
$filtersynsign = $_POST['filtersign'];
}
$filtersynvalue = $_GET['filtervalue'];
if($filtersynvalue == '') {
$filtersynvalue = $_POST['filtervalue'];
}
$transparency =  1;
$get_total_blocks_lines = $_GET['totalnumberforblockslines'];
if($get_total_blocks_lines == '') {
$get_total_blocks_lines = $_POST['totalnumberforblockslines'];
}
for($i=0;$i<$get_total_blocks_lines;$i++) {
$get_total_blocks_lines_values[] = $_GET["blockslines$i"];
}


if($annotationid1 == "0") {

showimage();
}
if($annotationid1 == "1") {
showimage();
}
function showimage() {
global $org1,$org2,$session_id,$width,$id_query,$id_ref,$hs19_position,$ce19_position,$polygon,$filtersynsign,$filtersynvalue,$annotationid1,$transparency,$get_total_blocks_lines,$get_total_blocks_lines_values,$FinalRefEnd,$FinalQueryEnd,$filtersyntypes;
Header("Content-type: image/png");


require_once("dbtools.php");
$link = create_connection();
$height = "350";
$img = imagecreate($width, $height);
$black = imagecolorallocatealpha($img, 0, 0, 0,1);
$image_bg = imagecolorallocatealpha($img, 240, 255, 240,1);
$colors[0] = imagecolorallocatealpha($img, 184, 134, 11,$transparency);    ##DarkGoldenrod
$colors[1] = imagecolorallocatealpha($img, 238, 213, 210,$transparency);    ## Pink
$colors[2] = imagecolorallocatealpha($img, 220, 20, 60,$transparency);	## crimson
$colors[3] = imagecolorallocatealpha($img, 139, 0, 139,$transparency);	## dark magenta
$colors[4] = imagecolorallocatealpha($img, 128, 128, 0,$transparency);	## olive
$colors[5] = imagecolorallocatealpha($img, 47, 79, 79,$transparency);	## dark slate gray
$colors[6] = imagecolorallocatealpha($img,  0 ,0 ,129,$transparency);		## dark blue
$colors[7] = imagecolorallocatealpha($img, 244, 164, 96,$transparency); 	## SandyBrown
$colors[8] = imagecolorallocatealpha($img, 178, 34, 34,$transparency);	## FireBrick
$colors[9] = imagecolorallocatealpha($img, 169, 169, 169,$transparency); 	## DarkGray
$colors[10] = imagecolorallocatealpha($img, 255, 99, 71,$transparency); 	## Tomato
$colors[11] = imagecolorallocatealpha($img, 0, 128, 128,$transparency); 	## Teal
$colors[12] = imagecolorallocatealpha($img, 46, 139, 87,$transparency); 	## SeaGreen
$colors[13] = imagecolorallocatealpha($img, 205, 133, 63,$transparency); 	## Peru
$colors[14] = imagecolorallocatealpha($img, 176, 196, 222,$transparency); 	## LightSteelBlue
$colors[15] = imagecolorallocatealpha($img, 250, 128, 114,$transparency); 	## Salmon
$colors[16] = imagecolorallocatealpha($img, 240, 230, 140,$transparency); 	## Khaki
$colors[17] = imagecolorallocatealpha($img, 135, 206, 235,$transparency); 	## SkyBlue
$colors[18] = imagecolorallocatealpha($img, 128, 0, 0,$transparency);		## Maroon
$colors[19] = imagecolorallocatealpha($img, 255, 0, 255,$transparency); 	## Fuchsia
$colors[20] = imagecolorallocatealpha($img, 25, 25, 112,$transparency); 	## MidnightBlue
$colors[21] = imagecolorallocatealpha($img, 192, 192, 192,$transparency); 	## Silver
$colors[22] = imagecolorallocatealpha($img, 255, 215, 0,$transparency); 	## Gold
$colors[23] = imagecolorallocatealpha($img, 0, 100, 0,$transparency); 	## DarkGreen
$colors[24] = imagecolorallocatealpha($img, 95, 158, 160,$transparency); 	## CadetBlue
$colors[25] = imagecolorallocatealpha($img, 216, 191, 216,$transparency); 	## Thistle
$colors[26] = imagecolorallocatealpha($img, 255, 165, 0,$transparency); 	## Orange
$colors[27] = imagecolorallocatealpha($img, 70, 130, 180,$transparency); 	## SteelBlue
$colors[28] = imagecolorallocatealpha($img, 211, 211, 211,$transparency); 	## LightGrey
$colors[29] = imagecolorallocatealpha($img, 210, 105, 30,$transparency); 	## Chocolate
$colors[30] = imagecolorallocatealpha($img, 0, 206, 209,$transparency); 	## DarkTurquoise
$colors[31] = imagecolorallocatealpha($img, 189, 183, 107,$transparency); 	## DarkKhaki
$colors[32] = imagecolorallocatealpha($img, 0, 139, 139,$transparency); 	## DarkCyan
$colors[33] = imagecolorallocatealpha($img, 210, 180, 140,$transparency); 	## Tan
$colors[34] = imagecolorallocatealpha($img, 148, 0, 211,$transparency); 	## DarkViolet
$colors[35] = imagecolorallocatealpha($img, 205, 92, 92,$transparency); 	## IndianRed
$colors[36] = imagecolorallocatealpha($img, 138, 43, 226,$transparency); 	## BlueViolet
$colors[37] = imagecolorallocatealpha($img, 85, 107, 47,$transparency); 	## DarkOliveGreen
$colors[38] = imagecolorallocatealpha($img, 220, 220, 220,$transparency); 	## Gainsboro
$colors[39] = imagecolorallocatealpha($img, 188, 143, 143,$transparency); 	## RosyBrown
$colors[40] = imagecolorallocatealpha($img, 100, 149, 237,$transparency); 	## CornflowerBlue
$colors[41] = imagecolorallocatealpha($img, 255, 0, 255,$transparency); 	## Magenta
$colors[42] = imagecolorallocatealpha($img, 255, 182, 193,$transparency); 	## LightPink
$colors[43] = imagecolorallocatealpha($img, 0, 191, 255,$transparency); 	## DeepSkyBlue
$colors[44] = imagecolorallocatealpha($img, 107, 142, 35,$transparency); 	## OliveDrab
$colors[45] = imagecolorallocatealpha($img, 72, 61, 139,$transparency); 	## DarkSlateBlue
$colors[46] = imagecolorallocatealpha($img, 218, 165, 32,$transparency); 	## Goldenrod
$colors[47] = imagecolorallocatealpha($img, 255, 20, 147,$transparency); 	## DeepPink
$colors[48] = imagecolorallocatealpha($img, 64, 224, 208,$transparency); 	## Turquoise
$colors[49] = imagecolorallocatealpha($img, 34, 139, 34,$transparency); 	## ForestGreen
$colors[50] = imagecolorallocatealpha($img, 165, 42, 42,$transparency); 	## Brown
$colors[51] = imagecolorallocatealpha($img, 119, 136, 153,$transparency); 	## LightSlateGray
$colors[52] = imagecolorallocatealpha($img, 238, 130, 238,$transparency); 	## Violet
$colors[53] = imagecolorallocatealpha($img, 173, 216, 230,$transparency); 	## LightBlue
$colors[54] = imagecolorallocatealpha($img, 154, 205, 50,$transparency); 	## YellowGreen
$colors[55] = imagecolorallocatealpha($img, 160, 82, 45,$transparency); 	## Sienna
$colors[56] = imagecolorallocatealpha($img, 106, 90, 205,$transparency); 	## SlateBlue
$colors[57] = imagecolorallocatealpha($img, 143, 188, 143,$transparency); 	## DarkSeaGreen
$colors[58] = imagecolorallocatealpha($img, 75, 0, 130,$transparency); 	## Indigo
$colors[58] = imagecolorallocatealpha($img, 233, 150, 122,$transparency); 	## DarkSalmon
$colors[59] = imagecolorallocatealpha($img, 30, 144, 255,$transparency); 	## DodgerBlue
$colors[60] = imagecolorallocatealpha($img, 255, 160, 122,$transparency); 	## LightSalmon
$colors[61] = imagecolorallocatealpha($img, 128, 128, 128,$transparency); 	## Gray
$colors[62] = imagecolorallocatealpha($img, 255, 105, 180,$transparency); 	## HotPink
$colors[63] = imagecolorallocatealpha($img, 32, 178, 170,$transparency); 	## LightSeaGreen
$colors[64] = imagecolorallocatealpha($img, 95, 158, 160,$transparency); 	## CadetBlue
$colors[white] = imagecolorallocatealpha($img, 255, 255, 255,1); 	
$ref_y_point = 70;  #upper bar
$org1_org2 = array($org1,$org2);
$query_y_point = $height - $ref_y_point;   #downer bar

imagefilledrectangle($img,0, 0, $width, $height, $colors[white]);

if($filtersynsign == "default" || $filtersyntypes == "default") {
$sql = "select org1_start, org1_end, org2_start, org2_end from {$session_id}synteny_1 where org1 = '$org1' and org2 = '$org2' and org1_start > 1 and org1_end < $FinalRefEnd and org2_start > 1 and org2_end < $FinalQueryEnd";
$draw_cords_sql = "select count(*) from {$session_id}synteny_1 where org1 = '$org1' and org2 = '$org2' and org1_start > 1 and org1_end < $FinalRefEnd and org2_start > 1 and org2_end < $FinalQueryEnd";

}
else {
$pattern1 = '/([0-9eE\+\.0-9+]*)/';
if (preg_match($pattern1,$filtersynvalue)) {
$filtersynvalue = str_replace("%2B", "+", "$filtersynvalue");;
}
$sql = "select org1_start, org1_end, org2_start, org2_end,$filtersyntypes from {$session_id}synteny_1 where $filtersyntypes $filtersynsign $filtersynvalue and org1 = '$org1' and org2 = '$org2' and org1_start > 1 and org1_end < $FinalRefEnd and org2_start > 1 and org2_end < $FinalQueryEnd";
$draw_cords_sql = "select count(*) from {$session_id}synteny_1 where org1 = '$org1' and org2 = '$org2' and org1_start > 1 and org1_end < $FinalRefEnd and org2_start > 1 and org2_end < $FinalQueryEnd";
}
$result = execute_sql($database_name,$sql,$link);

$draw_cords_result = execute_sql($database_name,$draw_cords_sql,$link);
$draw_cords_row = mysql_fetch_array($draw_cords_result, MYSQL_NUM);
//echo $draw_cords_row[0]."<br>";
$ref_length = $hs19_position - $id_ref;

$query_length = $ce19_position - $id_query;

$i=0;
$j = 0;

if($draw_cords_row[0] < 100000) {

if($annotationid1 == 0) {
$synteny_only_image_map = "syn/synteny_{$session_id}/syntenycords.txt";
$synteny_only_image_blocks_lines = "syn/synteny_{$session_id}/blocksandlines.txt";
$synteny_only_image_blocks_lines_total_number = "syn/synteny_{$session_id}/totalnumblockslines.txt";
$save_cords_points = fopen($synteny_only_image_map,"w");
$save_cords_points_blocks_lines = fopen($synteny_only_image_blocks_lines,"w");
$save_cords_points_blocks_lines_total_number = fopen($synteny_only_image_blocks_lines_total_number,"w");
$num_to_blockslines = "<input type=\"hidden\" name=\"totalnumberforblockslines\" id=\"totalnumberforblockslines\" value=\"$draw_cords_row[0]\">";
fwrite($save_cords_points_blocks_lines_total_number,$num_to_blockslines);
fclose($save_cords_points_blocks_lines_total_number);
}
else {
$synteny_ann_image_map = "syn/synteny_annotation_{$session_id}/syntenycords.txt";
$synteny_ann_image_blocks_lines = "syn/synteny_annotation_{$session_id}/blocksandlines.txt";
$synteny_ann_image_blocks_lines_total_number = "syn/synteny_annotation_{$session_id}/totalnumblockslines.txt";
$save_cords_points = fopen($synteny_ann_image_map,"w");
$save_cords_points_blocks_lines = fopen($synteny_ann_image_blocks_lines,"w");
$save_cords_points_blocks_lines_total_number = fopen($synteny_ann_image_blocks_lines_total_number,"w");
$num_to_blockslines = "<input type=\"hidden\" name=\"totalnumberforblockslines\" id=\"totalnumberforblockslines\" value=\"$draw_cords_row[0]\">";
fwrite($save_cords_points_blocks_lines_total_number,$num_to_blockslines);
fclose($save_cords_points_blocks_lines_total_number);
}

//$save_cords_points = fopen("syn/syntenycords.txt","w");
$uji = 0;
$machu = 0;
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    
    $ref_start_x_point[$i] = floor((($row[0]-$id_ref)/$ref_length)*$width);
    $query_start_x_point[$i] = floor((($row[2]-$id_query)/$query_length)*$width);
    $ref_end_x_point[$i] = floor((($row[1]-$id_ref)/$ref_length)*$width);
    $query_end_x_point[$i] = floor((($row[3]-$id_query)/$query_length)*$width);


    if($polygon != '0') {
	if(is_array($get_total_blocks_lines_values)) {


				if($get_total_blocks_lines_values[$uji] == 0) {
	$row[4] = trim($row[4]);
	 $link_blocks = "";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=0>block";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=1 checked>line";

	//$link_blocks = "<input type=radio name=blockslines$blioe id=blockslines1 value=0 checked>block";
	//$link_lines = "<input type=radio name=blockslines$blioe id=blockslines0 value=1>line";
	//$link_button = "<input type=button name=blocksbuttons id=blocksbuttons value=Change>";
	 $the_cords_values = "<area shape=\"polygon\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0] end: $row[1] <br> $org2 <br> start: $row[2] end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
	
	fwrite($save_cords_points,$the_cords_values);
        fwrite($save_cords_points_blocks_lines,$link_blocks);
	$polygonvalues[$i] = array($ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point);
    imagefilledpolygon($img, $polygonvalues[$i], 4, $colors[$j]);
    $uji++;
	$machu++;
	}
	else {
		 $row[4] = trim($row[4]);
       	 $link_blocks = "";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=0>block";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=1 checked>line";

	 $ref_cords_values = "<area shape=\"rect\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0]  <br> $org2 <br> start: $row[2] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
         //$ref_cords_values = $ref_start_x_point[$i]."\t".$ref_y_point."\t".$query_start_x_point[$i]."\t".$query_y_point."\n";
         $query_cords_values = "<area shape=\"rect\" coords=\"$ref_end_x_point[$i],$ref_y_point,$query_end_x_point[$i],$query_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> end: $row[1]  <br> $org2 <br> end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
         //$query_cords_values = $ref_end_x_point[$i]."\t".$ref_y_point."\t".$query_end_x_point[$i]."\t".$query_y_point."\n";
    fwrite($save_cords_points,$ref_cords_values);
    fwrite($save_cords_points,$query_cords_values);
        fwrite($save_cords_points_blocks_lines,$link_blocks);
    imageline($img, $ref_start_x_point[$i], $ref_y_point, $query_start_x_point[$i], $query_y_point, $colors[$j]);
    imageline($img, $ref_end_x_point[$i], $ref_y_point, $query_end_x_point[$i], $query_y_point, $colors[$j]);
	$uji++;
	$machu++;
	}
		
	
	}
	else {
	$row[4] = trim($row[4]);
	$link_blocks = "";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=0>block";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=1 checked>line";
	 $ref_cords_values = "<area shape=\"rect\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0]  <br> $org2 <br> start: $row[2] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
	 //$ref_cords_values = $ref_start_x_point[$i]."\t".$ref_y_point."\t".$query_start_x_point[$i]."\t".$query_y_point."\n";
	 $query_cords_values = "<area shape=\"rect\" coords=\"$ref_end_x_point[$i],$ref_y_point,$query_end_x_point[$i],$query_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> end: $row[1]  <br> $org2 <br> end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
	 //$query_cords_values = $ref_end_x_point[$i]."\t".$ref_y_point."\t".$query_end_x_point[$i]."\t".$query_y_point."\n";
    fwrite($save_cords_points,$ref_cords_values);
    fwrite($save_cords_points,$query_cords_values);
    fwrite($save_cords_points_blocks_lines,$link_blocks);
    imageline($img, $ref_start_x_point[$i], $ref_y_point, $query_start_x_point[$i], $query_y_point, $colors[$j]);
    imageline($img, $ref_end_x_point[$i], $ref_y_point, $query_end_x_point[$i], $query_y_point, $colors[$j]);
	$machu++;
	}
    }
    else
    {
	if(is_array($get_total_blocks_lines_values)) {
	if($get_total_blocks_lines_values[$uji] == 0) {
	$row[4] = trim($row[4]);
	 $link_blocks = "";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=0 checked>block";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=1>line";

	//$link_blocks = "<input type=radio name=blockslines$blioe id=blockslines1 value=0 checked>block";
	//$link_lines = "<input type=radio name=blockslines$blioe id=blockslines0 value=1>line";
	//$link_button = "<input type=\"button\" name=\"blocksANDlines\" id=\"blocksANDlines\" value=\"Change\">";
	 $the_cords_values = "<area shape=\"polygon\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0] end: $row[1] <br> $org2 <br> start: $row[2] end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
	
	fwrite($save_cords_points,$the_cords_values);
        fwrite($save_cords_points_blocks_lines,$link_blocks);
	$polygonvalues[$i] = array($ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point);
    imagefilledpolygon($img, $polygonvalues[$i], 4, $colors[$j]);
    $uji++;
	$machu++;
	}
	else {
		 $row[4] = trim($row[4]);
       	 $link_blocks = "";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=0 checked>block";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=1>line";

	 $ref_cords_values = "<area shape=\"rect\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0]  <br> $org2 <br> start: $row[2] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
         //$ref_cords_values = $ref_start_x_point[$i]."\t".$ref_y_point."\t".$query_start_x_point[$i]."\t".$query_y_point."\n";
         $query_cords_values = "<area shape=\"rect\" coords=\"$ref_end_x_point[$i],$ref_y_point,$query_end_x_point[$i],$query_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> end: $row[1]  <br> $org2 <br> end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
         //$query_cords_values = $ref_end_x_point[$i]."\t".$ref_y_point."\t".$query_end_x_point[$i]."\t".$query_y_point."\n";
    fwrite($save_cords_points,$ref_cords_values);
    fwrite($save_cords_points,$query_cords_values);
        fwrite($save_cords_points_blocks_lines,$link_blocks);
    imageline($img, $ref_start_x_point[$i], $ref_y_point, $query_start_x_point[$i], $query_y_point, $colors[$j]);
    imageline($img, $ref_end_x_point[$i], $ref_y_point, $query_end_x_point[$i], $query_y_point, $colors[$j]);
	$uji++;
	$machu++;
	}
	}
	else {
		$row[4] = trim($row[4]);
	$link_blocks = "";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=0 checked>block";
        $link_blocks .= "<input type=radio name=blockslines$machu id=blockslines$machu value=1>line";
	$link_button = "<input type=button name=blocksANDlines id=blocksANDlines value=Change>";
        //$link_button = "<input type=button name=blocksbuttons id=blocksbuttons value=Change onClick=touchme()>";
         $the_cords_values = "<area shape=\"polygon\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0] end: $row[1] <br> $org2 <br> start: $row[2] end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";
         //$the_cords_values = "<area shape=\"polygon\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0] end: $row[1] <br> $org2 <br> start: $row[2] end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";

	//$the_cords_values = "<area shape=\"polygon\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point\" href=\"javascript:void(0);\" onmouseover=\"return overlib('$org1 <br> start: $row[0] end: $row[1] <br> $org2 <br> start: $row[2] end: $row[3] <br> $filtersyntypes: $row[4] <br> Click <a href=javascript:zoomsynget($row[0],$row[1],$row[2],$row[3],$annotationid1)>Here</a> to zoom into the neighborhood <br> $link_blocks $link_lines <br>$link_button',STICKY, MOUSEOFF, TIMEOUT, 3000);\" onmouseout=\"return nd();\">\n";

        fwrite($save_cords_points,$the_cords_values);
        fwrite($save_cords_points_blocks_lines,$link_blocks);
        $polygonvalues[$i] = array($ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point);
    	imagefilledpolygon($img, $polygonvalues[$i], 4, $colors[$j]);
	$machu++;
	//echo $j."<br>";
    	//$j++;
	}
	}

    $i++;
    $j++;
    if($j >= 64){
    $j=0;
    }

}
fclose($save_cords_points);
fclose($save_cords_points_blocks_lines);


}
else {
if($annotationid1 == 0) {
$synteny_only_image_map = "syn/synteny_{$session_id}/syntenycords.txt";
$save_cords_points = fopen($synteny_only_image_map,"w");

$synteny_only_image_blocks_lines_total_number = "syn/synteny_{$session_id}/totalnumblockslines.txt";
$save_cords_points_blocks_lines_total_number = fopen($synteny_only_image_blocks_lines_total_number,"w");
$num_to_blockslines = "<input type=\"hidden\" name=\"totalnumberforblockslines\" id=\"totalnumberforblockslines\" value=\"$draw_cords_row[0]\">";
fwrite($save_cords_points_blocks_lines_total_number,$num_to_blockslines);
fclose($save_cords_points_blocks_lines_total_number);

}
else {
$synteny_ann_image_map = "syn/synteny_annotation_{$session_id}/syntenycords.txt";
$save_cords_points = fopen($synteny_ann_image_map,"w");
}

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

    $ref_start_x_point[$i] = floor((($row[0]-$id_ref)/$ref_length)*$width);
    $query_start_x_point[$i] = floor((($row[2]-$id_query)/$query_length)*$width);
    $ref_end_x_point[$i] = floor((($row[1]-$id_ref)/$ref_length)*$width);
    $query_end_x_point[$i] = floor((($row[3]-$id_query)/$query_length)*$width);

 
    if($polygon != '0') {
         //$ref_cords_values = $ref_start_x_point[$i]."\t".$ref_y_point."\t".$query_start_x_point[$i]."\t".$query_y_point."\n";
         //$query_cords_values = $ref_end_x_point[$i]."\t".$ref_y_point."\t".$query_end_x_point[$i]."\t".$query_y_point."\n";
    //fwrite($save_cords_points,$ref_cords_values);
    //fwrite($save_cords_points,$ref_cords_values);

    imageline($img, $ref_start_x_point[$i], $ref_y_point, $query_start_x_point[$i], $query_y_point, $colors[$j]);
    imageline($img, $ref_end_x_point[$i], $ref_y_point, $query_end_x_point[$i], $query_y_point, $colors[$j]);
    }
    else
    {
//    $the_cords_values = $ref_start_x_point[$i]."\t".$ref_y_point."\t".$query_start_x_point[$i]."\t".$query_y_point."\t".$query_end_x_point[$i]."\t".$query_y_point."\t".$ref_end_x_point[$i]."\t".$ref_y_point."\n";
  //      fwrite($save_cords_points,$the_cords_values);
	  //$the_cords_values = "<area shape=\"rect\" coords=\"$ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point\" href=\"http://www.trees.com/save.html\">\n";
        //fwrite($save_cords_points,$the_cords_values);

    $polygonvalues[$i] = array($ref_start_x_point[$i],$ref_y_point,$query_start_x_point[$i],$query_y_point,$query_end_x_point[$i],$query_y_point,$ref_end_x_point[$i],$ref_y_point);
    imagefilledpolygon($img, $polygonvalues[$i], 4, $colors[$j]);
    }

    $i++;
    $j++;
    if($j > 64){
    $j=0;
    }

}
fclose($save_cords_points);
}
$genome_bar_height = 7;
imagefilledrectangle($img, 0, $ref_y_point, $width, $ref_y_point - $genome_bar_height, $black);
imagefilledrectangle($img, 0, $query_y_point, $width, $query_y_point + $genome_bar_height, $black);

##----------------------------------

$division = 5;
$smallDiv = 10;
$pos = $width / $division;
$smallPos = $pos / $smallDiv;
$main_line_height = $genome_bar_height +7;
$division_line_height = $main_line_height -5;
$totalvalue = array($hs19_position,$ce19_position);
$ref_query_y_position = array($ref_y_point,$query_y_point);
$ref_x_pos = array($id_ref,$id_query);
$value_y_point = 30;
$value_org1_org2_point = array(30,-30);
$alignment_org1_org2 = $width/2;
for($y=0;$y<2;$y++) {
$divValue = ($totalvalue[$y] - $ref_x_pos[$y])/$division;
$val =0;
if($y == '1') {
$value_y_point = $value_y_point - ($value_y_point * 1.5);
}
for($d=0; $d <= $division; $d++) {
$linePos = $pos*$d;
if($linePos == '800') {
$linePos = 799;
}
imageline($img,$linePos, $ref_query_y_position[$y] - $main_line_height, $linePos, $ref_query_y_position[$y],$black);
for($v=0; $v< $smallDiv;$v++) {
imageline($img,$linePos+($smallPos*$v), $ref_query_y_position[$y] - $division_line_height, $linePos+($smallPos*$v), $ref_query_y_position[$y],$black);
}
if (($d == '0') || ($d == $division)) {
$val += $divValue; ## initialize the div value
continue;
}
$ee = floor($val+$ref_x_pos[$y]);
imagestring($img, 4, $linePos-(strlen($ee)*5),$ref_query_y_position[$y]-$value_y_point,$ee,$black);
$val += $divValue;	## cummulatively add the values
}
	$main_line_height -= ($main_line_height * 2);
	$division_line_height -= ($division_line_height * 2);

	if($ref_x_pos[$y] == 0) {
  imagestring($img, 4, 1,$ref_query_y_position[$y]-$value_y_point,"1",$black);
  }
  else {
  imagestring($img,4, 1,$ref_query_y_position[$y]-$value_y_point, $ref_x_pos[$y],$black);
  imagestring($img,4, $alignment_org1_org2,$ref_query_y_position[$y]-$value_y_point-$value_org1_org2_point[$y], $org1_org2[$y],$black);
  }
  imagestring($img, 4, $linePos-(strlen($totalvalue[$y])*8), $ref_query_y_position[$y]-$value_y_point, $totalvalue[$y], $black);

}
mysql_close($link);
ImagePNG($img);
if($annotationid1 == 0) {
Imagepng($img, "syn/synteny_{$session_id}/{$session_id}_synteny.png");
}
else {
Imagepng($img, "syn/synteny_annotation_{$session_id}/{$session_id}_synteny.png");
}
imagedestroy($img);

}


?>
