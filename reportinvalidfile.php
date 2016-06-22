<?php
require_once('path.php');
function report_error($filename,$counter) {
global $webpath_home,$webpath_about,$webpath_faq,$webpath_software,$webpath_support,$webpath_tutorial,$uploadpath;
echo <<< ERROR
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/tabcontent.css">
<link rel="stylesheet" type="text/css" href="css/annimg.css">
<link rel="shortcut icon" href="css/img/favicon.ico" type="image/x-icon">
<title>Report_Error</title>
</head>
<body>
ERROR;
include("header.php");

echo <<< III
<div id="body">
<p><h1>Invalid entry in $filename file at Line: $counter</h1></p>
</div>
III;
include("footer.php");
echo "</body>";

exit();
}
?>
