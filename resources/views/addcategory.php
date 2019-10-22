<?php include 'resources/views/layout/header.php' ?>

<h3>Add Category</h3><hr/>
<?php
	if(isset($msg)){
		echo "<span style='color:blue;font-weight:bold;' >".$msg.'</span>';
	}
?>
<form action="http://localhost/mvc/?url=CategoryController/store" method="post" accept-charset="utf-8">
	<table>
		<tr>
			<td>Category Name</td>
			<td><input type="text" name="category_name" required="1"></td>
		</tr>
		<tr>
			<td>Category Title</td>
			<td><input type="text" name="category_title" required="1"></td>
		</tr>
		<tr>
			<td colspan="" rowspan="" headers=""></td>
			<td><input type="submit" value="Save"></td>
		</tr>
	</table>
	
</form>


<?php include 'resources/views/layout/footer.php' ?>

