<?php
require_once '../patterns/login.php';
$login = AuthenticationManager::getInstance();


if (isset($_POST['giris'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login->login($username, $password);

}

