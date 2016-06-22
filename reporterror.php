<?php
require_once("path.php");
$db = $_GET['db'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/tabcontent.css">
<link rel="stylesheet" type="text/css" href="css/annimg.css">
<link rel="shortcut icon" href="css/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/fonts/fonts-min.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/container/assets/skins/sam/container.css" />
<title>Report_Error</title>
</head>
<body>
<?php
include("header.php");
?>

<div id="body">
<?php
if($db == 1) {
echo "<p><h1>The # symbol is required in the synteny file.</h1></p>";
}
elseif($db == 2) {
echo "<p><h1>There are duplications in the first line of synteny file.</h1></p>";
}
elseif($db == 3) {
echo "<p><h1>There was an error during the file upload. Please try again.</h1></p>";
}
elseif($db == 4) {
echo "<p><h1>There was only header line in the synteny file.</h1></p>";
}
else {
echo "<p><h1>The required synteny file is not attached.</h1></p>";
}
?>
</div>
<div id="footer">
<a href= "http://copyright.unt.edu/content/unt-copyright-resources" title="Copyright">Copyright</a>
&copy;&nbsp;UNT
</div>
</body>



