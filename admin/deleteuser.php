<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php 
	  $db=new Database();
?>
<?php 
if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL){
	header("Location:userlist.php");
}
else{
	$deleteid=$_GET['deleteid'];
	$query1="DELETE FROM tbl_user WHERE id='$deleteid';";
	$delpostresult=$db->delete($query1);
	if($delpostresult){
		echo "<span style='color:green;'>User Deleted Succsessfully!!</span>";
		header("Location:userlist.php");
	}
	else{
		echo "<span style='color:red;'>User Not Deleted !!!</span>";
		header("Location:userlist.php");
	}
}
?>