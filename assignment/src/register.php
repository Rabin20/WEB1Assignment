<?php
	require 'layout.php';//to add html layouts from layout file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
<!-- to add a sidebar menu -->
<?php
	require 'sidebar_nav.php';
?>
		<h3>Register Now</h3>
		<!-- form tag is used to creat register form to login the page -->
				<form action="after_register.php" method="POST">
					<label class="form-label">Firstname</label>
					<input type="text" name="F_name"  placeholder = "Enter first name" />
					<label class="form-label">Lastname</label>
					<input type="text" name="L_name"  placeholder = "Enter Last name" />
					<label class="form-label">Date Of Birth</label>
					<input type="date" name="dob"  placeholder = "Enter Date of Birth" />
					<label class="form-label">Email</label>
					<input type="text" name="email"  placeholder = "Enter Email Adress"/>
					<label class="form-label">Password</label>
					<input type="password" name="password"  placeholder = "Enter Password"/>
					<input type="submit" name="submit" value="Register now" class="form-btn"/>
				</form>
			
		
</main>
<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php';//to add the bottom layout of the page
?>