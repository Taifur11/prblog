<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php 
	  $db=new Database();
?>
<?php 
if(!isset($_GET['delpage']) || $_GET['delpage']==NULL){
	header("Location:index.php");
}
else{
	$delpage=$_GET['delpage'];
	$query="SELECT * FROM tbl_page WHERE id='$delpage';";
	$resultdelete=$db->select($query);
	while($delimg=$resultdelete->fetch_assoc()){
	}
	$query1="DELETE FROM tbl_page WHERE id='$delpage';";
	$delpostresult=$db->delete($query1);
	if($delpostresult){
		echo "<span style='color:green;'>Page Deleted Succsessfully!!</span>";
		header("Location:index.php");
		
	}
	else{
		echo "<span style='color:red;'>Page Not Deleted Succsessfully!!</span>";
		header("Location:index.php");
		
	}
}
?>