<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>




        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				
				
<?php

if(isset($_GET['delete'])){
	$delete=$_GET['delete'];
	$query="DELETE FROM tbl_category WHERE id='$delete';";
	$delete_category=$db->delete($query);
	if($delete_category){
		echo "<span style='color:green;'>Category Deleted Successfully!!</span>";
	}
	else {
		echo "<span style='color:red;'>Category Not Deleted!!</span>";
	}
	
}

?>
				
				
                <div class="block"> 
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					
					
	<?php 
					
	$query="SELECT * FROM tbl_category ORDER BY id DESC;";
	$result=$db->select($query);
		if($result){
			$i=1;
			while($row=$result->fetch_assoc()){
	?>
					
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['name']; ?></td>
							<td>
							
							<a href="editcat.php?edit=<?php echo $row['id'];?>">Edit</a> 
							
							|| 
							
							<a onclick="return confirm('Are You Sure');" href="?delete=<?php echo $row['id'];?>"> Delete</a>
							
							</td>
						</tr>
						
						
	<?php $i++; }}?>	
					</tbody>
				</table>
               </div>
            </div>
        </div>
		
		
		
<?php include 'inc/footer.php'?>



<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();
        });
</script>