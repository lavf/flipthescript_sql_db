<?php include('inc/db.php'); ?>
<?php
	if(isset($_POST['submit'])) {
		$words_count = mysqli_real_escape_string($conn,$_POST['words_count']);
		$words_converted = mysqli_real_escape_string($conn,$_POST['words_converted']);
		$words_4bias = mysqli_real_escape_string($conn,$_POST['words_4bias']);
		$ratio = mysqli_real_escape_string($conn,$_POST['ratio']);
		$ratio_bias = mysqli_real_escape_string($conn,$_POST['ratio_bias']);

		$query = "INSERT INTO analysis(words_count, words_converted, words_4bias, ratio, ratio_bias) VALUES('$words_count', '$words_converted', '$words_4bias', '$ratio', '$ratio_bias')";

		//Absenden & Überprüfen des Querys
		if(mysqli_query($conn,$query)){
			//success
			header('Location: addarticle_grammar.php');
		}else{
			echo "ERROR: ".mysqli_error($conn);
		}

	}
	?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<div id="container-details">
	<h1>Global Analysis Data</h1>
	<div class="post-group-edit">
		<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label class="tag">Number of words</label>
				<input type="text" name="words_count" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Number of converted words</label>
				<input type="text" name="words_converted" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Words considered for possible bias</label>
				<input type="text" name="words_4bias" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Ratio = Counted words / Converted Words</label>
				<input type="text" name="ratio" class="input-text" title="Decimal number with 3 digits. For example: 7,220">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Bias Ratio = Counted Words / Words considered for possible bias</label>
				<input type="text" name="words_4bias" class="input-text" title="Decimal number with 3 digits. For example: 7,220">
			</div>
			<br />
			<input type="submit" name="submit" value="Submit" class="button">
		</form>
	</div>
</div>
