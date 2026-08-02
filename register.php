<?php include("connection.php"); 

$msg='';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    $select1 = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' ";
    $select_user = mysqli_query($conn,$select1);
    if(mysqli_num_rows($select_user) > 0) {
         $msg = "User Already Exist!";
    } else {
        $insert1 = "INSERT INTO `users` (`name` , `email`, `password` , `user_type`        VALUES ('$name', '$email' , '$password', '$user_type')";
        mysqli_query($conn,$insert1);
        header('Location:login.php');
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
             <h2>Registration</h2>
             <p class="msg"><?= $msg ?></p>
             <div class="form-group">q  apache_request_headers`qqaqq    h8ymn iwow[er4w]
                 <input type="text" name="name" placeholder="Enter Your Name" class="form-control" required>
             </div>
             <div class="form-group">
                 <input type="email" name="email" placeholder="Enter Your Email" class="form-control" required>
             </div>
             <div class="form-group">
                 <select name="user_type" id="" class="form-control">
                     <option value="user">User</option>
                     <option value="admin">Admin</option>
                 </select>
             </div>
             <div class="form-group">
                <input type="password" name="password" placeholder="Enter Your Passowrd" class="form-control">
             </div>
             <div class="form-group">
                <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control">
             </div>
             <button class="btn font-weight-bold" name="submit">Register Now</button>
             <p>Already have an Account? <a href="login.php">Login Now</a></p>
         </form>
    </div>
   

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>