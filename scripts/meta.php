


<meta name="language" content="English">
<meta name="description" content="It is a website about education">
<?php
if (isset($_GET['id'])){
    $keyid=$_GET['id'];

$showquery="SELECT * FROM tbl_post WHERE id='$keyid';";
$pagetitle=$db->select($showquery);
if ($pagetitle) {
while ($result=$pagetitle->fetch_assoc()){
?>	
	<meta name="keywords" content="<?php echo $result['tags'];?>">
<?php } } }else{ ?>
	<meta name="keywords" content="<?php echo METAKEYWORDS;?>">
<?php } ?>	
	<meta name="author" content="Delowar">
