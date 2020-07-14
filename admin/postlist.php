<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Post List</h2>
		<div class="block">  
			<table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">NO.</th>
					<th width="10%">Post Title</th>
					<th width="20%">Description</th>
					<th width="10%">Category</th>
					<th width="10%">Image</th>
					<th width="10%">Author</th>
					<th width="10%">Tags</th>
					<th width="10%">Date</th>
					<th width="15%">Action</th>
					
				</tr>
			</thead>
			<tbody>

<?php

$query="SELECT tbl_post.*,tbl_category.name FROM tbl_post
INNER JOIN tbl_category
ON tbl_post.cat=tbl_category.id
ORDER BY tbl_post.date ASC";
$post=$db->select($query);
if($post){
	$i=0;
	while($result=$post->fetch_assoc()) {
		$i++;
?>			
				<tr class="odd gradeX">
					<td width="5%"><?php echo $i;?></td>
					<td width="10%"> <?php echo $result['title'];?></td>
					<td width="20%"><?php echo $format->shortTxt($result['body'],50);?></td>
					<td width="10%"><?php echo $result['name'];?></td>
					<td width="10%"><img src=" <?php echo $result['image'];?>" alt="" height="80" width="80"/></td>
					<td width="10%"> <?php echo $result['author'];?></td>
					<td width="10%"><?php echo $result['tags'];?></td>
					<td width="10%"><?php echo $format->dateFormat($result['date']);?></td>
					<td width="15%">
					
					<a href="viewpost.php?viewpostid=<?php echo $result['id']; ?>">View</a>
					
					<?php 
					$sessionid=Session::get("userID");
					$adminid=Session::get("userRole");
					$userid=$result['userid'];

					if($sessionid==$userid || $adminid==2){
					?>
					||
					<a href="editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a>
					
					||
					
					<a href="deletepost.php?delpostid=<?php echo $result['id']; ?>" onclick="return confirm('Are You Sure');">Delete</a>
					<?php }?>
					</td>
				</tr>
				
<?php }}
?>
			</tbody>

		</table>
	   </div>
	</div>
</div>

<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
</script>
		

<?php include 'inc/footer.php'?>