<?php include 'resources/views/layout/header.php' ?>

Category BY Id <hr/>

<?php 
	foreach ($catbyid as $key =>$value) {
		echo $value['category_name'].'<br/>';
	}
/*	echo '<pre>';
	print_r($data);
	echo '</pre>';*/
?>

<?php include 'resources/views/layout/footer.php' ?>