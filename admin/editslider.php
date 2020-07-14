<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php 
if(!isset($_GET['editsliderid']) || $_GET['editsliderid']==NULL){
	header("Location:sliderlist.php");
}
else{
	$editsliderid=$_GET['editsliderid'];
}

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Slider</h2>
				
				
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$title=mysqli_real_escape_string($db->link,$_POST['title']);
	
	/* Image Upload */
	$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/slider".$unique_image;
	/* Image Upload */
	
	if($title=="") {
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
				move_uploaded_file($file_temp, $uploaded_image);
				$query="UPDATE tbl_slider
						SET
							title	= '$title',
							image	= '$uploaded_image'
							
						WHERE
							id='$editsliderid'";
						
				
				$updated_rows = $db->update($query);
				if ($updated_rows) {
				 echo "<span style='color:green;'>Slider Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Slider Not Updated !</span>";
				}
			}
		}else{
				$query="UPDATE tbl_post
						SET
							title	= '$title'
						WHERE
							id='$editsliderid';";
					
				$updated_rows = $db->update($query);
				if ($updated_rows) {
				 echo "<span style='color:green;'>Slider Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Slider Not Updated !</span>";
				}
		}
	}
}
?>
			
                <div class="block">

<?php
$query="SELECT * FROM tbl_slider WHERE id='$editsliderid';";
$editpost=$db->select($query);
if($editpost){
	while($editpostrow=$editpost->fetch_assoc()){
?>

                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['title'];?>" class="medium" name="title" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
								<img src="<?php echo $editpostrow['image'];?>" alt="" height="100" width="220"/><br/>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php }} ?>
                </div>
            </div>
        </div>
		
		
		
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		setupTinyMCE();
		setDatePicker('date-picker');
		$('input[type="checkbox"]').fancybutton();
		$('input[type="radio"]').fancybutton();
	});
</script>

<?php include 'inc/footer.php'?>