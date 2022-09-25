<?php
    require 'dbConnection.php';
        
        $name = $_POST['name'];
        $id = (int) $_POST['category'];

        $updateQuery = "UPDATE category
                    SET name = '$name'
                    WHERE id = $id";

        $pdo->query($updateQuery);
            
        $go = "http://".$_SERVER["HTTP_HOST"]."/adminArticles.php?adminActivity=editCategory";
        header("Location: " . $go);
        
?>