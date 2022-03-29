<?php 
session_start();
include('db_conn.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- font-awesome-cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Create</title>
    <style>
         *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: monospace;
            }

        body{
            background-color: rgba(10, 10, 10, 1);
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h3{
            color: #fff;
            font-size: 20px;
            text-align: center;
            padding: 30px 0px 10px 0px;
        }

        a{
            top: 100px;
            left: 100px;
            position: absolute;
            z-index: 100;
            color: #fff;
            font-size: 20px;
            text-decoration: none;
        }

        a:hover{
            transform: scale(1.2);
            color: #f8f8f8;
        }

        i{
            color: #fff;
        }

        .error{
			color: red;
			padding: 10px;
			border: 1px solid #fff;
			font-size: 15px;
			text-align: center;
		}

        .success{
			color: green;
			padding: 10px;
			border: 1px solid #fff;
			font-size: 15px;
			text-align: center;
		}

        form{
            border: 1px solid #ffff;
        }

        form > .form-group {
            padding: 10px;
            display: flex;
            flex-direction: column;
        }

        form > .form-group > label {
            font-size: 17px;
            color: #fff;
            font-weight: bolder;
            padding: 10px 0px 10px 0px;
        }

        form > .form-group > input[type="text"] {
            padding: 10px 0px 10px 8px;
            font-size: 16px;
        }

        textarea {
            font-size: 16px;
            text-align: left;
        }

        form > .form-group > input[type="file"] {
            padding: 10px 0px 10px 8px;
            font-size: 16px;
            color: #fff;
        }

        form > .form-group > button {
            padding: 10px;
            font-size: 16px;
            color: #000;
            cursor: pointer;
        }

        form > .form-group > button:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>


            <a href="dashboard.php"> <i class="fa fa-arrow-left"></i> Back</a>

            <?php 
            if(isset($_POST['btn_edit'])){

               $edit_id = $_POST['edit_id'];
                $query = "SELECT * FROM slider WHERE id = '$edit_id'";
                $query_run = mysqli_query($conn, $query);

                foreach($query_run as $row){ ?>
                <form action="edit_config.php" method="POST" enctype="multipart/form-data">
                    
                    <h3>Edit Slider</h3>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <input type="hidden" name="new_id"  value="<?php echo $row['id'];?>"> 
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="new_name" placeholder="name" value="<?php echo $row['name'];?>">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="new_description" placeholder="description" value="<?php echo $row['description'];?>">
                    </div> 

                    <div class="form-group">
                    <?php echo '<img src="uploads/'.$row['image'].'" height="100px">'?>
                        <input type="file" name="new_image">
                    </div>

                    <div class="form-group">
                    <button type="submit" name="edit_submit">Uploads</button>
                    </div>

                </form>   
               <?php }
            }
        ?>
       
</body>
</html>