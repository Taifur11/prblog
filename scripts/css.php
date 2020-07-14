<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
<?php
$query="SELECT * FROM  tbl_theme WHERE id='1';";
$result=$db->select($query);
while($row=$result->fetch_assoc()){
	if($row['name'] == 'default'){
?>

<link rel="stylesheet" href="theme/default.css">

	<?php } elseif ($row['name'] == 'green') { ?>
	
<link rel="stylesheet" href="theme/green.css">

<?php }  } ?>