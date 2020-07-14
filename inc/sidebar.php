
<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
				<?php
$query="SELECT * FROM tbl_category;";
$category=$db->select($query);


 if($category){
 while($row=$category->fetch_assoc()){
?>
					<ul>
						<li>
						<a href="posts.php?category=<?php echo $row['id'];?>">
						<?php echo $row['name'];?>
						</a>
						</li>						
					</ul>
 <?php }?>
 <?php }else{?>
	 <li><a href="#">No Category Found</a></li>	
<?php	 
 }?>
			</div>

			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<div class="popular clear">
					<?php
						$query_latest="SELECT * FROM tbl_post LIMIT 4;";
						$post_latest=$db->select($query_latest);


						 if($post_latest){
						 while($row_latest=$post_latest->fetch_assoc()){
						?>
					
					
						<h3><a href="post.php?id=<?php echo $row_latest['id'];?>"><?php echo $row_latest['title'];?></a></h3>
						<a href="post.php?id=<?php echo $row_latest['id'];?>"><img src="admin/<?php echo $row_latest['image'];?>" alt="post image"/></a>
						<?php echo $format->shortTxt($row_latest['body'],100);?>

						 <?php }}else{header("Location:404.php");}?>			
					</div>
					
	
			</div>
			
		</div>