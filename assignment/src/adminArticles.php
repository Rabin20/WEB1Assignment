<?php
	require 'layout.php'; //to add html layouts from header file
?>
<!-- main tag is used to indicate the beggining of the main code below menu bar  -->
<main>
<!-- to add a sidebar menu -->
<?php
	require 'sidebar_nav.php';
?>

<?php

	$article = $connection->getArticle($_GET['article']);
	// using a loop, output the outcomes of the aforementioned query.
	foreach ($article as $row){
		
		echo '<h2>' . $row['article_name'] . '</h2>';
		echo '<p> Date of Article Posted: ' . $row['publishDate'] . '</p>';
		echo '<p> Name of Article Author: ' . $row['articleAuthor'] . '</p>';
		echo '<form>';
		echo '<p>' . $row['Content'] . '</p>';
		echo '</form>';
		echo '<form>
		</form>';
		// this will display the authorized comments made on the article.
		$review = $connection->getArticleComments($_GET['article']);
		echo"<h2>Comments:</h2>";
		foreach ($review as $row) {
			echo '<p> Comment: ' . $row['Comnt_Content'] .'</p>';
			echo '<p> By ' . $row['firstName'] . ' ' . $row['LastName'] . '</p>';
			echo '<p> Date written: ' . $row['Comnt_Date'] .'</p>';
			// getUser_Comment
			echo '<form>
				</form>';
		}
		// CHECK IF SOMEONE HAS SIGNED IN OR NOT
		if ($_SESSION['loggedIn'] == true){
			//loops over the post variables, allowing users to inspect them.
			$imports = verification($_POST);
			if ($imports['isValid']){
				// The table below provides access to the comment ID.
				$getUser_Comment = $connection->getUser_Comment();

				//Keep the text fields below the line farther apart when using them.
				$Comnt_Content=preg_replace("/[\n]/","<br>",$_POST['comment']);
				// add 1 to Countcomment.
				$getUser_Comment++;
				$Comnt_Date = date('Y/m/d');
				$addFieldComment = [
						'commentId' => $getUser_Comment,
						'firstName' => $_SESSION['firstName'],
						'LastName' => $_SESSION['LastName'],
						'article_name' => $_GET['article'],
						'Comnt_Date' => $Comnt_Date,
						'Comnt_Content' => $Comnt_Content,
						'email' => $_SESSION['email'],
						'authorised' => 'N'];
				// executes the code necessary to conduct the add comment query. 
				$CommentAccess = $connection->CommentAccess($addFieldComment);
				echo '<p> Your Comment has been added. </p>';
				unset($_POST);
			}
			else {
				
				// comment-adding form, please.
				echo '  <form action="adminArticles.php?article=' . $row['article_name'] . '" method="POST">
						<label> Comment: </label><textarea name="comment"> </textarea>
						<input type="submit" name="submit" value="Submit" />
					</form> ';
			}
		}
		else {
			echo '<p> Please <a href="login.php">Login</a> to comment. </p>';
			
		}
	}
	// The page's verification section
		function verification($section){
	// array for field validation, the field is invalid if they are false or empty.	 
		$Verifylogic = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($section['comment']) || empty($section['comment'])){
			$Verifylogic['isValid'] = false;
			$Verifylogic['invalidField'] = 'comment';
		}
		
		return $Verifylogic;
	}
?>
<!-- main tag is closed which indicates the main part of the code ended -->
	</main>
<?php
	require 'footer.php';//to add the bottom layout of the page
?>