<?php

require_once('db_conn.php');


// Update-FORM
if(isset($_POST["edit_submit"])){

    //validate text
    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }


    $new_id = $_POST["new_id"];
    $name = validate($_POST["new_name"]);
    $description = validate($_POST["new_description"]);
  
    if(empty($name)){
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Name is required');
          window.location.href='dashboard.php';
          </script>");
    }else  if(empty($description)){
      echo ("<script LANGUAGE='JavaScript'>
            window.alert('Description is required');
            window.location.href='dashboard.php';
            </script>");
    }else  if($_FILES["new_image"]["error"] == 4){
      // header("Location: edit_slider.php?error=Insert image!");
      // exit();
      echo ("<script LANGUAGE='JavaScript'>
  window.alert('No image inserted!');
  window.location.href='dashboard.php';
  </script>");
    }
    else{
      $fileName = $_FILES["new_image"]["name"];
      $fileSize = $_FILES["new_image"]["size"];
      $tmpName = $_FILES["new_image"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Image fileextension not allowed!');
        window.location.href='dashboard.php';
        </script>");
      }
      else if($fileSize > 1000000){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Image fileSize to large!');
        window.location.href='dashboard.php';
        </script>");
      }
      else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
  
        move_uploaded_file($tmpName, './uploads/' . $newImageName);
        $query = "UPDATE  slider SET name='$name', description='$description', image='$newImageName' WHERE id='$new_id' ";
        mysqli_query($conn, $query);
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Updated Successfully!');
        window.location.href='dashboard.php';
        </script>");
      }
    }
  }
  
  // END-INSERT-FORM
  
?>