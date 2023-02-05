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
			if (!isset($_POST['submit'])){
				//to confirm signout button
				echo '<p> Are you sure you want to leave this page and sign out? </p>			
				<form action="index.php" method="POST">
					<input type="submit" name="submit" value="Sign Out" /> 
				</form>';
				session_destroy();
			}
			else {
				
			}
?>

</main>
<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>