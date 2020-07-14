<?php include('inc/header.php');?>
<?php include('inc/slider.php');?>

<?php
$per_page=2;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else{
			$page=1;
		}
		$offset=$page*$per_page-$per_page;

$sql="SELECT * FROM tbl_post ORDER BY title DESC limit $per_page OFFSET $offset;";
$result=$db->select($sql);
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
			if($result){
			while($row=$result->fetch_assoc()){
			?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'];?></a></h2>
				<h4><?php echo $format->dateFormat($row['date']); ?>, By <a href="#"><?php echo $row['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $row['image']; ?>" alt="post image"/></a>

				<?php echo $format->shortTxt($row['body'],300);?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'] ?>">Read More</a>
				</div>
			</div>
<style>
	.pagination{
		
		margin-top: 10px;
		padding: 10px;
		font-size: 20px;
		text-align: center;
		color:red;
	}
	.active{
		background-color: black;
		padding:5px 20px;
		text-decoration: none;
		margin-top:5px;
		color:red;
	}
	.normal{
		background-color: green;
		padding:5px 20px;
		text-decoration: none;
		margin-top:5px;
		color:red;
	}
	.normal a{
		display:block;
	}
	a.disabled{
  pointer-events: none;
  cursor: default;
	}
	
</style>			
			<?php }
        $query="SELECT *FROM tbl_post;";
        $res=$db->select($query);
		$rownum=mysqli_num_rows($res);
        $pagenum=ceil($rownum/$per_page);
        ?>
			
			
			
			<div class="pagination">
				<?php if($page>=2){
				?>
				<a  href="index.php?page=<?php echo $page-1; ?>" class="normal">Previous</a>
			<?php } ?>
				<?php 
				for($i=1;$i<=$pagenum;$i++){ 
				?>
				<a href="index.php?page=<?php echo $i; ?>" class="<?php echo $page==$i?'active':'normal'; ;?>"><?php echo $i; ?></a>
				<?php
				}
				?>
				<?php if($page<$pagenum){
				?>
				<a  href="index.php?page=<?php echo $page+1; ?>" class="normal">Next</a>
			<?php } ?>
			</div>
     <?php    }
       else{
       	header("location:404.php");
       }

     ?>

     



			 

		</div>
		<?php include('inc/sidebar.php');?>

		
	

	

	<?php include('inc/footer.php');?>