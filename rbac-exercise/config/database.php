<?php
$host     = 'localhost';
$dbname   = 'rbac_demo';
$username = 'root';
$password = 'root';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
