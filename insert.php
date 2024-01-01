<?php
session_start(); 
include("cnx.php");
if(!isset( $_SESSION['name'])){
   header("location:login.php");
   die();
}
if(isset($_POST['submit'])){
    $nom=strtolower(htmlspecialchars(trim($_POST['nom'])));
    $prenom=strtoupper(htmlspecialchars(trim($_POST['prenom'])));
    $pw=md5($_POST['password']);
    $email=strtolower(htmlspecialchars(trim($_POST['email'])));
    $message=strtolower(htmlspecialchars(trim($_POST['message'])));
    $query="insert into stuident(nom,prenome,password,email,message) 
    values('$nom','$prenom','$pw','$email','$message')";
    $result = mysqli_query($cn,$query);
    if($result){
        header("location:selectall.php");
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
    <title>insert</title>

</head>
<body>
<nav class="navbar bg-dark py-2 text-center d-flex justify-content-space-between ">
    <div >
  <form class="container-fluid justify-content-start">

  
    <button class="btn btn-success  me-2" type="button"><a class='text-white text-decoration-none' href="insert.php">Add Player</a></button>
    <button class="btn btn-success me-2" type="button"><a class='text-white text-decoration-none' href="selectall.php">Show All</a></button>
    <button class="btn btn-danger " type="button"><a class='text-white text-decoration-none' href="logout.php">logout</a></button>
    </div>
  <div class='text-light text-right pe-3  fw-bold'>Hey,<?php echo $_SESSION['name'] ?></div>
</nav>
<h4 class='my-5 container'>Show All Stuident Here</h4>

<div class="container bg-info-subtle p-2 rounded mt-5" >

<form action="" method="post">
  <div class="mb-3  ">
    <label for="exampleInputFname1" class="form-label"> Stuident Fname</label>
    <input type="text" class="form-control" name="nom"  id="exampleInputFname1" aria-describedby="nameHelp">
  </div>
  <div class="mb-3  ">
    <label for="exampleInputLname2" class="form-label"> Stuident Lname</label>
    <input type="text" class="form-control" name="prenom"  id="exampleInputLname2" aria-describedby="nameHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label"> Studint Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="mb-3  ">
    <label for="exampleInputemail4" class="form-label"> Stuident Email</label>
    <input type="email" class="form-control" name="email"  id="exampleInputemail4" aria-describedby="nameHelp">
  </div>
  <div class="mb-3  ">
    <label for="exampleInputMessage5" class="form-label">Stuident message</label>
    <textarea  type="text" class="form-control" name="message"  id="exampleInputMessage5" aria-describedby="nameHelp"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary text-center d-block px-2 fs-5 fw-bold m-auto">Submit</button>
</form>
</div>
  
    
</body>
</html>
