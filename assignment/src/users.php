<?php
	require 'layout.php';//to add html layouts from layouts file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
	<!-- to add a sidebar menu -->
<?php
	require 'sidebar_nav.php';
?>
<?php
	echo ' <h2> Edit UserLogin: </h2>';
	if (!isset($_POST['submit']) || empty($_POST['submit'])){
		echo ' Please modify the user listed below. You must enter the users email address in both the delete and the account you want to edit 
		boxes if you want to remove them from the system.</p> '; 
	
		echo ' <form action="users.php?edit=user" method="POST"> 
		<label>Your Email:</label>
		<input type="text" name="email" />

		<label>First Name:</label>
		<input type="text" name="firstName"/>
	
		<label>Last Name:</label>
		<input type="text" name="LastName"/>
		
		<label>Date of birth:</label>
		<input type="date" name="dob"/>
		
		<label>Change Email:</label>
		<input type="text" name="newEmail" />
	
		<label>Change Password:</label>
		<input type="text" name="password" />
		
		<label> Email To delete</label>
		<div class="col-6"><input type="text" name="delete" />
				
		<input type="submit" name="submit" value="Submit" />
		</form>';
	}
	else {
		//To identify the person who will be modified, it verifies that the user's email has been entered.
		if (!isset($_POST['email']) || empty($_POST['email'])) {
			echo ' <p> Please fill out the first box on the previous page if the account you wish to modify has not yet been entered. </p>';
		}
		else{
			$EmailValidResult = $connection->ObtainUsersEmail($_POST['email']);
			if ($EmailValidResult->rowCount() >= 1){	
				if (!isset($_POST['firstName']) || empty($_POST['firstName'])){

				}
				else {
					$ChangeFirstname= $connection->EditFirstname($_POST['firstName']);
					
					if ($ChangeFirstname== true) {
						echo '<p> First name of the User has been changed to ' . $_POST['firstName'] . '.</p>';
					}
					else {
						echo '<p> TRY AGAIN!!! </p>';
					}
				}	
				if (!isset($_POST['LastName']) || empty($_POST['LastName'])) {
					
				}
				else {
					$ChangeLastName = $connection->ReviseLastName($_POST['LastName']);
					
					if ($ChangeLastName == true) {
						echo '<p> The User has changed their last name to ' . $_POST['LastName'] . '.</p>';
					}
					else {
						echo '<p> TRY AGAIN!!! </p>';
					}
				}
				
				if (!isset($_POST['dob']) || empty($_POST['dob'])) {
					
				}
				else {
					$changeUserDob = $connection->ReviseDob($_POST['dob']);
					
					if ($changeUserDob == true) {
						echo '<p> Date of Birth for the User has been modified to ' . $_POST['dob'] . '.</p>';
					}
					else {
						echo '<p> TRY AGAIN!!! </p>';
					}
				}
				if (!isset($_POST['password']) || empty($_POST['password'])) {
					
				}
				else {
					$changePassword = $connection->updatePassword($_POST['password']);
					
					if ($changePassword == true) {
						echo '<p>Password for User has been updated.</p>';
					}
					else {
						echo '<p> TRY AGAIN!!! </p>';
					}
				}
				if (!isset($_POST['delete']) || empty($_POST['delete'])) {
					
				}
				else {
					$EmailValidResult = $connection->ObtainUsersEmail($_POST['delete']);
					if ($EmailValidResult->rowCount() >= 1){		
						$deleteUser = $connection->deleteUser($_POST['delete']);
						
						if ($deleteUser == true) {
							echo '<p> The User was removed.</p>';
						}
						else {
							echo '<p> TRY AGAIN!!! </p>';
						}
					}
					else {
						echo '<p> Not being able to find the user to delete</p>';
					}
				}

			if (!isset($_POST['newEmail']) || empty($_POST['newEmail'])) {
					
				}
				else {
					$EmailValidResult = $connection->ObtainUsersEmail($_POST['newEmail']);
					if ($EmailValidResult->rowCount() == 0){	
						$changeUserEmail = $connection->ReviseEmail($_POST['newEmail']);
						
						if ($changeUserEmail == true) {
							echo '<p> The users email has been changed to ' . $_POST['newEmail'] . '.</p>';
						}
						else {
							echo '<p> TRY AGAIN!!! </p>';
						}
					}
					else {
						echo '<p> Enter new Email address: ' . $_POST['newEmail'] . ' is already in use.</p>';
					}
				}
				
			}
			else {
				echo '<p>Email addresses were not found in the records. Proceed once more</p>';
			}
		}
	}
				
				
?>				
	

	</main>
	<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>