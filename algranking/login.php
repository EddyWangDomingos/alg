<?php session_start(); ?>
<!DOCTYPE html>

<?php

include './includes/functions.php';

global $errors;

$message;
if (isset($_POST['submit'])) {

global $connection;

$username = trim($_POST['username']);
$password = trim($_POST['password']);



// try to login
$query = "select*from admins where username ='{$username}' and password='{$password}' ";

$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result)>0) {


$admin = mysqli_fetch_assoc($result);

$_SESSION['admin_id'] = $admin['id'];
$_SESSION['username'] = $admin['username'];

// successful login


redirect_to("admin.php");


}

 else {
$message = "Username/password do not match.";
}

}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="css/calm-breeze-login-screen/css/style.css"/>

        <style type="text/css">

            body{

                background-color: #000;
                color: #FFF;
                font-family: 'Cabin', sans-serif;
                background-image: url('../imagens/scorpionBg.jpg');
                background-position: right top;
                background-repeat: no-repeat;
            }

            #login-button{
                
                 background-color:#181717;
                 color: #F2C53D;
                 border: 1px solid #F2C53D;
                 border-radius: 5px;
            }

 .message{
        border-radius: 10px;
        border:2px solid #F2C53D;
        background-color: #181717;
        color: #F2C53D;
        margin: 1em 0;
        padding: 1em;
    }

        </style>

    </head>
    <body>


        <div class="wrapper">
            <div class="container">

<?php 

if(strlen($message)>0){

echo  "<div class=\"message\">$message</div>";
}

?>
                <h1>Login</h1>

                <form class="form" method="POST" action="login.php">
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit" name="submit" id="login-button">Login</button>
                </form>
            </div>


        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    </body>
</html>