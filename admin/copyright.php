<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<div class="grid_10">

	<div class="box round first grid">
		<h2>Update Copyright Text</h2>
		
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$copyright=$format->validation($_POST['copyright']);
	
	$copyright = mysqli_real_escape_string($db->link,$copyright);
	
	
	if($copyright=="") {
		echo "<span style='color:red;'>Field Must Not Empty!!</span>";
	}
	else{
				$query=" UPDATE tbl_footer
						SET
							copyright		= '$copyright'
						WHERE
							id=1; ";

				$updated_row = $db->update($query);
				if ($updated_row) {
				 echo "<span style='color:green;'>Copyright Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Copyright Not Updated !</span>";
				}
		}
}
?>
		
		
		
		<div class="block copyblock"> 
		 <form action="copyright.php" method="post">

<?php
$query="SELECT * FROM tbl_footer WHERE id=1;";
$res=$db->select($query);
if($res){
	while($rows=$res->fetch_assoc()){
		
?>
			<table class="form">					
				<tr>
					<td>
						<input type="text" value="<?php echo $rows['copyright'];?>" name="copyright" class="large" />
					</td>
				</tr>
				
				 <tr> 
					<td>
						<input type="submit" name="submit" Value="Update" />
					</td>
				</tr>
			</table>
<?php }}?>
			</form>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'?>