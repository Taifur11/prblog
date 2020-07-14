<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>

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
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$to=$format->validation($_POST['to']);
	$from=$format->validation($_POST['from']);
	$subject=$format->validation($_POST['subject']);
	$msg=$format->validation($_POST['to']);
	$sendmail=mail($to,$subject,$msg,$from);
	if($sendmail){ echo "<span style='color:green;'>Message Sent Successfully!!</span>"; }
	else{ echo "<span style='color:red;'>Message Not Sent!!</span>"; }
}
?>
                <h2>Reply Message</h2>
			
                <div class="block">

<?php

$query="SELECT * FROM tbl_contact WHERE id='$viewid';";
$editpost=$db->select($query);
if($editpost){
	while($editpostrow=$editpost->fetch_assoc()){
		
?>

                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>TO</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $editpostrow['email'];?>" class="medium" name="to" readonly/>
                            </td>
                        </tr>
						
						
						<tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" placeholder="admin@gmail.com" class="medium" name="from" readonly/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Subject Will Goes Here" class="medium" name="subject" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="msg">
								
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Reply" />
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