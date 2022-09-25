<?php

    $server = 'db';
    $username = 'user';
    $password = 'user';
    $schema = 'assignment1';

    //code to connect with database
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server , $username , $password);

?>