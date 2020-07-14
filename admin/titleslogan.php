<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>



<div class="grid_10">

	<div class="box round first grid">
		<h2>Update Site Title and Description</h2>
		
		
		
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$title = mysqli_real_escape_string($db->link,$_POST['title']);
	$slogan = mysqli_real_escape_string($db->link,$_POST['slogan']);
	
	
	$permited  = array('png');
    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_temp = $_FILES['logo']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_logo = 'logo'.'.'.$file_ext;
    $uploaded_logo = "upload/".$unique_logo;
	
	
	if($title=="" || $slogan=="") {
		echo "<span style='color:red;'>Field Must Not Empty!!</span>";
	}
	else{
		if(!empty($file_name)){
			
			if ($file_size >1048567) {
				echo "<span style='color:red;'>Fiele Size Must Not Be larger Than 1MB!!</span>";
			}
			elseif (in_array($file_ext, $permited) === false) {
				 echo "<span style='color:red;'>You can upload only:-"
				 .implode(', ', $permited)."</span>";
			}
			else{
				move_uploaded_file($file_temp, $uploaded_logo);
				$query=" UPDATE tbl_titleslogan
						SET
							title		= '$title',
							slogan	= '$slogan',
							logo	= '$uploaded_logo'
				
						WHERE
							id=1; ";
						
				
				$updated_row = $db->update($query);
				if ($updated_row) {
				 echo "<span style='color:green;'>Website Title Slogan Information Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Website Title Slogan Information Not Updated !</span>";
				}
			}
		}else{
				$query=" UPDATE tbl_titleslogan
						SET
							title		= '$title',
							slogan	= '$slogan'
							
						WHERE
							id=1; ";
					
				$updated_row = $db->update($query);
				if ($updated_row) {
				 echo "<span style='color:green;'>Post Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Post Not Updated !</span>";
				}
		}
	}
}
?>
		
		
		
		
		
		
<div class="block sloginblock">

<form action="" method="post" enctype="multipart/form-data">
		 
<?php
$query="SELECT * FROM tbl_titleslogan WHERE id=1;";
$res=$db->select($query);
if($res){
	while($rows=$res->fetch_assoc()){
		
?>		 
<table class="form">					
	<tr>
		<td>
			<label>Website Title</label>
		</td>
		<td>
			<input type="text" value="<?php echo $rows['title'];?>"  name="title" class="medium" />
		</td>
	</tr>
	 <tr>
		<td>
			<label>Website Slogan</label>
		</td>
		<td>
			<input type="text" value="<?php echo $rows['slogan'];?>" name="slogan" class="medium" />
		</td>
	</tr>
	<tr>
		<td>
			<label>Upload Logo</label>
		</td>
		<td>
			
			<img src="<?php echo $rows['logo']; ?>" alt="" height="80" width="200"/><br/>
			
			<input type="file" name="logo"/>
		</td>
	</tr>
	 
	
	 <tr>
		<td>
		</td>
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