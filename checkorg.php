<?php


require_once("dbtools.php");
$link = create_connection();
    
$org1 = mysql_real_escape_string($_GET['org1'],$link);
$org2 = mysql_real_escape_string($_GET['org2'],$link);
$session_id = mysql_real_escape_string($_GET['session_id'],$link);
    $sql = "select count(*) from {$session_id}synteny_1 where org1 ='$org1' AND org2 ='$org2' AND note = $session_id";
    $result = execute_sql($database_name,$sql,$link);

    $num = mysql_fetch_array($result, MYSQL_NUM);

    $num = $num[0];

    if($num == 0) {
  
	echo 0;
      }
    else {
	echo 1;
	}




?>
