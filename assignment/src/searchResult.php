<?php
	require 'layout.php';
?>
<main>
<?php
	require 'sidebar_nav.php';
?>
<?php

	echo ' <h2> Search </h2>';
	$imports = ValidFieldSearch($_POST);
	
	if ($imports['isValid']) {
		if (!isset($_POST['article']) || empty($_POST['article'])){
		}
		else if ($_POST['article'] == 'on') {
			$SearchTitle = $connection->getArticle($_POST['keyword']);
			if ($SearchTitle->rowCount () == 0) {
				echo '<p> Article with this title doesnot exist. </p>';
			}
			foreach ($SearchTitle as $row) {
				echo '<a href="adminArticles.php?article=' . $row['article_name'] . '"><h2>' . $row['article_name'] . '</h2></a>';
				echo '<p> Publish Date: ' . $row['publishDate'] . '</p>';
				echo '<p> Author Name: ' . $row['articleAuthor'] . '</p>';
			} 
		}
		// If a category radio button has been chosen, it verifies it and then pulls up relevant articles.
		if (!isset($_POST['category']) || empty($_POST['category'])){
			
		}
		else if ($_POST['category'] == 'on') {
			$SearchByCategory = $connection->getArticleByCategory($_POST['keyword']);
					if ($SearchByCategory->rowCount () == 0) {
						echo '<p> No articles in this category. </p>';
					}
					foreach ($SearchByCategory as $row) {
						echo '<a href="Adminarticles.php?article=' . $row['article_name'] . '"><h2>' . $row['article_name'] . '</h2></a>';
						echo '<p> Publish Date: ' . $row['publishDate'] . '</p>';
						echo '<p> Author Name: ' . $row['articleAuthor'] . '</p>';
						echo '<p> Category: ' . $row['categoryID'] . '</p>';	
					}
		}
		
		if (!isset($_POST['author']) || empty($_POST['author'])){
		
		}
		else if ($_POST['author'] == 'on') {
				$SearchByAuthor = $connection->getArticleByAuthor($_POST['keyword']);
					if ($SearchByAuthor->rowCount () == 0) {
						echo '<p> No articles by this author. </p>';
					}
					foreach ($SearchByAuthor as $row) {
						echo '<a href="adminArticles.php?article=' . $row['article_name'] . '"><h2>' . $row['article_name'] . '</h2></a>';
						echo '<p> Publish Date: ' . $row['publishDate'] . '</p>';
						echo '<p> Author Name: ' . $row['articleAuthor'] . '</p>';
			
					}
		}
	
		if (!isset($_POST['user']) || empty($_POST['user'])){
		
		}
		else if ($_POST['user'] == 'on') {
				$searchUsers = $connection->SaveByName($_POST['keyword']);
					if ($searchUsers->rowCount () == 0) {
						echo '<p> Not any users with this name. </p>';
					}
					foreach ($searchUsers as $row) {
						echo '<a href="userComments.php?email=' . $row['Email'] . '"><h2>' . $row['FirstName'] . " " . $row['LastName'] . '</h2></a>';
						echo '<p> Email: ' . $row['Email'] . '</p>';
					
					}
		}
		else {
			echo ' <p> Please use the radio options to choose your search criteria. </p>';
		}
	}
	else {
		echo '<p> Must type a term into the search field. </p>';
	}
	

	function ValidFieldSearch($section){
	
		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
	
		if(!isset($section['keyword']) || empty($section['keyword'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'radio';
		}
		
		return $Verifylogic;
	}
?>		

		</main>
<?php
	require 'footer.php';
?>