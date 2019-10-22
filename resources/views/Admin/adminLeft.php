<aside class="adminleft">
	<div class="adminwidget">
		<h3>Site Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL."AdminController/index"?>">Home</a></li>
			<li><a href="<?php echo BASE_URL."LoginController/logOut"?>">Logout</a></li>
		</ul>
	</div>
	<?php 
		if(session::get('lavel')==1){
	?>
		<div class="adminwidget">
			<h3>User Manage</h3>
			<ul>
				<li><a href="<?php echo BASE_URL."UserController/create"?>">Make User</a></li>
				<li><a href="<?php echo BASE_URL."UserController/index"?>">User List</a></li>
			</ul>
		</div>
	<?php }?>
	<?php 
		if(session::get('lavel')==1 || session::get('lavel')==2){
	?>
	<div class="adminwidget">
		<h3>Category List</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>CategoryController/create">Category Add</a></li>
			<li><a href="<?php echo BASE_URL;?>CategoryController/index">Category List    </a></li>
		</ul>
	</div>
	<?php }?>
	<div class="adminwidget">
		<h3>Post article </h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>PostController/create">Add Post</a></li>
			<li><a href="<?php echo BASE_URL;?>PostController/index">Post List</a></li>
		</ul>
	</div>
</aside>