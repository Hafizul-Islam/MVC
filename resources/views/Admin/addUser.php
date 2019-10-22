<?php include 'resources/views/layout/header.php' ?>

Admin page <hr/>
<?php include 'resources/views/Admin/adminLeft.php' ?>

<article class="adminright">
	
	<h3>Add User</h3><hr/>
	<?php
		if(isset($msg)){
			echo "<span style='color:blue;font-weight:bold;' >".$msg.'</span>';
		}
	?>

	<form action="http://localhost/mvc/?url=UserController/store" method="post" accept-charset="utf-8">
	<table>
		<tr>
			<td>User Name</td>
			<td><input type="text" name="username" required="1"></td>
		</tr>
		<tr>
			<td>User Password</td>
			<td><input type="password" name="password" required="1"></td>
		</tr>
		<tr>
			<td>User Roles</td>
			<td>
				<select name="lavel" class="cat">
					<option > Select one</option>
					<option value="2">Author</option>
					<option value="3">Contributor</option>
					<option value="4">Subscriber</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="" rowspan="" headers=""></td>
			<td><input type="submit" value="Add User"></td>
		</tr>
	</table>
	
</form>

</article>
<?php include 'resources/views/layout/footer.php' ?>


