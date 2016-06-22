<?php
session_start();
if(isset($_POST['pro'])) {
date_default_timezone_set('America/Mexico_City');
$newsession_id = date('tniHYsu').getmypid();

require_once("path.php");
require_once("dbtools.php");
$upload_dir = $uploadpath;
$total_uploads = "2";
for ($i = 0; $i < $total_uploads; $i++) {
$new_file = $_FILES['file'.$i];
$file_name = $new_file['name'];
$file_name = str_replace(' ', '_', $file_name);
$file_tmp = $new_file['tmp_name'];
$file_size = $new_file['size'];
if (!is_uploaded_file($file_tmp)) {
/*
echo <<< ANDROID

<script type="text/javascript">

window.location = "reporterror.php?db=3"

</script>


ANDROID;
*/
}
else{
move_uploaded_file($file_tmp,$upload_dir.$file_name);
$filename[$i] = $file_name;
}

}
require_once("reportinvalidfile.php");
require_once("dbtools.php");

require_once("databasetable.php");

$synfilename = $filename[0];
$annfilename = $filename[1];
$link = create_connection();
require_once("emailsystem.php");
if($_POST["email"] != '') {
$email = mysql_real_escape_string($_POST["email"],$link);
}

if($synfilename == '') {
echo <<< EEE

<script type="text/javascript">

window.location = "reporterror.php?db=0"

</script>


EEE;
}


function stringlenforzip($value,$trim)
{
$num1 = strlen($value);
$totalnum = $num1-4;
$stringlen = substr("$value",0,$totalnum);
return $stringlen;
}

function stringlen($value,$trim)
{
$num1 = strlen($value);
$totalnum = $num1-3;
$stringlen = substr("$value",0,$totalnum);
return $stringlen;
}


$file_anns = $upload_dir.$annfilename;
$filext = array(".gz");
$zipext = array(".zip");
$ext = strrchr($annfilename,".");
if(in_array(strtolower($ext),$filext)) {
exec("gunzip $file_anns");
$annfilename = stringlen($annfilename,".");
}
elseif(in_array(strtolower($ext),$zipext)) {
exec("unzip -d $upload_dir $file_anns");
$annfilename = stringlenforzip($annfilename,".");
$annfilename .= ".txt";
unlink($file_anns);
}
$filesyn = $upload_dir.$synfilename;

$ext = strrchr($synfilename,".");
if(in_array(strtolower($ext),$filext)) {
exec("gunzip $filesyn");
$synfilename = stringlen($synfilename,".");
}
elseif(in_array(strtolower($ext),$zipext)) {
exec("unzip -d $upload_dir $filesyn");
$synfilename = stringlenforzip($synfilename,".");
$synfilename .= ".txt";
unlink($filesyn);
}

require_once("delete_syn_folder.php");
function syn($synfilename) {
if($synfilename != '') {
global $upload_dir,$newsession_id,$email,$database_name;
$link = create_connection();


$newfile = date('His').getmypid();
//echo $synfilename;
//$file_handle = file_get_contents($upload_dir.$synfilename);
$file_nums = file($upload_dir.$synfilename);
if($file_nums === false) {
echo <<< BMC

<script type="text/javascript">

window.location = "reporterror.php?db=3"

</script>


BMC;
}
else {
$attr_names = array();
$sql = "DESCRIBE `{$newsession_id}synteny_1`";
//echo $sql."<br>";
$result = execute_sql($database_name, $sql, $link);
//echo count($file_nums);
while($row = mysql_fetch_array($result, MYSQL_NUM))
{

///echo count($row);
//foreach($row as $value) {
//echo $value."<br>";
array_push($attr_names,$row[0]);

}
$out_attr_names = array_shift($attr_names);
$hh = implode(', ', $attr_names);
$header_line = exec("head -n 1 syn/$synfilename");
$header_pieces = explode("\t",$header_line);

$key = array_search('length', $header_pieces);
$pattern1 = '/^(.*)\t([0-9]*)\t([0-9]*)\t(.*)\t([0-9]*)\t([0-9]*)';
if($key != '') {
$pattern1 .= '([\t0-9eE\-\+\.|[0-9]+\.[0-9]+|[0-9]+| ]*)';
}

$newitems = count($header_pieces) - 6;

if($newitems == 0) {
$pattern1 .= '([\t0-9eE\-\+\.|[0-9]+\.[0-9]+|[0-9]+| ]*|\n)/';
}
else {

for($i=1;$i<=$newitems;$i++) {
if($i != $newitems ) {
$pattern1 .= '([\t0-9eE\-\+\.|[0-9]+\.[0-9]+|[0-9]+| ]*)';
}
else {
$pattern1 .= '([\t0-9eE\-\+\.|[0-9]+\.[0-9]+|[0-9]+| ]*|\n)/';
//$pattern1 .= '([\t0-9eE\-\+\.|[0-9]+\.[0-9]+|[0-9]+| ]*)\t([0-9]*)/';
}
}
}




unlink($upload_dir.$synfilename);
$file_hand = fopen($upload_dir.$newfile, "a+");
for($LINES=1;$LINES<=count($file_nums);$LINES++) {
fwrite($file_hand,$file_nums[$LINES]);
}
fclose($file_hand);
//$link = create_connection();
$counter = 0;
$file_han = fopen($upload_dir.$newfile, "r");
//echo $pattern1."<br>";
while(!feof($file_han)) {
$name = fgets($file_han);
if($name != '') {
$name = trim($name);
$counter++;
if($key != '') {
$num_of_items = explode("\t",$name);

if (preg_match($pattern1,$name)) {

$kk="VALUES(";
for($jj=0;$jj<count($num_of_items);$jj++) {
if($jj!=count($num_of_items)-1) {
$kk .= "'".$num_of_items[$jj]."',";
}
else {
$kk .= "'".$num_of_items[$jj]."')";
}
}
$sql = "insert into {$newsession_id}synteny_1 ($hh) $kk";

$result = execute_sql($database_name, $sql, $link);
}
else {
unlink($upload_dir.$newfile);
delete_directory($upload_dir."synteny_{$newsession_id}");
report_error($synfilename,$counter);
}

}
else {
$name = trim($name);
$num_of_items = explode("\t",$name);

if (preg_match($pattern1,$name)) {

list($org_id_1,$start_1,$end_1,$org_id_2,$start_2,$end_2) = split("\t",$name);
$total_value_of_2 = $end_2-$start_2;
$total_value_of_2 = abs($total_value_of_2);
$total_value_of_2 = $total_value_of_2 +1;
$total_value_of_1 = $end_1-$start_1;
$total_value_of_1 = abs($total_value_of_1);
$total_value_of_1 = $total_value_of_1 +1;


$minlength = min($total_value_of_1,$total_value_of_2);



array_push($num_of_items,$minlength);


$kk="VALUES(";
for($jj=0;$jj<count($num_of_items);$jj++) {
if($jj!=count($num_of_items)-1) {
$kk .= "'".$num_of_items[$jj]."',";
}
else {
$kk .= "'".$num_of_items[$jj]."')";
}
}

$sql = "insert into {$newsession_id}synteny_1 ($hh) $kk";

$result = execute_sql($database_name, $sql, $link);



}
else {
unlink($upload_dir.$newfile);
delete_directory($upload_dir."synteny_{$newsession_id}");
report_error($synfilename,$counter);
}

}
}
}


fclose($file_han);

mysql_close($link);
$_SESSION['note'] = $newsession_id;
unlink($upload_dir.$newfile);
}
}
}

function annotation($annfilename) {
if($annfilename != '') {
global $upload_dir,$newsession_id,$email,$synfilename,$database_name;

$link = create_connection();
$counter = 0;
$newfile = date('His').getmypid();
$file_handle = @file_get_contents($upload_dir.$annfilename);
if($file_handle === false) {
echo <<< BMW

<script type="text/javascript">

window.location = "reporterror.php?db=3"

</script>


BMW;
}
else {
unlink($upload_dir.$annfilename);
$file_hand = fopen($upload_dir.$newfile, "a+");
fwrite($file_hand,$file_handle);
fclose($file_hand);
$file_han = fopen($upload_dir.$newfile, "r");


while(!feof($file_han)) {
$name = fgets($file_han);
$pattern = '/^(.*)\t([0-9]*)\t([0-9]*)\t([\+|\-|\.| ])[\t|\n]+(.*)\t([0-9eE\-\+\.|\.| ]*)\t(.*)\t(christmasarrow|pentagram|dashline|ellipse|arrow|box|xyplot)\t([a-zA-Z\s]*)?$/i';
$counter++;
if($name != '') { 
if(preg_match($pattern,$name)) {

list($org_id,$start,$end,$strand,$feature_name,$feature_value,$track_name,$track_shape,$track_color) = split("\t",$name);

$track_color = trim($track_color);
$newsession_id = mysql_real_escape_string($newsession_id);
$org_id = mysql_real_escape_string($org_id);
$start = mysql_real_escape_string($start);
$end = mysql_real_escape_string($end);
$strand = mysql_real_escape_string($strand);
$track_name = mysql_real_escape_string($track_name);
$track_shape = mysql_real_escape_string($track_shape);
$track_color = mysql_real_escape_string($track_color);
/* new change */
if($start > $end && ($strand == '-' || $strand == '+')) {
$newstart = $end;
$newend = $start;
$start = $newstart;
$end = $newend;
}
/* new change */

$sql = "insert into {$newsession_id}annotation_1 (org_id,start,end,strand,feature_name,feature_value,track_name,track_shape,track_color) values('$org_id','$start','$end','$strand','$feature_name','$feature_value','$track_name','$track_shape','$track_color')";

$result = execute_sql($database_name, $sql, $link);

}
else{
unlink($upload_dir.$newfile);
delete_directory($upload_dir."synteny_annotation_{$newsession_id}");
report_error($annfilename,$counter);
}
}
}
fclose($file_han);


$_SESSION['annotation'] = $newsession_id;

$_SESSION['annImage'] = 1;


mysql_close($link);
unlink($upload_dir.$newfile);
}
}
}


if($synfilename != '' && $annfilename != ''){
synteny_table();
synteny_annotation_table();
$ann_id_value = 1;
mkdir("syn/synteny_annotation_{$newsession_id}",0755);
}
else{
synteny_table();
$ann_id_value = 0;
mkdir("syn/synteny_{$newsession_id}",0755);
}
syn($synfilename);
annotation($annfilename);

if($email != "" && $synfilename != '' && $annfilename != '') {
$addImage = 1;
emailsystem($email,$addImage);
}
else {
$addImage = 0;
emailsystem($email,$addImage);

}






header("Location:display.php?session_id=$newsession_id&annid=$ann_id_value");
exit;


}
?>
<?php
require_once("path.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
body {
        margin:0;
        padding:0;
}

.tooltip {
        display:none;
        background:transparent url(img/black_arrow.png);
        font-size:12px;
        height:80px;
        width:170px;
        padding:20px;
        color:#fff;
}

/* style the trigger elements */
#demo a {
        border:0;
        cursor:pointer;
        /*margin:0 20px;*/
}

