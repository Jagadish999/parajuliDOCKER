<?php
    require 'dbConnection.php';

    $idOfArticle = $_POST['hiddenId'];

    $newTitle = $_POST['title'];

    $newContent = $_POST['content'];

    $queryToUpdate = "UPDATE article
        SET title = '$newTitle', content = '$newContent'
        WHERE id = $idOfArticle";


    if($pdo->query($queryToUpdate)){

            
        $go = "http://".$_SERVER["HTTP_HOST"]."/adminArticles.php";
        header("Location: " . $go);
    }

?>