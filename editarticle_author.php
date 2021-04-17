<?php include('inc/db.php'); ?>
<?php

if(isset($_POST['submit'])){
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$author_id = mysqli_real_escape_string($conn,$_POST['id']);
	$source_name = mysqli_real_escape_string($conn,$_POST['source_name']);
	$author_name = mysqli_real_escape_string($conn,$_POST['author_name']);
	$author_gender = mysqli_real_escape_string($conn,$_POST['author_gender']);

	$query = "UPDATE author SET
							author_id='$author_id',
							source_name='$source_name',
							author_name='$author_name',
							author_gender='$author_gender' WHERE author_id = {$author_id}";

	//submit & prove the query
	if(mysqli_query($conn,$query)){
		//success
		header('Location: editarticle_analysis.php?id='.$id);
	}else{
		echo "ERROR: ".mysqli_error($conn);
	}
}
// call ID from URL
$id = $_GET['id'];

$query = "SELECT * FROM article, author, analysis WHERE id = {$id} AND article.id = {$id} AND author.author_id = {$id} AND analysis.analysis_id = {$id}";
$ergebnis =  mysqli_query($conn,$query);
$post = mysqli_fetch_assoc($ergebnis);
mysqli_free_result($ergebnis);
mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
  <div id="container-details">
		<h1>Edit Article</h1>
		<div class="post-group-edit">
			<form class="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<label class="tag">ID</label>
					<input type="text" name="id" class="input-text" value="<?php echo $post['id']; ?>">
				</div>
				<br />
				<div class="form-group">
					<label class="tag">Source</label>
					<input type="text" name="source_name" class="input-text" value="<?php echo $post['source_name']; ?>">
				</div>
				<br />
			  <div class="form-group">
					<label class="tag">Author's name</label>
					<input type="text" name="author_name" class="input-text" value="<?php echo $post['author_name']; ?>">
				</div>
				<br />
				<div class="form-group">
				  <label class="tag">Author's gender</label>
				  <input type="text" name="author_gender" class="input-text" value="<?php echo $post['author_gender']; ?>">
			  </div>
				<br />
				<!-- <input type="hidden" name="id" value="<php echo $post['id']; ?>"> -->
				<input type="submit" name="submit" value="Submit" class="button">
			</form>
		</div>
	</div>
