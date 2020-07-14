<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php

if(!isset($_GET['viewid']) || $_GET['viewid']==NULL){
    header("Location:userlist.php");
    
}
else{
    $userid=$_GET['viewid'];
}

?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>User Details</h2>
				
                <div class="block">

<?php
$query="SELECT * FROM tbl_user WHERE id='$userid';";
$editpost=$db->select($query);
if($editpost){
	while($editpostrow=$editpost->fetch_assoc()){
?>

                 <form action="userlist.php" method="post" enctype="multipart/form-data">
                    <table class="form">


                       <tr>
                            <td>
                                <label>User Role</label>
                            </td>
                            <td>
                                <input type="text" value="<?php
                                $role=$editpostrow['role'];
                                if($role==1){
                                    echo "Author";
                                }
                                elseif($role==2){
                                    echo "Admin";
                                }
                                elseif($role==3){
                                    echo "Editor";
                                }

                                  ?>" class="medium" name="role" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['name'];?>" class="medium" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['username'];?>" class="medium" readonly />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="deatils" readonly>
								<?php echo $editpostrow['deatils']; ?>
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" value="<?php echo $editpostrow['email'];?>" class="medium" name="email" />
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