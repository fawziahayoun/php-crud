<?php
session_start();
include("cnx.php");


if(isset($_POST['submit'])){

$email= mysqli_real_escape_string($cn, $_POST['email']);

$password= mysqli_real_escape_string($cn, $_POST['password']);

$sql = mysqli_query($cn, "SELECT * FROM stuident WHERE 
password = '$password' AND email='$email'");



 $num = mysqli_num_rows($sql);

if($num > 0){

  $row = mysqli_fetch_array($sql);
  $_SESSION['name'] = $row['nom'];
  $_SESSION['id'] = $row['id'];

  header("location:selectall.php");


  
}else{
  $_SESSION['error'] = 'error';

  $msg = 'password or Email Adress Are Not exict';
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
   <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>login</title>

</head>
<body>
  <nav class="navbar bg-dark py-2 text-center ">
  <form class="container-fluid justify-content-start" > 
    <button class="btn btn-primary me-2" type="button"><a class='text-white text-decoration-none' href="login.php">login</a></button>
    </form>
</nav>

<div class="container bg-info-subtle p-2 rounded mt-5 " >
 <div class='d-block text-center'> <h4 >Login</h4></div>
<form action="" method="post">
<div class="mb-3  ">
    <label for="exampleInputemail4" class="form-label"> Inter Email</label>
    <input type="email" class="form-control" name="email"  id="exampleInputemail4" aria-describedby="nameHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label"> Inter Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <?php if(isset($_SESSION["error"])) {?> 
    <div class="alert alert-danger  text-center"><?php echo $msg ?></div>
 <?php }   ?>     

  <button type="submit" name="submit" class="btn btn-primary text-center d-block px-2 fs-5 fw-bold m-auto">Submit</button>

</form>

</div>
    
</body>
</html>