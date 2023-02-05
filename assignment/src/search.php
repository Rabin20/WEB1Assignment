<?php
	require 'layout.php';
?>
<main>
	<?php
	require 'sidebar_nav.php';
?>

		<?php

	echo ' <h2> Search: </h2>';
	echo ' <p> Only choose one of the radio options based on the type of search you want to do. </p>';
	echo ' <form action="searchResult.php" method="POST">
			<label>Search article With Title:</label> <input type="radio" name="article" />
			<label>Search With Category:</label> <input type="radio" name="category" />
			<label>Search With Author Name:</label> <input type="radio" name="author"/>
			<label>Search:</label> <input type="text" name="keyword" />
			<input type="submit" name="submit" value="Submit"/>
			</form>';
	
	
?>


</main>
<?php
	require 'footer.php';
?>