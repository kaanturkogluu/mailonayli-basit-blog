<?php
require_once 'DataBaseConnection.php';

class RegisterManager
{
    private static $instance;
    private $db;

    private function __construct()
    {
        $this->db = DataBaseConnection::getInstance()->getConnection();
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function register($username, $usersurname, $password, $mail, $phone)
    {
        // Veritabanı bağlantısı
        $dbConnection = $this->db;

        // INSERT sorgusu
        $query = "INSERT INTO users (name, surName, password, mail, phone) VALUES (:username, :usersurname, :password, :mail, :phone)";

        // Sorguyu hazırla
        $statement = $dbConnection->prepare($query);

        // Parametreleri bağla
        $statement->bindParam(':username', $username);
        $statement->bindParam(':usersurname', $usersurname);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':mail', $mail);
        $statement->bindParam(':phone', $phone);
        // Sorguyu çalıştır
        $result = $statement->execute();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();

        }
        $_SESSION['onayid'] = $this->db->lastInsertId();

        if ($result) {
           return true;
        } else {
            // Hata durumunda hata bilgisini göster
            print_r($statement->errorInfo());
            return false;
        }
    }


}

