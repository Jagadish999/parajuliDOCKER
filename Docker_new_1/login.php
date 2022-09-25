<?php
require 'dbConnection.php';

$userName = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];

$findQuery = "SELECT fullname from users WHERE email = '$email' AND password = '$password'";

$account = $pdo->query($findQuery);

$found = false;

foreach($account as $singleRow){

    if($singleRow['fullname'] == $userName){

        if($singleRow['fullname'] == $userName){
            $found = true;
        }
}
}

if($found == true){

    session_start();
    

    if($type == 'Admin'){

        $_SESSION['username'] = $userName;
        
        $go = "http://".$_SERVER["HTTP_HOST"] . "/adminArticles.php";
        header("Location: " . $go);
        exit();
    }
    else if($type == 'User'){

        $_SESSION['username'] = $userName;

        $go= "http://".$_SERVER["HTTP_HOST"] . "/index.php";
        header("Location: " . $go);
    }
}
else{
    echo "account not found";
}

?>