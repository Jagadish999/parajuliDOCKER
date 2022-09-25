<?php
    session_start();

    if(isset($_GET['from'])){
        session_destroy();
        $go = "http://".$_SERVER["HTTP_HOST"];
        header("Location: " . $go);
        exit;
    }
?>