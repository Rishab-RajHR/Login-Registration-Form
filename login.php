<?php 
include("connection.php"); 
session_start();
$msg='';
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
    $select_user = mysqli_query($conn, $select);
    if(mysqli_num_rows($select_user) > 0) {
       $row1 = mysqli_fetch_assoc($select_user);
       if($row1['user_type'] == 'user'){
          $_SESSION['user'] = $row1['email'];
          $_SESSION['id'] = $row1['id'];
          header('Location:user.php');
       }
       elseif($row1['user_type'] == 'admin'){
          $_SESSION['admin'] = $row1['email'];
          $_SESSION['id'] = $row1['id'];
          header('Location:admin.php');
       }
       else{
          $msg = "Incorrect email and password!";
       }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Register Form</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="form">
         <form action="" method="post">
             <h2>Login</h2>
             <p class="msg"></p>
  
             <div class="form-group">
                 <input type="email" name="email" placeholder="Enter Your Email" class="form-control" required>
             </div>
        
             <div class="form-group">
                <input type="password" name="password" placeholder="Enter Your Passowrd" class="form-control">
             </div>
            
             <button class="btn font-weight-bold" name="submit">Login Now</button>
             <p>Don't have an Account? <a href="register.php">Register Now</a></p>
         </form>
    </div>
   

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>