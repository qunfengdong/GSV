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
<title>About</title>
</head>
<body>
<?php
include("header.php");
?>
<div id="body">
<fieldset>
<legend>Information about GSV</legend>
<p align="justify" class="bodypara"> 

Existing software for visualization of synteny region between two genomes involve synteny generation by computation methods which includes a pre-determined algorithm. Most Molecular biologists are interested in visualizing synteny regions between two genomes and more often interested in a specific region. The synteny can be between two genomes or between two chromosomes from different species. Our web-based synteny viewer (<a href=<?php echo $webpath;?>homepage.php>GSV</a>) provides a more interactive way to visualize synteny regions. It gives liberty to the biologists to calculate the synteny region using any algorithm, which they presume best suits their genomes. GSV can read this synteny file and provide visualization. Alternatively, we provide an option to display the annotated regions for each of the genome, if provided with an annotation file. Both the synteny file and annotation file has to be prepared in a specific format, details can be found in the <a href=<?php echo $webpath;?>tutorial.php>tutorial</a> page.</p>


	<p align="justify" class="bodypara">
	The <b>Web interface</b> provides the user with a web form to upload the synteny file. This is required for GSV. The annotation file can also be uploaded. This is an optional file. On submitting the files, GSV validates the contents of the file(s). It then parses the information and stores in the relational database along with a unique id which is specific to a given user.
<br>
<br>
The GSV version is 1.2 currently.

</p>

</fieldset>

<div id="secfooter">
<a href= "http://copyright.unt.edu/content/unt-copyright-resources" title="Copyright">Copyright</a>
&copy;&nbsp;UNT
</div>
</div>
</body>



