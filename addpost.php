<?php include('inc/db.php'); ?>
<?php
	if(isset($_POST['submit'])) {
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

		//$query = "INSERT INTO author (author_id) VALUES ('$author_id');
			//				INSERT INTO analysis (analysis_id) VALUES ('$analysis_id');
				//			INSERT INTO grammar (grammar_id) VALUES ('$grammar_id');
			//				INSERT INTO rt_grammar (rt_grammar_id) VALUES ('$rt_grammar_id');
			//				INSERT INTO article
			//				(id,author_id,url,title,date,topic,headline,analysis_id,grammar_id,rt_grammar_id)
		//					VALUES
		//					('$id', '$author_id', '$url', '$title', '$date', '$topic' ,'$headline', '$analysis_id', '$grammar_id', '$rt_grammar_id');";

		$query = "INSERT INTO article(id, author_id, url, title, date, topic, headline, analysis_id, grammar_id, rt_grammar_id) VALUES('$id', '$author_id', '$url', '$title', '$date', '$topic' ,'$headline', '$analysis_id', '$grammar_id', '$rt_grammar_id')";

		if(mysqli_query($conn,$query)){
			//success
			header('Location: index.php');
		}else{
			echo "ERROR: ".mysqli_error($conn);
		}

	}
	?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
		<h1>Add Article</h1>
		<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>ID</label>
				<input type="text" name="id">
			</div>
			<div class="form-group">
				<label>Author's ID</label>
				<input type="text" name="author_id">
			</div>
			<div class="form-group">
				<label>URL</label>
				<input type="text" name="url">
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title">
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="text" name="date">
			</div>
			<div class="form-group">
				<label>Topic</label>
				<input type="text" name="topic">
			</div>
			<div class="form-group">
				<label>Headline</label>
				<input type="text" name="headline">
			</div>
			<div class="form-group">
				<label>Analysis ID</label>
				<input type="text" name="analysis_id">
			</div>
			<div class="form-group">
				<label>Grammar ID</label>
				<input type="text" name="grammar_id">
			</div>
			<div class="form-group">
				<label>Ratio Grammar ID</label>
				<input type="text" name="rt_grammar_id">
			</div>
			<input type="submit" name="submit" value="Submit" class="">
		</form>
