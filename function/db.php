<?php
$server_name="localhost";
$user_name="root";
$password="";
$db_name="login_register_system";


$conn=mysqli_connect($server_name,$user_name,$password,$db_name);
if(! $conn)
    echo ' not connected';


?>
<?php
function SelectRow($query)
{
    global $conn;
    $result =mysqli_query($conn,$query);
    if($result) {
        $row = [];
        if (mysqli_num_rows($result) > 0) {
            $row[] = mysqli_fetch_assoc($result);
        }
        return $row[0];
    }

    else
        return false;

}
function ifExist($table ,$filed,$fieldValue)
{
    global $conn;
    $query="select * from $table where $filed='$fieldValue'";
    $result =mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        return true;
    }
    else
        return false;

}
function SelectFunc($query)
{
    global $conn;
    $result =mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0)
    {
        while ($row[]=mysqli_fetch_assoc($result))
        {

        }
        return $row;
    }
    else
        return false;
}
function db_insert($query)
{
    global $conn;
    $result =mysqli_query($conn,$query);

    if($result)
    {
       return true;
    }
    else
        return false;
}



?>