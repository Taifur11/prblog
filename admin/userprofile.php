<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php 
$userid=Session::get('userID');
$userrole=Session::get('userRole');
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Profile</h2>
				
				
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	$username=mysqli_real_escape_string($db->link,$_POST['username']);
	$email=mysqli_real_escape_string($db->link,$_POST['email']);
	$deatils=mysqli_real_escape_string($db->link,$_POST['deatils']);

				$query="UPDATE tbl_user
						SET
							name		= '$name',
							username	= '$username',
							email	= '$email',
							deatils	= '$deatils'
						WHERE
							id='$userid';";
					
				$updated_rows = $db->update($query);
				if ($updated_rows) {
				 echo "<span style='color:green;'>Profile Updated Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Profile Not Updated !</span>";
				}
		}
?>
			
                <div class="block">

<?php
$query="SELECT * FROM tbl_user WHERE id='$userid' AND role='$userrole';";
$editpost=$db->select($query);
if($editpost){
	while($editpostrow=$editpost->fetch_assoc()){
?>

                 <form action="userprofile.php" method="post" enctype="multipart/form-data">
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
                                <input type="text" value="<?php echo $editpostrow['name'];?>" class="medium" name="name" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="deatils">
								<?php echo $editpostrow['deatils']; ?>
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['username'];?>" class="medium" name="username" />
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