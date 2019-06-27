<?php
namespace OCFram;

class Upload
{

  
      public function uploadImage($tableImage)
      {
         $erreur[] = array();
         $err =0;  
        define('WEBROOTT', dirname(__FILE__));
        define('BASE_URLL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
        define('ROOTMODULES', dirname(WEBROOTT));
        define('ROOTBACKEND', dirname(ROOTMODULES));

        //define('ROOTAPP', dirname(ROOTBACKEND));
       // define('ROOT', dirname(ROOTAPP));

        $target_dir = ROOTBACKEND."\Web\img\uploads\\";     
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
         if (!empty($tableImage['tmp_name'])) {
          $check = getimagesize($tableImage['tmp_name']);
          if($check !== false) {
           $erreur = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
             $err = 0;
          } else {
            $uploadOk = 0;
          }
         }else{
          $erreur = "Sorry, Fichier invalide ";
           $err = 0;
         }
          
        }

              // Vérifier si le fichier existe déjà
        if (file_exists($target_file)) {
          $erreur = "Sorry, file already exists.";
          $uploadOk = 0;
           $err = 1;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
          $erreur = "Sorry, file already exists.";
          $uploadOk = 0;
           $err = 1;
        }
    // Check file size
        if ($tableImage['size'] > 1000000) {
          $erreur = "Sorry, your file is too large.";
          $uploadOk = 0;
           $err = 1;
        }
    // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
          $erreur = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
         $err = 1;
      }

    // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $erreur = "Sorry, your file was not uploaded.";
         $err = 1;
    // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($tableImage['tmp_name'], $target_file)) {
          $erreur = "The file ". basename($tableImage['tmp_name']). " has been uploaded.";
        } else {
          $erreur = "Sorry, there was an error uploading your file.";
          $err = 1;
        }
      }
  
      return $tableImage;
      
    }
}