</style>
<!--
<script type="text/javascript" src="js/lightbox_js/prototype.js"></script>
<script type="text/javascript" src="js/lightbox_js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox_js/lightbox.js"></script>

<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
-->
<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/tabcontent.css">
<link rel="stylesheet" type="text/css" href="css/annimg.css">

<script src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />


<link rel="shortcut icon" href="css/img/favicon.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/fonts/fonts-min.css" />

<link rel="stylesheet" type="text/css" href="css/upload_contain.css" />

<!--
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/container/assets/skins/sam/container.css" />
-->
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/connection/connection-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/animation/animation-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/dragdrop/dragdrop-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/container/container-min.js"></script>
<script src="js/jquery_jtip.js" type="text/javascript"></script>
<script src="js/jtip.js" type="text/javascript"></script>

<script type="text/javascript">

var upload_number = 1;
function addFileInput() {
if(upload_number > 0) {
document.getElementById('moreUploadsLink').style.display = 'none';
}
if(upload_number > 1) {
alert('Sorry, you can only upload 2 files');
return;
}
var d = document.createElement("div");
var file = document.createElement("input");
file.setAttribute("type", "file");
file.setAttribute("name", "file"+upload_number);

d.appendChild(file);
document.getElementById("moreUploads").appendChild(d);
upload_number++;



}
function displayopt() {

document.getElementById('moreUploadsLink').style.display = 'block';
document.getElementById('moreUploadsLink1').style.display = 'block';

}
function filecheck1(){  
var id_value = document.getElementById('file0').value;
if(id_value != '') {   
var valid_extensions = /(.txt|.gz|.zip)$/i;     
if(!valid_extensions.test(id_value)) {     
alert('Only .txt, .gz or .zip allowed');
window.location = "formaterror.php";
} 
} 
}



