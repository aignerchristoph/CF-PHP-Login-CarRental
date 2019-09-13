
<?php

if (isset($_GET['car_id'])) {
   $car_id = $_GET['car_id'];

   echo "id is: ".$car_id;
};



require_once'dbconnect.php';
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<h1>booking page</h1>

<?php


if (isset($_GET['car_id'])) {

	 $sql = "SELECT * FROM cars WHERE car_id='$car_id'";
             $result = $conn->query($sql);
             $chris = $result->fetch_assoc();

   echo '<div class="col-md-3 card">

    		<div class="embed-responsive embed-responsive-16by9">
				<img src="'.$chris['img'].'" class="card-img-top" alt="...">
			</div>
    		<div class="card-body">
      			<h5 class="card-title">'.$chris['car_model'].'</h5>
      			<p class="card-text">'.$chris['car_price'].'</p>
    		</div>
    		<ul class="list-group list-group-flush">
      			<li class="list-group-item">Cras justo odio</li>
      			<li class="list-group-item">Dapibus ac facilisis in</li>
      			<li class="list-group-item">Vestibulum at eros</li>
    		</ul>
    	</div>';}
  ?>
	
</body>
</html>