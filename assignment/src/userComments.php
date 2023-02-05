<?php
	require 'layout.php';//to add html layouts from layout file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
	<!-- to add a sidebar menu -->
<?php	
	require 'sidebar_nav.php'; 
?>

<?php
	
	$user = $connection->SaveByEmail($_GET['email']);
	foreach ($user as $row){
		echo '<h2>' . $row['FirstName'] . " " . $row['LastName'] . '</h2>';
		echo '<p> Email: ' . $row['Email'] . '</p>';
	}
	echo '<h4> Comments: </h4>';
	echo '</br>';
	
	$userComments = $connection->SaveComments($_GET['email']);

	foreach ($userComments as $row) {
		echo '<p> Article title: ' . $row['article_name'] . '</p>';
		echo '</br>';
		echo '<p> Date of comment: ' . $row['Comnt_Date'] . '</p>';
		echo '</br>';
		echo '<p>Comment: ' . $row['Comnt_Content'] . '</p>';
		echo '<form>
		</form>';
	
	}
	
?>	
			</article>
		</main>
<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>