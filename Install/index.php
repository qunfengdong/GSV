<?php

ob_start();
session_start();
        $rootURL                = "../";
        $cssURL                 = "../css";
        $imgURL                 = "../img";
        $jsURL   = "../js";

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $cssURL?>/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $cssURL?>/tabcontent.css">
<link rel="stylesheet" type="text/css" href="<?php echo $cssURL?>/annimg.css">
<link rel="shortcut icon" href="<?php echo $cssURL?>/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/fonts/fonts-min.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/container/assets/skins/sam/container.css" />
<title>GSV Prerequisite Testing</title>
</head>
<body>

<div id="smallLogoDiv">
<img src="../img/GSV_Web_Small.png">
</div>

<div id="header">
        <ul id="nav">
        <li></li>
        <li><a href=<?php echo $rootURL;?>homepage.php>Home</a></li>
        <li><a href=<?php echo $rootURL;?>about.php>About</a></li>
        <li><a href=<?php echo $rootURL;?>tutorial.php>Tutorial</a></li>
        <li><a href=<?php echo $rootURL;?>faq.php>FAQ</a></li>
        <li><a href=<?php echo $rootURL;?>software.php>Download</a></li>
        <li><a href=<?php echo $rootURL;?>support.php>Support</a></li>
        </ul>
</div>

<div id="body">

<h3>Verifying GSV Installation.</h3>
<?php
	$step = $_GET["step"];

if($step != 2) {
echo <<< P
<p>
This page allows you to verify installation of GSV. Please input your MySQL login details below.
</p>
P;

}

?>
<?php echo $stepTitle;?>
<?php
	$step = $_GET["step"];
	if (isset($step)){
		
	} else {
		$step =1;
	}
	require("../path.php");
	require("install.php");
?>
</body>
</html>
<?php ob_end_flush();?>

