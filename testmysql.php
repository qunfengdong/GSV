<?php

require_once("dbtools.php");


$link = create_connection();


$sql = "SHOW COLUMNS FROM userinfo";
$result = execute_sql($database_name, $sql, $link);
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
		    exit;
				}
				if (mysql_num_rows($result) > 0) {
				    while ($row = mysql_fetch_assoc($result)) {
						        print_r($row);
										    }
												}

?>


