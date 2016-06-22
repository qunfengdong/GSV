
<table border="1px" class="tab" id="table-1" class="bodypara" id="movingTable" id="gallery" width="75%">
   <tr>
	 <th><font size="5"><?php echo $org1; ?></font><br />
		</th>  
        </tr>
<?php
if($hgf != 0) {
echo <<< YYAN
<tr><th><table><tr>
<td><i>Control panel for <br> BOTH genome</i></td>
<td style="padding:0px"><a href="JavaScript:getValue1('left','2')"><img src="img/GlobalPanLeftGreen.png" id="left2"  style="width:40px;height:35px;padding:0px;"></a></td>
<td style="padding:0px"><a href="JavaScript:getValue1('right','2')"><img src="img/GlobalPanRightGreen.png" id="right2"  style="width:40px;height:35px;padding:0px;"></a></td>
<td style="padding:0px"><a href="JavaScript:getValue1('zoomout','2')"><img src="img/GlobalZoomOutGreen.png" id="zoomoutpos2"  style="width:40px;height:35px;padding:0px;"></a></td>
<td style="padding:0px"><a href="JavaScript:getValue1('zoomin','2')"><img src="img/GlobalZoomInGreen.png" id="zoominpos2"  style="width:40px;height:35px;padding:0px;"></a></td>

<td align="right" style="padding:0px">
<i>filter synteny regions</i><span class="formInfo"><a href="hint2.htm?width=375" class="jTip" id="two" name=''>?</a></span>:</td><td style="padding:0px">

YYAN;
//$ddds = count($contain_list_of_filters);
echo "<select name=\"filtertypes\" id=\"filtertypes\" style=\"font-size:12;width=100px;\">";
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
$merge_all_images = array();
array_push($merge_all_images, "syn/synteny_{$session_id}/{$session_id}_synteny.png");


echo "<input type='text' name='filtervalue' size='9' maxlength='9' id='filtervalue' onChange=\"isNumeric(document.getElementById('filtervalue'), 'Numbers Only Please')\"/></td>";
echo "<td style=\"padding:0px\"><a href=\"JavaScript:updates_syn_data()\"><img src='img/GlobalUpdateGreen.png' id='valuefilter' style='width:40px;height:35px;padding:0px;'/></a></td>";
}


echo <<< UPPANEL
<td style="padding:0px"><input type="button" id="getview" value="View Entire Genomes" onclick="getcompleteview(1)"></td>
</tr><tr>
	    <td><i>Control panel for <br> TOP genome</i></td>
	    <td style="padding:0px"><a href="JavaScript:getValue('left','0')"><img src="img/PanLeft.png" id="left0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td style="padding:0px"><a href="JavaScript:getValue('right','0')"><img src="img/PanRight.png" id="right0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td style="padding:0px"><a href="JavaScript:getValue('zoomout','0')"><img src="img/zoomOut.png" id="zoomoutpos0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td style="padding:0px"><a href="JavaScript:getValue('zoomin','0')"><img src="img/zoomIn.png" id="zoominpos0"  style="width:40px;height:35px;padding:0px;"></a></td>
            <td align="right" style="padding:0px"><i>View synteny region between<span class="formInfo"><a href="hint3.htm?width=375" class="jTip" id="three" name=''>?</a></span>:</i></td>
            <td style="padding:0px"><input type="text" id="startpos0" value="$zoom_id_ref" size="9" style="font-size:12" onChange="checkingNumbers(this.form, '0')">&nbsp;to&nbsp;
                                        <input type="text" id="endpos0" value="$zoom_hs19_position" size="10" style="font-size:12;" onChange="checkingNumbers(this.form, '0')"></td>
            <td style="padding:0px"><a href="JavaScript:changebothsynonly()"><img src="img/update.png" id="changebothpos0" style="width:40px;height:35px;padding:0px;"></a></td>

UPPANEL;

echo <<< LEFTOVER
		</tr>
		</table>
               </th>
        </tr>
LEFTOVER;
	echo "<tr><td style=\"padding:0px\" colspan=\"5\">";

