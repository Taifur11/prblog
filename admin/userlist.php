<?php include_once 'inc/header.php'?>
<?php include_once 'inc/sidebar.php'?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>User List</h2>
		<?php 
		if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL){
			//header("Location:userlist.php");
		}
		else{
			$deleteid=$_GET['deleteid'];
			$query1="DELETE FROM tbl_user WHERE id='$deleteid';";
			$delpostresult=$db->delete($query1);
			if($delpostresult){
				echo "<span style='color:green;'>User Deleted Succsessfully!!</span>";
				//header("Location:userlist.php");
			}
			else{
				echo "<span style='color:red;'>User Not Deleted !!!</span>";
				//header("Location:userlist.php");
			}
		}
		?>
		<div class="block">  
			<table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">NO.</th>
					<th width="15%">Full Name</th>
					<th width="10%">Username</th>
					<th width="15%">Email</th>
					<th width="25%">Details</th>
					<th width="10%">Role</th>
					<th width="20%">Action</th>
				</tr>
			</thead>
			<tbody>

<?php

$query="SELECT * FROM tbl_user

ORDER BY id DESC;";
$users=$db->select($query);
if($users){
	$i=0;
	while($result=$users->fetch_assoc()) {
		$i++;
?>			
				<tr class="odd gradeX">
					<td width="5%"><?php echo $i;?></td>
					<td width="15%"> <?php echo $result['name'];?></td>
					<td width="10%"> <?php echo $result['username'];?></td>
					<td width="15%"> <?php echo $result['email'];?></td>
					<td width="30%"> <?php echo $result['deatils'];?></td>
					<td width="10%"> <?php 

					$role=$result['role'];
                                if($role==1){
                                    echo "Author";
                                }
                                elseif($role==2){
                                    echo "Admin";
                                }
                                elseif($role==3){
                                    echo "Editor";
                                }?></td>
					
					<td width="15%">
					
					<a href="viewuser.php?viewid=<?php echo $result['id']; ?>">View</a>
					
				<?php if(Session::get("userRole")==2){ ?>
                || <a href="userlist.php?deleteid=<?php echo $result['id']; ?>" onclick="return confirm('Are You Sure To Delete The User????');">Delete</a>
                <?php } ?>
					
					
					
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