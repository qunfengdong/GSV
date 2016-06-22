<?php
session_start();
$annotationidvalue = $_GET['annid'];
$session_id = $_GET['session_id'];
$session_id_gene = $_GET['session_id'];
if($annotationidvalue != 1) {
$annotationidvalue = 0;
}
else {
$annotationidvalue = 1;
}

$session_id_gene = $_GET['session_id'];

require_once("dbtools.php");



$link = create_connection();
$sql = "select org1,org2 from {$session_id}synteny_1 limit 1";
$result = execute_sql($database_name,$sql,$link);

$row = mysql_fetch_array($result, MYSQL_NUM);


$org1=$row[0];
$org2=$row[1];






require_once("select_org.php");

if (isset($_POST['submit'])){ 
require_once("dbtools.php");
$link = create_connection();
    
	$combined_value=$_POST['Org1_ref'];
	$pieces = explode("-", $combined_value);
	$org1 = $pieces[0];
	$org2 = $pieces[1];
   
    $annotationidvalue = $_POST['annid'];
    $session_id = $_POST['session_id'];
    $session_id_gene = $_POST['session_id_gene'];
    
    $sql = "select count(*) from {$session_id}synteny_1 where org1 ='$org1' AND org2 ='$org2'";
    $result = execute_sql($database_name,$sql,$link);
  
    $num = mysql_fetch_array($result, MYSQL_NUM);
  
    $num = $num[0];
   
    if($num == 0) {
    mysql_close($link);
	    echo "<script type='text/javascript'>";
	    echo "alert('There is no match gen. Please select it again.');";
	    echo "history.back();";
	    echo "</script>";
	}
    else {
    mysql_close($link);


	}

}




displaytable();

