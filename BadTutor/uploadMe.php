<?php
$target_dir = "temp/";
$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
$uploadOk = 1;
$uploadedFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["userfile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["userfile"]["size"] > 2097152) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($uploadedFileType != "doc" && $uploadedFileType != "docx" && $uploadedFileType != "pdf"
&& $uploadedFileType != "txt" ) {
    echo "Sorry, only DOC, DOCX, PDF & TXT files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
		echo "<p></p>";
		echo "<a href='index.html'>Click Here to return to the Home screen.</a>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>