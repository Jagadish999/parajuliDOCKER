<?php
    require 'dbConnection.php';

	$newName = $_POST['name'];
	$newEmail = $_POST['email'];
	$password = $_POST['password'];

	$insert= "INSERT INTO users(fullname, email, password)
							   VALUES('$newName', '$newEmail', '$password')";

    $pdo->query($insert);

    $go = "http://".$_SERVER["HTTP_HOST"] . "/index.php?show=loginPage";

    header("Location: " . $go);
?>

