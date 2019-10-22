<?php include 'resources/views/layout/header.php' ?>

Admin page <hr/>
<?php include 'resources/views/Admin/adminLeft.php' ?>

<article class="adminright">
	
	<h3>Add Article</h3> <hr>
<?php
	if(isset($postErrors)){
		echo ' <div style="color:red;border:3px solid; padding:5px 10px; margin:10px; width:610px;"> ';
		foreach ($postErrors as $key => $value) {
			switch ($key) {
				case 'title':
					foreach ($value as $val) {
						echo "Title: ".$val."</br>";
					}
					break;

				case 'content':
					foreach ($value as $val) {
						echo "Content: ".$val."</br>";
					}
					break;
				case 'categoryId':
					foreach ($value as $val) {
						echo "CategoryId: ".$val."</br>";
					}
					break;
				
				default:
					break;
			}
		}
		echo '</div>';
	}
?>
<?php
foreach ($postById as $key => $value) {

?>
	<form action="<?php echo BASE_URL?>PostController/update/<?php echo $value['id']?>" method="post" accept-charset="utf-8">
	<table>
		<tr>
			<td>Title</td>
			<td><input type="text" class="postTitle" name="title" value="<?php echo $value['title'];?>" ></td>
		</tr>
		<tr>
			<td>Content</td>
			<td>
			 <textarea name="content">
			 	<?php 	echo $value['content']; ?>
			 </textarea>
                <script>
                        CKEDITOR.replace( 'content' );
                </script>
			</td>
		</tr>
		<tr>
			<td>Category</td>
			<td>
				<select name="categoryId" class="cat">
					<option > Select one</option>
					<?php 
						foreach ($catlist as $key => $cat) {
					?>
						<option  
						<?php 
							if($cat['id']==$value['categoryId']){ ?>
								selected = "selected";
						<?php } ?>
						value="<?php echo $cat['id'];?>"> <?php echo $cat['category_name']?></option>

					<?php } ?>
					
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="" rowspan="" headers=""></td>
			<td><input type="submit" value="Save Post"></td>
		</tr>
	</table>
	
</form>
<?php } ?>

</article>
<?php include 'resources/views/layout/footer.php' ?>


