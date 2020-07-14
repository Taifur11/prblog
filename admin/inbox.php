<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>

        <div class="grid_10">
            <div class="box round first grid">

                <h2>Inbox</h2>
				
<?php 
if(isset($_GET['seenid'])){

	$seenid=$_GET['seenid'];
	$query="UPDATE tbl_contact
						SET
							status		= '1'
						WHERE
							id='$seenid';";
					
				$updated_rows = $db->update($query);
				if ($updated_rows) {
				 echo "<span style='color:green;'>Message Sent To Seen Box Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Message Not Sent To Seen Box !</span>";
				}
}

?>
				
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

	<?php 
					
	$query="SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC;";
	$result=$db->select($query);
		if($result){
			$i=1;
			while($row=$result->fetch_assoc()){
	?>
						<tr class="odd gradeX">
							<td width="5%"><?php echo $i;?></td>
							<td width="15%" ><?php echo $row['firstname']." ".$row['lastname']; ?></td>
							<td width="15%"><?php echo $row['email']; ?></td>
							<td width="20%"><?php echo $format->shortTxt($row['body'],50);?></td>
							<td width="20%"><?php echo $row['date']; ?></td>
							<td width="25%">
							<a href="viewmsg.php?viewid=<?php echo $row['id']; ?>">View</a> ||
							<a href="replymsg.php?viewid=<?php echo $row['id']; ?>">Reply</a> ||
							<a href="?seenid=<?php echo $row['id']; ?>" onclick="return confirm('Are You Want to See Message');">See</a>
							</td>
							
						</tr>
	<?php $i++; }}?>
					</tbody>
				</table>
               </div>
            </div>
			








<!-- ------------------SEEN MESSAGE-------------------------- -->













			<div class="box round first grid">
                <h2>Seen Message</h2>
<?php 
if(isset($_GET['unseenid'])){

	$unseenid=$_GET['unseenid'];
	$query="UPDATE tbl_contact
						SET
							status		= '0'
						WHERE
							id='$unseenid';";
					
				$updated_rows = $db->update($query);
				if ($updated_rows) {
				 echo "<span style='color:green;'>Message Sent To Inbox Successfully.
				 </span>";
				}else {
				 echo "<span style='color:red;'>Message Not Sent To Inbox !</span>";
				}
}

?>
<?php

if(isset($_GET['delmsg'])){
	$delmsg=$_GET['delmsg'];
	$query="DELETE FROM tbl_contact WHERE id='$delmsg';";
	$delete_category=$db->delete($query);
	if($delete_category){
		echo "<span style='color:green;'>Message Deleted Successfully!!</span>";
	}
	else {
		echo "<span style='color:red;'>Message Not Deleted!!</span>";
	}
	
}

?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

	<?php 
					
	$query="SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC;";
	$result=$db->select($query);
		if($result){
			$i=1;
			while($row=$result->fetch_assoc()){
	?>
						<tr class="odd gradeX">
							<td width="5%"><?php echo $i;?></td>
							<td width="15%" ><?php echo $row['firstname']." ".$row['lastname']; ?></td>
							<td width="15%"><?php echo $row['email']; ?></td>
							<td width="20%"><?php echo $format->shortTxt($row['body'],50);?></td>
							<td width="20%"><?php echo $row['date']; ?></td>
							<td width="25%">
							<a href="viewmsg.php?viewid=<?php echo $row['id']; ?>">View</a> ||
							<a href="?delmsg=<?php echo $row['id']; ?>" onclick="return confirm('Are You Want to Delete Message');">Delete</a> ||
							<a href="?unseenid=<?php echo $row['id']; ?>">UnSeen</a>
							</td>
							
						</tr>
	<?php $i++; }}?>
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
