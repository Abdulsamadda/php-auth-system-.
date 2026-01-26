
<?php
$login=0;
$invalid=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE username='$username' and password='$password' ";
    
    $result = mysqli_query($conn, $sql);
    if ($result){
        $num= mysqli_num_rows($result);
         if ($num>0) {
             $login=1;
             header ('location:home.php');
            
        } else {
             $invalid=1;
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">LOGIN PAGE</h1>
    <?php
  if($invalid){
    echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
    <strong> ERROR</strong> INVALID CREDENTIALS
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

  ?>
  <?php
  if($login){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert"> 
    <strong> Success</strong> Login Successful
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

  ?>
    <div class="container" >
<form action= "login.php" method="POST">
  <div class="mb-3 ">
    <label for="exampleusername" class="form-label">Username</label>
    <input type="username" class="form-control" placeholder="Enter Your Username" name="username"> 
  </div>
  <div class="mb-3">
    <label for="userpassword" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter Your Pasword Here" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100"  >Login</button>
</form>
 </div>
</body>
</html>;
