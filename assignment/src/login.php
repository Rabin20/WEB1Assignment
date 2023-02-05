<?php
	require 'layout.php';//to add html layouts from layout file
?>
<!--main tag is used to indicate the beggining of the main code below menu bar -->
<main>
	<!-- to add a sidebar menu -->
	<?php
	require 'sidebar_nav.php';
?>
	<article>
	<h3>Admin Login</h3>

<!-- form tag is used to create the login layout for login Page -->
<form action="after_login.php" method="POST">
	<!-- for entering username to login -->
	<div class="row">
		   <label for="email">Username:</label>
		<input type="text"  name="email" class="form-control" id="email">
	  </div>

	  <!-- for entering password to login -->
	  <div class="row">
		<label for="password">Enter Password:</label>
		<input type="password" class="form-control" name="password" id="password">
	  </div>
	  <input type="submit" name="submit" class="btn btn-primary" value="login">
</form>

	</article>
</main>
<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of yhe page
?>