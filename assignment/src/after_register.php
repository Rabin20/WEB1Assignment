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
	//Verifies that the sign-up form's fields have been completed and are set.
	$imports = verification($_POST);
	if ($imports['isValid']){
	// fetches information to verify that the data entered matches that in the database 
		$CheckEmail = $connection->ObtainUsersEmail($_POST['email']);
		if ($CheckEmail->rowCount() >= 1){	
			echo '<h3>Please provide a different email address as the one you entered is already in use. </h3>';
		}
		else {
			$Register_Field = [
				'FirstName' => $_POST['F_name'],
				'LastName' => $_POST['L_name'],
				'DOB' => $_POST['dob'],
				'Email' => $_POST['email'],
				'Password' => sha1($_POST['email'] . $_POST['password'])];
			$DataRegistered = $connection->Set_Userid($Register_Field);
			echo '<h3> You have been added to the database. Proceed log in.</h3>';
			
		}
	}
	else {
		echo '<h3> Unable to sign up. Please fill out all the boxes.</h3>';
	}
	function verification($section){
	// array used to check the fields If one of these is false or empty, the field is invalid.
		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($section['F_name']) || empty($section['F_name'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'F_name';
		}
		
		if(!isset($section['L_name']) || empty($section['L_name'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'L_Name';
		}
		
		if(!isset($section['dob']) || empty($section['dob'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'dob';
		}
		
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
<!-- main tag is closed which indicates the main part of the code ended -->
	</main>
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>

