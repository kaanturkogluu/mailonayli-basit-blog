<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'DataBaseConnection.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

class AuthenticationManager
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

    public function login($mail, $password)
    {


        $query = "SELECT * FROM userlogin WHERE mail = :username AND password = :password";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":username", $mail, PDO::PARAM_STR);
        $statement->bindParam(":password", $password, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);


        if ($user) {

            if ($user['status'] == 1) {

                $this->isMailVerified($mail, $password, 1);
            } else {
                $this->isMailVerified($mail, $password);
            }


        } else {

            header('Location: ../../giris.php?invalid=1');
        }
    }


    public function isMailVerified($mail, $password, $role = 0)
    {
        echo $mail . $password;
        try {

            $query = "SELECT * FROM users WHERE mail = :mail AND password = :password";
            $statement = $this->db->prepare($query);
            $statement->bindParam(":mail", $mail, PDO::PARAM_STR);
            $statement->bindParam(":password", $password, PDO::PARAM_STR);
            $statement->execute();

            $user = $statement->fetch(PDO::FETCH_ASSOC);
            var_dump($user);

            if ($user) {
                if ($user['mailVerified'] == 1) {

                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['surName'] = $user['surName'];
                    $_SESSION['oturum'] = 1;
                    $_SESSION['status'] = $role;

                    if ($role == 1) {
                        header('Location: ../../index.php');
                    } else {
                        header('Location: ../../guest.php');
                    }

                } else {
                    $this->SendVerificationCode($mail, $this->generateVerificationCode());

                    header('Location: ../../onay.php');


                }
                exit();
            } else {
                header('Location : ../../giris.php?invalid=1');
                exit();
            }
        } catch (PDOException $e) {

            echo "Hata: " . $e->getMessage();
        }
    }


    public function sendVerificationCode($email, $verificationCode)
    {
        // PHPMailer nesnesini oluştur
        $mail = new PHPMailer();


        // SMTP ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP sunucu adresi
        $mail->SMTPAuth = true;
        $mail->Username = 'mail adresi'; // SMTP kullanıcı adı
        $mail->Password = 'sifre'; // SMTP şifre
        $mail->SMTPSecure = 'tls'; // Güvenli bağlantı türü, 'tls' veya 'ssl' olabilir
        $mail->Port = 587; // SMTP port numarası

        // Gönderen bilgileri
        $mail->setFrom('*', '*');

        // Alıcı bilgileri
        $mail->addAddress($email);

        // E-posta başlık ve içeriği
        $mail->Subject = 'Doğrulama Kodu';
        $mail->Body = 'Merhaba, İşte doğrulama kodunuz: ' . $verificationCode;

        // E-postayı gönder
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    function generateVerificationCode()
    {

        $verificationCode = mt_rand(1000, 9999);
        $_SESSION['verificationCode'] = $verificationCode;
        return $verificationCode;
    }

    public function logout()
    {
        // Logout işlemleri burada gerçekleştirilir.
    }
}

// Kullanım
//$authManager = AuthenticationManager::getInstance();
//$authManager->login("kaantrrkoglu@gmail.com", "1234");
