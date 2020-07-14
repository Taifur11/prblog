<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>

				
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$fb=$format->validation($_POST['fb']);
	$tw=$format->validation($_POST['tw']);
	$ln=$format->validation($_POST['ln']);
	$gg=$format->validation($_POST['gg']);
	
	$fb = mysqli_real_escape_string($db->link,$fb);
	$tw = mysqli_real_escape_string($db->link,$tw);
	$ln = mysqli_real_escape_string($db->link,$ln);
	$gg = mysqli_real_escape_string($db->link,$gg);
	
	
	
	if($fb=="" || $tw=="" || $ln=="" || $gg=="") {
		echo "<span style='color:red;'>Field Must Not Empty!!</span>";
	}
	else{
				$query=" UPDATE tbl_social
						SET
							fb		= '$fb',
							tw	= '$tw',
							ln	= '$ln',
							gg	= '$gg'
						WHERE
							id=1; ";

				$updated_row = $db->update($query);
				if ($updated_row) {
				 echo "<span style='color:green;'>Social Media Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Social Media Not Updated !</span>";
				}
		}
}
?>
				
                <div class="block">               
                 <form action="" method="post">
<?php
$query="SELECT * FROM tbl_social WHERE id=1;";
$res=$db->select($query);
if($res){
	while($row=$res->fetch_assoc()){
		
?>	
	<table class="form">					
		<tr>
			<td>
				<label>Facebook</label>
			</td>
			<td>
				<input type="text" name="fb" value="<?php echo $row['fb']?>" class="medium" />
			</td>
		</tr>
		 <tr>
			<td>
				<label>Twitter</label>
			</td>
			<td>
				<input type="text" name="tw" value="<?php echo $row['tw']?>" class="medium" />
			</td>
		</tr>
		
		 <tr>
			<td>
				<label>LinkedIn</label>
			</td>
			<td>
				<input type="text" name="ln" value="<?php echo $row['ln']?>" class="medium" />
			</td>
		</tr>
		
		 <tr>
			<td>
				<label>Google Plus</label>
			</td>
			<td>
				<input type="text" name="gg" value="<?php echo $row['gg']?>" class="medium" />
			</td>
		</tr>
		
		 <tr>
			<td></td>
			<td>
				<input type="submit" name="submit" Value="Update" />
			</td>
		</tr>
	</table>
<?php }
}?>
                    </form>
                </div>
            </div>
        </div>
		
		
<?php include 'inc/footer.php'?>
