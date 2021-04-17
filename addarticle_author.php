<?php include('inc/db.php'); ?>
<?php
	if(isset($_POST['submit'])) {
		//$author_id = mysqli_real_escape_string($conn,$_POST['author_id']);
		$source_name = mysqli_real_escape_string($conn,$_POST['source_name']);
		$author_name = mysqli_real_escape_string($conn,$_POST['author_name']);
		$author_gender = mysqli_real_escape_string($conn,$_POST['author_gender']);

		$query = "INSERT INTO author(source_name, author_name, author_gender) VALUES('$source_name', '$author_name', '$author_gender')";

		if(mysqli_query($conn,$query)){
			//success
			header('Location: addarticle_analysis.php');
		}else{
			echo "ERROR: ".mysqli_error($conn);
		}

	}
	?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<div id="container-details">
		<h1>Author's relevant information</h1>
		<div class="post-group">
		<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label class="tag">Source</label>
				<input type="text" name="source_name" class="input-text" title="Name of the source with undercase letters. For example: bbc news.">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Author's name</label>
				<input type="text" name="author_name" class="input-text" title="First name and last name with capital letter at the beginning. For example: Eve Kim.">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Author's gender</label>
				<input type="text" name="author_gender" class="input-text" title="only one lowercase letter. For example: n = none, f = female, m = male.">
			</div>
			<br />
			<input type="submit" name="submit" value="Submit" class="button">
		</form>
	</div>
</div>
