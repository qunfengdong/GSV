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
<title>Tutorial</title>
</head>
<body>
<?php
include("header.php");
?>
<div id="body">
<fieldset style="width: 100%">
	<legend>Step-by-Step Tutorial</legend>
	<p class="bodypara" align="justify">
	<a href="homepage.php" title="Click here to use this tool!">Genome Synteny Viewer</a> 
	(GSV) allows users to visualize the synteny regions between genomes/chromosomes. 
	This tool is mainly aimed at users who wish to study the synteny between a given pair of genomes.
	</p>

	<ul id="tutorialtabs" class="shadetabs">
		<li><a href="#" rel="tab1" class="selected">Synteny file</a></li>
		<li><a href="#" rel="tab2">Annotation file</a></li>
		<li><a href="#" rel="tab3">Upload Synteny</a></li>
		<!--
		<li><a href="#" rel="tab4">Summary</a></li>
		-->
		<li><a href="#" rel="tab5">Visualization</a></li>
		<!--
		<li><a href="#" rel="tab6">Video tutorial</a></li>
		-->
	</ul>


	<div style="border-top:1px solid gray; width:100%; overflow:auto; padding: 5px">

	  <div id="tab1" class="tabcontent">
		<h4>Contents</h4>
		<ol>
		<li><a href="tutorial.php#SyntenyFormat">Format</a></li>
		<li><a href="tutorial.php#mandes">Column 1-6 description (mandatory)</a></li>
		<li><a href="tutorial.php#optdes">Column 7 onwards (optional)</a></li>
		<li><a href="tutorial.php#imageofsyn">Screenshot of synteny_file.txt</a></li>
		<li><a href="tutorial.php#gensynfile">Generate synteny_file.txt</a></li>
		</ol>
	  	<h4>1. <a name="SyntenyFormat"></a>Format</h4>
	  	<p>
	  		- Line 1 must begin with the pound symbol '#'.<br>
	  		- Line 1 must contain column headers separated by tabs.<br>
	  		- Column headers can be labeled term of your choice.<br>
	  		- Columns 1 to 6 (<span style="color:red;">in red below</span>) are mandatory and values must be entered in the fields.<br>
	  		- Columns 7 to N (<span style="color:blue;">in blue below</span>) are additional fields provided as additional feature but are not required to be filled out for the program to work.
	  	</p>
	  	<h4>2. <a name="mandes">Column 1-6 description (mandatory fields)</h4>
			<p><span style="color:red;">Column 1: Genome1_ID</span><br>
				- This is where the ID of genome 1 must be entered.<br>
				- It must be alphanumeric with either underscores or spaces, but does not support tabs.<br>
				- This field can be the name or id of the organism, chromosome, scaffold and contig,  etc…<br> 
				Examples of acceptable formats: Organism_A, Chromosome 3, HS19 and so on.
			</p>
			<p><span style="color:red;">Column 2: Genome1_Start</span><br>
				- This is where the Start coordinate of the conserved region on genome 1 is entered.<br>
				- It must be numeric.<br>
				Example of acceptable format: 3001768.
			</p>
			<p><span style="color:red;">Column 3: Genome1_End</span><br>
				- This is where the End coordinate of conserved region on genome 1 is entered.
				- It must be numeric.<br>
				Example of acceptable format: 3020367.
			</p>
			<p><span style="color:red;">Column 4: Genome2_ID</span><br>
				- This is where the ID of genome 2 is entered<br>
				- The format of the entry must be alphanumeric and can have either underscores or spaces, but does not support tabs.<br>
				- The ID of the tile genome can be the name or id of organism, chromosome, scaffold and contig, etc…<br> 
				Example of acceptable formats:  Organism_B, Chromosome 5, CE8 and so on.
			</p>
			<p><span style="color:red;">Column 5: Genome2_Start</span><br>
				- This is where the Start coordinate of the conserved region on genome 2 is entered.<br>
				- It must be numeric.<br>
				Example of an acceptable format: 2983692.
			</p>
			<p><span style="color:red;">Column 6: Genome2_End</span><br>
				- This is where the End coordinate of conserved region on genome 2 is entered.<br>
				- It must be numeric.<br>
				Example of an acceptable format: 32991467.
			</p>
			<h4>3. <a name="optdes"></a>Column 7 onwards</h4>
			<p>
				 - The following fields are optional and not mandatory for the program to work and these fields are provided as additional features.<br>
				 - To use these fields all entries must be in numerical value.
			</p>
			<p><span style="color:blue;">Column 7: Score</span><br>
				- In column 7 you can record the score generated for the alignment<br>
				- e.g., 255, 86, 198
			</p>
			<p><span style="color:blue;">Column 8: E-value</span><br>
				- In column 8 you can record the e-value generated for the alignment<br>
				- e.g., 1e-40, 1.7e-8, 1
			</p>
			<h4>4. <a name="imageofsyn"></a>Screen shot of synteny file</h4>
			<img src="img/synteny.png" border="1px" alt="params"><br>
			<h4>5. <a name="gensynfile"></a>Generate synteny_file.txt</h4>
			<p>
			<b>Disclaimer:</b><i>We hope the example provided in this script is a valuable resource for you. Your use of the information contained in this script is at your own risk. All information provided on this script, whether expressed or implied, is not warranted for its accuracy, completeness, appropriateness for a particular purpose, authorized, recommended, supported, or guaranteed by the GSV team.</i>

			<br><br>
			- GSV allows users to visually identify conserved regions among their genomes of interest, however GSV does not generate the synteny data for the user. Synteny data must be generated using a third party program such as BLAST, BLASTZ or other software. If you have any questions or concerns with generating synteny data to use with GSV, please feel free to contact our team.<br>
			- GSV provides the following scripts to help convert the BLAST or BLASTZ output into the proper GSV format.<br>
			- BLASTparser.pl (<a href="scripts/BLASTparser.pl">download</a>): This script will convert standard BLAST output into synteny_file.txt for GSV.<br>
			<pre>Usage: BLASTparser.pl -r &lt;query_genome&gt; -t &lt;hit_genome&gt; -i &lt;blout_file&gt; -o &lt;output_file&gt;
			
  where -
    query_genome: name or id of the query genome.
    hit_genome: name or id of the hit genome.
    blout_file: name or path to BLAST output file, where query_genome is blasted against hit_genome
    output_file: name of the output file, for e.g., synteny_file.txt
			</pre>
			- BLASTZparser.pl (<a href="scripts/BLASTZparser.pl">download</a>): This script will convert standard BLASTZ output into synteny_file.txt for GSV.<br>
			<pre>Usage: BLASTZparser.pl -r &lt;query_genome&gt; -t &lt;hit_genome&gt; -i &lt;blastz_output_file&gt; -o &lt;output_file&gt;
			
  where -
    query_genome: name or id of the query genome.
    hit_genome: name or id of the hit genome.
    blout_file: name or path to BLASTZ output file, where query_genome is blasted against hit_genome
    output_file: name of the output file, for e.g., synteny_file.txt
			</pre>
			- You can combine more than one synteny_file.txt to generate a single synteny_file.txt
			</p> 
	  </div>
	  
	  <div id="tab2" class="tabcontent">
			<p class="bodypara">
			<h4>Contents</h4>
			<ol>
				<li><a href="tutorial.php#AnnotationFormat">Format</a></li>
				<li><a href="tutorial.php#desfile">Column descriptions</a></li>
				<li><a href="tutorial.php#imageofann">Screenshot of annotation file</a></li>
				<li><a href="tutorial.php#genannfile">Generate annotation_file.txt</a></li>
			</ol>
			<h4>1. <a name="AnnotationFormat"></a>Format</h4>
			<p>
				- The annotation file must be prepared as illustrated in the example file below.<br> 
				- The necessary requirement is that it is 9 column tab delimited file.<br>
	
			</p>
			<h4>2. <a name="desfile"></a>Column descriptions</h4>
			<p><span style="color:red;">Column 1: ID</span><br>
				- This where the ID is entered and must correspond to the ID provided in Column 1 or Column 4 in the Synteny file.<br>
				- It must be alphanumeric with can have either underscores or spaces, but it does not support the use of tabs.<br>
				Examples of acceptable formats: Organism_A, Chromosome 3, HS19 and etc.
			</p>
			<p><span style="color:red;">Column 2: Start</span><br>
				- This is where the Start coordinate of the annotated feature is entered.<br>
				- It must be numeric.<br>
				Example of acceptable format: 11315.
			</p>
			<p><span style="color:red;">Column 3: End</span><br>
				- This where the End coordinate of the annotated feature is entered.<br>
				- It must be numeric.<br>
				Example of acceptable format: 15093.	
			</p>
			<p><span style="color:red;">Column 4: Strand</span><br>
				- This is where the Strand orientation of the annotated feature is entered.<br>
				- It must be either + which denotes a “forward strand” or – which denotes a “reverse strand”.<br>
				- If not applicable, provide a period, (.).<br>
				Examples of acceptable formats: + or -.
			</p>
			<p><span style="color:red;">Column 5: Name</span><br>
				- This is where the name of the annotated feature is entered.<br>
				- It can be alphanumeric.<br>
				- If not applicable, provide a period, (.).<br>
				Examples of acceptable formats: PAU_0022, 123.09 and etc.
			</p>
			<p><span style="color:red;">Column 6: Value</span><br>
				- This is where a Value associated with the feature can be entered.<br>
				- This is usually an expression value to generate an XY plot.<br>
				- It must be numeric or in scientific notation.<br>
				- If not applicable, provide a period, (.).<br>
				Examples of acceptable formats:  85, 35, 1e-4 and etc.
			</p>
			<p><span style="color:red;">Column 7: Track</span><br>
				- This is where you can name the feature to a specific Track.<br>
				- It can be alphanumeric.<br>
				- Each entry in this column will result in a track.<br>
				Examples of acceptable formats: gene, transposon, and expression.
			</p>
			<p><span style="color:red;">Column 8: Shape</span><br>
				- This is where you can enter and define the Shape of the annotated feature.<br>
				- We support the following 7 shapes: arrow, dashline, xyplot, pentagram, christmasarrow, box and ellipse.<br>
				- It is not case-sensitive.<br>
				Examples of acceptable formats: arrow, box and xyplot.
			</p>
			<p><span style="color:red;">Column 9: Color</span><br>
				- This is where you can enter and define the Color display of the Annotated feature.<br>
				- We support the following 29 colors: purple, pink, crimson, olive, sandybrown, firebrick, darkgray, tomato, seagreen, peru, lightsteelblue, salmon, khaki, skyblue, maroon, silver, gold, darkgreen, orange, chocolate, darkcyan, tan, darkviolet, indianred, gainsboro, brown, gray, red, thistle, darkslategray, magenta, and black.<br>
				- Misspelled words will automatically be displayed in black color.<br>
				- It is not case-sensitive.<br>
				Examples of acceptable formats:  red, chocolate and pink.
			</p>
			<h4>3. <a name="imageofann"></a>Screen shot of annotation file</h4>
			<img src="img/annotation.png" border="1px" alt="params">
			<h4>4. <a name="genannfile"></a>Generate annotation_file.txt</h4>
			<p>
			<b>Disclaimer:</b><i> We hope the example provided in this script is a valuable resource for you. Your use of the information contained in this script is at your own risk. All information provided on this script, whether expressed or implied, is not warranted for its accuracy, completeness, appropriateness for a particular purpose, authorized, recommended, supported, or guaranteed by the GSV team.</i>
			<br><br>
			- The most common format for genome annotation information is GFF3 format. This GFF3 format files can be downloaded from NCBI(<a href="ftp://ftp.ncbi.nih.gov/genomes/Bacteria/">ftp://ftp.ncbi.nih.gov/genomes/Bacteria/</a>) and other sources, or produced by running genome annotation programs on your sequence of interest.<br>
			- To convert GFF3 format into GSV format, user will require a text file called conf.txt file and a perl script called GFF3parser.pl.<br>
			- conf.txt (<a href="scripts/conf.txt">download</a>): This is a tab delimited file to extract required information from GFF3 file, where Column 1 is the feature in GFF3 file, Column 2 is desired shape and Column 3 is desired color.
			<pre>gene	arrow	red
CDS	box	blue
misc_feature	box	green
microarray_oligo	xyplot	sky

	where - CDS, gene, mis_feature and microarray are features you want to extract from GFF3 file.
</pre>
			- GFF3parser.pl (<a href="scripts/GFF3parser.pl">download</a>)<br>
			<pre>Usage: GFF3parser.pl -n &lt;genome&gt; -i &lt;gff3_file&gt; -c &lt;conf.txt&gt; -o &lt;output_file&gt;
			
  where -
    genome: name or id of the genome.
    gff3_file: name or path to GFF3 file
    conf.txt: file as described above
    output_file: name of the output file, for e.g., annotation_file.txt
			</pre>
			- You can combine more than one annotation_file.txt to generate a single annotation_file.txt
			</p>
	  </div>
	  
	  <div id="tab3" class="tabcontent">
			<p class="bodypara" align="justify"> On the home page, upload the synteny and annotation files.
			</p>
			<img src="img/uploadpage.png" border="1px" alt="params">
	  </div>
	  
	  <div id="tab4" class="tabcontent">
			<p class="bodypara" align="justify"> The two drop down boxes are provided to select the reference genome and the tile genome.
			If there is no synteny between the selected genomes. An error message would pop up to prevent from going further. 
			After selecting the genomes which share a synteny region. Proceed to visualizing the synteny.
			</p>
			<img src="img/geome.png" border="1px" alt="params">
	  </div>

	  <div id="tab5" class="tabcontent">
<!--
		<p class="bodypara" align="justify">More options are available to manipulate the image to define the width of the image, whether the synteny must be drawn as boxes or lines, select the reference and query organism, tracks On/Off,and Save this image. </p>
		<img src="img/panel.png" border="0px">
		<p class="bodypara" align="justify">The image might take some time load depending on the number of synteny regions and the annotated regions.
		The start positions of the image will always start with 1 and the end position of the genomes is the largest end coordinate of the synteny.
		Since this is an abritrary end, there is no restriction provided to go beyond the end coordinates displayed.
		The synteny region is represented by a pair of colored lines. This pair will become a rectangular block if "block" is selected from the options box.
		The black lines above and below the synteny represent the genome. The genome is tabulated at specific places. The xy-plot is located the top and end. If 		there is no xyplot file uploaded, this would remain blank.
		The purple arrows and green arrows represent the annotation regions. If there is no annotation file associated with this genome, this would remain blank.
		There are controls provided to manipulate the image, to move left, move right, zoom in or zoom out, and also zoom into a specific region in the genome.
		By Clicking "Go", the image would refresh itself to the co-ordinates provided.
		The ID of the genome is displayed on either side of the image manipulation panel.
		</p>
		<img src="img/visulization.png" border="0px">
-->		
	<a href="img/GSVDiagram_Small.jpg" target="_blank"><img src="img/GSVDiagram_Small.jpg" width="1200px" border="0px"></a>
	  </div>
	<div id="tab6" class="tabcontent">
	<br>
	The video can be downloaded <a href="GSVTutorial.m4v" target="_blank">here</a> 
	<br>
	<br>
	<iframe title="YouTube video player" width="750" height="600" src="http://www.youtube.com/embed/l5MmnVF25o0" frameborder="0" allowfullscreen></iframe>
	</div>	


	</div>

	<script type="text/javascript">
	  var tutorial=new ddtabcontent("tutorialtabs")
	  tutorial.setpersist(true)
	  tutorial.setselectedClassTarget("link") //"link" or "linkparent"
	  tutorial.init()
	</script>

	<map name="viz">
      <area alt="panleft" title="Click to Pan towards the left" shape="rect" coords="27,55,51,92">
      <area alt="rearrange" title="Click to move this element up/down" shape="rect" coords="447,8,535,38">
      <area alt="evalfilter" title="Enter an e-value that you would like to filter your results on" shape="rect" coords="152,58,280,84">
      <area alt="zoominout" title="Controls to Zoom in/out" shape="rect" coords="443,59,547,92">
      <area alt="range" title="Enter the range (start,end) that you wish to navigate to" shape="rect" coords="618,57,839,84">
      <area alt="refresh" title="Click to refresh the image" shape="rect" coords="913,14,992,38">
      <area alt="panright" title="Click to Pan towards the right" shape="rect" coords="940,58,965,91">
      <area alt="genometrack" title="Track representing the genome" shape="rect" coords="13,112,982,146">
      <area alt="gfftrack" title="Track displaying the GFF annotations aligned against the genome" shape="rect" coords="9,150,982,200">
      <area alt="querytrack" title="Track displaying the query sequences aligned against the genome" shape="rect" coords="10,204,981,235">
      <area alt="popup" title="Informative popup with links to view more information and zoom into the neighborhood" shape="rect" coords="354,238,684,319">
    </map>
</fieldset>
<div id="secfooter">
<a href= "http://copyright.unt.edu/content/unt-copyright-resources" title="Copyright">Copyright</a>
&copy;&nbsp;UNT
</div>
</div>
</body>



