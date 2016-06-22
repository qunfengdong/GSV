
<table border="1px" class="tab" id="table-1" class="bodypara" id="movingTable" id="gallery" width="75%">
   <tr>
	 <th><font size="5"><?php echo $org1; ?></font><br />
<?php
/*
new changed
*/
echo "<table id=\"panelcontrol\" class=\"bodypara\" border=\"0\" cellpadding=\"3\">";
echo "<tr><td><span style=\"color:662d91\"><b>Annotation tracks display <font color=\"008000\">on</font>/<font color=\"f26122\">off</font>:</b></span>(<font color=\"008000\"><b>Green = Track Visible</b></font> / <font color=\"f26122\"><b>Orange = Track Hidden</b></font>)<span class=\"formInfo\"><a href=\"hint.htm?width=375\" class=\"jTip\" id=\"one\" name=''>?</a></span></td>";
for ($rrdd=0; $rrdd<$upper_draw_time;$rrdd++) {
echo "<td colspan=\"3\"><font size=\"2\" color=\"008000\" id=\"upperdisplaycolor$rrdd\" class=\"arrow\" onclick=\"upperdisplayRow($rrdd)\">$upper_res[$rrdd]</font></td>";
}
echo "</tr></table>";

?> 


		</th>
    
        </tr>
<?php
$merge_all_images = array();
$diffcolors = array('F0F8FF','FFFAFA');
$diffcolorsname = array('aliceblue','snow');
	$bgc = 0;
    for ($dd=0; $dd<$upper_draw_time;$dd++) {
	echo "<tr id=\"upperRow$dd\">";
	if($upper_shape[$dd] == "arrow") {
	echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$diffcolors[$bgc]\"><i>Track Name</i>: $upper_res[$dd] of $org1&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"color$dd\" id=\"color$dd\" onChange=\"change_upper_image_colors()\">
 <option value=\"default\">default</option>
  <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"uppertrackshape$dd\" id=\"uppertrackshape$dd\" onChange=\"change_upper_image_track_shapes()\">
 <option value=\"default\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$upper_res[$dd]}_{$org1}_{$session_id}_image_{$dd}.png");	
	}
else if ($upper_shape[$dd] == "dashline") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$diffcolors[$bgc]\"><i>Track Name</i>: $upper_res[$dd] of $org1&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"color$dd\" id=\"color$dd\" onChange=\"change_upper_image_colors()\">
 <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"uppertrackshape$dd\" id=\"uppertrackshape$dd\" onChange=\"change_upper_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
 <option value=\"default\" SELECTED>dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$upper_res[$dd]}_{$org1}_{$session_id}_image_{$dd}.png");
}

else if ($upper_shape[$dd] == "pentagram") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$diffcolors[$bgc]\"><i>Track Name</i>: $upper_res[$dd] of $org1&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"color$dd\" id=\"color$dd\" onChange=\"change_upper_image_colors()\">
 <option value=\"default\">default</option>
  <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"uppertrackshape$dd\" id=\"uppertrackshape$dd\" onChange=\"change_upper_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
 <option value=\"default\" SELECTED>pentagram</option>
</select>
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$upper_res[$dd]}_{$org1}_{$session_id}_image_{$dd}.png");
}

else if ($upper_shape[$dd] == "christmasarrow") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$diffcolors[$bgc]\"><i>Track Name</i>: $upper_res[$dd] of $org1&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"color$dd\" id=\"color$dd\" onChange=\"change_upper_image_colors()\">
 <option value=\"default\">default</option>
  <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"uppertrackshape$dd\" id=\"uppertrackshape$dd\" onChange=\"change_upper_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
 <option value=\"default\" SELECTED>christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$upper_res[$dd]}_{$org1}_{$session_id}_image_{$dd}.png");
}

else if ($upper_shape[$dd] == "box") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$diffcolors[$bgc]\"><i>Track Name</i>: $upper_res[$dd] of $org1&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"color$dd\" id=\"color$dd\" onChange=\"change_upper_image_colors()\">
 <option value=\"default\">default</option>
  <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"uppertrackshape$dd\" id=\"uppertrackshape$dd\" onChange=\"change_upper_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
 <option value=\"default\" SELECTED>box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$upper_res[$dd]}_{$org1}_{$session_id}_image_{$dd}.png");
}

