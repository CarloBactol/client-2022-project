<?php 

session_start();
include('db_conn.php');


// INSERT-FORM
if(isset($_POST["submit"])){

      //validate text
      function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST["name"]);
    $description = validate($_POST["description"]);
    
    if(empty($name)){
      header("Location: create.php?error=Name is required!");
      exit();
    }else if(empty($description)){
      header("Location: create.php?error=Description is required!");
      exit();
    }else  if($_FILES["image"]["error"] == 4){
      header("Location: create.php?error=No image found!");
      exit();
    }
    else{
      $fileName = $_FILES["image"]["name"];
      $fileSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        header("Location: create.php?error=Invalid images!");
        exit();
      }
      else if($fileSize > 1000000){
        header("Location: create.php?error=Image filesize is to large!");
       exit();
      }
      else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
  
        move_uploaded_file($tmpName, './uploads/' . $newImageName);
        $query = "INSERT INTO slider(name, description, image) VALUES('$name', '$description', '$newImageName')";
        mysqli_query($conn, $query);
        header("Location: create.php?success=Successfully Added!");
        exit();
      }
    }
  }

  // END-INSERT-FORM
?>