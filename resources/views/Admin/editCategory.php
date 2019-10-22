<?php include 'resources/views/layout/header.php' ?>
Admin page <hr/>
<?php include 'resources/views/Admin/adminLeft.php' ?>

<h3>Category List</h3><hr/>
<?php
	if(isset($msg)){
		echo "<span style='color:blue;font-weight:bold;' >".$msg.'</span>';
	}
?>

<table class="tbl">
	<tr>
		<th>Serial No</th>
		<th>Category Name</th>
		<th>Category Title</th>
		<th>Action</th>
	</tr>
<?php 
	$i = 0;
	foreach ($cat as $key =>$value) {
		$i++;
	
?>

	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $value['category_name'];?></td>
		<td><?php echo $value['category_title']; ?></td>
		<td>
		<?php if(session::get('lavel')==1){?>
			<a href="<?php echo BASE_URL?>CategoryController/edit/<?php echo $value['id'];?>">Edit</a> ||
			<a onclick = "return confirm('Are you sure ?')" href="<?php echo BASE_URL?>CategoryController/destroy/<?php echo $value['id'];?>">Delete</a>
		<?php }else echo 'Not Permitted'; ?>
		</td>
	</tr>
<?php 
	}
?>
	
</table>


<?php include 'resources/views/layout/footer.php' ?>

