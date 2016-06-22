<?php
 
if($step==1){
	$err = null;
	$err = $_GET["err"];
	if($err!==null)
		$errMsg = "Could not connect to the database, see error message below:<br>".$_SESSION["mysqlErr"];
		?>
		<div class="install-err">
			<?php echo $errMsg;?>
		</div>
		<div class="install-db-form">
		<form action="?step=2" method="post">
			<table border="0">
			  <tr>
					<td colspan="5">MySQL Server Hostname (i.e., the server where your MySQL is running, e.g., localhost):</td>
					<td><input class="txt" type="text" name="dbhost" id="dbhost" value="localhost" /></td>
				</tr>
				<tr>
					<td colspan="5">
						MySQL User Name (i.e., the database name specified in dbtools.php) 
					</td>
					<td><input class="txt" type="text" name="dbuser" id="dbuser" value="gsvuser"/></td>
				</tr>
				<tr>
					<td colspan="5">MySQL Password (i.e., the user name specified in dbtools.php)</td>
					<td><input class="txt" type="password" name="dbpass" id="dbpass" value="gsvpass" /></td>
				</tr>
				<tr>
					<td colspan="5">MySQL Database (i.e., the password specified in dbtools.php)</td>
					<td><input class="txt" type="text" name="dbname" id="dbname" value="gsv" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="5">
						<label><input class="btn" type="submit" name="button" id="button" value="Proceed to next step" /></label>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php
}	elseif($step==2)	{
	$dbhost = $_POST["dbhost"];
	$dbuser = $_POST["dbuser"];
	$dbpass = $_POST["dbpass"];
	$dbname = $_POST["dbname"];
	$_SESSION['dbname'] = $dbname;	
	$_SESSION['dbhost'] = $dbhost;	
	$_SESSION['dbuser'] = $dbuser;	
	$_SESSION['dbpass'] = $dbpass;	
	$conn = @mysql_connect($dbhost,$dbuser,$dbpass);
	$db_selected = @mysql_select_db($dbname, $conn);

	$boolean_check = 0;

	?>
	<h5>Prerequisites</h5>
	This verifies installation of prequisites as described in INSTALLATION file.<br><br>
	<table>
	<tr>
		<td style="width:300px">Apache Web server</td>
		<td><span style="color: green;"> Working </span></td>
	</tr>
	<tr>
		<td>PHP Installation</td>
		<td>
		<?php 
			$retval =  exec('which php');
			if ($retval == ""){
				$boolean_check++;
				echo "<span style=\"color:red\"> Not Installed</span>";
			} else {
				echo "<span style=\"color:green\"> Installed</span>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td>MySQL Installation</td>
		<td>                             
			<?php 
			$retval =  exec('which mysql');
			if ($retval == ""){
				$boolean_check++;
				echo "<span style=\"color:red\"> Not Installed</span>"; 
			} else {
				echo "<span style=\"color:green\"> Installed</span>";
			}
			?>
		</td>
	</tr>
	<tr>
		<td>PHP GD library</td>
		<td>
		<?php
			if (extension_loaded('gd') && function_exists('gd_info')) {
		?>
		<img src="create_image.php" ><span style="color:green"> Installed if you see a green box</span>
		<?php
			} else {
				$boolean_check++;
				echo "Not installed";
			}
		?>
		</td>
	</tr>
	</table>

	<h5>Database Setup</h5>	
	This verifies MySQL connection and presence of 'userinfo' table for GSV.<br><br>
	<table>
	  <tr>
		<td style="width:300px">MySQL Database connection</td>
	<?php
	$dbname = $_SESSION['dbname'];
	$dbhost = $_SESSION['dbhost'];
	$dbuser = $_SESSION['dbuser'];
	$dbpass = $_SESSION['dbpass'];
	$conn = @mysql_connect($dbhost,$dbuser,$dbpass);
	
	function table_exists ( $table, $dbname) {
		$dbname = $_SESSION['dbname'];
		$dbhost = $_SESSION['dbhost'];
		$dbuser = $_SESSION['dbuser'];
		$dbpass = $_SESSION['dbpass'];
		
		$conn = @mysql_connect($dbhost,$dbuser,$dbpass);
		$tables = mysql_list_tables ($dbname); 
		while (list ($temp) = mysql_fetch_array ($tables)) {
			if ($temp == $table) {
				return TRUE;
			}
		}
		return FALSE;
	}
?>
    <td>
		<?php                   
		if(!$conn) {                          
			$boolean_check++;
			echo "<span style=\"color:red\"> Not Working</span>";                             
		} else {                                        
			echo "<span style=\"color:green\"> Working</span>";                                           
		}                                                     
		?>                                                          
		</td>                                                           
		</tr>
		<tr>
		<td>MySQL Table <i>userinfo</i></td>
		<td>
		<?php
			if( table_exists( 'userinfo', $_SESSION['dbname'])) { 
				echo "<span style=\"color:green\">Present</span>";
			} else {
				$boolean_check++;
				echo "<span style=\"color:red\">Absent</span>";
			}
		?>
		</td>
		</table>


	<h5>Check permissions and presence of file</h5>
	To verify the setup of folders and files required for GSV.<br><br>
	<table>
		<tr>
		<td style="width:300px">Writable permissions for gsv/syn folder</td>
		<td>
			<?php
			$folder= $uploadpath;
			if (is_writable($folder)) {
      	echo  "<span style=\"color:green\">Writable</span>";
      } else {
				$boolean_check++;
				echo "<span style=\"color:red\">Not writable</span>";
      }
			?>
		</td>
		</tr><tr>
		<td>Required font library <?php echo $filename ?></td>
		<td>
		<?php
			$filename = '/usr/share/fonts/truetype/Arial.ttf';
			if (file_exists($filename)) {
				echo  "<span style=\"color:green\">Present</span>";
      } else {
				$boolean_check++;
				echo "<span style=\"color:red\">Absent</span>";
      }
		?>
		</td>
		</tr>
		</table>
</p>
<?php
		if ($boolean_check == 0){
		?>
		<div class="install-db-form">
		<form action="<?php echo $rootURL; ?>homepage.php" method="post">
		<input class="btn" type="submit" name="button" id="button" value="Start using GSV" />
		</form>
		</div>
	<?php
			} else {
				echo "<span style=\"color:red\">Installation of GSV is incomplete. Please refer to INSTALLATION guide to install correctly.</span>";
			}
			?>

<?php
}else
{
	$_SESSION["expURL"] = $_SERVER['PHP_SELF'];
?>
    <table><tr><td>
	<img src="<?php echo $imgURL?>/attention.png" align="absbottom" />
    </td>
    <td>The GSV requires database in order to run. <a style="color:green;" href="<?php echo $installURL?>/gsv/Install/index.php?step=1">Click here to install now!</a></td>
    </tr></table>
<?php
}

?>
