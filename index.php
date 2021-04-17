<?php

	include('inc/db.php');

	$query = "SELECT author_name, title, date, topic, id FROM article, author WHERE article.author_id = author.author_id ORDER BY id DESC LIMIT 10";

	$ergebnis = mysqli_query($conn,$query);

	$posts = mysqli_fetch_all($ergebnis,MYSQLI_ASSOC);

	mysqli_free_result($ergebnis);

	mysqli_close($conn);


?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/header.php'); ?>
 	<link rel="stylesheet" href="css/style.css">
	<body>
		<div id="container">
			<h1 id=first-title>Articles</h1>
			<?php foreach($posts as $post) : ?> <div class="post-group">
				<p><div id="text">Title: </div><?php echo $post['title']; ?></p>
				<p><div id="text">Date: </div><?php echo $post['date']; ?></p>
				<p><div id="text">Topic: </div><?php echo $post['topic']; ?></p>
				<small>Written on <?php echo $post['date']; ?> by <?php echo $post['author_name']; ?></small>
				<div id="details">
					<a href="article.php?id=<?php echo $post['id']; ?>">Read More</a>
				</div>
			</div>
			<?php endforeach; ?>

		<?php if (count($posts) > 0): ?>
			<h1 id=second-title>Articles table</h1>
			<table>
			  <thead>
			    <tr>
			      <th><?php  echo implode('</th><th>', array_keys(current($posts))); ?></th>
			    </tr>
			  </thead>
			  <tbody>
				<?php foreach ($posts as $row): array_map('htmlentities', $row); ?>
				    <tr>
				      <td><?php  echo implode('</td><td>', $row); ?></td>
				    </tr>
				<?php endforeach; ?>
				  </tbody>
				</table>
			</div>
		</body>
		<?php  endif; ?>
