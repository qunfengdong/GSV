<?php

require_once("dbtools.php");
$link = create_connection();
$fristname = $_POST['f1'];
$lastname = $_POST['f2'];
$email = $_POST['f3'];
$intcompname = $_POST['f4'];

$sql = "insert into customer_info (FristName,LastName,Email,INST_COMP_Name) values('$fristname','$lastname','$email','$intcompname')";
$result = execute_sql("gsv", $sql, $link);


?>
