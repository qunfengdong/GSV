<?php
function select_org() {
global $session_id,$database_name;
$link = create_connection();
//print('<span class=bodypara>Select the reference organism.</span>');
$sql = "select org1,org2 from {$session_id}synteny_1 group by org1,org2";
$result = execute_sql($database_name,$sql,$link);
print('<select name=Org1_ref id=Org1_ref class=bodypara style=width:220px width=100px>');
while($row = mysql_fetch_array($result, MYSQL_NUM)) {
$newvalues = $row[0];
$newvalues .= "-";
$newvalues .= $row[1];
$combinednewvalues = $row[0]." vs. ".$row[1];
print("<option value=".$newvalues.">$combinednewvalues</option>");
}
print('</select>');

/*
for ($i = 0; $i < mysql_num_rows($result); $i++)
           {
           $number[$i] = mysql_result($result, $i, "org1");
                     
           
print("<option value=".$number[$i].">$number[$i]</option>");


           }
           print('</select>');
*/
//print('<span class=bodypara>Select the query organism.</span>');
//$sql = "select org2 from {$session_id}synteny_1 where note = ".$session_id." group by org2";
//$result = execute_sql($database_name,$sql,$link);
//print('<select name=query id=Org2_query class=bodypara width=100px>');
/*
for ($i = 0; $i < mysql_num_rows($result); $i++)
           {
           $number[$i] = mysql_result($result, $i, "org2");
                    
           

print("<option value=".$number[$i].">$number[$i]</option>");
           }
           print('</select>');
*/
print("<input type=submit id=pbutton0 value=View name=submit>");
//print("<input type=button value=Go onClick=ajaxmysql()>");
}
?>
