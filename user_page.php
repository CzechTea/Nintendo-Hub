<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User page</title>

   <!-- custom css file link  -->
   <style>
       @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap');
       * {
           font-family: 'Mukta', sans-serif;
           margin: 0;
           padding: 0;
           box-sizing: border-box;
           outline: none;
           border: none;
           text-decoration: none;
       }
       body {
           background: url("css/mariobg.jpg") no-repeat center center fixed;
           background-size: cover;
           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
           margin: 0;
       }
       .content-box {
           background-color: white;
           color: black;
           padding: 20px;
           border-radius: 10px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           text-align: center;
           max-width: 400px;
           width: 100%;
       }

       .content-box h1, .content-box h3, .content-box p {
           margin-bottom: 20px;
       }
   </style>

</head>
<body>
   
<div class="content-box">

   <div class="content">
      <h3>Greetings!</h3>
      <h1>Current user: <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Welcome to the Nintendo Hub!</p>
      <a href="login_form.php" class="btn">Login</a>
      <a href="register_form.php" class="btn">Register</a>
      <a href="logout.php" class="btn">Logout</a>
   </div>

</div>

</body>
</html>