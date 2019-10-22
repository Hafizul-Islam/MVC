<?php include 'resources/views/layout/header.php' ?>




Admin page <hr/>
<?php include 'resources/views/Admin/adminLeft.php' ?>

<article class="adminright">
	<h2>Welcome to <?php echo session::get("username"); ?></h2>


	<h3>Post List</h3><hr/>
	 <?php
		if(isset($msg)){
			echo "<span style='color:blue;font-weight:bold;' >".$msg.'</span>';
		}
	?> 

	<table id="postTable" class="display">
		<thead>
			<tr>
				<th>Serial No</th>
				<th>Title</th>
				<th>Content</th>
				<th>Category</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	<?php 
		$i = 0;
		foreach ($postList as $key =>$post) {
			$i++;
		
	?>

		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $post['title'];?></td>
			<td><?php 
				$text = $post['content']; 
				if(strlen($text)>40){
					$text = substr($text,0,40);
					echo $text;
				}else{
					echo $post['content'];
				}
			?></td>
			<td><?php 
				foreach ($cats as $key => $cat) {
					if($cat['id']==$post['categoryId']){
						echo $cat['category_name'];
					}
				}
			?></td>
			<?php if(session::get('lavel')==1){?>
			<td>
				<a href="<?php echo BASE_URL?>PostController/edit/<?php echo $post['id'];?>">Edit</a> ||
				<a onclick = "return confirm('Are you sure Delete this post ?')" href="<?php echo BASE_URL?>PostController/destroy/<?php echo $post['id'];?>">Delete</a>
			</td>
			<?php }else echo "<td>Not Permitted</td>"?>
		</tr>
	<?php 
		}
	?>
		</tbody>
	</table>

</article>
<script>
	$(document).ready( function () {
    $('#postTable').DataTable();
} );
</script>



<?php include 'resources/views/layout/footer.php' ?>

