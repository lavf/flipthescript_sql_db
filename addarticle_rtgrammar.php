<?php include('inc/db.php'); ?>
<?php
	if(isset($_POST['submit'])) {
		$rt_pers_pron_fem = mysqli_real_escape_string($conn,$_POST['rt_pers_pron_fem']);
		$rt_pers_pron_masc = mysqli_real_escape_string($conn,$_POST['rt_author_name']);
		$rt_deter_pron_fem = mysqli_real_escape_string($conn,$_POST['rt_deter_pron_fem']);
		$rt_deter_pron_masc = mysqli_real_escape_string($conn,$_POST['rt_deter_pron_masc']);
		$rt_noun_fem = mysqli_real_escape_string($conn,$_POST['rt_noun_fem']);
		$rt_noun_masc = mysqli_real_escape_string($conn,$_POST['rt_noun_masc']);
		$rt_adj_conn_fem = mysqli_real_escape_string($conn,$_POST['rt_adj_conn_fem']);
		$rt_adj_conn_mascc = mysqli_real_escape_string($conn,$_POST['rt_adj_conn_masc']);
		$rt_title_fem = mysqli_real_escape_string($conn,$_POST['rt_title_fem']);
		$rt_title_masc = mysqli_real_escape_string($conn,$_POST['rt_title_masc']);
		$sum_rt_noun = mysqli_real_escape_string($conn,$_POST['rt_title_masc']);
		$sum_rt_adj = mysqli_real_escape_string($conn,$_POST['sum_rt_adj']);
		$sum_rt_title = mysqli_real_escape_string($conn,$_POST['sum_rt_title']);
		$sum_rt_global_bias = mysqli_real_escape_string($conn,$_POST['sum_rt_global_bias']);

		$query = "INSERT INTO rt_grammar(rt_pers_pron_fem, rt_pers_pron_masc, rt_deter_pron_fem, rt_deter_pron_masc, rt_noun_fem, rt_noun_masc, rt_adj_conn_fem, rt_adj_conn_masc, rt_title_fem, rt_title_masc, sum_rt_noun, sum_rt_adj, sum_rt_title, sum_rt_global_bias) VALUES('$rt_pers_pron_fem', '$rt_pers_pron_masc', '$rt_deter_pron_fem', '$rt_deter_pron_masc', '$rt_noun_fem', '$rt_noun_masc', '$rt_adj_conn_fem', '$rt_adj_conn_masc', '$rt_title_fem', '$rt_title_masc', '$sum_rt_noun', '$sum_rt_adj', '$sum_rt_title', '$sum_rt_global_bias')";

		if(mysqli_query($conn,$query)){
			//success
			header('Location: addarticle.php');
		}else{
			echo "ERROR: ".mysqli_error($conn);
		}

	}
	?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
		<div id="container-details">
			<h1>Quantities of Grammatical Units</h1>
			<div class="post-group-edit">
		<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label class="tag">Quantity of feminine personal pronouns "she" mentioned in the article</label>
				<input type="text" name="rt_pers_pron_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Ratio: Quantity of masculine personal pronouns "he" mentioned in the article / Words Converted</label>
				<input type="text" name="rt_pers_pron_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Ratio: Quantity of feminine object pronouns ('her' as in "he called her") and posessive determiners ('her' as in "her book") / Words Converted</label>
				<input type="text" name="rt_deter_pron_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of masculine object pronouns ('him' as in "he called him") and posessive determiners ('his' as in "his book") / Words Converted</label>
				<input type="text" name="rt_deter_pron_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of feminine nouns / Words Converted</label>
				<input type="text" name="rt_noun_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of masculine nouns / Words Converted</label>
				<input type="text" name="rt_noun_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of adjectives with feminine connotation / Words Converted</label>
				<input type="text" name="rt_adj_conn_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of adjectives with masculine connotation / Words Converted</label>
				<input type="text" name="rt_adj_conn_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of feminine titles / Words Converted</label>
				<input type="text" name="rt_title_fem" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Quantity of masculine titles / Words Converted</label>
				<input type="text" name="rt_title_masc" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Sum of ratio from masculine and feminine nouns</label>
				<input type="text" name="sum_rt_noun" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Sum of ratio from adjectives with masculine and feminine connotation</label>
				<input type="text" name="sum_rt_adj" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Sum of masculine and feminine titles</label>
				<input type="text" name="sum_rt_title" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<div class="form-group">
				<label class="tag">Sum of all grammatical units considered for possible bias</label>
				<input type="text" name="sum_rt_global_bias" class="input-text" title="Whole number (integer)">
			</div>
			<br />
			<input type="submit" name="submit" value="Submit" class="button">
		</form>
	</div>
</div>
