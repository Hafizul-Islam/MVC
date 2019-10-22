<?php include 'resources/views/layout/header.php' ?>

<h3>Login</h3><hr/>

<div class="loginform">
	<form action="<?php echo BASE_URL;?>LoginController/loginAuth" method="post">
		<table>
			<tr>
				<td>User Name</td>
				<td> <input type="text" name="username" placeholder="user name...."> </td>
			</tr>
			<tr>
				<td>password</td>
				<td> <input type="password" name="password" placeholder="password...."> </td>
			</tr>
			<tr>
				<td></td>
				<td> <input type="submit" name="submit" value="Login"> </td>
			</tr>
		</table>
	</form>
</div>


<?php include 'resources/views/layout/footer.php' ?>

