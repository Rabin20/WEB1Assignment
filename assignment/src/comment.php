<?php
	require 'layout.php'; //to add html layouts from layout file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
<!-- to add a sidebar menu -->
<?php
	require 'sidebar_nav.php';
?>

<?php
	echo ' <h2> Approve Comments </h2>';

	
	$retrieveRefuseComments = $connection->RefuseComment();
	if ($retrieveRefuseComments->rowCount() == 0){
		echo '<p> There arent any comments available right now. </p>';
	}
	else {
		foreach ($retrieveRefuseComments as $row) {
			echo '<h3>' . $row['firstName'] . ' ' . $row['LastName'] .  '</h3>';
			echo '<p>' . $row['Comnt_Date'] . '</p>';
			echo '<p>' . $row['Comnt_Content'] . '</p>';
			echo '<a href="authorize_comment.php?authorise=yes&commentId=' . $row['commentId'] . '">Approve a comment</a>';
			echo '</br>';
			echo '<a href="authorize_comment.php?authorise=no&commentId=' . $row['commentId'] . '">Delete a comment</a>';
		}
		
	}
				
				
?>		
</main>
<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>