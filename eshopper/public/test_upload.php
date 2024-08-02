<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $uploadPath = __DIR__ . '/storage/catalogues/' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            echo "File uploaded successfully.";
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
