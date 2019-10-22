<?php include 'resources/views/layout/header.php' ?>
Admin Page <hr>
<?php include 'resources/views/Admin/adminLeft.php' ?>

<h3>Update Category</h3><hr/>
<?php
	if(isset($msg)){
		echo "<span style='color:blue;font-weight:bold;' >".$msg.'</span>';
		echo "anything";
	}
?>

<form action="<?php echo BASE_URL; ?>CategoryController/update" method="post">
	<table>
		<?php
			if(isset($catbyid)){
			foreach ($catbyid as $key => $value) {
			 	 
			 ?>
			 <tr>
				
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
			</tr>

			<tr>
				<td>Category Name</td>
				<td><input type="text" name="name" required="1" value="<?php echo $value['category_name']; ?>"></td>
			</tr>
			<tr>
				<td>Category Title</td>
				<td><input type="text" name="title" required="1" value="<?php echo $value['category_title']; ?>"></td>
			</tr>
			<tr>
				<td colspan="" rowspan="" headers=""></td>
				<td><input type="submit" value="Update"></td>
			</tr>
		<?php
			}
		}
		?>
	</table>
	
</form>


<?php include 'resources/views/layout/footer.php' ?>

