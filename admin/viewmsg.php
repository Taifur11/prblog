<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	header("Location:inbox.php");
}
?>
<?php 
if(!isset($_GET['viewid']) || $_GET['viewid']==NULL){
	header("Location:index.php");
}
else{
	$viewid=$_GET['viewid'];
}

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
			
                <div class="block">

<?php

$query="SELECT * FROM tbl_contact WHERE id='$viewid';";
$editpost=$db->select($query);
if($editpost){
	while($editpostrow=$editpost->fetch_assoc()){
		
?>

                 <form action="inbox.php" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>First Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['firstname'];?>" class="medium" name="firstname" readonly/>
                            </td>
                        </tr>
						
						
						<tr>
                            <td>
                                <label>Last Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['lastname'];?>" class="medium" name="lastname" readonly/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $format->dateFormat( $editpostrow['date']);?>" class="medium" name="date" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
								<?php echo $editpostrow['body'];?>
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['email'];?>" class="medium" name="email" readonly/>
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