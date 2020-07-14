<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php 
	  $db=new Database();
	  $format=new Format();
?>



<!DOCTYPE html>
<html>
<head>
<?php
if (isset($_GET['pageid'])){
    $id=$_GET['pageid'];

$showquery="SELECT * FROM tbl_page WHERE id='$id';";
$pagetitle=$db->select($showquery);
if ($pagetitle) {
while ($result=$pagetitle->fetch_assoc()){
?>
	<title>
	
	<?php echo $result['name'];?> | <?php echo SITETITLE;?>
	
	</title>
	<?php }}}
	
	elseif(isset($_GET['id'])){
		
$idpost=$_GET['id'];
$showquery="SELECT * FROM tbl_post WHERE id='$idpost';";
$posttitle=$db->select($showquery);
if ($posttitle) {
while ($result=$posttitle->fetch_assoc()){
?>

	<title>
	
	<?php echo $result['title'];?> | <?php echo SITETITLE;?>
	
	</title>
	<?php }}}
	
	else{ ?> 
	<title>
	
	<?php echo $format->title();?> | <?php echo SITETITLE;?>
	
	</title>
	<?php }?>
	
	<?php include 'scripts/meta.php';?>
	<?php include 'scripts/css.php';?>
	<?php include 'scripts/js.php';?>
	

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
			
<?php
$query="SELECT * FROM tbl_titleslogan WHERE id=1;";
$result=$db->select($query);
if($result){
	while($row=$result->fetch_assoc()){

?>		

			
			
			
			
				<img src="admin/<?php echo $row['logo'];?>" alt="Logo"/>
				<h2><?php echo $row['title'];?></h2>
				<p><?php echo $row['slogan'];?></p>

			
<?php } } ?>				
				

			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
			
			
<?php 
$query="SELECT * FROM tbl_social WHERE id=1;";
$result=$db->select($query);
if($result){
	while($row=$result->fetch_assoc()){

?>
			
				<a href="<?php echo $row['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['gg'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
<?php } } ?>				
				
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">

<?php 
$path=$_SERVER['SCRIPT_FILENAME'];
$title=basename($path,'.php');
?>



	<ul>
		<li><a <?php if($title=='index'){ echo 'id="active"';}?> href="index.php">Home</a></li>
<?php
$query="SELECT * FROM tbl_page;";
$res=$db->select($query);
if($res){
	while($rows=$res->fetch_assoc()){		
?>	

		<li>
		
		<a 
		<?php 
			if (isset($_GET['pageid']) && $_GET['pageid']== $rows['id']){
				echo 'id="active"';
			}
		?>
		
		href="page.php?pageid=<?php echo $rows['id'];?>">
		
		<?php echo $rows['name']; ?>
		
		</a>
		</li>
		
<?php }}?>
		<li><a <?php if($title=='contact'){ echo 'id="active"';}?> href="contact_us.php">Contact Us</a></li>
	</ul>
</div>