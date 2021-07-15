<?php
namespace Model;
use PDO;
class UserDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function findByUserPassword($request){
        $sql = "SELECT * FROM `manager` WHERE user = ? AND password=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$request['email']);
        $stmt->bindParam(2,$request['password']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function add($user,$password){
        $sql = "INSERT INTO `manager` (user,password) VALUES(?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$user);
        $stmt->bindParam(2,$password);
        return $stmt->execute();
    }


}