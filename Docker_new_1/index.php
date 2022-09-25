<?php
	//database implementation
	require 'dbConnection.php';
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php?show=latestArticle">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
					<ul>

					<?php
						/*Displaying all list of categories from database*/
						$categoryListQuery = "SELECT id, name FROM category";

						$arrCategoryList = $pdo->query($categoryListQuery);

						$categoryList = "";
						foreach($arrCategoryList as $lists){

							$categoryList .= '<li><a href ="index.php?show=basedCategory&id='.$lists['id'].'">'.$lists['name'] . '</a></li>';
						}
						echo $categoryList;
					?>

					</ul>
				</li>
			</ul>
		</nav>

		<main>
			<nav>
				<ul>

					<?php
					//login if not logged in
						if(!isset($_SESSION['username'])){
							echo '<li><a href="index.php?show=loginPage">Login</a></li>
							<li><a href="index.php?show=regPage">Register</a></li>';
						}
						//logout if logged in
						else{
							echo '<li><a href="logout.php?from=index">Logout</a></li>';
						}

					?>
					
				</ul>
			</nav>

			<article>

				<?php
				/*top articles selection*/
				function latestArticle($pdo){
					$latestArticleQuery = "SELECT * FROM article ORDER BY id DESC";
					$latestArticle = $pdo->query($latestArticleQuery);

					$i = 1;
					$articleList = "";
					foreach($latestArticle as $articleData){

						$i++;
						
						$articleList .= '<h3><a class="articleLink" href = "index.php?show=complete&articleId='.$articleData['id'].'">'.$articleData['title'] . '<br>' . $articleData['publishDate'] .'</a></h3>' . '<br>';

						if($i > 10){
							break;
						}
					}
						return $articleList;
				}
				

				if(isset($_GET['show'])){
					if($_GET['show'] == 'latestArticle'){
						echo latestArticle($pdo);
					}
					if($_GET['show'] == 'basedCategory'){
						require 'category.php';
					}
					if($_GET['show'] == 'complete'){
						require 'fullArticle.php';
					}
					if($_GET['show'] == 'loginPage'){
						echo '<article> 
						<form action="login.php" method="POST">
					
							<p>LOGIN DETAILS: </p>
					
							<label for="UserFullName">User Fullname: </label> 
							<input type="text" name = "name" id = "UserFullName" required/>
					
							<label for="userEmail">Email: </label> 
							<input type="email" name = "email" id = "userEmail" required/>
					
							<label for="password">Password: </label> 
							<input type="password" name = "password" id = "password" required/>
					
							<label for="accType">Account type: </label>
							<select name="type" id="accType" required>
					
								<option>User</option>
								<option>Admin</option>
					
							</select>
					
							<input type="submit" name="submit" value="Log In" />
						</form>
					
					</article>';
					}
					if($_GET['show'] == 'regPage'){
						echo '<article> 
						<form action="register.php" method="POST">
					
							<p>REGISTRATION DETAILS: </p>
					
							<label for="UserFullName">Name: </label> 
							<input type="text" name = "name" id = "UserFullName" required/>
					
							<label for="userEmail">Email: </label> 
							<input type="email" name = "email" id = "userEmail" required/>
					
							<label for="password">Password: </label> 
							<input type="password" name = "password" id = "password" required/>
					
							<input type="submit" name="submit" value="Register" />
						</form>
					
					</article>';
					}
				
				}
				else{
					echo latestArticle($pdo);
				}
				?>

			</article>
		</main> 

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>