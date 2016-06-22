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
<title>FAQ</title>
</head>
<body>
<?php
include("header.php");
?>
<div id="body">
<fieldset>
<legend>Frequently Asked Questions (FAQs)</legend>
	<div>
	<h6>
	<a href="javascript:control.sweepToggle('contract')" style="color:grey">Contract All</a> | <a href="javascript:control.sweepToggle('expand')" style="color:grey">Expand All</a>
	</h6>
	</div>

	<p id="genecluster-title" class="handcursor" style="font-size:12px">What do you mean by the term "synteny"?
	</p>

	<div id="genecluster" class="switchgroup1">
	<p class="bodypara" align="justify">The term "Synteny" describes the situation in which two genetic loci have been assigned to the same chromosome but still may be separated by a large enough distance in map units that genetic linkage has not been demonstrated. Refer to <a href="http://en.wikipedia.org/wiki/Synteny"target="_blank"> Wiki </a>
	</p>
	</div>

	<p id="tutorial-title" class="handcursor" style="font-size:12px">Does it support any other format of synteny and annotation file?
	</p>
	<div id="tutorial" class="switchgroup1">
	<p class="bodypara">At this moment GSV only supports the given format. We will be working to including other formats in the future.
	</p>
	</div>

	<p id="support-title" class="handcursor" style="font-size:12px">I have uploaded the annotation file but can not see the annotation track on the image?
	</p>
	<div id="support" class="switchgroup1">
	<p class="bodypara">Check for the IDs in both synteny file and annotation file. They must be the same. If the problem persists, please <a href=<?php echo $webpath;?>support.php>contact support team.</a>
	</p>
	</div>

	<p id="software-title" class="handcursor" style="font-size:12px">Can I obtain the source code of GSV?
	</p>
	<div id="software" class="switchgroup1">
	<p class="bodypara">Yes. You can download the source code from the <a href=<?php echo $webpath;?>software.php>Download</a> page.
	</p>
	</div>
	<p id="openformat-title" class="handcursor" style="font-size:12px">What do we mean by open-ended format for synteny file?
	</p>
	<div id="openformat" class="switchgroup1">
	<p class="bodypara">
	Open-ended format. refers to the characteristic of unlimited number of columns allowed in the synteny file. A given synteny file normally  has 6 columns, of which therequired format can be found on the tutorial page. In addition to the six mandatory columns, users are allowed to include  additional columns as needed and there is no limit as long as they are in the numeric format.
	</p>
	</div>
	<p id="convertsynteny-title" class="handcursor" style="font-size:12px">How do I convert my data file to the GSV specified synteny file?
	</p>
	<div id="convertsynteny" class="switchgroup1">
	<p class="bodypara">
	If you are using output from other analysis tools, you may need assistance to reformat the output. The data has to be formatted as specified on the tutorial page. For instance, if you are using BLAST or BLASTX to compare two sequences, you may find simple PERL scripts to convert them to the synteny file from the gsv package.  These scripts can be extended to extract more information as needed. We intend to provide more scripts in the future to reformat output from more analysis tools.
	</p>
	</div>
	<p id="installation-title" class="handcursor" style="font-size:12px">After GSV installation on my local machine, I see table ‘userinfo’ in MySQL. I don’t see any synteny and annotation tables as described in manuscript?
	</p>
	<div id="installation" class="switchgroup1">
	<p class="bodypara">
	Synteny and Annotation tables are not created at installation of GSV. These tables are dynamically created when user uploads a file at GSV homepage. If user uploads only synteny file, then Synteny table alone is created. If user uploads both synteny and annotation file, then Synteny and Annotation tables are created. Please refer to ‘How synteny and annotation tables are named’ for the naming convention.
	</p>
	</div>
	<p id="GFF3-title" class="handcursor" style="font-size:12px">How do I create an annotation file?
	</p>
	<div id="GFF3" class="switchgroup1">
	<p class="bodypara">
	Since GFF3 annotation is widely used among biologists, we have provided a parser script, of which the details can be found on the tutorial page. To execute the parser script, you have to generate a conf.txt file which lists the feature name, feature shape and feature color. Only the feature names listed in the conf.txt file will be extracted from the GFF3 file. We intend to provide additional scripts in the future to parse annotation information from other programs.
	</p>
	</div>
	<p id="synann-title" class="handcursor" style="font-size:12px">How are MySQL synteny table and annotation table named?
	</p>
	<div id="synann" class="switchgroup1">
	<p class="bodypara">
	Synteny and Annotation files are randomly created, and it is initiated when users upload files at GSV homepage. PHP scripts with record the time and current PHP process ID, and this information prefixed in front of synteny_1 and annotation_1, for e.g., synteny table called 315590020113504417synteny_1 is created where ‘31559002011350’ is timestamp and ‘4417’ is the process ID.
	</p>
	</div>
	  <script type="text/javascript">

        var control=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
        control.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png">', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png">')
        control.setColor('darkred',  'black')
        control.setPersist(true)
        control.collapsePrevious(true) //Only one content open at any given time
        control.init()
        </script>
</fieldset>
<div id="secfooter">
<a href= "http://copyright.unt.edu/content/unt-copyright-resources" title="Copyright">Copyright</a>
&copy;&nbsp;UNT
</div>
</div>
</body>