else if ($upper_shape[$dd] == "ellipse") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$diffcolors[$bgc]\"><i>Track Name</i>: $upper_res[$dd] of $org1&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"color$dd\" id=\"color$dd\" onChange=\"change_upper_image_colors()\">
 <option value=\"default\">default</option>
  <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"uppertrackshape$dd\" id=\"uppertrackshape$dd\" onChange=\"change_upper_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
 <option value=\"default\" SELECTED>ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$upper_res[$dd]}_{$org1}_{$session_id}_image_{$dd}.png");
}

else if ($upper_shape[$dd] == "xyplot") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$diffcolors[$bgc]\"><i>Track Name</i>: $upper_res[$dd] of $org1&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"color$dd\" id=\"color$dd\" onChange=\"change_upper_image_colors()\">
 <option value=\"default\">default</option>
  <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image
<input type=\"hidden\" name=\"uppertrackshape$dd\" id=\"uppertrackshape$dd\" value=\"default\">
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$upper_res[$dd]}_{$org1}_{$session_id}_image_{$dd}.png");
}


echo "<image id=\"image$dd\" src=\"upperimage.php?annid=$annotationidvalue&ref=$org1&zoomrefstart=$zoom_id_ref&zoomrefend=$zoom_hs19_position&query=$org2&zoomquerystart=$zoom_id_query&zoomqueryend=$zoom_ce19_position&session_id_gene=$session_id_gene&image=1200&annotationidimage=0&trackname=$upper_res[$dd]&imagebgc=$diffcolorsname[$bgc]&trackcolor=default&trackshape=default&imageid=$dd&finalrefvalue=$hs19_position\">
</td>";
       
	echo "</tr>";
	$bgc++;
	if($bgc > 1) {
	$bgc = 0;
	}
	}

if($hgf != 0) {
echo <<< YYAN
<tr><th><table><tr>
<td><i>Control panel for <br> BOTH genomes</i></td>
<td style="padding:0px"><a href="JavaScript:getValue1('left','2')"><img src="img/GlobalPanLeftGreen.png" id="left2"  style="width:40px;height:35px;padding:0px;"></a></td>
<td style="padding:0px"><a href="JavaScript:getValue1('right','2')"><img src="img/GlobalPanRightGreen.png" id="right2"  style="width:40px;height:35px;padding:0px;"></a></td>
<td style="padding:0px"><a href="JavaScript:getValue1('zoomout','2')"><img src="img/GlobalZoomOutGreen.png" id="zoomoutpos2"  style="width:40px;height:35px;padding:0px;"></a></td>
<td style="padding:0px"><a href="JavaScript:getValue1('zoomin','2')"><img src="img/GlobalZoomInGreen.png" id="zoominpos2"  style="width:40px;height:35px;padding:0px;"></a></td>

<td align="right" style="padding:0px">
<i>Filter synteny regions</i><span class="formInfo"><a href="hint2.htm?width=375" class="jTip" id="two" name=''>?</a></span>:</td><td style="padding:0px">
YYAN;

echo "<select name=\"filtertypes\" id=\"filtertypes\" style=\"font-size:12;width:100px;\">";
//echo "<option name=\"default\" selected=\"selected\">default</option>";
foreach($contain_list_of_filters as $fval) {
if($fval == 'length') {
echo "<option value=\"$fval\" selected=\"selected\">$fval</option>";
}
else {
echo "<option value=\"$fval\">$fval</option>";
}
}
echo "</select>&nbsp;&nbsp;";


echo <<< AYYAN
<select name="filtersign" id="filtersign" style="font-size:12;width:120px;">
  <option value=">=">no less than</option>
  <option value="<=">no greater than</option>
  <option value="=">equal to</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;
AYYAN;
array_push($merge_all_images, "syn/synteny_annotation_{$session_id}/{$session_id}_synteny.png");


echo "<input type='text' name='filtervalue' size='9' maxlength='9' id='filtervalue' onChange=\"isNumeric(document.getElementById('filtervalue'), 'Numbers Only Please')\"/></td>";
echo "<td style=\"padding:0px\"><a href=\"JavaScript:updates_syn_data()\"><img src='img/GlobalUpdateGreen.png' id='valuefilter' style='width:40px;height:35px;padding:0px;'/></a></td>";
}


