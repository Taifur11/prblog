<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php 
if(!isset($_GET['viewpostid']) || $_GET['viewpostid']==NULL){
	header("Location:postlist.php");
}
else{
	$viewpostid=$_GET['viewpostid'];
}

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Post View</h2>
				
				

                <div class="block">

<?php
$query="SELECT * FROM tbl_post WHERE id='$viewpostid';";
$viewpost=$db->select($query);
if($viewpost){
	while($viewpostrow=$viewpost->fetch_assoc()){
?>

                 <form action="postlist.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $viewpostrow['title'];?>" class="medium" readonly />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" readonly>
								<option>Select Category </option>
								
<?php
$query="SELECT * FROM tbl_category;";
$result=$db->select($query);
if($result){
	while($row=$result->fetch_assoc()){

?>
								<option 
								<?php
									if($row['id']==$viewpostrow['cat']){
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
								<img src="<?php echo $viewpostrow['image'];?>" alt="" height="80" width="200"/><br/>
                                <input type="file" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" readonly>
								<?php echo $viewpostrow['body'];?>
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $viewpostrow['author'];?>" class="medium" readonly />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $viewpostrow['tags'];?>" class="medium" readonly />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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