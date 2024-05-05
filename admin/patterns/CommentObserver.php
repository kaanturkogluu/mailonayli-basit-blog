<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!class_exists('DataBaseConnection')) {
    require_once 'DataBaseConnection.php';
}

require_once 'SMTP.php';
require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'CommenTextMap.php';
require_once 'CommandsMap.php';
require_once 'UserMap.php';
require_once 'ArticleTitleMap.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

// Observer arayüzü
interface Observer
{
    public function update($comment, $postId);
}

// Yorum gönderildiğinde e-posta gönderen ConcreteObserver sınıfı
class EmailNotifier implements Observer
{
    public function update($comment, $postId)
    {
        $userid = $_SESSION['userId'];
        $user = new User();
        $userMap = new UserMap(DataBaseConnection::getInstance()->getConnection());
        $user->setUserId($userid);

// Değişkeni kullanarak getUserById metodunu çağırın
        $userIdForQuery = $user->getUserId();
        $userData = $userMap->getUserById($user);


        $titleMap = new ArticleTitleMap(DataBaseConnection::getInstance()->getConnection());
        $titleclass = new ArticleTitle();
        $titleclass->setArticleTitleId($postId);
        $title = $titleMap->getTitleById($titleclass);

        $this->sendInfoMail($userData['mail'], $title, $userData['name'] . ' ' . $userData['surName']);
    }

    public function sendInfoMail($email, $title, $username)
    {
        $mail = new PHPMailer();

        // SMTP ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP sunucu adresi
        $mail->SMTPAuth = true;
        $mail->Username = 'mailadresi@gmail.com'; // SMTP kullanıcı adı
        $mail->Password = 'sifre'; // SMTP şifre
        $mail->SMTPSecure = 'tls'; // Güvenli bağlantı türü, 'tls' veya 'ssl' olabilir
        $mail->Port = 587; // SMTP port numarası

        // Gönderen bilgileri
        $mail->setFrom('kaantrrkoglu@gmail.com', 'Kaan TÜRKOĞLU');

        // Alıcı bilgileri
        $mail->addAddress($email);

        // E-posta başlık ve içeriği
        $mail->Subject = 'Yorum Bildirimi';
        $mail->Body = 'Merhaba' . $title . ' Başlıklı Yazınıza ' . $username . ' Tarafından Yorum Yapıldı.';

        if ($mail->send()) {
            echo 'E-posta başarıyla gönderildi.';
        } else {
            echo 'E-posta gönderiminde hata oluştu: ' . $mail->ErrorInfo;
        }
    }
}

// Subject (gözlemlenen) arayüzü
interface Subject
{
    public function attach(Observer $observer);

    public function detach(Observer $observer);

    public function notify($comment);
}

// Yorum yapıldığında Observer'lara haber veren ConcreteSubject sınıfı
class CommentSubject implements Subject
{
    public $postId;
    private $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify($comment)
    {
        foreach ($this->observers as $observer) {
            $observer->update($comment, $this->postId);
        }
    }

    public function addComment($comment, $postId)
    {
        $this->postId = $postId;
        $commentTextMap = new CommentTextMap(DataBaseConnection::getInstance()->getConnection());
        $commentText = new CommentText();
        $commentText->setCommentText($comment);
        $commentId = $commentTextMap->add($commentText);

        // command tablosuna ekleme işlemleri
        $commandMap = new CommandsMap(DataBaseConnection::getInstance()->getConnection());
        $commandClass = new Commands();

        $commandClass->setCommandArticleId($postId);
        $commandClass->setCommandUserId($_SESSION['userId']);
        $commandClass->setCommandTextId($commentId);
        $commandMap->add($commandClass);

        // Ardından Observer'lara haber ver
        $this->notify($comment);
    }
}

?>
