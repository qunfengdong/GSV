<?php
$hash = $_GET['hash'];
require_once("dbtools.php");
require_once("path.php");
echo <<< START
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/tabcontent.css">
<link rel="stylesheet" type="text/css" href="css/annimg.css">
<link rel="shortcut icon" href="css/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/fonts/fonts-min.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/container/assets/skins/sam/container.css" />

<title>History</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="uploadForm" id="uploadForm">
START;
include("header.php");
print('<div id=body>');


echo <<< CONTENT
<fieldset>
<p class="bodypara">
<legend>List of previous output files from GSV</legend>
These files will be stored in our database for a period of 60 days. Please follow the link provided (in the last column) to view the previous submissions.
<br /><br />
Please Note:
	<br /><br />
1. If the file is not present in the designated field below, the reason could be that the file name was not provided while submitting this file.<br />
2. If the concerned file is absent in the table, the reason could be the file was submitted more than 60 days ago. If so, the file has been removed from the database.<br />
3. If the file is not present in the database, please  <a href="mailto:Qunfeng.Dong@unt.edu">contact us</a>.
</p>
CONTENT;


$link = create_connection();
$userinfo = "select id, synfilename,annfilename,session_id,annImage,create_on from userinfo where hash='$hash'";
$infouser = execute_sql($database_name, $userinfo, $link);

echo <<< Table

	<table align="center" border="1" bordercolor="FFCC00" style="background-color:FFFFCC" width="400" cellpadding="3" cellspacing="3">
        <tr>
                <td>No.</td>
                <td>Filename</td>
                <td>Date of Creation</td>
                <td>Link</td>
        </tr>
Table;
while($row = mysql_fetch_array($infouser,MYSQL_NUM)){
if (!empty($row)) {
print("<tr><td>$row[0]</td><td>1.$row[1] 2.$row[2]</td><td>$row[5]</td><td><a href=display.php?session_id=$row[3]&annid=$row[4]>here</a></td></tr>");
}
}
echo "</table>";
echo "</fieldset>";

?>
<div id="secfooter">
<a href="http://www.indiana.edu">

</a>
<a href= "http://copyright.unt.edu/content/unt-copyright-resources" title="Copyright">Copyright</a>
&copy;&nbsp;UNT
</div>
</div>
</form>
</body>
