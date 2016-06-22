<?php
############Database Name##########################
$database_name = "gsv";
###################################################
  function create_connection()
  {
$database_host = "localhost";
$database_user = "gsvuser";
$database_pass = "gsvpass";
    $link = mysql_connect($database_host,$database_user,$database_pass)
      or die("Could not connection database<br><br>" . mysql_error());
			
    mysql_query("SET NAMES utf8");
    	
    return $link;
  }
	
  function execute_sql($database_name, $sql, $link)
  {
    $db_selected = mysql_select_db($database_name, $link)
      or die("Fail to open the database<br><br>" . mysql_error($link));
						 
    $result = mysql_query($sql, $link);
		
    return $result;
  }
?>
