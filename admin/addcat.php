<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form action="addcat.php" method="post">
                    <table class="form">

<?php if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['name'];
	$name=$format->validation($name);
	$name=mysqli_real_escape_string($db->link,$name);
	$query="INSERT INTO tbl_category (name) VALUES ('$name');";
	$result=$db->insert($query);
	if($result){
		echo "<span style='color:green;'>Category Inserted Successfully!!</span>";
	}
	else {
		echo "<span style='color:red;'>Category Not Inserted!!</span>";
	}
}?>


					
                        <tr>
                            <td>
                                <input type="text" name="name"  placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
		
<?php include 'inc/footer.php'?>