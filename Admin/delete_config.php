<?php 

include('db_conn.php');

if(isset($_POST['btn_delete'])){
    $delete_id = $_POST['delete_id'];
    $delete_image = $_POST['delete_image'];

    $query = "DELETE FROM slider WHERE id = $delete_id";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        unlink("uploads/".$delete_image);
        echo
        "<script> alert('Deleted Successfully!');
        window.location.href='dashboard.php';
        </script>"
        ;
    }else{
        echo
        "<script> alert('Error while deleting!');
        window.location.href='dashboard.php';
        </script>";
    }
}





