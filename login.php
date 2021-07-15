<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
$msg = "";
if(isset($_SESSION["uid"]))
{
    header("Location: account.php");
}

else
{
    if(isset($_POST["loginbtn"]))
    {
        include('Database.php');

        $email = $_POST["uemail"];
        $pass = $_POST["upass"];

        $sql = "SELECT `uid`, `uname`, `uemail`  FROM `users` WHERE `uemail` = '{$email}' AND `upassword` = '{$pass}'";
        // echo $sql; die();
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["uname"] = $row["uname"];
                $_SESSION["uemail"] = $row["uemail"];
                header("Location: Account.php");
            }
        }
        else
        {
            $msg = "wrong email/password";
        }
    }
    
}
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Login |The RIVERWAYS RETREAT</title>
    <link href="admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(120deg,#fc575e, #90d5ec);
        }

        .loginbox{
            width: 350px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            text-align: center;
            border-radius: 10px;
        }

        .loginbox h1{
            padding: 0 0 20px;
            color: black;
            font-weight: 500;

        }

        .loginbox input[type = "email"], .loginbox input[type = "password"]{
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 215px;
            outline: none;
            color: black;
            border-radius: 24px;
            transition: 0.25s;
        }

        .loginbox input[type = "email"]:focus, .loginbox input[type = "password"]:focus{
            width: 280px;
            border-color: #2ecc71;
        }
        .loginbox input[type = "submit"]{
            border: 0;
            background: linear-gradient(120deg, #fc575e, #90d5ec);
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 10px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            background-size: 150%;
        }

        .loginbox input[type = "submit"]:hover{
            background-position: right;
        }
       
    </style>
</head>

<body>
    <div class="loginbox">
        <h1>Login</h1>
                <form method="POST" action="">
                            
                            <input class="text" name="uemail" type="email" placeholder="Email address" autocomplete="off" required>
                    
                   
                            <input class="text" name="upass" type="password" placeholder="Password" autocomplete="off" required>
                    
                        <p class="text-danger"><?php echo $msg;?></p>
                    
                    <input type="submit" name="loginbtn" value="Login">
                               <div class="bottom-text">
                               Don't have account?<a href="signup.php">Signup</a></div>
                    
                </form>
            
                            
     </div>                   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>