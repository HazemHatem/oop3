<?php
session_start();
if (isset($_SESSION['image']['id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'test');
    $sql = "SELECT * FROM images WHERE id = " . $_SESSION['image']['id'];
    $result = mysqli_query($conn, $sql);
    $row_image = mysqli_fetch_assoc($result);
}

if (isset($_SESSION['audio']['id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'test');
    $sql = "SELECT * FROM audio WHERE id = " . $_SESSION['audio']['id'];
    $result = mysqli_query($conn, $sql);
    $row_audio = mysqli_fetch_assoc($result);
}
?>

<form method="POST" action="upload_image.php" enctype="multipart/form-data">
    <?php if (isset($_SESSION['image']['error'])) : ?>
        <p style="color: red"><?php echo $_SESSION['image']['error']; ?></p>
    <?php endif; ?>
    <img src="<?php echo isset($row_image['image']) ? $row_image['image'] : 'uploads/images/01.png'; ?>" alt="Uploaded Image">
    <input type="file" name="image" required>
    <button type="submit">Upload Image</button>
</form>

<form method="POST" action="upload_audio.php" enctype="multipart/form-data">
    <?php if (isset($_SESSION['audio']['error'])) : ?>
        <p style="color: red"><?php echo $_SESSION['audio']['error']; ?></p>
    <?php endif; ?>
    <audio src="<?php echo isset($row_audio['audio']) ? $row_audio['audio'] : 'uploads/audios/001.mp3'; ?>" controls></audio>
    <input type="file" name="audio" required>
    <button type="submit">Upload Audio</button>
</form>

<script>
    <?php if (isset($_SESSION['image']['success'])) : ?>
        alert("<?php echo $_SESSION['image']['success']; ?>");
        <?php unset($_SESSION['image']['success']); ?>
    <?php elseif (isset($_SESSION['audio']['success'])) : ?>
        alert("<?php echo $_SESSION['audio']['success']; ?>");
        <?php unset($_SESSION['audio']['success']); ?>
    <?php endif; ?>
</script>
<?php
unset($_SESSION['image']['error']);
unset($_SESSION['audio']['error']);
?>