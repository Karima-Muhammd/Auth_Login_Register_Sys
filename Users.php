<?php


class Users extends db
{

    public function login(array $data)
    {
        $email=$data['email'];
        $pass= $data['pass'];
        if($this->IsNotEmpty($email))
        {
            if($this->IsNotEmpty($pass))
            {
                if($this->ValidEmail($email))
                {
                    if($this->ifExist('users','email',$email))
                    {
                        $query="select * from users where email='$email'";
                        $data=$this->SelectRow($query);
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
    public function register(array $data)
    {
        $fname=$data['fname'];
        $lname=$data['lname'];
        $email=$data['email'];
        $pass=$data['pass'];
        if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($pass))
        {
            if($this->ValidEmail($email))
            {
                if($this->ifExist('users','email',$email)==false)
                {
                    if($this->VaildUserName($fname))
                    {
                        if($this->VaildUserName($lname))
                        {
                            if($this->VaildPass($pass))
                            {
                                $newpass=md5($pass);
                                $query = "insert into users (`first_name`,`last_name`,`email`,`password`) values ('$fname','$lname','$email','$newpass')";
                                $res = $this->db_insert($query);
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
    public function logout()
    {
        if(isset($_SESSION['email'])) {
            session_destroy();
            header('location:login.php');
        }
        else
            header('location:index.php');
    }
    public function ValidEmail($email)
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;
    }
    function IsNotEmpty($value)
    {
        if(!empty($value))
            return true;
        else
            return false;
    }
    public function VaildUserName($name)
    {
        if(str_word_count($name)==1 && strlen($name)>=3)
            return true;
        else
            return false;
    }
    public function VaildPass($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return false;
        }
        else
        {
            return true;
        }
    }

}