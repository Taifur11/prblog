<?php include 'inc/header.php';?>
<?php
if((!isset($_GET['category'])) or ($_GET['category']==NULL)){
	header("Location:404.php");
}
else{
	$category=$_GET['category'];
}


?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php 
			  $query_category="SELECT * FROM tbl_post WHERE cat=$category;";
			  $post_category=$db->select($query_category);
		
		?>
		<?php if($post_category){?>
		<?php while($result_category=$post_category->fetch_assoc()){?>
		
		
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result_category['id'];?>"><?php echo $result_category['title'];?></a></h2>
				<h4><?php echo $format->dateFormat($result_category['date']);?>, By <a href="#"><?php echo $result_category['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result_category['image'];?>" alt="post image"/></a>
				
					<?php echo $format->shortTxt($result_category['body'],400);?>
				
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result_category['id'];?>">Read More</a>
				</div>
			</div>
			
			<?php }?>
			
			
			
			<?php }else{header("Location:404.php");}?>
			
			
			
			
			
		</div>
		<?php include 'inc/sidebar.php';?>
	<?php include 'inc/footer.php';?>