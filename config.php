<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db_name = "project";

$conn = mysqli_connect($server, $username, $password, $db_name);