echo "<image id=\"image\" usemap=\"#syntenymap\" border= \"0\" src=\"drawsynimage.php?annid=$annotationidvalue&ref=$org1&zoomrefstart=$zoom_id_ref&zoomrefend=$zoom_hs19_position&query=$org2&zoomquerystart=$zoom_id_query&zoomqueryend=$zoom_ce19_position&session_id=$session_id&image=1200&polygon=0&finalrefend=$hs19_position&finalqueryend=$ce19_position&filtersign=default&filtertypes=length&filtervalue=1\" onload=\"ajaxGet()\">
</td>
</tr>";
echo "<input type=\"hidden\" name=\"imageMap_path\" id=\"imageMap_path\" value=\"syn/synteny_{$session_id}/syntenycords.txt\">\n";
//$each_cords = file_get_contents("syn/synteny_annotation_{$session_id}/syntenycords.txt");

echo <<<SYNMAP
<map name="syntenymap" id="syntenymap">

</map> 
SYNMAP;

echo <<< LOWERPANEL

         <tr>
                <th>
		<table>
		<tr>
		 <td><i>Control panel for <br> BOTTOM genome</i></td>
		<td style="padding:0px"><a href="JavaScript:getValue('left','1')"><img src="img/PanLeft.png" id="left1" style="width:40px;height:35px;padding:0px;"></a></td>
		<td style="padding:0px"><a href="JavaScript:getValue('right','1')"><img src="img/PanRight.png"  id="right1" style="width:40px;height:35px;padding:0px;"></a></td>
                <td style="padding:0px"><a href="JavaScript:getValue('zoomout','1')"><img src="img/zoomOut.png" id="zoomoutpos1" style="width:40px;height:35px;padding:0px;"></a></td>
                <td style="padding:0px"><a href="JavaScript:getValue('zoomin','1')"><img src="img/zoomIn.png" id="zoominpos1" style="width:40px;height:35px;padding:0px;"></a></td>
<td align="right"><i>View synteny region between<span class="formInfo"><a href="hint3.htm?width=375" class="jTip" id="four" name=''>?</a></span>:</i><td>
<td><input type="text" id="startpos1" value="$zoom_id_query" size="10" style="font-size:12" onChange="checkingNumbers(this.form, '1')">&nbsp;to&nbsp;<input type="text" id="endpos1" value="$zoom_ce19_position" size="10" style="font-size:12" onChange="checkingNumbers(this.form, '1')"></td>
               <td style="padding:0px"><a href="JavaScript:changebothsynonly()"><img src="img/update.png" id="changebothpos1" style="width:40px;height:35px;padding:0px;"></a></td></tr>
		</table>


                </th>
        </tr>

LOWERPANEL;
?>
	 <tr>
		<th><font size="5"><?php echo $org2; ?></font><br />
		</th>
        </tr>

</table>
<br />
<fieldset>
<legend><span style="color:662d91">Image Control Panel</span></legend>
<span style="color:662d91"><b>Image Width:</b></span>
<input type="radio" id="imageWidth0" name="imageWidth" value="800" onClick="setImage()">800
<input type="radio" id="imageWidth1" name="imageWidth" value="1200" onClick="setImage()" checked>1200
<input type="radio" id="imageWidth2" name="imageWidth" value="1600" onClick="setImage()">1600
<br />
<span style="color:662d91"><b>Display synteny regions as blocks or lines:</b></span>
<input type="radio" id="polygon1" name="polygon" value="0" onClick="setpolygon()" checked>Blocks
<input type="radio" id="polygon0" name="polygon" value="1" onClick="setpolygon()">Lines
<br />
<span style="color:662d91"><b>The synteny image can be downloaded</b></span> <a href=<?php echo $merge_all_images[0];?> target="_blank">here</a>
</fieldset>

<div id="disfooter">
<a href= "http://copyright.unt.edu/content/unt-copyright-resources" title="Copyright">Copyright</a>
&copy;&nbsp;UNT
</div>
</div>
</form>

