<?php include('inc/db.php'); ?>
<?php
	if(isset($_POST['submit'])) {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$author_id = mysqli_real_escape_string($conn,$_POST['id']);
		$url = mysqli_real_escape_string($conn,$_POST['url']);
		$title = mysqli_real_escape_string($conn,$_POST['title']);
		$date = mysqli_real_escape_string($conn,$_POST['date']);
		$topic= mysqli_real_escape_string($conn,$_POST['topic']);
		$headline= mysqli_real_escape_string($conn,$_POST['headline']);
		$analysis_id = mysqli_real_escape_string($conn,$_POST['id']);
		$grammar_id = mysqli_real_escape_string($conn,$_POST['id']);
		$rt_grammar_id = mysqli_real_escape_string($conn,$_POST['id']);


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
<div id="container-details">
	<h1>Add Article Data</h1>
	<div class="post-group-edit">
		<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  	<div class="form-group">
				<label class="tag">ID</label>
				<input type="text" name="id" class="input-text">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">URL</label>
				<input type="text" name="url" class="input-text" title="For example: https://www.bbc.com/sport/formula1/55452464">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Title</label>
				<input type="text" name="title" class="input-text">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Date</label>
				<input type="date" name="date" class="input-text" title="YYYY-MM-DD. For example: 2021-04-16">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Topic</label>
				<input type="text" name="topic" class="input-text" title="Using lowercase letters. For example: health">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Headline</label>
				<input type="text" name="headline" class="input-text">
			</div>
			<br />
			<input type="submit" name="submit" value="Submit" class="button">
		</form>
	</div>
</div>
