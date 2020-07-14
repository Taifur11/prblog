<div class="slidersection templete clear">
        <div id="slider">
		
<?php

$query="SELECT * FROM tbl_slider ORDER BY id ASC LIMIT 5;";
$post=$db->select($query);
if($post){
	while($result=$post->fetch_assoc()) {
?>
            <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['tittle'];?>" title="<?php echo $result['title'];?>" /></a>
<?php }}
?>          
        </div>

</div>