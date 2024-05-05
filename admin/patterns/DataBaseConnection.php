
<?php
//singleton Patern Design
// Database.php
$basePath = $_SERVER['DOCUMENT_ROOT'];
require_once $basePath.'/admin/config.php';// Database.php

class DataBaseConnection {
    private static $instance;
    private $connection;

    private function __construct() {
        try {
            $config = Config::getDBConfig();
            $dsn = "mysql:host={$config['host']};dbname={$config['database']}";
            $this->connection = new PDO($dsn, $config['username'], $config['password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    // Diğer veritabanı işlemleri için gerekli metotları ekleyebilirsiniz
}

