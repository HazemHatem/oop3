<?php
session_start();
require_once "UploadFile.php";
require_once "UploadImage.php";
$conn = mysqli_connect('localhost', 'root', '', 'test');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    try {
        $imageUploader = new UploadImage($_FILES['image']);
        if ($imageUploader->upload()) {
            $imageURL = $imageUploader->getImageURL();
            $_SESSION['image']['success'] = "The image has been uploaded successfully.";
            $sql = "INSERT INTO images (`image`) VALUES ('$imageURL')";
            mysqli_query($conn, $sql);
            $_SESSION['image']['id'] = mysqli_insert_id($conn);
            header("Location: index.php", true);
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['image']['error'] = $e->getMessage();
        header("Location: index.php", true);
        exit;
    }
}
