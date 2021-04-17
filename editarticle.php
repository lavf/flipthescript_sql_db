<?php include('inc/db.php'); ?>
<?php

if(isset($_POST['submit'])){
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$url = mysqli_real_escape_string($conn,$_POST['url']);
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$date = mysqli_real_escape_string($conn,$_POST['date']);
	$topic= mysqli_real_escape_string($conn,$_POST['topic']);
	$headline= mysqli_real_escape_string($conn,$_POST['headline']);


	$query = "UPDATE article SET
							title='$title',
							url='$url',
							topic='$topic',
							headline='$headline',
							id='$id',
							date='$date' WHERE id = {$id}";

	//submit & prove the query
	if(mysqli_query($conn,$query)){
		//success
		header('Location: index.php');
	}else{
		echo "ERROR: ".mysqli_error($conn);
	}
}
// call ID from URL
$id = $_GET['id'];

$query = "SELECT * FROM article WHERE id = {$id}";
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
				<label class="tag">URL</label>
				<input type="text" name="url" class="input-text" value="<?php echo $post['url']; ?>">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Title</label>
				<input type="text" name="title" class="input-text" value="<?php echo $post['title']; ?>">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Date</label>
				<input type="text" name="date" class="input-text" value="<?php echo $post['date']; ?>">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Topic</label>
				<input type="text" name="topic" class="input-text" value="<?php echo $post['topic']; ?>">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Headline</label>
				<input type="text" name="headline" class="input-text" value="<?php echo $post['headline']; ?>">
			</div>
			<br />
			<!-- <input type="hidden" name="id" value="<php echo $post['id']; ?>"> -->
			<input type="submit" name="submit" value="Submit" class="button">
		</form>
	</div>
</div>