echo <<< UPPANEL
<td style="padding:0px"><input type="button" id="getview" value="View Entire Genomes" onclick="getcompleteview(1)"></td>
</tr><tr>
		<td><i>Control panel for <br> TOP genome</i></td>
	    <td style="padding:0px"><a href="JavaScript:getValue1('left','0')"><img src="img/PanLeft.png" id="left0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td style="padding:0px"><a href="JavaScript:getValue1('right','0')"><img src="img/PanRight.png" id="right0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td style="padding:0px"><a href="JavaScript:getValue1('zoomout','0')"><img src="img/zoomOut.png" id="zoomoutpos0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td style="padding:0px"><a href="JavaScript:getValue1('zoomin','0')"><img src="img/zoomIn.png" id="zoominpos0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td align="left" style="padding:0px"><i>View synteny region between<span class="formInfo"><a href="hint3.htm?width=375" class="jTip" id="three" name=''>?</a></span>:</i></td>
            <td style="padding:0px"><input type="text" id="startpos0" value="$zoom_id_ref" size="9" style="font-size:12" onChange="checkingNumbers(this.form, '0')">&nbsp;to&nbsp;
                                        <input type="text" id="endpos0" value="$zoom_hs19_position" size="10" style="font-size:12;" onChange="checkingNumbers(this.form, '0')"></td>
            <td style="padding:0px"><a href="JavaScript:changeboth()"><img src="img/update.png" id="changebothpos0" style="width:40px;height:35px;padding:0px;"></a></td>

UPPANEL;

echo <<< LEFTOVER
		</tr>
		</table>
               </th>
        </tr>
LEFTOVER;
	echo "<tr><td style=\"padding:0px\" colspan=\"5\">";
/*
if($hgf != 1) {
echo <<< YYAN
<i>filter synteny regions</i>: <select name="filtersign" id="filtersign">
 <option value="default">default</option>
  <option value=">=">greater than and equal to</option>
  <option value="<=">less than and equal to</option>
  <option value="=">equal to</option>
</select>
YYAN;



echo "<input type=\"text\" name=\"filtervalue\" id=\"filtervalue\" onChange=\"isNumeric(document.getElementById('filtervalue'), 'Numbers Only Please')\"/>";
echo "<a href=\"JavaScript:updates_syn_data()\"><img src='img/update.png' id='valuefilter' style='width:40px;height:35px;padding:0px;'/></a>";
//echo "<input type='button' id='valuefilter' onclick=\"updates_syn_data()\" value='Update' />";
//echo "<input type='button' id='valuefilter' onclick=\"isNumeric(document.getElementById('filtervalue'), 'Numbers Only Please')\" value='Update' />";
echo "<br />";
}
*/
//echo "<input type='hidden' name='filtervalue' id='filtervalue'/>";
//echo "<input type='hidden' name='filtersign' id='filtersign' value='default'/>";

echo "<image id=\"image\" usemap=\"#syntenymap\" border= \"0\" src=\"drawsynimage.php?annid=$annotationidvalue&ref=$org1&zoomrefstart=$zoom_id_ref&zoomrefend=$zoom_hs19_position&query=$org2&zoomquerystart=$zoom_id_query&zoomqueryend=$zoom_ce19_position&session_id=$session_id&image=1200&polygon=0&finalrefend=$hs19_position&finalqueryend=$ce19_position&filtersign=default&filtertypes=length&filtervalue=1\" onload=\"ajaxGet()\">
</td>
</tr>";
echo "<input type=\"hidden\" name=\"imageMap_path\" id=\"imageMap_path\" value=\"syn/synteny_annotation_{$session_id}/syntenycords.txt\">\n";
//$each_cords = file_get_contents("syn/synteny_annotation_{$session_id}/syntenycords.txt");

echo <<<SYNMAP
<map name="syntenymap" id="syntenymap">