function check_data()
{
if((document.uploadForm.file0.value.length == 0) && (document.uploadForm.file1.value.length == 0)) {
//alert('There is no files!!!');
window.location = "reporterror.php?db=0";
}


}





function filecheck2(){  
var ann_file = document.getElementById('file1').value;  
if(ann_file != '') {   
var valid_extensions = /(.txt|.gz|.zip)$/i;     
if(!valid_extensions.test(ann_file)){ 
 alert('Only .txt, .zip or .gz allowed.');  
 window.location = "formaterror.php";
} 
} 

}

function validate() {
   var reg = /^(\s*|([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4}))$/;
   var address = document.getElementById('email').value;
   if(reg.test(address) == false) {
      alert('Invalid Email Address');
    //window.location = "emailerror.php" 
	return;
   }
}

YAHOO.namespace("example.container");

    function init() {

        var content = document.getElementById("content");

        content.innerHTML = "";

        if (!YAHOO.example.container.wait) {

            // Initialize the temporary Panel to display while waiting for external content to load

            YAHOO.example.container.wait =
                    new YAHOO.widget.Panel("wait",
                                                    { width: "240px",
                                                      fixedcenter: true,
                                                      close: false,
                                                      draggable: false,
                                                      zindex:4,
                                                      modal: true,
                                                      visible: false
                                                    }
                                                );

            YAHOO.example.container.wait.setHeader("<font size=4>Please wait...</font>");
		//YAHOO.example.container.wait.setBody('<img src="http://cas-bioinfo.cas.unt.edu/gsv/img/rotating_arrow.gif">');
		//YAHOO.example.container.wait.setBody("<p align=\"center\"><img src=\"http://cas-bioinfo.cas.unt.edu/gsv/img/loading.gif\"></p>");
		//YAHOO.example.container.wait.setBody('<img src="http://l.yimg.com/a/i/us/per/gr/gp/rel_interstitial_loading.gif" />');
            YAHOO.example.container.wait.render(document.body);

        }

var callback = {
            success : function(o) {
                content.innerHTML = o.responseText;
                content.style.visibility = "visible";
                YAHOO.example.container.wait.hide();
            },
            failure : function(o) {
                content.innerHTML = o.responseText;
                content.style.visibility = "visible";
                content.innerHTML = "CONNECTION FAILED!";
                YAHOO.example.container.wait.hide();
            }
        }

        // Show the Panel
        YAHOO.example.container.wait.show();

     
    }

    YAHOO.util.Event.on("panelbutton", "click", init);

