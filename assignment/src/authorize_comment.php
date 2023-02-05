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

	echo ' <h3> Approve Comments. </h3>';
	if ($_GET['authorise'] == 'no') {
		$DropComment = $connection-> DropComment($_GET['commentId']);
		echo '<p> Your Comment is deleted. </p>';
	}
	if ($_GET['authorise'] == 'yes') {
		$Commentauthorise = $connection-> EditAcceptComment($_GET['commentId']);
		echo '<p> The Comment you has added has been approved. </p>';
	}
?>		

	</main>
	<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>