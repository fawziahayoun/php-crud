<?php

session_start();

include("cnx.php");
if(!isset( $_SESSION['name'])){
   header("location:login.php");
   die();

}?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>logout</title>
    
</head>
<body>
<div>
    
  <nav class="navbar bg-dark py-2 text-center d-flex justify-content-space-between ">
    <div >
  <form class="container-fluid justify-content-start">

  
    <button class="btn btn-success  me-2" type="button"><a class='text-white text-decoration-none' href="insert.php">Add Player</a></button>
    <button class="btn btn-success me-2" type="button"><a class='text-white text-decoration-none' href="selectall.php">Show All</a></button>
    <button class="btn btn-danger " type="button"><a class='text-white text-decoration-none' href="logout.php">logout</a></button>
    </div>
  <div class='text-light text-right pe-3  fw-bold'>Hey,<?php echo $_SESSION['name'] ?></div>
</nav>
<?php

$query="select * from stuident";
$res=mysqli_query($cn,$query);
if(mysqli_num_rows($res)>0){
    ?>
    <div class="my-5 container">
        <h4>Show All Stuident Here</h4>
    <table class="table table-dark table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">firstName</th>
      <th scope="col">lastName</th>
      <th scope="col">email</th>
      <th scope="col">message</th>
      <th scope="col">delete</th>
      <th scope="col">edit</th>


    </tr>
  </thead><?php
    while($row=mysqli_fetch_array($res)){

        ?>
         <tbody>
    <tr>
      <td> <?php echo $row['id']  ?></td>
      <td><?php echo $row['nom'] ?></td>
      <td><?php echo $row['prenome']  ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['message']  ?></td>
      <td><form action='delete.php'  method='post' >
            <input type='hidden' name='id' value= <?php echo $row['id'] ?> >
            <input class='btn btn-danger' type='submit' name='delete'  value='delete'/>
            
          </form></td>
      <td><form action='edit.php'  method='post' >
            <input type='hidden' name='id' value= <?php echo $row['id'] ?> >
            <input class='btn btn-warning' type='submit' name='edit'  value='update'/>
            
          </form></td>
    </tr>
  </tbody> <?php

    } 
    ?>  
    </table>
    </div>
    <?php
    mysqli_free_result($res);

}else{
    echo"no records";
}
mysqli_close($cn);

?>
</body>
</html>









