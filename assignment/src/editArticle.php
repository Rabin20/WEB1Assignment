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
	if ($_GET['edit'] == 'editArticleName') {
		echo '<h2> Edit Article Title:</h2>';
		$imports = ValidArticleEditTitle($_POST);
		if ($imports['isValid']){
			$editArticleVerificationResult = $connection->SelectReviewArticle($_POST['article_name']);
			if ($editArticleVerificationResult->rowCount() == 0){
				echo '<p> Article not found.</p>';
				}
			else{
				$editArticleName = $connection->editArticleName($_POST['article_name'], $_POST['newArticleName']);
				echo '<p> The Article Title has been Renamed. </p>';
				unset($_POST);
			}	
		}
		else {
			echo '<p> Please type the name of the article you wish to edit. </p>
				<form action="editArticle.php?edit=editArticleName" method="POST">
				<label>Article name: </label>
				<input type="text" name="article_name"/></div>
				<label>New Article Title: </label> </div>
				<input type="text" name="newArticleName"/></div>
				<input type="submit" name="submit" value="Submit" />		
					
					
				</form>';
		}
	}

	if ($_GET['edit'] == 'UpdateAuthorName') {
		echo '<h2> Change an article\'s author:</h2>';

		$imports = validateUpdateAuthorNameFields($_POST);
		if ($imports['isValid']){
			
			$editArticleVerificationResult = $connection->SelectReviewArticle($_POST['article_name']);
			if ($editArticleVerificationResult->rowCount() == 0){
				echo '<p> could not find article to edit. Please retry the process. </p>';
				}
			else{
				
				$UpdateAuthorName = $connection->UpdateAuthorName($_POST['article_name'], $_POST['newArticleAuthor']);
				echo '<p> Article Author has been changed. </p>';
				unset($_POST);
			}	
		}
		else {
			echo '<p> Enter the article name to be edited: </p>
				<form action="editArticle.php?edit=UpdateAuthorName" method="POST">
				
<label>Article name: </label>
<input type="text" name="article_name"/>

<label>New Authors Name: </label>
<input type="text" name="newArticleAuthor"/>
<input type="submit" name="submit" value="Submit"/>

				
					 
				</form>';
		}
	}

	if ($_GET['edit'] == 'UpdateCategories') {
		echo '<h2> Change an article\'s category:</h2>';
	
		$imports = validateUpdateCategoriesFields($_POST);
		if ($imports['isValid']){

			$editArticleVerificationResult = $connection->SelectReviewArticle($_POST['article_name']);
			if ($editArticleVerificationResult->rowCount() == 0){
				echo '<p> could not find article to edit. Please retry the process. </p>';
			}
			else{
			
				$editCategoryVerificationResult = $connection->SelectReviewCategory($_POST['newArticleCategory']);
				if ($editCategoryVerificationResult->rowCount() == 0){
					echo '<p> The category is not listed. Please add this category before setting it to any articles by using the tool bar.</p>'; 
				}
				else{
			
					$UpdateAuthorName = $connection->UpdateCategories($_POST['article_name'], $_POST['newArticleCategory']);
					echo '<p> Article category has been changed. </p>';
					unset($_POST);
				}
			}	
		}
		else {
			echo '<p> Please type the name of the article you wish to change. </p>
				<form action="editArticle.php?edit=UpdateCategories" method="POST">
				
				<label>Article name: </label>
				<input type="text" name="article_name" />
				
				<label>New article category: </label>
				<input type="text" name="newArticleCategory" />
				<input type="submit" name="submit" value="Submit"/>
				
					 
				</form>';
		}
	}
	 
	if ($_GET['edit'] == 'EditContent') {
		echo '<h2> Edit Article Content Field:</h2>';
	
		$imports = validateEditContentFields($_POST);
		if ($imports['isValid']) {
			// check the article is in the article already.
			$editArticleVerificationResult = $connection->SelectReviewArticle($_POST['article_name']);
			if ($editArticleVerificationResult->rowCount () == 0) {
				echo '<p> could not find article. Please retry the process. </p>';
			}
			else {
				// check the fields have been set. 
					if (!isset($_POST['article_name']) || empty($_POST['article_name']) || !isset($_POST['Content']) || empty($_POST['Content'])) {
					echo '<p> Content hasn\'t been changed please retry the process and check that all fields are filled out.</p>';
					}
					else {
						echo '<p> Content has been updated </p>';
					}
			}
		}
		else {
			echo '<p>Enter the Article you wish to edit: </p>
				<form action="editArticle.php?edit=EditContent" method="POST">
					

<label>Article name: </label>
<input type="text" name="article_name"/>

<label >Article content:</label>
<textarea name="Content"></textarea>



<input type="submit" name="submit" value="Submit" />		 
				</form>';
		}
	}
	
	function ValidArticleEditTitle($section){

		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($section['article_name']) || empty($section['article_name'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'article_name';
		}
		if(!isset($section['newArticleName']) || empty($section['newArticleName'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'newArticleName';
		}
		
		return $Verifylogic;
	}
	
	function validateUpdateAuthorNameFields($section){

		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($section['article_name']) || empty($section['article_name'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'article_name';
		}
		if(!isset($section['newArticleAuthor']) || empty($section['newArticleAuthor'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'newArticleAuthor';
		}
		
		return $Verifylogic;
	}
	
	function validateUpdateCategoriesFields($section){

		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($section['article_name']) || empty($section['article_name'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'article_name';
		}
		if(!isset($section['newArticleCategory']) || empty($section['newArticleCategory'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'newArticleCategory';
		}
		
		return $Verifylogic;
	}
	
	function validateEditContentFields ($section){
	
		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
			];
		
		if(!isset($section['article_name']) || empty ($section['article_name'])) {
			$Verifylogic['isValid'] = false; 
			$Verifylogic['invalidField'] = 'article_name';
		}
		
		return $Verifylogic;
	}
?>
	</article>
</main>
<!-- main tag is closed which indicates the main part of the code ended -->
<?php
	require 'footer.php'; //to add the bottom layout of the page
?>