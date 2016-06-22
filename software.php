<?php
require_once("path.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/microbial.js"></script>
<script type="text/javascript" src="js/tabcontent.js"></script>
<script type="text/javascript" src="js/annimg.js"></script>
<script type="text/javascript" src="js/overlib/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>
<script type="text/javascript" src="js/overlib/overlib_adaptive_width.js"></script>
<script type="text/javascript" src="js/sorttable.js"></script>
<script type="text/javascript" src="js/switchcontent.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/tabcontent.css">
<link rel="stylesheet" type="text/css" href="css/annimg.css">
<link rel="shortcut icon" href="css/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/fonts/fonts-min.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/container/assets/skins/sam/container.css" />
<title>Software</title>
</head>
<body>
<?php
include("header.php");
?>
<div id="body">
<fieldset>
<legend>GSV Software</legend>
<h5>Latest GSV version: 1.2</h5>
<p class="bodypara">The software can be dowloaded <a href="gsv.v1.2.tar.gz" target="_blank">here</a></p>
<h5>Changelog for version 1.2</h5>
**Highlights**<br /><br />
- install: improved documentation for local installation.<br />
- install: includes a new PHP web page for testing installation of GSV<br />
- display: improved image resolution for buttons.<br />
- display: set entire genome view as default visualization of synteny<br />
- database: removed database table 'record_tables'<br />
- database: removed the column of note in synteny table and the column of session_id in annotation table<br/ >
- file: includes GSV architecture file to describe backend logic of GSV<br />
- web: Added more questions on the FAQ page<br />
<h5>Changelog for version 1.1</h5>
First release.
</fieldset>
<br />
<fieldset>
<legend>Publication</legend>
<p class="bodypara">The package is yet to be published</p>
</fieldset>
<script type="text/javascript">
	var control=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
	control.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png">', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png">')
	control.setColor('darkred',  'black')
	control.setPersist(true)
	control.collapsePrevious(true) //Only one content open at any given time
	control.init()
	</script>
<?php
include("footer.php");
?>
</div>
</body>