</map> 
SYNMAP;
/*
$file_lines = countLines("syn/synteny_annotation_{$session_id}/syntenycords.txt");
if($file_lines < 70) {
$get_cords_piints = fopen("syn/synteny_annotation_{$session_id}/syntenycords.txt","r");
echo "<map name=\"syntenymap\">\n";
while(!feof($get_cords_piints)) {
$get_lines = fgets($get_cords_piints);
if($get_lines != '') {
$each_cords = explode("\t",$get_lines);
echo <<< SYNMAP
<area shape="rect" coords="$each_cords[0],$each_cords[1],$each_cords[2],$each_cords[3]" href="http://www.trees.com/save.html">\n
SYNMAP;
}
}
echo "</map>\n";
}
*/
echo <<< LOWERPANEL

         <tr>
                <th>
		<table>
		<tr>
		<td><i>Control panel for <br> BOTTOM genome</i></td>
		<td style="padding:0px"><a href="JavaScript:getValue1('left','1')"><img src="img/PanLeft.png" id="left1" style="width:40px;height:35px;padding:0px;"></a></td>
		<td style="padding:0px"><a href="JavaScript:getValue1('right','1')"><img src="img/PanRight.png"  id="right1" style="width:40px;height:35px;padding:0px;"></a></td>
                <td style="padding:0px"><a href="JavaScript:getValue1('zoomout','1')"><img src="img/zoomOut.png" id="zoomoutpos1" style="width:40px;height:35px;padding:0px;"></a></td>
                <td style="padding:0px"><a href="JavaScript:getValue1('zoomin','1')"><img src="img/zoomIn.png" id="zoominpos1" style="width:40px;height:35px;padding:0px;"></a></td>
<td align="right"><i>View synteny region between<span class="formInfo"><a href="hint3.htm?width=375" class="jTip" id="four" name=''>?</a></span>:</i>
<input type="text" id="startpos1" value="$zoom_id_query" size="10" style="font-size:12" onChange="checkingNumbers(this.form, '1')">&nbsp;to&nbsp;<input type="text" id="endpos1" value="$zoom_ce19_position" size="10" style="font-size:12" onChange="checkingNumbers(this.form, '1')"></td>
               <td style="padding:0px"><a href="JavaScript:changeboth()"><img src="img/update.png" id="changebothpos1" style="width:40px;height:35px;padding:0px;"></a></td></tr>
		</table>


                </th>
        </tr>

LOWERPANEL;


$lowercolors = array('F0F8FF','FFFAFA');
$lowerdiffcolorsname = array('aliceblue','snow');
	$lowerbgc = 0;

  for ($ddd=0; $ddd<$lower_draw_time;$ddd++) {
        echo "<tr id=\"lowerRow$ddd\">";
        if($lower_shape[$ddd] == "arrow") {
	echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$lowercolors[$lowerbgc]\"><i>Track Name</i>: $lower_res[$ddd] of $org2
&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"LOWCOLOR$ddd\" id=\"LOWCOLOR$ddd\" onChange=\"change_lower_image_colors()\">
  <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"lowertrackshape$ddd\" id=\"lowertrackshape$ddd\" onChange=\"change_lower_image_track_shapes()\">
 <option value=\"default\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>

<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$lower_res[$ddd]}_{$org2}_{$session_id}_image_{$ddd}.png");        
}

      else if($lower_shape[$ddd] == "box") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$lowercolors[$lowerbgc]\"><i>Track Name</i>: $lower_res[$ddd] of $org2
&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"LOWCOLOR$ddd\" id=\"LOWCOLOR$ddd\" onChange=\"change_lower_image_colors()\">
  <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"lowertrackshape$ddd\" id=\"lowertrackshape$ddd\" onChange=\"change_lower_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
 <option value=\"default\" SELECTED>box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>

<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$lower_res[$ddd]}_{$org2}_{$session_id}_image_{$ddd}.png");        
}

      else if($lower_shape[$ddd] == "christmasarrow") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$lowercolors[$lowerbgc]\"><i>Track Name</i>: $lower_res[$ddd] of $org2
&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"LOWCOLOR$ddd\" id=\"LOWCOLOR$ddd\" onChange=\"change_lower_image_colors()\">
  <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"lowertrackshape$ddd\" id=\"lowertrackshape$ddd\" onChange=\"change_lower_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
 <option value=\"default\" SELECTED>christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>

<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$lower_res[$ddd]}_{$org2}_{$session_id}_image_{$ddd}.png");
        }


	else if($lower_shape[$ddd] == "dashline") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$lowercolors[$lowerbgc]\"><i>Track Name</i>: $lower_res[$ddd] of $org2
&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"LOWCOLOR$ddd\" id=\"LOWCOLOR$ddd\" onChange=\"change_lower_image_colors()\">
  <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"lowertrackshape$ddd\" id=\"lowertrackshape$ddd\" onChange=\"change_lower_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
 <option value=\"default\" SELECTED>dashline</option>
  <option value=\"ellipse\">ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>

