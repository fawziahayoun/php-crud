<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>edit</title>

</head>
<body>
<?php 
session_start();
include("cnx.php");
if(!isset( $_SESSION['name'])){
   header("location:login.php");
   die();

}

$id = $_POST['id'];

$sql = "SELECT * FROM stuident WHERE id = '$id'";
$res= mysqli_query($cn,$sql);
if($res){
while($row = mysqli_fetch_array($res)){
?>
 <nav class="navbar bg-dark py-2 text-center d-flex justify-content-space-between ">
    <div >
  <form class="container-fluid justify-content-start">

  
    <button class="btn btn-success  me-2" type="button"><a class='text-white text-decoration-none' href="insert.php">Add Player</a></button>
    <button class="btn btn-success me-2" type="button"><a class='text-white text-decoration-none' href="selectall.php">Show All</a></button>
    <button class="btn btn-danger " type="button"><a class='text-white text-decoration-none' href="logout.php">logout</a></button>
    </div>
  <div class='text-light text-right pe-3  fw-bold'>Hey,<?php echo $_SESSION['name'] ?></div>
</nav>

<h2 class='dext-dark-50 container mt-5'> Change Stuident information</h2>
    <div class="container bg-info-subtle p-2 rounded mt-5" >
<form action="" method="post">
<div class="mb-3  ">
    <input type="hidden" name="id" placeholder="name...." value=<?php echo $row['id'] ?>>
  </div>
  <div class="mb-3  ">
    <label for="nom" class="form-label" > Stuident Fname</label>
    <input type="text" class="form-control" name="nom" placeholder="name...." value=<?php echo $row['nom'] ?>><br>
  </div>
  <div class="mb-3  ">
    <label for="prenom" class="form-label"> Stuident Lname</label>
    <input type="text" class="form-control" name="prenome" placeholder="prenome..." value=<?php echo $row['prenome'] ?>><br>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label"> Studint Password</label>
    <input type="password" class="form-control" name="password" placeholder="mot de passe..." value=<?php echo $row['password'] ?>><br>
  </div>
  <div class="mb-3  ">
    <label for="email" class="form-label"> Stuident Email</label>
    <input type="text" class="form-control" name="email" placeholder="email.." value=<?php echo $row['email'] ?>><br>
  </div>
  <div class="mb-3  " class="form-label">
    <label for="message" class="form-label">Stuident message</label>
    <input type="text" class="form-control" name="message" placeholder="message..." value=<?php echo $row['message'] ?>><br>
  </div>
  <button type="submit"  name="update" class="btn btn-primary text-center d-block px-2 fs-5 fw-bold m-auto">Shange</button>
</form>
</div>

<?php 
if(isset($_POST['update'])){
$nom = $_POST['nom'];
$prenome = $_POST['prenome'];
$password = $_POST['password'];
$email = $_POST['email'];
$message = $_POST['message'];

    $query= "UPDATE stuident SET nom='$nom',prenome = '$prenome', 
    password='$password', email='$email', message='$message' WHERE id='$id' ";

    $result = mysqli_query($cn, $query);
    if($result){
        echo "<script>alert{'list edit seccusfully'};</script>";
        header("location: selectall.php ");

    }else{
        echo "erro ypdating";
    };
};

}

} ?>
    
</body>
</html>