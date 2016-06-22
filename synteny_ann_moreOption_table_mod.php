<div id="body">

<p class="bodypara">
<?php
echo "<table class=\"bodypara\" width=\"100%\"><tr>";
echo "<td colspan=\"3\"><span style=\"color:662d91\"><b>Select Reference and Query Genomes:</b></span>&nbsp;&nbsp;";
select_org();
echo "</td>";
echo"</tr>";
echo "</table>";
?>
<?php
/*
if($upper_draw_time >= 1 && $lower_draw_time == '') {
echo "<table id=\"panelcontrol\" class=\"bodypara\" border=\"0\" cellpadding=\"3\">";
echo "<tr><td><span style=\"color:662d91\"><b>Tracks On/Off:</b></span>(note <font color=\"008000\"><b>green</b></font> is showing and <font color=\"f26122\"><b>orange</b></font> is hidden)<span class=\"formInfo\"><a href=\"hint.htm?width=375\" class=\"jTip\" id=\"one\" name=''>?</a></span></td></tr><tr><table id=\"panelcontrol\" border=\"1\" cellpadding=\"3\"><tr><td colspan=\"3\">$org1</td>";
for ($rrdd=0; $rrdd<$upper_draw_time;$rrdd++) {
echo "<td colspan=\"3\"><font size=\"2\" color=\"008000\" id=\"upperdisplaycolor$rrdd\" class=\"arrow\" onclick=\"upperdisplayRow($rrdd)\">$upper_res[$rrdd]</font></td>";
}
echo "</tr></table></tr></table>";
}
*/
/*
elseif ($lower_draw_time >= 1 && $upper_draw_time == '') {
echo "<table id=\"panelcontrol\" class=\"bodypara\" border=\"0\" cellpadding=\"3\">";
echo "<tr><td><span style=\"color:662d91\"><b>Tracks On/Off:</b></span>(note <font color=\"008000\"><b>green</b></font> is showing and <font color=\"f26122\"><b>orange</b></font> is hidden)<span class=\"formInfo\"><a href=\"hint.htm?width=375\" class=\"jTip\" id=\"one\" name=''>?</a></span></td></tr><tr><table id=\"panelcontrol\" border=\"1\" cellpadding=\"3\"><tr><td colspan=\"3\">$org2</td>";
for ($lower_rrdd=0; $lower_rrdd<$lower_draw_time;$lower_rrdd++) {
echo "<td colspan=\"3\"><font size=\"2\" color=\"008000\" id=\"lowerdisplaycolor$lower_rrdd\" class=\"arrow\" onclick=\"lowerdisplayRow($lower_rrdd)\">$lower_res[$lower_rrdd]</font></td>";
}
echo "</tr></table></tr></table>";

}
*/
/*
elseif ($upper_draw_time >= 1 && $lower_draw_time >= 1) {
echo "<table id=\"panelcontrol\" class=\"bodypara\" border=\"0\" cellpadding=\"3\">";
echo "<tr><td><span style=\"color:662d91\"><b>Tracks On/Off:</b></span>(note <font color=\"008000\"><b>green</b></font> is showing and <font color=\"f26122\"><b>orange</b></font> is hidden)<span class=\"formInfo\"><a href=\"hint.htm?width=375\" class=\"jTip\" id=\"one\" name=''>?</a></span></td></tr><tr><table id=\"panelcontrol\" border=\"1\" cellpadding=\"3\"><tr><td colspan=\"3\">$org1</td>";

for ($rrdd=0; $rrdd<$upper_draw_time;$rrdd++) {
echo "<td colspan=\"3\"><font size=\"2\" color=\"008000\" id=\"upperdisplaycolor$rrdd\" class=\"arrow\" onclick=\"upperdisplayRow($rrdd)\">$upper_res[$rrdd]</font></td>";
}

echo "</tr><tr><td colspan=\"3\">$org2</td>";

for ($lower_rrdd=0; $lower_rrdd<$lower_draw_time;$lower_rrdd++) {
echo "<td colspan=\"3\"><font size=\"2\" color=\"008000\" id=\"lowerdisplaycolor$lower_rrdd\" class=\"arrow\" onclick=\"lowerdisplayRow($lower_rrdd)\">$lower_res[$lower_rrdd]</font></td>";
}

echo "</tr></table></tr></table>";
}
*/
//echo "<br />";
//echo "<table class=\"bodypara\" width=\"100%\"><tr>";
//echo "<td colspan=\"3\"><span style=\"color:662d91\"><b>Select the reference and query organism:</b></span>&nbsp;&nbsp;";
//echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//select_org();
//echo "</td>";
//echo"</tr>";

?>
<!--
<table class="bodypara" width="100%">

<tr>
      <td colspan="2"><span style="color:black"><b>Display synteny regions as blocks or lines:</b></span>
      <input type="radio" id="polygon1" name="polygon" value="0" onClick="setpolygon()" checked>Blocks
      <input type="radio" id="polygon0" name="polygon" value="1" onClick="setpolygon()">Lines
        </td>
  </tr>

  <tr>
       <td colspan="2"><span style="color:662d91"><b>Image Width:</b></span>
	<input type="radio" id="imageWidth0" name="imageWidth" value="800" onClick="setImage()">800
      <input type="radio" id="imageWidth1" name="imageWidth" value="1200" onClick="setImage()" checked>1200
      <input type="radio" id="imageWidth2" name="imageWidth" value="1600" onClick="setImage()">1600
      </td>
	</tr>

</table>

<br />
-->
