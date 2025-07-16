<?php
$server = 'db';
    $username = 'root';
    $password = 'csym019';
    $schema = 'goodfood';
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
    [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET sql_mode="TRADITIONAL"']);
?>