<?php
function IsNotEmpty($value)
{
    if(!empty($value))
        return true;
    else
        return false;
}
function ValidEmail($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
        return true;
    else
        return false;
}
function VaildUserName($name)
{
    if(str_word_count($name)==1 && strlen($name)>=3)
        return true;
    else
        return false;
}
function VaildPass($password)
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

