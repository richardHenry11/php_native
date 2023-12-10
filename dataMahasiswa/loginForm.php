<?php
session_start();
require 'controller.php';

//cek cookie
if( isset($_COOKIE['user']) && isset($_COOKIE['key']) )
{
    $user = $_COOKIE['user'];
    $key = $_COOKIE['key'];


    //ambil username berdasarkan id
    $result = mysqli_query($connect, "SELECT user FROM t_user WHERE id=$user");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if( $key === hash('sha256', $row['user']) )
    {
        $_SESSION['login'] = true;
    }
}


if ( isset($_SESSION["login"]) )
{
    header("Location: view.php");
    exit;
}



if( isset($_POST['login']) )
{
    global $connect;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($connect, "SELECT * FROM t_user WHERE user='$username'");

    if( mysqli_num_rows($result) === 1 )
    {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row['pass']))
        {
            //set session
            $_SESSION["login"] = true;

            // cek cookies

            if( isset($_POST['cookies']) )
            {
                //buat cookie
                setcookie('user', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['user']), time() + 60);
            }
            header('Location: view.php');
            exit;
        }
    }
    $error = true;
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <center><h2 class="m-0 font-weight-bold text-primary mb-4 mt-4"><strong>Login</strong></h2></center>
    <div class="container w-50 p-3">
        <?php if( isset($error)):?>
            <div class="alert alert-danger" role="alert">
                Username or Password Invalid!
            </div>    
        <?php endif;?>
        <div class="card shadow mb-3 mt-3">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-floating mb-3 mt-4">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username">
                        <label for="username">Masukan Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="Password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-check mb-1 mt-3">
                        <input class="form-check-input" name="cookies" style="margin-left: 10px;" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-primary" style="margin-left: 10px;" for="flexCheckDefault">Remember me</label>
                    </div>
                    <a href="registForm.php"><button type="button" class="btn btn-lg btn-primary w-50 mb-4 mt-4 " name="regist"><strong>Sign Up</strong></button></a>
                    <button type="submit" style="float: right;" class="btn btn-lg btn-success w-50 mb-4 mt-4" name="login"><strong>Login</strong></button>
                </form>
            </div>
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>