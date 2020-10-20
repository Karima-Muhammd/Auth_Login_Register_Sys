<?php


class db
{
    public $conn;
    public function __construct()
    {

        $this->conn=mysqli_connect('localhost','root','',"login_register_system");
    }
    protected function SelectRow($query)
    {
        $result =mysqli_query($this->conn,$query);
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
    protected function ifExist($table ,$filed,$fieldValue)
    {
        $query="select * from $table where $filed='$fieldValue'";
        $result =mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            return true;
        }
        else
            return false;

    }
    protected function SelectFunc($query)
    {
        $result =mysqli_query($this->conn,$query);
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
    public function db_insert($query)
    {
        $result =mysqli_query($this->conn,$query);

        if($result)
        {
            return true;
        }
        else
            return false;
    }


}