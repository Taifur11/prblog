<?php include 'inc/header.php';?>
<?php
if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
    //echo "<script>window.location= 'index.php';</script>";
    header("Location: 404.php");
}else{
    $id=$_GET['pageid'];
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
<?php
    $showquery="SELECT * FROM tbl_page WHERE id='$id'";
    $pagedetail=$db->select($showquery);
    if ($pagedetail) {
    while ($result=$pagedetail->fetch_assoc()) {
?>
				<h2><?php echo $result['name'];?></h2>
	
				<?php echo $result['body'];?>
				
<?php }}else{
	header('Location:404.php');
} ?>				
	</div>

		</div>
		
		
		
	<?php include 'inc/sidebar.php';?>
	<?php include 'inc/footer.php';?>