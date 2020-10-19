<?php
require_once 'config.php';
if(isset($_SESSION['email']))
{
    header('location:index.php');
}

?>
<html lang="en">
<header>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<style>
    .form-control
    {
        background-color:transparent !important;
        border:1px solid gray;
        color:
    }
</style>
</header>
<body style="background-image:url('assets/images/bk-login.jpg');
    height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
 ">
<div class="container">
<div class="row">
    <div  style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 10px" class="col-md-6 p-5 offset-md-3 mt-5 ">
        <h2 style="font-family: 'Piedra', cursive; text-align: center; " class="text-center mb-4">Registration Form</h2>
    <form action="<?php ?>" METHOD="post">
        <div class="form-group " style="background-color: transparent">
            <input value="<?php if(isset($_POST['fname']))
                echo $_POST['fname'] ?>" type="text" placeholder="Enter First name" class="form-control" name="fname">
        </div>
        <div class="form-group ">
            <input value="<?php if(isset($_POST['lname']))
                echo $_POST['lname'] ?>" type="text" placeholder="Enter Last name" class="form-control" name="lname">
        </div>
        <div class="form-group">
            <input type="email" value="<?php if(isset($_POST['email']))
                echo $_POST['email'] ?>" placeholder="Enter Email"  class="form-control" name="email">
        </div>

        <div class="input-group mb-3">
            <input value="<?php if(isset($_POST['pass']))
                echo $_POST['pass'] ?>" type="password" id="myInput" placeholder="Enter Password"  class="form-control" name="pass" >
            <div class="input-group-append">
                <span class="input-group-text" ><a href="#" style="text-decoration: none; color: gray" onclick="myFunction()">Show Password</a></span>
            </div>
        </div>
        <div style="text-align: center " class="mt-3">
        <button STYLE="width: 60%; "  type="submit" name="reg_btn" class="btn btn-primary ">Register</button>
            <span style=" margin-top:3rem; display: block;">Have Already An Account?<a style="font-family: 'Piedra', cursive;  text-decoration: underline" href="login.php">Login Here</a></span>

        </div>
    </form>
    </div>
    <div class="col-md-6 offset-md-3">
        <?php
        if(isset($_POST['reg_btn']))
        {
            $fname=trim($_POST['fname']);
            $lname=trim($_POST['lname']);
            $email=trim($_POST['email']);
            $pass=$_POST['pass'];
            if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($pass))
            {
                if(ValidEmail($email))
                {
                    if(ifExist('users','email',$email)==false)
                    {
                        if(VaildUserName($fname))
                        {
                            if(VaildUserName($lname))
                            {
                                if(VaildPass($pass))
                                {
                                    $newpass=md5($pass);
                                    $query = "insert into users (`first_name`,`last_name`,`email`,`password`) values ('$fname','$lname','$email','$newpass')";
                                    $res = db_insert($query);
                                    if ($res)
                                        header('location:login.php');
                                    else
                                        $error_message= "Failed to Create Account";
                                }
                                else
                                    $error_message= "
                                                    <ul class='text-left'>
                                                    <li>Password should include at least 8 characters.</li>
                                                    <li>Should include uppercase letters.</li>
                                                    <li>Should include  numbers.</li>
                                                    <li>Should include Special characters.</li>
                                                    </ul>";
                            }
                            else
                                $error_message='Please, Enter valid Last name';
                        }
                        else
                            $error_message='Please, Enter valid first name ';
                    }
                    else
                        $error_message='Email is already exist ';
                }
                else
                    $error_message='Enter Valid Email';
            }
            else
                $error_message='Fields is empty';
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