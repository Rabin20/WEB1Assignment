<?php
// sorts out the left column whichs is the toolbox for editing the articles.
	if (!$_SESSION['loggedIn']){
		echo'<nav>
				<ul class="list-group list-group-flush">
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Admin Login</a></li>
				</ul>
			</nav>';
	}
	else {
		echo'<nav>
				<ul class="list-group list-group-flush">
				<li><a href="addArticle.php">Add Article</a></li>
				<li><a href="editArticle.php?edit=editArticleName">Edit ArticleName</a></li>
				<li><a href="editArticle.php?edit=UpdateAuthorName">Edit AuthorName</a></li>
				<li><a href="editArticle.php?edit=UpdateCategories">Edit ArticleCategory</a></li>
				<li><a href="editArticle.php?edit=EditContent">Edit Content</a></li>
				<li><a href="categories.php">Categories</a></li>
				<li><a href="users.php">Edit Users</a></li>
				<li><a href="comment.php">Approve Comments</a></li>
				<li><a href="logout.php">Logout</a></li>
			</nav>';
	}
?>