<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Slider List</h2>
		<div class="block">  
			<table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">NO.</th>
					<th width="25%">Slider Title</th>
					<th width="40%">Image</th>
					<th width="30%">Action</th>
					
				</tr>
			</thead>
			<tbody>

<?php

$query="SELECT * FROM tbl_slider ORDER BY id ASC;";
$post=$db->select($query);
if($post){
	$i=0;
	while($result=$post->fetch_assoc()) {
		$i++;
?>			
				<tr class="odd gradeX">
					<td width="5%"><?php echo $i;?></td>
					
					<td width="25%"> <?php echo $result['title'];?></td>
			
					<td width="40%"><img src=" <?php echo $result['image'];?>" alt="" height="80" width="80"/></td>
					
					<td width="30%">
					
					<a href="editslider.php?editsliderid=<?php echo $result['id']; ?>">Edit</a>
					
					||
					
					<a href="deleteslider.php?delsliderid=<?php echo $result['id']; ?>" onclick="return confirm('Are You Sure');">Delete</a>
					
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