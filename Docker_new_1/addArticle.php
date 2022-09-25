<?php
    require 'dbConnection.php';

        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryId = $_POST['category'];
        $date = date("y-m-d");
        $time = date("h:i:s");

        $dateTime = $date . " " . $time;

        $insert = "INSERT INTO article(title, content, categoryId, publishDate)
             VALUES('$title', '$content', '$categoryId', '$dateTime')";

        $pdo->query($insert);

            $go = "http://".$_SERVER["HTTP_HOST"]."/adminArticles.php?action=edit";
            header("Location: " . $go);
    
?>