<?php include('inc/db.php'); ?>
<?php

if(isset($_POST['submit'])){
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$author_id = mysqli_real_escape_string($conn,$_POST['author_id']);
	$url = mysqli_real_escape_string($conn,$_POST['url']);
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$date = mysqli_real_escape_string($conn,$_POST['date']);
	$topic= mysqli_real_escape_string($conn,$_POST['topic']);
	$headline= mysqli_real_escape_string($conn,$_POST['headline']);
	$analysis_id= mysqli_real_escape_string($conn,$_POST['analysis_id']);
	$grammar_id= mysqli_real_escape_string($conn,$_POST['grammar_id']);
	$rt_grammar_id= mysqli_real_escape_string($conn,$_POST['rt_grammar_id']);

	$query = "UPDATE article SET
							title='$title',
							author_id='$author_id',
							url='$url',
							topic='$topic',
							headline='$headline',
							analysis_id='$analysis_id',
							grammar_id='$grammar_id',
							rt_grammar_id='$rt_grammar_id',
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
		<h1>Edit Article</h1>
		<form class="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>ID</label>
				<input type="text" name="id" class="" value="<?php echo $post['id']; ?>">
			</div>
		    <div class="form-group">
				<label>Author's name</label>
				<input type="text" name="author_id" class="" value="<?php echo $post['author_id']; ?>">
			</div>
			<div class="form-group">
				<label>URL</label>
				<input type="text" name="url" class="" value="<?php echo $post['url']; ?>">
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="" value="<?php echo $post['title']; ?>">
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="text" name="date" class="" value="<?php echo $post['date']; ?>">
			</div>
			<div class="form-group">
				<label>Topic</label>
				<input type="text" name="topic" class="" value="<?php echo $post['topic']; ?>">
			</div>
			<div class="form-group">
				<label>Headline</label>
				<input type="text" name="headline" class="" value="<?php echo $post['headline']; ?>">
			</div>
			<div class="form-group">
				<label>Analysis ID</label>
				<input type="text" name="analysis_id" class="" value="<?php echo $post['analysis_id']; ?>">
			</div>
			<div class="form-group">
				<label>Grammar ID</label>
				<input type="text" name="grammar_id" class="" value="<?php echo $post['grammar_id']; ?>">
			</div>
			<div class="form-group">
				<label>Ratio Grammar ID</label>
				<input type="text" name="rt_grammar_id" class="" value="<?php echo $post['rt_grammar_id']; ?>">
			</div>
			<!-- <input type="hidden" name="id" value="<php echo $post['id']; ?>"> -->
			<input type="submit" name="submit" value="Submit" class="">
		</form>
