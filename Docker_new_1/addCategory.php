<?php
        require 'dbConnection.php';

        $name = $_POST['category'];

        $insert = "INSERT INTO category(name) VALUES('$name')";

        $result = $pdo->query($insert);

        if($result){
            
            $go = "http://".$_SERVER["HTTP_HOST"]."/adminArticles.php?adminActivity=editCategory";
            header("Location: " . $go);
        }

?>