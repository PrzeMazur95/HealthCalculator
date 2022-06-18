<?php

// echo "<pre>";

// print_r($_FILES['file_upload']);

// echo "</pre>";

$upload_errors = array (

    UPLOAD_ERR_OK => "There is no error",
    UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize",
    UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE",
    UPLOAD_ERR_PARTIAL=> "The uploaded file was onlu partlly uploaded",
    UPLOAD_ERR_NO_FILE => "No file was uploaded",
    UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
    UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
    UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."


);

$temp_name = $_FILES['file_upload']['tmp_name'];
$the_file = $_FILES['file_upload']['name'];
$directory = "uploads";


if(move_uploaded_file($temp_name, $directory."/".$the_file)){

    $the_message = "File uploaded succesfully";


} else {

    $the_error = $_FILES['file_upload']['error'];
    echo $the_message = $upload_errors[$the_error];

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

if(!empty($upload_errors)){

    echo $the_message;

}


?>

<form action="upload.php" enctype="multipart/form-data" method="post">
<input type="file" name="file_upload">
<input type="submit" name="submit">

</form>
    
</body>
</html>
