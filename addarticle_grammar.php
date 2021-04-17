<?php include('inc/db.php'); ?>
<?php
	if(isset($_POST['submit'])) {
		$pers_pron_fem = mysqli_real_escape_string($conn,$_POST['pers_pron_fem']);
		$pers_pron_masc = mysqli_real_escape_string($conn,$_POST['author_name']);
		$deter_pron_fem = mysqli_real_escape_string($conn,$_POST['deter_pron_fem']);
		$deter_pron_masc = mysqli_real_escape_string($conn,$_POST['deter_pron_masc']);
		$noun_fem = mysqli_real_escape_string($conn,$_POST['noun_fem']);
		$noun_masc = mysqli_real_escape_string($conn,$_POST['noun_masc']);
		$adj_conn_fem = mysqli_real_escape_string($conn,$_POST['adj_conn_fem']);
		$adj_conn_mascc = mysqli_real_escape_string($conn,$_POST['adj_conn_masc']);
		$title_fem = mysqli_real_escape_string($conn,$_POST['title_fem']);
		$title_masc = mysqli_real_escape_string($conn,$_POST['title_masc']);

		$query = "INSERT INTO grammar(pers_pron_fem, pers_pron_masc, deter_pron_fem, deter_pron_masc, noun_fem, noun_masc, adj_conn_fem, adj_conn_masc, title_fem, title_masc) VALUES('$pers_pron_fem', '$pers_pron_masc', '$deter_pron_fem', '$deter_pron_masc', '$noun_fem', '$noun_masc', '$adj_conn_fem', '$adj_conn_masc', '$title_fem', '$title_masc')";

		if(mysqli_query($conn,$query)){
			//success
			header('Location: addarticle_rtgrammar.php');
		}else{
			echo "ERROR: ".mysqli_error($conn);
		}

	}
	?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<div id="container-details">
		<h1>Quantities of Grammatical Units</h1>
		<div class="post-group">
		<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label class="tag">Quantity of feminine personal pronouns "she" mentioned in the article</label>
				<input type="text" name="pers_pron_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of masculine personal pronouns "he" mentioned in the article</label>
				<input type="text" name="pers_pron_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of feminine object pronouns ('her' as in "he called her") and posessive determiners ('her' as in "her book")</label>
				<input type="text" name="deter_pron_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of masculine object pronouns ('him' as in "he called him") and posessive determiners ('his' as in "his book")r</label>
				<input type="text" name="deter_pron_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of feminine nouns</label>
				<input type="text" name="noun_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of masculine nouns</label>
				<input type="text" name="noun_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of adjectives with feminine connotation</label>
				<input type="text" name="adj_conn_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of adjectives with masculine connotation</label>
				<input type="text" name="adj_conn_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of feminine titles</label>
				<input type="text" name="title_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of masculine titles</label>
				<input type="text" name="title_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<input type="submit" name="submit" value="Submit" class="button">
		</form>
	</div>
</div>