<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$lower_res[$ddd]}_{$org2}_{$session_id}_image_{$ddd}.png");
        }


        else if($lower_shape[$ddd] == "ellipse") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$lowercolors[$lowerbgc]\"><i>Track Name</i>: $lower_res[$ddd] of $org2
&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"LOWCOLOR$ddd\" id=\"LOWCOLOR$ddd\" onChange=\"change_lower_image_colors()\">
  <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"lowertrackshape$ddd\" id=\"lowertrackshape$ddd\" onChange=\"change_lower_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
 <option value=\"default\" SELECTED>ellipse</option>
  <option value=\"pentagram\">pentagram</option>
</select>

<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$lower_res[$ddd]}_{$org2}_{$session_id}_image_{$ddd}.png");
        }


        else if($lower_shape[$ddd] == "pentagram") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$lowercolors[$lowerbgc]\"><i>Track Name</i>: $lower_res[$ddd] of $org2
&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"LOWCOLOR$ddd\" id=\"LOWCOLOR$ddd\" onChange=\"change_lower_image_colors()\">
  <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image&nbsp;<font color=\"red\">|||</font>&nbsp;
<i>Select shape</i>:<select name=\"lowertrackshape$ddd\" id=\"lowertrackshape$ddd\" onChange=\"change_lower_image_track_shapes()\">
  <option value=\"arrow\">arrow</option>
  <option value=\"box\">box</option>
  <option value=\"christmasarrow\">christmasarrow</option>
  <option value=\"dashline\">dashline</option>
  <option value=\"ellipse\">ellipse</option>
 <option value=\"default\" SELECTED>pentagram</option>
</select>

<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$lower_res[$ddd]}_{$org2}_{$session_id}_image_{$ddd}.png");
        }

        else if($lower_shape[$ddd] == "xyplot") {
        echo "<td style=\"padding:0px\" colspan=\"3\" bgcolor=\"$lowercolors[$lowerbgc]\"><i>Track Name</i>: $lower_res[$ddd] of $org2
&nbsp;<font color=\"red\">|||</font>&nbsp;<i>Select color</i>:
  <select name=\"LOWCOLOR$ddd\" id=\"LOWCOLOR$ddd\" onChange=\"change_lower_image_colors()\">
  <option value=\"default\">default</option>
   <option value=\"blue\">blue</option>
  <option value=\"black\">black</option>
  <option value=\"chocolate\">chocolate</option>
  <option value=\"darkgreen\">darkgreen</option>
  <option value=\"firebrick\">firebrick</option>
  <option value=\"gray\">gray</option>
  <option value=\"magenta\">magenta</option>
  <option value=\"olive\">olive</option>
  <option value=\"purple\">purple</option>
  <option value=\"red\">red</option>
</select>&nbsp;<font color=\"red\">|||</font>&nbsp;Click here to drag and drop image
<input type=\"hidden\" name=\"lowertrackshape$ddd\" id=\"lowertrackshape$ddd\" value=\"default\">
<br />";
	array_push($merge_all_images, "syn/synteny_annotation_{$session_id_gene}/{$lower_res[$ddd]}_{$org2}_{$session_id}_image_{$ddd}.png");
        }


echo "<image id=\"Images$ddd\" src=\"Loimage.php?annid=$annotationidvalue&ref=$org1&zoomrefstart=$zoom_id_ref&zoomrefend=$zoom_hs19_position&query=$org2&zoomquerystart=$zoom_id_query&zoomqueryend=$zoom_ce19_position&session_id_gene=$session_id_gene&image=1200&annotationidimage=0&trackname=$lower_res[$ddd]&imagebgc=$lowerdiffcolorsname[$lowerbgc]&trackcolor=default&trackshape=default&imageid=$ddd&finalqueryvalue=$ce19_position\">
</td>";
        echo "</tr>";
	$lowerbgc++;
	if($lowerbgc > 1) {
	$lowerbgc = 0;
	}
    }

?>
	 <tr>
		<th><font size="5"><?php echo $org2; ?></font><br />
