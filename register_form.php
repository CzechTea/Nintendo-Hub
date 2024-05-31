<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && name = '$name' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'This email/username is already in use.';

   }else{

      if($pass != $cpass){
         $error[] = 'Passwords do not match, try it again.';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register into Nintendo Hub</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Type your username">
      <input type="email" name="email" required placeholder="Type your email">
      <input type="password" name="password" required placeholder="Type your password">
      <input type="password" name="cpassword" required placeholder="Re-type your password (For safety purposes)">
      <select name="user_type">
         <option value="user">User (You can tag your games)</option>
         <option value="admin">Admin (You can add or delete games from the database)</option>
      </select>
      <input type="submit" name="submit" value="Register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Log in</a></p>
   </form>

</div>
<footer> <small>&copy; Czech tea 2024, This web is not co-operated nor endorsed by Nintendo co. Ltd., Everything here is for personal use. please don't sue me :D </small> </footer>
</body>
</html>