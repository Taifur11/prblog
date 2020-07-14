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
if(!isset($_GET['delpostid']) || $_GET['delpostid']==NULL){
	header("Location:postlist.php");
}
else{
	$delpostid=$_GET['delpostid'];
	$query="SELECT * FROM tbl_post WHERE id='$delpostid';";
	$resultdelete=$db->select($query);
	while($delimg=$resultdelete->fetch_assoc()){
		$dellink=$delimg['image'];
		unlink($dellink);
	}
	$query1="DELETE FROM tbl_post WHERE id='$delpostid';";
	$delpostresult=$db->delete($query1);
	if($delpostresult){
		echo "<span style='color:green;'>Post Deleted Succsessfully!!</span>";
		header("Location:postlist.php");
		
	}
	else{
		echo "<span style='color:red;'>Post Not Deleted Succsessfully!!</span>";
		header("Location:postlist.php");
		
	}
}
?>