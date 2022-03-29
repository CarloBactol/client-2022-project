<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
     
     <!-- datatables-css -->
     <link rel="stylesheet" href="css/datatables.min.css">
     <style>
          .create-button a{
               top: 160px;
               left: 60px;
               position: absolute;
               font-size: 20px;
               padding: 10px;
               margin-bottom: 12px;
               text-decoration: none;
               color: #18A0FB;
          }
          .table-content{
               margin: 100px;
          }
          button#edit {
               background-color: rgba(0, 0, 255, 0.6);; 
               border: none;
               border-radius: 5px;
               color: white;
               padding: 10px 20px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 16px;
               cursor: pointer;
          }
          button#delete {
               background-color: rgba(255, 0, 0, 0.6);; 
               border: none;
               border-radius: 5px;
               color: white;
               padding: 10px 11px;
               margin-top: 10px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 16px;
               cursor: pointer;
          }
          button#edit:hover {
               background-color: rgba(0, 0, 255, 0.4);; 
          }
          button#delete:hover {
               background-color: rgba(255, 0, 0, 0.4);; 
          }
     </style>
</head>
<body>

     <div class="navbar">
          <a class="active" href="dashboard.php">Dashboard</a> 
          <a href="logout.php">Logout</a>
          <a href="../Mirror/1Home.php">Client User</a>
     </div>

     <div class="create-button">
          <a href="create.php">Add New</a>
     </div>

     <div class="table-content" >
     <table id="mytable" style="text-align: center;" border>
          <thead>
               <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Descriptions</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Action</th>
               </tr>
          </thead>
          <tbody>

          <?php
          
          $conn = mysqli_connect("localhost", "root", "", "client-2022");
          if($conn->connect_error){
               die("Error connecting to database".$conn->connect_error);
          }

          $sql = "SELECT * FROM slider";
          $result = $conn->query($sql);

          if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){ ?>
                   
                    <tr>
                         <td><?php echo $row['id']; ?></td>
                         <td><?php echo $row['name']; ?></td>
                         <td><?php echo $row['description']; ?></td>
                         <td><?php echo '<img src="uploads/'.$row['image'].' " height="60px">' ?></td>
                         <td><?php echo $row['created_at']; ?></td>
                         <td>
                             <form action="edit_slider.php" method="POST">
                                  <input type="hidden" name="edit_id"  value="<?php echo $row['id'] ?>">
                                  <button type="submit" id="edit" name="btn_edit">Edit</button>
                             </form>

                             <form action="delete_config.php" method="POST">
                                  <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                  <input type="hidden" name="delete_image" value="<?php echo $row['image'] ?>">
                                  <button type="submit" id="delete" name="btn_delete">Delete</button>
                             </form>
                              
                         </td>
                    </tr>
              <?php    
               }
          }
     
          ?>
          </tr>
          </tbody>
          </table> 
     </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- <script src="js/datatables.min.js"></script> -->
<script type="text/javascript">

     $(document).ready( function () {
     $('#mytable').DataTable();
     });

</script>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>