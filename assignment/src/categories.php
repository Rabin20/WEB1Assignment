<?php
	require 'layout.php'; //to add html layouts from layout file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
	<!-- to add a sidebar menu -->
<?php
	require 'sidebar_nav.php';
	
?>
			<article>
				<h2>Categories</h2>
<?php
		
		//to add new categories and edit existing ones.
		if (!isset($_POST['submit']) || empty($_POST['submit'])){
			$categories = $connection-> ObtainCategory();
			foreach ($categories as $row){
				echo '<p>' . $row['categoryName'] . '</p>';
			}

			echo '<p> Enter the name of the category you want to add:</p>
				<p> Only categories without any assigned articles should have their names changed.</p> 

<form action="categories.php" method="POST">

<label>Add Category: </label>
<input type="text" name="includeCategory"/>

<label>Delete Category: </label>
<input type="text" name="deleteCategory"/>

<label>Edit Category: </label>
<input type="text" name="editCategory" />


<label>Rename To: </label>
<input type="text" name="replaceToCategory"/>
		 
<input type="submit" name="submit" value="Submit" />
</form>';
							
		}
		// adds the category to the database using the data from the above form.
		else {
			if (isset($_POST['includeCategory']) || !empty($_POST['includeCategory'])){
				$VerifyincludeCategory = $connection->VerfiyIncludeCategory($_POST['includeCategory']);
				if ($VerifyincludeCategory->rowCount() >= 1){
					echo '<p> Please try a new name as the requested category has already been added to the website. </p>';
					
				}
				else {
					$addCategories = $connection->includeCategory($_POST['includeCategory']); 
					echo '<p> The Page has successfully added the category.</p>';
				}	
			}
			// To Remove Database from Category 
			if (isset($_POST['deleteCategory']) || !empty($_POST['deleteCategory'])){
				$deleteCategoryVerificationResult = $connection->verify_deleteCategory($_POST['deleteCategory']);
				if ($deleteCategoryVerificationResult->rowCount() == 0){
					echo ' <p> Please type another category name to remove if the one you want is not listed.</p>';
				}
				else{
					$deleteCategories = $connection->deleteCategory($_POST['deleteCategory']);
					echo '<p> The category has been deleted. </p>';
				}
			}
			
			// to edit Category. 
			if (isset($_POST['editCategory']) || !empty($_POST['editCategory']) && isset($_POST['replaceToCategory']) || !empty($_POST['replaceToCategory']) ){
				$editCategoryVerificationResult = $connection->SelectReviewCategory($_POST['editCategory']);
				if ($editCategoryVerificationResult->rowCount() == 0) {
					echo '<p> Please provide a legitimate category in its place the one you want to update doesnt exist. </P>.';
				}
				else {
					$editCategory = $connection->CategoryRevise($_POST['editCategory'], $_POST['replaceToCategory']);
					echo '<p> The category has been updated.</p>';
				}
			}
		
		}

		unset($_POST);
		
?>
		</article>
			
	</main>
	<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>