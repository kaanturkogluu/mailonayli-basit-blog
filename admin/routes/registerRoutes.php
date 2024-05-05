<?php

include '../combine.php';
$register = RegisterManager::getInstance();
$login = AuthenticationManager::getInstance();
if (isset($_POST['kayit'])) {
    $username = $_POST['username'];
    $usersurname = $_POST['usersurname'];
    $password = $_POST['userpassword'];
    $mail = $_POST['usermail'];
    $phone = $_POST['userphone'];


    // Kullanıcıyı kaydet
    if ($register->register($username, $usersurname, $password, $mail, $phone)) {



        $login->isMailVerified($mail,$password);


        header('Location: ../../verify.php');
    } else {
        header('Location: ../../giris.php?invalid=1');
    }
}


?>
