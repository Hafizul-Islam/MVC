<?php include 'resources/views/layout/header.php' ?>
Admin page <hr/>
<?php include 'resources/views/Admin/adminLeft.php' ?>

<h3>Users List</h3><hr/>
<?php
	if(isset($msg)){
		echo "<span style='color:blue;font-weight:bold;' >".$msg.'</span>';
	}
?>

<table class="tbl">
	<tr>
		<th>Serial No</th>
		<th>User Name</th>
		<th>User Role</th>
		<th>Action</th>
	</tr>
<?php 
	$i = 0;
	foreach ($users as $key =>$value) {
		$i++;
	
?>

	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $value['username'];?></td>
		<td><?php 
			if($value['lavel']==1){
				echo "Admin";
			}else if($value['lavel']==2){
				echo "Author";
			}elseif ($value['lavel']==3) {
				echo "Contributor";
			} 
		?>
		</td>
		<td>
			<a onclick = "return confirm('Are you sure delete users ?')" href="<?php echo BASE_URL?>UserController/destroy/<?php echo $value['id'];?>">Delete</a>
		</td>
	</tr>
<?php 
	}
?>
	
</table>


<?php include 'resources/views/layout/footer.php' ?>

