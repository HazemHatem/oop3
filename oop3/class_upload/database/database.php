<?php


$conn = mysqli_connect('localhost', 'root', '');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS test";
mysqli_query($conn, $sql);
mysqli_close($conn);

$conn = mysqli_connect('localhost', 'root', '', 'test');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL
)";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS audio (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    audio VARCHAR(255) NOT NULL
)";
mysqli_query($conn, $sql);

mysqli_close($conn);
