<?php
	require 'layout.php';//to add html layouts from header file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
<!-- to add a sidebar menu -->
<?php
	require 'sidebar_nav.php';
?>
<!-- heading of the page -->
			<h2 class="text-center">Categories for News</h2>
<?php
		if ($_GET['category'] == 'category'){
			// to receive categories name
			$categories = $connection-> ObtainCategory();
			foreach ($categories as $row){

				
				echo '<a href="adminCategories.php?category=' . $row['categoryName'] . '">
				<ul>
				
				<li><h4>' . $row['categoryName'] . '</h4></li>
				</ul>';
			}
		}
		else{
		//use the get article method to bring up the categories.
			$articles = $connection->getArticles($_GET['category']);
		// uses a loop to show the outcomes
			if ($articles ->rowCount() == 0) {
				echo '<p> This category doesnt have any articles. </p>';
			}
			else {
				foreach ($articles as $row){
					echo'
		<div class="row">

<div class="card-body">
<a href="adminArticles.php?article=' . $row['article_name'] . '" class="link-dark text-monospace"
<h2>' . $row['article_name'] . '</h2>
  <p>Author Name: ' . $row['articleAuthor'] .'</p>
  <p>Published Date: ' . $row['publishDate'] .'</p>

  <a href="adminArticles.php?article=' . $row['article_name'] . '" class="btn btn-primary float-end">Read</a>
</a></div>';
				}
			}
		}	
				
							
					
?>		
	</main>
	<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php';//to add the bottom layout of the page
?>