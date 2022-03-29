<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart mirror</title>
    <link rel="stylesheet" href="1Home.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
  </head>


  <body>
   <div class="slider">
   <?php
          
          $conn = mysqli_connect("localhost", "root", "", "client-2022");
          if($conn->connect_error){
               die("Error connecting to database".$conn->connect_error);
          }

          $sql = "SELECT * FROM slider";
          $result = $conn->query($sql);

          $sql = "SELECT * FROM slider";
          $result = $conn->query($sql);

          if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){ ?>
                   <div class="slide active">
                    <?php echo '<img src="../Admin/uploads/'.$row['image'].'">'?>
                     <div class="info">
                       <h2><?php echo $row['name']; ?></h2>
                       <p>
                       <?php echo $row['description']; ?>
                       </p>
                     </div>
                   </div>

              <?php    
               }
          }
     
          ?>
               
      <!-- <div class="slide">
        <img src="img/chess.jpg" alt="" />
        <div class="info">
          <h2>Chess competition</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>
      <div class="slide">
        <img src="img/running.jpg" alt="" />
        <div class="info">
          <h2>Track and Field</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>
      <div class="slide">
        <img src="img/sepak.jpg" alt="" />
        <div class="info">
          <h2>Sepak Takraw</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>
      <div class="slide">
        <img src="img/concert.jpg" alt="" />
        <div class="info">
          <h2>Band competition</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div> -->
      <div class="navigation">
        <i class="fas fa-chevron-left prev-btn"></i>
        <i class="fas fa-chevron-right next-btn"></i>
      </div>
      <div class="navigation-visibility">
        <div class="slide-icon active"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
      </div>
    </div> 

   
    <div class="all">
      <div class"container">
    <a href="2Exam.php" target="_self" 
    class="button1 bouncy">Exams</a>
    
    <a href="3Page.php" target="_self"
    class="button1 bouncy"
    style="animation-delay: 0.07s" >Paging</a >

    <a href="4Map.php" 
    class="button1 bouncy" 
    style="animation-delay: 0.14s">School Map</a >

    <a href="5Google.php" target="_self"
    class="button1 bouncy" 
    tyle="animation-delay: 0.21s">Google</a>

     <a href="6Achv.php" target="_self" 
    class="button1 bouncy" 
    style="animation-delay: 0.14s">Achievements</a >

    <a href="7Board.php" target="_self" 
    class="button1 bouncy" 
    tyle="animation-delay: 0.21s">Boardmember</a>

    <a href="8About.php" target="_self"
    class="button1 bouncy" 
    tyle="animation-delay: 0.21s">About us</a>

    <a href="../Admin/dashboard.php" target="_self"
    class="button1 bouncy" 
    tyle="animation-delay: 0.21s">Login</a>
</div>
</div>
    <script src="1Home.js"></script>

 

  </body>
</html>
