<?php
#You can change user,pass,database's name, tables' names
#Here I use gsv for my databse, synteny_1,and annotaton_1 are my tables.

function synteny_table() {
global $newsession_id,$database_name,$synfilename;
$header_line = exec("head -n 1 syn/$synfilename");

$synteny_lines = exec("wc -l syn/$synfilename");

$rr = explode(" ",$synteny_lines);
trim($rr[0]);
if($rr[0] == 0) {
echo <<< KIO

<script type="text/javascript">

window.location = "reporterror.php?db=4"

</script>


KIO;
}


$header_pieces = explode("\t",$header_line);

if (!preg_match("/^#/i", $header_pieces[0])) {
echo <<< WWW

<script type="text/javascript">

window.location = "reporterror.php?db=1"

</script>


WWW;
}

if (count(array_unique($header_pieces)) < count($header_pieces)) {
echo <<< EEE

<script type="text/javascript">

window.location = "reporterror.php?db=2"

</script>


EEE;


}
else {  
$userdef = "";
$key = array_search('length', $header_pieces);

for($i=6;$i<count($header_pieces);$i++) {

$userdef .= "`".$header_pieces[$i]."`"."varchar(100) DEFAULT NULL,";

}
if($key == '') {
$userdef .= "`length` varchar(100) DEFAULT NULL,";
}

$link = create_connection();
if(mysql_select_db($database_name, $link)){
	
	$queryTable1 = "CREATE TABLE `{$newsession_id}synteny_1` (
	  `id` int(10) NOT NULL AUTO_INCREMENT,
	  `org1` varchar(50) NOT NULL,
	  `org1_start` int(10) unsigned NOT NULL,
	  `org1_end` bigint(20) unsigned NOT NULL,
	  `org2` varchar(50) NOT NULL,
	  `org2_start` int(10) unsigned NOT NULL,
	  `org2_end` bigint(20) unsigned NOT NULL,
	  $userdef
	  PRIMARY KEY (`id`),
	  KEY `org1_start` (`org1_start`),
	  KEY `org1_end` (`org1_end`),
	  KEY `org2_start` (`org2_start`),
	  KEY `org2_end` (`org2_end`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";	
	mysql_db_query($database_name, $queryTable1, $link);
	return true;
}
}
}


function synteny_annotation_table() {
global $newsession_id,$database_name;
$link = create_connection();
if(mysql_select_db($database_name, $link)){

	$queryTable2 = "CREATE TABLE IF NOT EXISTS `{$newsession_id}annotation_1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `org_id` varchar(50) NOT NULL,
  `start` int(20) unsigned NOT NULL,
  `end` bigint(20) unsigned NOT NULL,
  `strand` varchar(1) DEFAULT NULL,
  `feature_name` varchar(100) DEFAULT NULL,
   `feature_value` real DEFAULT NULL, 
  `track_name` varchar(100) NOT NULL,
  `track_shape` varchar(100) NOT NULL,
  `track_color` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `start` (`start`),
  KEY `end` (`end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";


	mysql_db_query($database_name, $queryTable2, $link);
	
return true;
}
}


?>
