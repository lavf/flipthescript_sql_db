<?php include('inc/db.php'); ?>
<?php

if(isset($_POST['submit'])){
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$words_count= mysqli_real_escape_string($conn,$_POST['words_count']);
	$words_converted= mysqli_real_escape_string($conn,$_POST['words_converted']);
	$analysis_id= mysqli_real_escape_string($conn,$_POST['id']);

	$query = "UPDATE analysis SET
							analysis_id='$analysis_id',
							words_count='$words_count',
							words_converted='$words_converted' WHERE analysis_id = {$id}";

	//submit & prove the query
	if(mysqli_query($conn,$query)){
		//success
		header('Location: editarticle.php?id='.$id);
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
				<label class="tag">Counted Words</label>
				<input type="text" name="words_count" class="input-text" value="<?php echo $post['words_count']; ?>">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Converted Words</label>
				<input type="text" name="words_converted" class="input-text" value="<?php echo $post['words_converted']; ?>">
			</div>
			<br />
			<!-- <input type="hidden" name="id" value="<php echo $post['id']; ?>"> -->
			<input type="submit" name="submit" value="Submit" class="button">
		</form>
  </div>
</div>