</script>

<title>Home</title>

</head>
<body class="yui-skin-sam">
<form action="" method="post" enctype="multipart/form-data" name="uploadForm" id="uploadForm">
<?php
include("header_homepage.php");
?>
<div id="body">
<div id="Logo">
</div>
<br>
<div id="content"></div>
<table align="center">
<tr>
<td><strong>Upload <a href="img/syntenyImage.jpg" class="thickbox" title="The format of synteny file">synteny</a> file (required)&nbsp;<span class="formInfo"><a href="hint5.htm?width=375" class="jTip" id="six" name=''>?</a></span></strong>
<td>
<input type="file" name="file0" id="file0" onblur="filecheck1()" />
</td>
<td>
<a href="sample_synteny.txt">Download example file</a>
</td>
</tr>
<tr>
<td>
<strong>Upload <a href="img/annotationImage.jpg" class="thickbox" title="The format of annotation file">annotation</a> file (optional)&nbsp;<span class="formInfo"><a href="hint6.htm?width=375" class="jTip" id="seven" name=''>?</a></span></strong>
</td>
<td>
<input type="file" name="file1" id="file1" onblur="filecheck2()" />
</td>
<td>
<a href="sample_annotation.txt">Download example file</a>
</td>
</tr>
<tr>
<td><strong>Email (optional)&nbsp;<span class="formInfo"><a href="hint1.htm?width=375" class="jTip" id="five" name=''>?</a></span></strong></td>
<td><input name="email" type="text" id="email" onblur="validate()" /></td>
</tr>
<tr>
<td></td>
<td><input id="panelbutton" name="pro" type="submit" value="Submit" onclick="check_data()"></td>
</tr>
</table>
<p align="center">
<br>
Genome Synteny Viewer allows users to upload files which contain synteny regions between two or more genomes and interactively
visualize the synteny between them. GSV also allows users to upload annotation files to visualize annotated regions in addition
to synteny regions. Fore more information on how to operate GSV, please read the instructions located on the <a href="tutorial.php">tutorial</a> page.</p>
<?php

include("footer.php");
?>
</div>
</form>
</body>
