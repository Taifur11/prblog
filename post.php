<?php include 'inc/header.php';?>
<?php
if((!isset($_GET['id'])) or ($_GET['id']==NULL)){
	header("Location:404.php");
}
else{
	$id=$_GET['id'];
}


?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php 
			$query="SELECT * FROM tbl_post WHERE id=$id;";
			$post=$db->select($query);
			if($post){
				while($result = $post->fetch_assoc()){
			
			?>
			
					<h2><?php echo $result['title'];?></h2>
					<h4><?php echo $format->dateFormat($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
					<img src="admin/<?php echo $result['image'];?>" alt="post image"/>
					<?php echo $result['body'];?>
					
					
					
				
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					
					<?php
					
						$catid=$result['cat'];
						$query_related="SELECT * FROM tbl_post WHERE cat='$catid' ORDER BY rand() LIMIT 6;";
						$post_related=$db->select($query_related);
						if($post_related){
							while($result_related = $post_related->fetch_assoc()){
					
					?>
					
					
					
					<a href="post.php?id=<?php echo $result_related['id'];?>">
					<img src="admin/<?php echo $result_related['image'];?>" alt="post image"/>
					</a>
					
						<?php }}else{ echo"No related Post Available";}?>
					
					
				</div>
				<?php }}else{header("Location:404.php");}?>
				
	</div>

		</div>
		<?php include 'inc/sidebar.php';?>
	<?php include 'inc/footer.php';?>