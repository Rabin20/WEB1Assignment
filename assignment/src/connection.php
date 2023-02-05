<?php
	class DbAccessObject{

		private $server;
		private $username;
		private $password;
		private $schema;
		private $pdo;

		public function __construct($server, $username, $password, $schema){
			$this->server = $server;
			$this->username = $username;
			$this->password = $password;
			$this->pdo = new PDO("mysql:host=$server;dbname=$schema", "root", "root",
			[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		}
	
	
// to connect and insert name in categories field
		public function includeCategory($categoryName){
			
			$query = $this->pdo->prepare('
				INSERT INTO categories(categoryName)
				VALUES (:Name)');
			
			$criteria = ['Name' => $categoryName];
			
			return $query->execute($criteria);
			
		}

// to connect and check category name in categories field	
		public function VerfiyIncludeCategory($categoryName){
			
			$query = $this->pdo->prepare('
				SELECT categoryName
				FROM categories
				WHERE categoryName = :Name');
			
			$criteria = ['Name' => $categoryName];
			
			$query->execute($criteria);
			
			return $query;
			
		}
	// to connect and check the categories
		public function verify_deleteCategory($categoryName){
			
			$query = $this->pdo->prepare('
				SELECT categoryName
				FROM categories
				WHERE categoryName = :Name');
			
			$criteria = ['Name' => $categoryName];
			
			$query->execute($criteria);
			
			return $query;
			
		}
		
// to connect and delete the categories
		public function deleteCategory($categoryName){
			
			$query = $this->pdo->prepare('
				DELETE FROM categories
				WHERE categoryName = :Name');
			
			$criteria = ['Name' => $categoryName];
 	
			return $query->execute($criteria);	
		}
// to receive a emails from users 
		public function ObtainUsersEmail($email){
			
			$query = $this->pdo->prepare('
			SELECT Email 
			FROM Users 
			WHERE Email = :email');
		
			$criteria = ['email' => $email];
			
			$query->execute($criteria);
			
			return $query;

		}
		
// to create a users
		public function Set_Userid($criteria){
			
			$query = $this->pdo->prepare('
				INSERT INTO Users(FirstName, LastName, DOB, Email, Password) 
				VALUES (:FirstName, :LastName, :DOB, :Email, :Password)');
	
			return $query->execute($criteria);
			
		}
// to check password enter by user
		public function ObtainUserPassword($password){
			
			$query = $this->pdo->prepare('
				SELECT Password
				FROM Users
				WHERE Password = :password');
				
			$criteria = ['password' => $password];
			
			$query->execute($criteria);
		
		
			return $query;
		}
 	// to receive the firstname of user 
		public function ObtainFirstname($email){
			
			$query = $this->pdo->prepare('
				SELECT FirstName 
				FROM Users 
				WHERE Email = :email');
		
			$criteria = ['email' => $email];
			
			
			$query->execute($criteria);
			$row = $query->fetch();
			return $row['FirstName'];

		}
	
// to update category field
		public function CategoryRevise($categoryName,$nameReplace){
			
			$query = $this->pdo->prepare('
				UPDATE categories
				SET categoryName = :newName
				WHERE categoryName = :Name');
			
			$criteria = ['Name' => $categoryName,
						'newName' =>$nameReplace];

			return $query->execute($criteria);	
		}
	//function created to add articles
		public function Article_Include($criteria){

			$query = $this->pdo->prepare('
				INSERT INTO articles (article_name, articleAuthor, publishDate, categoryID, Content)
				VALUES (:article_name, :articleAuthor, :publishDate, :categoryID, :Content)');
			
			return $query->execute($criteria);
		}
	//function created to check articlesname
		public function verify_ArticleName($article_name){
			
			$query = $this->pdo->prepare('
				SELECT article_name
				FROM articles
				WHERE article_name = :Name');
			
			$criteria = ['Name' => $article_name];
			
			$query->execute($criteria);
			
			return $query;
			
		}
// function created to check last name
		public function ObtainLastname($email){
			
			$query = $this->pdo->prepare('
				SELECT LastName 
				FROM Users 
				WHERE Email = :email');
		
			$criteria = ['email' => $email];
			
		
			
			$query->execute($criteria);
			$row = $query->fetch();
			return $row['LastName'];

		}
// function created to retrive Categories
		public function ObtainCategory(){
			
			$query = $this->pdo->query('
				SELECT categoryName
				FROM categories');

			return $query;
			
		}
// function to edit catgory field
		public function SelectReviewCategory($categoryName){
			
			$query = $this->pdo->prepare('
				SELECT categoryName
				FROM categories
				WHERE categoryName = :Name');
			
			$criteria = ['Name' => $categoryName];
			
			$query->execute($criteria);
			
			return $query;
			
		}
//function to edit article
		public function SelectReviewArticle($article_name){
			
			$query = $this->pdo->prepare('
				SELECT article_name
				FROM articles
				WHERE article_name = :Name');
			
			$criteria = ['Name' => $article_name];
			
			$query->execute($criteria);
			
			return $query;
		}
//function to edit articlename
		public function editArticleName($article_name, $newArticleName){
			
			$query = $this->pdo->prepare('
				UPDATE articles
				SET article_name = :newName
				WHERE article_name = :Name');
			
			$criteria = ['Name' => $article_name,
						'newName' =>$newArticleName];
	
			return $query->execute($criteria);	
		}
	
//function to edit ArticleContent	
		Public function EditContent($Serve, $article_name){
			
			$query = $this->pdo->prepare('
				UPDATE articles
				SET Content = :newContent
				WHERE article_name = :Name');
				
			$criteria = ['Name' => $article_name,
						'newContent' => $Serve];
			
			$query->execute($criteria);
			
			
			return $query;
		}
		
//function to cancel comment
			public function RefuseComment(){
			
			$query = $this->pdo->prepare('
				SELECT *
				FROM comment
				WHERE authorised = :authorised');
				
			$criteria = ['authorised' => 'N'];
			
			$query->execute($criteria);

			return $query;
			
		}
//function to delete comment
		public function DropComment($commentId){
			
			$query = $this->pdo->prepare('
				DELETE FROM comment
				WHERE commentId = :commentId');
			
			$criteria = ['commentId' => $commentId];
			
			return $query->execute($criteria);
		}

		//gunction to approve comment
		public function EditAcceptComment($commentId){
			
			$query = $this->pdo->prepare('
				UPDATE comment
				SET authorised = :authorised
				WHERE commentId = :commentId');
				
			$criteria = ['commentId' => $commentId,
						'authorised' => 'Y'];
			
			$query->execute($criteria);
			
			
			return $query;
			
		}
//function to update firstname
		Public function EditFirstname(){
			
			$query = $this->pdo->prepare('
				UPDATE Users
				SET firstName = :Name
				WHERE email = :email');
				
			$criteria = ['Name' => $_POST['firstName'],
						'email' => $_POST['email']];
			
			return	$query->execute($criteria);		 
		}
//function to edit Author name of article	
		public function UpdateAuthorName($article_name, $newArticleAuthor){
			
			$query = $this->pdo->prepare('
				UPDATE articles
				SET articleAuthor = :newAuthor
				WHERE article_name = :Name');
			
			$criteria = ['Name' => $article_name,
						'newAuthor' =>$newArticleAuthor];
		
		
			return $query->execute($criteria);	
		}
// function to edit article category
		public function UpdateCategories($article_name, $newArticleCategory){
			
			$query = $this->pdo->prepare('
				UPDATE articles
				SET categoryID = :newCategory
				WHERE article_name = :Name');
			
			$criteria = ['Name' => $article_name,
						'newCategory' =>$newArticleCategory];
		
			return $query->execute($criteria);	
		}
//function to fetch articles from categories id
		public function getArticles($category){
			
			$query = $this->pdo->prepare('
				SELECT *
				FROM articles
				WHERE categoryID = :category
				ORDER BY publishDate DESC');
				
			$criteria = ['category' => $category];
			
			$query->execute($criteria);
			
			return $query;
			
		}
//function to fetch	article from article_name
		public function getArticle($article_name){
			
			$query = $this->pdo->prepare('
				SELECT *
				FROM articles
				WHERE article_name = :article_name
				ORDER BY publishDate DESC');
				
			$criteria = ['article_name' => $article_name];
			
			$query->execute($criteria);
			
			return $query;
			
		}

//function to retrieve latest article
		public function retrieveLatestArticle(){
			
			$query = $this->pdo->query('
				SELECT *
				FROM articles
				ORDER BY publishDate DESC');
			
			return $query;
			
		}
 //function to fetch comments of articles	
		public function getArticleComments($article_name) {
			
			$query = $this->pdo->prepare('
				SELECT *
				FROM comment
				WHERE article_name = :article_name
				AND authorised = :authorised
				');
			
			$criteria = ['article_name' => $article_name,
						'authorised' => 'Y'];
			
			$query->execute($criteria);
			
			return $query;
		}
//function to increase comment
		public function CommentAccess($criteria){

			$query = $this->pdo->prepare('
				INSERT INTO comment (commentId, firstName, LastName, article_name, Comnt_Date, Comnt_Content, authorised, email)
				VALUES (:commentId, :firstName, :LastName, :article_name, :Comnt_Date, :Comnt_Content, :authorised, :email)');
						 
			return $query->execute($criteria);
		} 
	
		public function getUser_Comment(){
			
			$query = $this->pdo->query('
				SELECT commentId
				FROM comment
				ORDER BY commentId DESC');
			
			$row = $query->fetch();
			return $row['commentId'];
		}

		public function ReviseLastName(){
			
			$query = $this->pdo->prepare('
				UPDATE Users
				SET LastName = :Name
				WHERE email = :email');
				
			$criteria = ['Name' => $_POST['LastName'],
						'email' => $_POST['email']];
			
			return	$query->execute($criteria);	
		}
 
		public function ReviseDob(){
			
			$query = $this->pdo->prepare('
				UPDATE Users
				SET DOB = :Date
				WHERE email = :email');
				
			$criteria = ['Date' => $_POST['dob'],
						'email' => $_POST['email']];
			
			return	$query->execute($criteria);	
		}
	
		public function ReviseEmail(){
			
			$query = $this->pdo->prepare('
				UPDATE Users
				SET Email = :newEmail
				WHERE email = :email');
				
			$criteria = ['newEmail' => $_POST['newEmail'],
						'email' => $_POST['email']];
			
			return	$query->execute($criteria);	
		}

		public function RevisePassword(){
			
			$query = $this->pdo->prepare('
				UPDATE Users
				SET Password = :password
				WHERE email = :email');
				
			$criteria = ['password' => sha1($_POST['email'] . $_POST['password']),
						'email' => $_POST['email']];
			
			return	$query->execute($criteria);	
		}
	

		public function getArticleByCategory($category){
		
			$query = $this->pdo->prepare('
				SELECT *
				FROM articles
				WHERE categoryID = :category
				ORDER BY publishDate DESC');
				
			$criteria = ['category' => $category];
			
			$query->execute($criteria);
			
			return $query;	
		}

		public function getArticleByAuthor($name){
		
			$query = $this->pdo->prepare('
				SELECT *
				FROM articles
				WHERE articleAuthor = :name
				ORDER BY publishDate DESC');
				
			$criteria = ['name' => $name];
			
			$query->execute($criteria);
			
			return $query;	
		}
	
		public function SaveByName($name){
		
			$query = $this->pdo->prepare('
				SELECT *
				FROM Users
				WHERE FirstName = :name
				');
				
			$criteria = ['name' => $name];
			
			$query->execute($criteria);
			
			return $query;	
		}
	
		public function SaveByEmail($email){
		
			$query = $this->pdo->prepare('
				SELECT *
				FROM Users
				WHERE Email = :email
				');
				
			$criteria = ['email' => $email];
			
			$query->execute($criteria);
			
			return $query;	
		}

		public function SaveComments($email){
		
			$query = $this->pdo->prepare('
				SELECT *
				FROM comment
				WHERE Email = :email
				');
				
			$criteria = ['email' => $email];
			
			$query->execute($criteria);
			
			return $query;	
		}
		// getter method is used to return the value
		public function getServer(){
			return $this->server;
		}
	
		public function getUsername(){
			return $this->username;
		}
	
		public function getPassword(){
			return $this->password;
		}
	
		public function getSchema(){
			return $this->schema;
		}
	
		public function getPdo(){
			return $this->pdo;
		}
	// setter method is used to set the data
		public function setServer($server){
			$this->server = $server;
		}
	
		public function setUsername($username){
			$this->username = $username;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
	
		public function setSchema($schema){
			$this->schema = $schema;
		}
		
		public function setPdo(){
			$this->pdo = $pdo;
		}
	}	