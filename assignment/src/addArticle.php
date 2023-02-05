<?php
require 'layout.php'; //to add html layouts from header file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
<!-- to add a sidebar menu -->
<?php
require 'sidebar_nav.php';
?>
<h1>Add Article Name for the News:</h1>
<?php
			// A function is carried out by code to verify the entered data.
			$imports = verification($_POST);
				if (!isset($_POST['submit']) || empty($_POST['submit'])){
					
					// to add a field to enter the Article information form tag is used
					echo '<form action="addArticle.php" method="POST"> 
					<label> Name of the Article:</label>
					<input type="text" name="article_name" class="form-control"/>
					<label>Name of the Author:</label>
					<input type="text" name="articleAuthor" class="form-control"/>
					<label>Publish Date of Article:</label>
					<input type="date" name="articleDate" class="form-control"/>
					<label>Article Category:</label>
					<input type="text" name="CategoryOfarticle" class="form-control"/>
					<label>Content of the Article:</label>
					<textarea name="Content" class="form-control"> </textarea>
					<input type="submit" name="submit" value="Add" class="btn btn-primary" />
					</form>';
				}
				
				else{
					// This adds an article using the credentials specified above and confirms that the form fields specified above have been completed.
					if ($imports['isValid']){
						$import_article = $connection->verify_ArticleName($_POST['article_name']);
					//Make that the category you're using is there in the database; if not, you'll need to create it.
						$Verify_CategoryName = $connection->verify_deleteCategory($_POST['CategoryOfarticle']);
						if ($import_article->rowCount() >= 1){
							echo '<p> This article already has a title that is in use. </p>';
						}
						if ($Verify_CategoryName->rowCount() == 0){
							echo '<p> No category name has yet been assigned.Enter the name of a new category.</p>';
						}
						else {
							// Keep the text fields below the line farther apart when using them.
							$Serve=preg_replace("/[\n]/","<br>",$_POST['Content']);
							$article_field = [
												'article_name' => $_POST['article_name'],
												'articleAuthor' => $_POST['articleAuthor'],
												'publishDate' => $_POST['articleDate'],
												'categoryID' => $_POST['CategoryOfarticle'],
												'Content' => $Serve];
							$Article_Include = $connection->Article_Include($article_field); 
							echo '<p> A new article has been included.</p>';
						}	
					}
					else{
						echo '<p> Each box has to be completed. Again fill. </p>';
					}
					
				}
			
		function verification($section){
	// array for field-checking, the field is invalid if one of them is false or empty.	
		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($section['article_name']) || empty($section['article_name'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'article_name';
		}
		
		if(!isset($section['articleAuthor']) || empty($section['articleAuthor'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'articleAuthor';
		}
		
		if(!isset($section['articleDate']) || empty($section['articleDate'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'articleDate';
		}
		
		if(!isset($section['CategoryOfarticle']) || empty($section['CategoryOfarticle'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'CategoryOfarticle';
		}
		if(!isset($section['Content']) || empty($section['Content'])){
		
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'Content';
		}
		
		return $Verifylogic;
	}
?>
</main>
<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php';//to add the bottom layout of the page
?>