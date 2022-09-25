<?php

    session_start();

    if(!isset($_SESSION['username'])){

        $go = "http://".$_SERVER["HTTP_HOST"];
        header("Location: " . $go);
        exit;
    }
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
				<li><a href="adminArticles.php">Latest Articles</a></li>
			</ul>
		</nav>
		<main>
            <nav>
            <ul>
                <li><a href="adminArticles.php">Admin Articles</a></li>
                
                <li><a href="adminArticles.php?adminActivity=newArticle">Add Articles</a></li>
                <li><a href="adminArticles.php?adminActivity=newCategory">Add Categories</a></li>
                <li><a href="adminArticles.php?adminActivity=editCategory">Edit Categories</a></li>

                <li><a href="logout.php?from=admin">Log Out</a></li>
            </ul>
            </nav>

			<article>

                <?php

                    if(isset($_GET['adminActivity'])){
                        
                        if($_GET['adminActivity'] == 'editForm'){
                            require 'editCategoryForm.php';
                        }

                        if($_GET['adminActivity'] == 'editCategory'){
                            require 'categoryView.php';
                        }

                        if($_GET['adminActivity'] == 'newArticle'){

                            require 'articleForm.php';
                        }
                        if($_GET['adminActivity'] == 'newCategory'){

                            require 'formAddCategory.php';
                                
            
                            }

                        if($_GET['adminActivity'] == 'edit'){
                            require 'dbConnection.php';

                            $artId = (int) $_GET['edit'];
    
                            $select = "SELECT title, content FROM article WHERE id = $artId";
                
                            $articleData = $pdo->query($select);
                
                            foreach($articleData as $articleRow){
                                $articleTitle = $articleRow['title'];
                                $articleContent = $articleRow['content'];
                            }
                            echo '<h2>Edit Articles</h2>';
                            echo '<form action="editArticle.php" method="POST">';
    
                            echo '<label for="editTitle">Article title: </label>';
                            echo '<input type="text" name = "title" id = "editTitle" value = "'.$articleTitle.'" required/>';
                
                            echo '<label for="editContent">Article Content: </label>';
                            echo '<textarea name="content" id="editContent" cols="30" rows="10" required>'.$articleContent.'</textarea>';
                
                            echo '<input type="hidden" name = "hiddenId" value = "'.$_GET['edit'].'">';
                            echo '<input type="submit" value = "submit" name = "submit">';
                            echo '</form>';
                        }



                    }
                    else{
                        require 'dbConnection.php';

                        $articleQuery = "SELECT id, title FROM article";
                        $articleRows = $pdo->query($articleQuery);

                        echo '<h2>All Articles</h2>';
                        echo '<table><tr><th>Id</th><th>Title</th></tr>';                        


                        foreach($articleRows as $dataRow){

                            echo '<tr>
                                    <td>'.$dataRow['id'].'</td>
                                    <td>'.$dataRow['title'].'</td>
                                    <td><button><a href = "adminArticles.php?adminActivity=edit&edit='.$dataRow['id'].'">EDIT</a><button></td>
                                    <td><button><a href = "deleteArticle.php?id='.$dataRow['id'].'">DELETE</a><button></td>
                                  </tr>';
                        }
                        }
                    ?>

            </article>
		</main> 

	</body>
</html>