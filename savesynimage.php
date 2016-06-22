<?php
/*
require_once("dbtools.php");
$link = create_connection();


$id_value = mysql_real_escape_string($_GET['id_value'],$link);
$annotationid1 = mysql_real_escape_string($_GET['annid'],$link);
$polygon = mysql_real_escape_string($_GET['polygon'],$link);
$annotationidimage = mysql_real_escape_string($_GET["annotationidimage"],$link);

$session_id = mysql_real_escape_string($_GET['session_id'],$link);
$session_id_gene = mysql_real_escape_string($_GET['session_id_gene'],$link);
$org1 = mysql_real_escape_string($_GET['ref'],$link);
$org2 = mysql_real_escape_string($_GET['query'],$link);
$id_ref = mysql_real_escape_string($_GET['zoomrefstart'],$link);
$hs19_position = mysql_real_escape_string($_GET['zoomrefend'],$link);
$id_query = mysql_real_escape_string($_GET['zoomquerystart'],$link);
$ce19_position = mysql_real_escape_string($_GET['zoomqueryend'],$link);
$width = mysql_real_escape_string($_GET['image'],$link);
$xyplotheight = mysql_real_escape_string($_GET['Height'],$link);
$change_color = mysql_real_escape_string($_GET['Color'],$link);
$get_track_id = mysql_real_escape_string($_GET['trackname'],$link);
$imagebgc = mysql_real_escape_string($_GET['imagebgc'],$link);
$colorchanged = mysql_real_escape_string($_GET['trackcolor'],$link);
$finalrefvalue = mysql_real_escape_string($_GET['finalrefvalue'],$link);
$filtersynvalue =  mysql_real_escape_string($_GET['filtervalue'],$link);
*/
function save_image($inPath,$outPath)
{ //Download images from remote server
    $in=    fopen($inPath, "rb");
    $out=   fopen($outPath, "wb");
    while ($chunk = fread($in,8192))
    {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
echo "The synteny image has been generated. Please close this window. Thank you.";
}

//save_image("http://cas-bioinfo.cas.unt.edu/gsv/drawsynimage.php?annid=$annotationid1&ref=$org1&zoomrefstart=$id_ref&zoomrefend=$hs19_position&query=$org2&zoomquerystart=$id_query&zoomqueryend=$ce19_position&session_id=$session_id&image=$width&polygon=$polygon&filtersign=$filtersynvalue",'syn/synteny.png');
?>
