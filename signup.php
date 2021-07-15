<?php error_reporting(0);
session_start();
$msg="";

if(isset($_SESSION["uid"])) {
   header("Location: account.php");
}

else {

   include('Database.php');

   $csql="SELECT `uemail` FROM `users` WHERE `uemail` = '{$_POST["email"]}'";
   $dta=$conn->query($csql);

   if(mysqli_num_rows($dta) > 0) {
      $conn->close();
      echo '
<script>alert("Account Already Exists please Login");
      window.location.href="login.php";
      </script>';

   }

   else {
      if(isset($_POST["Createac"])) {
         $name=$_POST["name"];
         $email=$_POST["email"];
         $phone=$_POST["phone"];
         $password=$_POST["password"];

         $query="INSERT INTO `users`(`uname`, `uemail`, `uphone`, `upassword`) 
VALUES ('$name', '$email', '$phone', '$password')";
$conn->query($query);
         echo '
<script>alert("Account Created");
         window.location.href="login.php";
         </script>';

      }
   }

}

?><html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>The RIVERWAYS RETREAT</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <style>
      *{
         margin: 0;
         padding: 0;
         text-decoration: none;
      }
      body {
         display: flex;
         height: 100vh;
         justify-content: center;
         align-items: center;
         padding: 10px;
         background-image: linear-gradient(120deg,#fc575e, #90d5ec);
         font-family: 'Poppins' ,sans-serif;
      }

      .signupbox {
         width: 400px;
         height: 500px;
         background: #fff;
         color: #000;
         padding: 25px 30px;
         border-radius: 10px;
      }

      .signupbox form .form-group {
         display: flex;
      }

      form .form-group .my-input {
         width: clac(100% / 2 - 20px);
      }

      .send-button {
         background: linear-gradient(120deg,#fc575e, #90d5ec);
         width: 100%;
         font-weight: 600;
         color: #fff;
         padding: 8px 25px;
         border: none;
         outline: none;
         transition: .5s;
         background-size: 150%;
      }

      .send-button:hover {
         background-position: right;

      }

      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
         -webkit-appearance: none;
         margin: 0;
      }

      .my-input {
         
         box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
         cursor: text;
         padding: 8px 10px;
         transition: border .1s linear;
      }
      
      .bottom-text{
         margin-top: 25px;
         text-align: center;
      }

      h1 {
         margin-top: 20px;
         margin-bottom: 30px;
         padding: 0 0 20px;
         text-align: center;
         font-size: 31px;
         line-height: 40px;
         font-weight: 600;
         color: #000;
      }

      h2 {
         color: #5e8396;
         font-size: 21px;
         line-height: 32px;
         font-weight: 400;
      }

      .login-or {
         position: relative;
         color: #aaa;
         margin-top: 10px;
         margin-bottom: 10px;
         padding-top: 10px;
         padding-bottom: 10px;
      }

      @media screen and (max-width:480px) {
         h1 {
            font-size: 26px;
         }

         h2 {
            font-size: 20px;
         }
      }
   </style>
</head>

<body>
   
   
   <div class="signupbox">
      <h1>Sign Up Here</h1>
      <div class="myform form ">
         <form action="" method="post" name="login">
            <div class="form-group"><input type="text" name="name" class="form-control my-input" id="name"
                  placeholder="Name" autocomplete="off" required></div>
            <div class="form-group"><input type="email" name="email" class="form-control my-input" id="email"
                  placeholder="Email" autocomplete="off" required></div>
            <div class="form-group"><input type="tel" name="phone" id="phone" class="form-control my-input"
                  pattern="[789][0-9]{9}" placeholder="e.g : +919876543210" autocomplete="off" required></div>
            <div class="form-group"><input type="text" name="password" class="form-control my-input"
                  placeholder="password" autocomplete="off" required></div>
            <div class="text-center "><button type="submit" class=" btn btn-block send-button tx-tfm"
                  name="Createac">Create Account</button></div>
            <div class="bottom-text">
               Already have an account?<a href="login.php">Login Here</a>
            </div>
         </form>
      </div>
   </div>
</body>

</html>