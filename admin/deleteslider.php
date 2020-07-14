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
if(!isset($_GET['delsliderid']) || $_GET['delsliderid']==NULL){
	header("Location:sliderlist.php");
}
else{
	$delsliderid=$_GET['delsliderid'];
	$query="SELECT * FROM tbl_slider WHERE id='$delsliderid';";
	$resultdelete=$db->select($query);
	while($delimg=$resultdelete->fetch_assoc()){
		$dellink=$delimg['image'];
		unlink($dellink);
	}
	$query1="DELETE FROM tbl_slider WHERE id='$delsliderid';";
	$delpostresult=$db->delete($query1);
	if($delpostresult){
		echo "<span style='color:green;'>Slider Deleted Succsessfully!!</span>";
		header("Location:sliderlist.php");
		
	}
	else{
		echo "<span style='color:red;'>Slider Not Deleted Succsessfully!!</span>";
		header("Location:sliderlist.php");
		
	}
}
?>