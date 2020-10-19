
<?php
require_once 'config.php';
if(isset($_SESSION['email']))
{
    header('location:index.php');

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
    <link  rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <title>Login</title>
    <style>
        .form-control
        {
            background-color:transparent !important;
            border:1px solid gray;
        }
    </style>
</head>
<body style="background-image:url('assets/images/login_bk.jpg');
    height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
 ">
<div class="container">
    <div class="row">
        <div  style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 10px; margin-top:10%" class="col-md-6 p-5 offset-md-3 ">
            <h1 class="text-center" style="font-family: 'Piedra', cursive;  ">Login <br></h1>

            <form style="margin-top:8% ; "  action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off" >
            <div class="form-group">
                <input value="<?php if(isset($_POST['email']))
                    echo $_POST['email'] ?>"  type="text" placeholder="Email" class="form-control" name="email">
            </div>

                <div class="input-group mb-3">
                    <input value="<?php if(isset($_POST['password']))
                                          echo $_POST['password'] ?>" type="password" id="myInput" name="password" class="form-control" placeholder="Password"">
                    <div class="input-group-append">
                        <span class="input-group-text" ><a id="link_a" href="#" style="text-decoration: none; color: gray" onclick="myFunction()">Show Password</a></span>
                    </div>
                </div>

                <div style="text-align: center ; margin-top: 30px " >
                <button type="submit" style="width: 60%;"  name="login_btn" class="btn btn-primary">Login </button>
                    <span style="display: block; margin-top: 30px">Not a Member ? <a style="font-family: 'Piedra', cursive;" href="register.php">Register Here Now </a> </span>

                </div>


        </form>
        </div>

        <div class="col-md-6 offset-md-3">
            <?php

            if(isset($_POST['login_btn']))
            {
                $email=$_POST['email'];
                $pass=$_POST['password'];
                if(IsNotEmpty($email))
                {
                    if(IsNotEmpty($pass))
                    {
                        if(ValidEmail($email))
                        {
                            if(ifExist('users','email',$email))
                            {
                                $query="select * from users where email='$email'";
                                $data=SelectRow($query);
                                $new_pass=md5($pass);
                                if($new_pass==$data['password'])
                                {
                                    $_SESSION['email']=$email;
                                    $_SESSION['fname']=$data['first_name'];
                                    $_SESSION['lname']=$data['last_name'];
                                    header('location:index.php');
                                }
                                else
                                    $error_message = "This Password is Not Correct";
                            }
                            else
                                $error_message = "This Email Not Exist";
                        }
                        else
                            $error_message = "Please ,Enter valid Email";
                    }
                    else
                        $error_message = "Password is Required";

                }
                else
                    $error_message='Email is required';
                require_once 'function/message.php';
            }
            ?>
        </div>

    </div>

</div>

<script src="assets/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
