  <?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  // if session is not set this will redirect to login page
  if( !isset($_SESSION[ 'user' ]) ) {
   header("Location: index.php");
   exit;
  }
  // select logged-in users details
  $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
  ?>
  <!DOCTYPE html>
  <html>
  <head >
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
  </head>
  <body >
             Hi <?php echo $userRow['userName' ]; ?>
             
             <a  href="logout.php?logout">Sign Out</a>


  <div class=row>




   <?php
             $sql = "SELECT * FROM cars WHERE car_availability=1";
             $result = $conn->query($sql);

              if($result->num_rows > 0) {
                  while($chris = $result->fetch_assoc()) {
                     echo  '<div class="col-md-3 card">
    <img src="'.$chris['img'].'" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">'.$chris['car_model'].'</h5>
      <p class="card-text">'.$chris['car_price'].'</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Cras justo odio</li>
      <li class="list-group-item">Dapibus ac facilisis in</li>
      <li class="list-group-item">Vestibulum at eros</li>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a>
    </div>

  </div>' ;
                 }
             } else  {
                 echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
               }
  ?>






    
  </div>
   
  </body>
  </html>
  <?php ob_end_flush(); ?>