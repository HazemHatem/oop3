<?php
session_start();
require_once "UploadFile.php";
require_once "UploadAudio.php";
$conn = mysqli_connect('localhost', 'root', '', 'test');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['audio'])) {
    try {
        $audioUploader = new UploadAudio($_FILES['audio']);
        if ($audioUploader->upload()) {
            $audioURL = $audioUploader->getAudioURL();
            $_SESSION['audio']['success'] = "The audio file has been uploaded successfully.";
            $sql = "INSERT INTO audio (`audio`) VALUES ('$audioURL')";
            mysqli_query($conn, $sql);
            $_SESSION['audio']['id'] = mysqli_insert_id($conn);
            header("Location: index.php", true);
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['audio']['error'] = $e->getMessage();
        header("Location: index.php", true);
        exit;
    }
}
