<?php
    require 'dbConnection.php';

    $id = (int) $_GET['id'];

    $artDel = "DELETE FROM article WHERE categoryId = $id";

    $delQuery = "DELETE FROM category WHERE id = $id ";

    $pdo->query($artDel);
    $pdo->query($delQuery);
            
    $go = "http://".$_SERVER["HTTP_HOST"]."/adminArticles.php?adminActivity=editCategory";
    header("Location: " . $go);
?>