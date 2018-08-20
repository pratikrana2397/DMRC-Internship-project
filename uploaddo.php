<?php
  $page_title = 'Upload Signed report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  
?>
<?php
$target_dir = "uploads/document/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
// Check if file already exists
if (file_exists($target_file)) {
    $session->msg('d',"Sorry, file already exists.");
    redirect('uploadorepo.php',false);
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {

    $session->msg('d',"Sorry, your file is too large.");
        redirect('uploadorepo.php',false);
    $uploadOk = 0;
}
// Allow certain file formats
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $session->msg('d',"Sorry, your file was not uploaded.");
        redirect('uploadorepo.php',false);
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $session->msg('s',"The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
            redirect('uploadorepo.php',false);
    } else {
        $session->msg('d',"Sorry, there was an error uploading your file.");
        redirect('uploadorepo.php',false);
    }
}
?>