<?php
/*
new changed
*/
echo "<table id=\"panelcontrol\" class=\"bodypara\" border=\"0\" cellpadding=\"3\">";
echo "<tr><td><span style=\"color:662d91\"><b>Annotation tracks display <font color=\"008000\">on</font>/<font color=\"f26122\">off</font>:</b></span>(<font color=\"008000\"><b>Green = Track Visible</b></font> / <font color=\"f26122\"><b>Orange = Track Hidden</b></font>)<span class=\"formInfo\"><a href=\"hint.htm?width=375\" class=\"jTip\" id=\"nine\" name=''>?</a></span></td>";
for ($lower_rrdd=0; $lower_rrdd<$lower_draw_time;$lower_rrdd++) {
echo "<td colspan=\"3\"><font size=\"2\" color=\"008000\" id=\"lowerdisplaycolor$lower_rrdd\" class=\"arrow\" onclick=\"lowerdisplayRow($lower_rrdd)\">$lower_res[$lower_rrdd]</font></td>";
}
echo "</tr></table>";

?>

		</th>
        </tr>

</table>
<br />
<fieldset>
<legend><span style="color:662d91">Image Control Panel</span></legend>
<span style="color:black"><b>Image Width:</b></span>
<input type="radio" id="imageWidth0" name="imageWidth" value="800" onClick="setImage()">800
<input type="radio" id="imageWidth1" name="imageWidth" value="1200" onClick="setImage()" checked>1200
<input type="radio" id="imageWidth2" name="imageWidth" value="1600" onClick="setImage()">1600
<br />
<span style="color:black"><b>Display synteny regions as blocks or lines:</b></span>
<input type="radio" id="polygon1" name="polygon" value="0" onClick="setpolygon()" checked>Blocks
<input type="radio" id="polygon0" name="polygon" value="1" onClick="setpolygon()">Lines
<br />
<br />
<?php
echo "<b>Create image which includes:</b><br />";
echo $org1;
echo "<br />";
for ($vsg=0;$vsg<count($upper_res);$vsg++){
echo "<input type=\"checkbox\" name=\"idofimages$vsg\" id=\"idofimages$vsg\" value=\"$vsg\" checked> {$upper_res[$vsg]}\n";
}
echo "<br />";
echo "Synteny";
echo "<br />";
echo "<input type=\"checkbox\" name=\"idofimages$vsg\" id=\"idofimages$vsg\" value=\"$vsg\" checked> synteny\n";
echo "<br />";
$vsg++;
$vsg_sgv = count($upper_res) + count($lower_res);
$vgs = 0;
echo $org2;
echo "<br />";
for ($sgv=$vsg;$sgv<=$vsg_sgv;$sgv++){
echo "<input type=\"checkbox\" name=\"idofimages$sgv\" id=\"idofimages$sgv\" value=\"$sgv\" checked> {$lower_res[$vgs]}\n";
$vgs++;
}

?>
<br />
<br />
<input type="button" name="gencombinedimg" id="gencombinedimg" value="Create Image"><span class="formInfo"><a href="hint4.htm?width=375" class="jTip" id="ten" name=''>?</a></span>
<!--
<td colspan="3">
<input type="submit" name="gencombinedimg" id="gencombinedimg" value="Generate the image">
-->
<span class="success" style="display:none; font-size:14px">
       <br><br><b><u><a href="syn/synteny_annotation_<?php echo $session_id_gene; ?>/combined_image.png" target="_blank"/>Your image has been created and you can download it by clicking this link</a></u></b>
</span>
</fieldset>



<?php
$total_num_of_images = count($merge_all_images);
echo "<input type=\"hidden\" name=\"num_of_images\" id=\"num_of_images\" value=\"$total_num_of_images\">\n";
$serial_num = 0;
foreach($merge_all_images as $images_part) {
echo "<input type=\"hidden\" name=\"combinedimages$serial_num\" id=\"combinedimages$serial_num\" value=\"$images_part\">\n";
$serial_num++;
}

include("js_for_combined_image.php");
/*
$expire=time()+60*60*2;
$serial_num = 0;
foreach($merge_all_images as $images_part) {
setcookie("images_path[$serial_num]", $images_part, $expire);
$serial_num++;
}
*/
?>
<div id="disfooter">
<a href= "http://copyright.unt.edu/content/unt-copyright-resources" title="Copyright">Copyright</a>
&copy;&nbsp;UNT
</div>
</div>
</form>

