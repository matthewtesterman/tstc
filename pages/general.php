<?php
$success;
$message;
/**
 * Simple function to replicate PHP 5 behaviour
 */
function get_microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec) * 100;
}

function upload_file()
{
    global $success, $message;
    $success = true;
    $message = "";
    global $success, $message;

    $target_dir = "../repository/";
    $file_name = basename($_FILES["uploadfile"]["name"]);
    $file_ext = end((explode(".", $file_name)));

    $target_file = $target_dir . get_microtime_float() . '.' . $file_ext;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        /* $check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
          if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
          } else {
          echo "File is not an image.";
          $uploadOk = 0;
          } */
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $success = false;
        $message = "<span class='glyphicon glyphicon-warning-sign'></span> Your file already exists. Please try again or another file.";                  
        $uploadOk = 0;                    
    }
    // Check file size

    if ($_FILES["uploadfile"]["size"] > 100000000) {
        $success = false;
        $message = "<span class='glyphicon glyphicon-warning-sign'></span>Your file is too large. Please compress file or choose another.";                  
        $uploadOk = 0;
        echo "UPLOAD!!";
    }
    // Allow certain file formats
    /* if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      } */
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0 && $success)
    {
        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {

            chmod($target_file, 0777);
            $success = true;
            $message = "<span class='glyphicon glyphicon-check'></span>Successfully Uploaded file!";
        } 

        else 
        {
            $success = false;
        $message = "<span class='glyphicon glyphicon-warning-sign'></span>There was an error in uploading your file. It may be too large.";                  
        }
    }
}