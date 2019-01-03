<?php 

class init{
    private $servername="127.0.0.1";
    private $username="root";
    private $password="";
    private $dbname="music_library";

    private $connect;

    public function __construct(){
        $this->connect = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        if($this->connect->connect_error){
            die("Database is not connected:" .$this->connect->connect_error);
        }
        
       

    }
    public function CUD($sql){
        $this->connect->query($sql);
    }

    public function checkRows($sql){
        $resultSet = $this->connect->query($sql);
        if(is_object($resultSet)){
            $rows = $resultSet->num_rows;
            return $rows;
        }else{
            return false;
        }
    }
    public function select($sql){
        $data = [];
        $fetchData = $this->connect->query($sql);

        if($fetchData->num_rows > 0){
            while($rows = $fetchData->fetch_assoc())
                $data[] = $rows;
        }else{
            return false;
        }
        return $data;

    }
}




?>