<?php

class User
{
    private $userId;
    private $userName;
    private $userMail;
    private $userSurName;

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserMail()
    {
        return $this->userMail;
    }

    public function setUserMail($userMail)
    {
        $this->userMail = $userMail;
    }

    public function getUserSurName()
    {
        return $this->userSurName;
    }

    public function setUserSurName($userSurName)
    {
        $this->userSurName = $userSurName;
    }
}

class UserMap
{

    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getUserById(User $user)
    {
        $sql = "SELECT  * FROM users WHERE id =:id";
        $statement = $this->db->prepare($sql);


        $statement->bindValue(':id', $user->getUserId(), PDO::PARAM_INT);


        $statement->execute();


        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;


    }

}