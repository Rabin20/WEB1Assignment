<?php
	require 'layout.php';//to add html layouts from layoout file
	
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
<?php
	// validates the fields from the post array. 
		$imports = verification($_POST);
	
		if ($imports['isValid']){
			//fetches information to verify that the data entered matches that in the database 
			$password = sha1($_POST['email'] . $_POST['password']);
			$User_verificationEmail = $connection->ObtainUsersEmail($_POST['email']);
			$User_ValidatePassword = $connection->ObtainUserPassword($password);
			$email = $_POST['email'];	
			
			
			
			if ($User_verificationEmail->rowCount() == 1){	
			
				if ($User_ValidatePassword->rowCount() == 1){
					$firstName = $connection->ObtainFirstname($email);
					$LastName = $connection->ObtainLastname($email);
					$_SESSION['loggedIn'] = true;
					$_SESSION['email'] = $email;
					$_SESSION['firstName'] = $firstName;
					$_SESSION['LastName'] = $LastName;
					require 'sidebar_nav.php';
					echo '<h1> Welcome To Northampton News Administration </h1>';
					
				}
				else {
				require 'sidebar_nav.php';
				echo ' <h4> The email address or password you have entered doesnot match. Sign-up for account and try again. </h4>';
			
			}
			}
		
		}	
?>
	
<?php
	
	function verification($section){
	// array used to examine the fields the field is invalid if one of these conditions is true or empty.
		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($section['email']) || empty($section['email'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'email';
		}
		if(!isset($section['password']) || empty($section['password'])){
		
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'password';
		}
		
		return $Verifylogic;
	}
?>		
	</main>
	<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php';//to add the bottom layout of the page
?>