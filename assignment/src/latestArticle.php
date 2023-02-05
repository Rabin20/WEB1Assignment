<?php
	require 'layout.php';
?>
<main>
	<?php
	require 'sidebar_nav.php';
?>
	<article>
		<h2>Latest Articles</h2>
<?php
	$articles = $connection->retrieveLatestArticle();
	foreach ($articles as $row){
		echo'
<a href="adminArticles.php?article=' . $row['article_name'] . '" class="link-dark text-monospace"
<h2 class="card-title">' . $row['article_name'] . '</h2>
  <p class="card-text">Written by: ' . $row['articleAuthor'] .'</p>
  <p class="card-text">Created: ' . $row['publishDate'] .'</p>

  <a href="adminArticles.php?article=' . $row['article_name'] . '" class="btn btn-primary float-end">Read</a>';
		echo '<form>';
		echo '</form>';
	} 


?>

	</article>
</main>
<?php
	require 'footer.php';
?>