function displaytable() {
require_once("dbtools.php");
require_once("path.php");
require_once("countline.php");
global $session_id,$org1,$org2,$annotationidvalue,$session_id_gene,$database_name;

$link = create_connection();

##################

$item_of_lists = "DESCRIBE `{$session_id}synteny_1`";
$list_results = execute_sql($database_name, $item_of_lists, $link);
$attr_names = array();
while($list_row = mysql_fetch_array($list_results, MYSQL_NUM))
{

array_push($attr_names,$list_row[0]);

}
$eee = count($attr_names);
$out_attr_names = array_pop($attr_names);
$eee = count($attr_names);
$contain_list_of_filters = array();

for($rf=7;$rf<$eee;$rf++) {


array_push($contain_list_of_filters,$attr_names[$rf]);

}
###################


$sql_ref = "select max(org1_end) as org1_end, max(org1_start) as org1_start from {$session_id}synteny_1 where org1 = '$org1'";
$sql_query = "select max(org2_end) as org2_end, max(org2_start) as org2_start from {$session_id}synteny_1 where org2 = '$org2'";
$result_ref = execute_sql($database_name,$sql_ref,$link);
$result_query = execute_sql($database_name,$sql_query,$link);
$rows_ref = mysql_fetch_array($result_ref, MYSQL_NUM);
$rows_query = mysql_fetch_array($result_query, MYSQL_NUM);

$id_ref = 1;
$id_query = 1;
$hs19_position = ($rows_ref[0] > $rows_ref[1]) ? $rows_ref[0] : $rows_ref[1];
$ce19_position = ($rows_query[0] > $rows_query[1]) ? $rows_query[0] : $rows_query[1];
/*
$zoom_id_ref = floor(($hs19_position-$id_ref)/3);
$zoom_id_query = floor(($ce19_position-$id_query)/3);
$zoom_hs19_position = $hs19_position - $zoom_id_ref;
$zoom_ce19_position = $ce19_position - $zoom_id_query;
*/
$zoom_id_ref = 1;
$zoom_id_query = 1;
$zoom_hs19_position = $hs19_position;
$zoom_ce19_position = $ce19_position;







if($annotationidvalue == 1) {

$upper_sql_track = "select distinct track_name,track_shape from {$session_id}annotation_1 where org_id='$org1'";
$lower_sql_track = "select distinct track_name,track_shape from {$session_id}annotation_1 where org_id='$org2'";
$upper_result_track = execute_sql($database_name, $upper_sql_track, $link);
$lower_result_track = execute_sql($database_name, $lower_sql_track, $link);

while ($upper_row_track = mysql_fetch_array($upper_result_track, MYSQL_NUM)) {
$upper_res[] = $upper_row_track[0];
$upper_shape[] = $upper_row_track[1];
}
while ($lower_row_track = mysql_fetch_array($lower_result_track, MYSQL_NUM)) {
$lower_res[] = $lower_row_track[0];
$lower_shape[] = $lower_row_track[1];
}
$upper_numsize = count($upper_res);
$lower_numsize = count($lower_res);

if($upper_numsize == 0) {

$upper_draw_time = 0;
}
else {

$upper_draw_time = $upper_numsize;
}

if($lower_numsize == 0) {

$lower_draw_time = 0;
}
else {

$lower_draw_time = $lower_numsize;
}

}

$hgf = count($contain_list_of_filters);

$i = 0;
$j = 1;
include("js.php");
include("header.php");
echo <<< contentone
<body class="yui-skin-sam">
<form method="post" action="" enctype="multipart/form-data" name="myForm" id="myForm">

<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>

contentone;

echo <<< contenttwo
<input type="hidden" name="session_id" id="session_id" value="$session_id">
<input type="hidden" name="session_id_gene" id="session_id_gene" value="$session_id_gene">
<input type="hidden" name="ref" id="ref" value="$org1">
<input type="hidden" name="refstart" id="start0" value="$id_ref">
<input type="hidden" name="zoomrefstart" id="zoomstart0" value="$zoom_id_ref">
<input type="hidden" name="finalrefstart" id="finalstart0" value="$id_ref">
<input type="hidden" name="refend" id="end0" value="$hs19_position">
<input type="hidden" name="zoomrefend" id="zoomend0" value="$zoom_hs19_position">
<input type="hidden" name="finalrefend" id="finalend0" value="$hs19_position">
<input type="hidden" name="query" id="query" value="$org2">
<input type="hidden" name="querystart" id="start1" value="$id_query">
<input type="hidden" name="zoomquerystart" id="zoomstart1" value="$zoom_id_query">
<input type="hidden" name="finalquerystart" id="finalstart1" value="$id_query">
<input type="hidden" name="queryend" id="end1" value="$ce19_position">
<input type="hidden" name="zoomqueryend" id="zoomend1" value="$zoom_ce19_position">
<input type="hidden" name="finalqueryend" id="finalend1" value="$ce19_position">
<input type="hidden" name="annid" id="annid" value="$annotationidvalue">
<input type="hidden" name="annid2" id="annid2" value="$annotationidvalue2">
<input type="hidden" name="xyplot" id="xyplot" value="$xyplotidvalue">
<input type="hidden" name="Height" id="Height" value="$xyplotheight">
<input type="hidden" name="upper_TracksName" id="upper_TracksName" value="$upper_res">
<input type="hidden" name="lower_TracksName" id="lower_TracksName" value="$lower_res">
<input type="hidden" name="upper_NumofTracks" id="upper_NumofTracks" value="$upper_draw_time">
<input type="hidden" name="lower_NumofTracks" id="lower_NumofTracks" value="$lower_draw_time">
<input type="hidden" name="lower_Numofsynvalue" id="Numofsynvalue" value="$hgf">
contenttwo;
if($hgf == 1) {
echo <<< EXT
<input type="hidden" name="filtersign" id="filtersign" value="default">
<input type="hidden" name="filtervalue" id="filtervalue" value="">
EXT;
}
for($upper_tr_id=0;$upper_tr_id<count($upper_res);$upper_tr_id++) {
echo "<input type=\"hidden\" name=\"upper_track$upper_tr_id\" id=\"upper_track$upper_tr_id\" value=\"$upper_res[$upper_tr_id]\">";
echo "<br />";
}
for($lower_tr_id=0;$lower_tr_id<count($lower_res);$lower_tr_id++) {
echo "<input type=\"hidden\" name=\"lower_track$lower_tr_id\" id=\"lower_track$lower_tr_id\" value=\"$lower_res[$lower_tr_id]\">";
echo "<br />";
}

if($annotationidvalue == 0 && $upper_draw_time == 0 && $lower_draw_time == 0) {
include("synteny_moreOption_table_mod.php");


echo "<div id=\"content\"></div>";
include("synteny_table_mod.php");
echo "</body>";
}
else {
include("synteny_ann_moreOption_table_mod.php");
echo "<div id=\"content\"></div>";
include("synteny_ann_table_mod.php");
echo "</body>";
}


}
?>
