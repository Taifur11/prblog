<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php 
if(!isset($_GET['editpostid']) || $_GET['editpostid']==NULL){
	header("Location:postlist.php");
}
else{
	$editpostid=$_GET['editpostid'];
}

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
				
				
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$title=mysqli_real_escape_string($db->link,$_POST['title']);
	$cat=mysqli_real_escape_string($db->link,$_POST['cat']);
	$body=mysqli_real_escape_string($db->link,$_POST['body']);
	$tags=mysqli_real_escape_string($db->link,$_POST['tags']);
	$author=mysqli_real_escape_string($db->link,$_POST['author']);
	$userid=mysqli_real_escape_string($db->link,$_POST['userid']);
	
	/* Image Upload */
	$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
	/* Image Upload */
	
	if($title=="" || $cat=="" || $body=="" || $tags=="" || $author=="") {
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
				$query="UPDATE tbl_post
						SET
							cat		= '$cat',
							title	= '$title',
							body	= '$body',
							image	= '$uploaded_image',
							author	= '$author',
							tags	= '$tags',
							userid	= '$userid'
						WHERE
							id='$editpostid'";
						
				
				$updated_rows = $db->update($query);
				if ($updated_rows) {
				 echo "<span style='color:green;'>Post Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Post Not Updated !</span>";
				}
			}
		}else{
				$query="UPDATE tbl_post
						SET
							cat		= '$cat',
							title	= '$title',
							body	= '$body',
							author	= '$author',
							tags	= '$tags',
							userid	= '$userid'
						WHERE
							id='$editpostid';";
					
				$updated_rows = $db->update($query);
				if ($updated_rows) {
				 echo "<span style='color:green;'>Post Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Post Not Updated !</span>";
				}
		}
	}
}
?>
			
                <div class="block">

<?php
$query="SELECT * FROM tbl_post WHERE id='$editpostid';";
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
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
								<option>Select Category </option>
								
<?php
$query="SELECT * FROM tbl_category;";
$result=$db->select($query);
if($result){
	while($row=$result->fetch_assoc()){

?>
								<option 
								<?php
									if($row['id']==$editpostrow['cat']){
								?>
								selected="selected"
								<?php }?>
								value="<?php echo $row['id'];?>"
								>
								
									<?php echo $row['name'];?>
								
								</option>
<?php }}?>                                  
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
								<img src="<?php echo $editpostrow['image'];?>" alt="" height="80" width="200"/><br/>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
								<?php echo $editpostrow['body'];?>
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['author'];?>" class="medium" name="author" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['tags'];?>" class="medium" name="tags" />
                            </td>
                        </tr>
                        
                                <input type="text" value="<?php echo $userid=Session::get("userID");?>" class="medium" name="userid" hidden/>
                            
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php }}?>
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