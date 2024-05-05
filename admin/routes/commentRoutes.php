<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../patterns/CommentObserver.php';



if (isset($_POST['commentshare']) && isset($_SESSION['userId'])) {
    try {
        $comment = $_POST['comment'];
        $postId = $_POST['postid'];

        // Observer (EmailNotifier) oluştur
        $emailNotifier = new EmailNotifier();
        // Subject (CommentSubject) oluştur
        $commentSubject = new CommentSubject();
        // Observer'ı Subject'e bağla
        $commentSubject->attach($emailNotifier);
        // Yorumu yap ve Observer'lara haber ver
        $commentSubject->addComment($comment, $postId);

        header('Location: ../../detay.php?validComment=1&&postid='.$postId);
        exit(); // Başarı durumunda scriptin devam etmemesi için exit kullanabilirsiniz.
    } catch (Exception $e) {
        // Hata durumunda yapılacak işlemler
        header('Location: ../../detay.php?invalidComment=1');
        exit(); // Hata durumunda scriptin devam etmemesi için exit kullanabilirsiniz.
    }
} else {
    header('Location: ../../detay.php?invalidComment=1');
    exit(); // Hata durumunda scriptin devam etmemesi için exit kullanabilirsiniz.
}


?>


