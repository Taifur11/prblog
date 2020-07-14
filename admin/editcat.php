<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php

if(!isset($_GET['edit']) || $_GET['edit']==NULL){
	header("Location:catlist.php");
	
}
else{
	$edit_id=$_GET['edit'];
}

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
			   
			   
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['name'];
	$name=$format->validation($name);
	$name=mysqli_real_escape_string($db->link,$name);
	$query="UPDATE tbl_category
			SET
			name='$name'
			WHERE id='$edit_id';";
	$result_update=$db->update($query);
	if($result_update){
		echo "<span style='color:green;'>Category Updated Successfully!!</span>";
	}
	else {
		echo "<span style='color:red;'>Category Not Updated!!</span>";
	}
}?>
<?php
$query="SELECT * FROM  tbl_category WHERE id='$edit_id' ORDER BY id ASC;";
$result=$db->select($query);
while($row=$result->fetch_assoc()){

?>
			
			   
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="name"  value="<?php echo $row['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
					
<?php }?>
					
                </div>
            </div>
        </div>
		
<?php include 'inc/footer.php'?>