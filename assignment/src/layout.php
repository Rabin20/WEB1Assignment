<?php
	session_start();
	if(!isset($_SESSION['loggedIn'])){
		$_SESSION['loggedIn'] = false;
	}
	require 'connection.php';
	$server = 'db';
	$username = 'root';
	$password = 'root';
	$schema = 'assignment'; 
	$connection = new DbAccessObject($server, $username, $password, $schema);
	$pdo = $connection->getPdo();
	$Categories = $connection->ObtainCategory();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css"/>

    <title>Northampton News</title>
  </head>
  <body>
		<header>
			<section>
					<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="latestArticle.php">Latest Articles</a></li>
				<li><a href="search.php">Search feature</a></li>
				<li><a href="adminCategories.php?category=category">Categories</a>
				<ul>
<?php
	foreach ($Categories as $row){
			echo '<li><a href="adminCategories.php?category=' . $row['categoryName'] . '">' . $row['categoryName'] . '</a></li>';
		
	} 

?>
				</ul>
				</li>
			</ul>
		</nav>
		<img src="images/banners/randombanner.php" />
		