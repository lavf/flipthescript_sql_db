<?php include('inc/db.php'); ?>
<?php

	if(isset($_POST['delete'])){

		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
		$query1 = "DELETE FROM author WHERE author_id = {$delete_id}";
		$query2 = "DELETE FROM analysis WHERE analysis_id = {$delete_id}";
		//$query4= "DELETE FROM grammar WHERE grammar_ID = {$delete_id}";
		//$query3= "DELETE FROM rt_grammar WHERE rt_grammar_ID = {$delete_id}";
		//$query4 = "DELETE FROM article WHERE author_id = {$delete_id} AND article.id = {$delete_id}";

		//Submit and prove the query
		if(mysqli_query($conn,$query1,$query2)){
			//success
			header('Location: index.php');
		}else{
			echo "ERROR: ".mysqli_error($conn);
		}
	}
	// call ID from url
	$id = $_GET['id'];

	$query = "SELECT * FROM article, author, analysis WHERE article.id = {$id} AND author.author_id = {$id} AND analysis.analysis_id = {$id}";

	$ergebnis =  mysqli_query($conn,$query);
	$post = mysqli_fetch_assoc($ergebnis);
	mysqli_free_result($ergebnis);
	mysqli_close($conn);
 ?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<div id="container-details">
	<a href="index.php" class="go-back">&#10094;&#10094;  Go Back</a>
	<br />
	<br />
	<div class="post-group">
		<p class="tag">ID:</p><p><?php echo $post['id']; ?></p>
		<p class="tag">Source:</p><p><?php echo $post['source_name']; ?></p>
		<p class="tag">Author's Name:</p><p><?php echo $post['author_name']; ?></p>
		<p class="tag">Author's Gender:</p><p><?php echo $post['author_gender']; ?></p>
		<p class="tag">URL:</p><p><a href="<?php echo $post['url']; ?>"><?php echo $post['url']; ?></a></p>
		<p class="tag">Title:</p><p><?php echo $post['title']; ?></p>
		<p class="tag">Date:</p><p><?php echo $post['date']; ?></p>
		<p class="tag">Topic:</p><p><?php echo $post['topic']; ?></p>
		<p class="tag">Headline:</p><p><?php echo $post['headline']; ?></p>
		<p class="tag">Counted Words:</p><p><?php echo $post['words_count']; ?></p>
		<p class="tag">Converted Words:</p><p><?php echo $post['words_converted']; ?></p>
		<br />
		<br />
		<form class="btn-delete" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="delete" value="&#128465; Delete" class="button">
		</form>
		<br />
		<a href="editarticle_author.php?id=<?php echo $post['id']; ?>" class="edit-link">&#128393; Edit</a>
	</div>
</div>
