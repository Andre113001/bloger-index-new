<?php 
session_start();

date_default_timezone_set('Hongkong');

$servername = "localhost";
$user = "root";
$pass = "";
$db = "bloger_database";

$conn = mysqli_connect($servername, $user, $pass, $db);



?>