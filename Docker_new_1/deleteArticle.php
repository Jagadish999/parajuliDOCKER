<?php
    require 'dbConnection.php';

    $id = (int) $_GET['id'];

    $delQuery = "DELETE FROM article WHERE id = $id";

    $pdo->query($delQuery);
            
    $go = "http://".$_SERVER["HTTP_HOST"]."/adminArticles.php";
    header("Location: " . $go);
?>