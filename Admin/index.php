<?php 

session_start();
include("db_conn.php");


if (isset($_SESSION['id']) && isset($_SESSION['username'])){
	$user_id = $_SESSION['id'];
	echo ("<script LANGUAGE='JavaScript'>
  window.alert('Logout First ');
  window.location.href='dashboard.php';
  </script>");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- font-awesome-cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<title>LOGIN</title>
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

        form{
            border: 1px solid #ffff;
			padding: 20px;
        }

        form > .form-group {
            padding: 10px;
			width: 350px;
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

		form > .form-group > input[type="password"] {
            padding: 10px 0px 10px 8px;
            font-size: 16px;
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

	 <form action="login_config.php" method="POST" enctype="multipart/form-data">
        
        <h3> <i class="fa fa-user"></i> Admin Login</h3>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="username" placeholder="name">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="password">
        </div> 
        

       <div class="form-group">
         <button type="submit" name="submit">Uploads</button>
       </div>

    </form>
</body>
</html>

