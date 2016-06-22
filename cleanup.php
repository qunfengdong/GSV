#!/usr/bin/php
<?= 
require_once('dbtools.php');
require_once('delete_syn_folder.php');
$link = create_connection();
$valuenow = strtotime(date("Y-m-d"));
##################################
/*After 60 days, it will delete the tables.*/
$day = 60;
##################################

$time_diff = $day * 24 * 60 * 60;
$sql = "select TABLE_NAME, CREATE_TIME from information_schema.TABLES";
$result = execute_sql($database_name, $sql, $link);

$history_record_sql = "select * from userinfo";
$history_record_result = execute_sql($database_name, $history_record_sql, $link);

while ($row1 = mysql_fetch_array($history_record_result, MYSQL_NUM)) {

$valueold_1 = strtotime($row1[8]);

$diff_1 = $valuenow - $valueold_1;

if ($diff_1 > $time_diff) {


$nsql = "delete from userinfo where id = $row1[0]";
$nresult = execute_sql($database_name, $nsql, $link);

}

}

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
$pieces = explode(" ",$row[1]);
$valueold = strtotime($pieces[0]);

$diff = $valuenow - $valueold;
if ($diff > $time_diff) {
$patterns = '/synteny_1/';
$patterna = "/annotation_1/";
if(preg_match($patterns,$row[0]) || preg_match($patterna,$row[0]) ) {

$drop_syn = "drop table $row[0]";
execute_sql($database_name, $drop_syn, $link);
$pattern = "synteny_1";
$replacement = "";
$string = $row[0];
$folder_id = eregi_replace($pattern, $replacement, $string);

$folder_path = "syn/synteny_{$folder_id}";
if(is_dir($folder_path))
{
delete_directory($folder_path);
}
else {


$folder_path_ann = "syn/synteny_annotation_{$folder_id}";


delete_directory($folder_path_ann);

}	

}
}

} 
?>
