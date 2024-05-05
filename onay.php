<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once  'admin/patterns/DataBaseConnection.php';?>
<!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style1.css">

</head>

<?php
if (isset($_POST['verifysubmit'])) {
    $userCode = $_POST['verify'];

    if ($_SESSION['verificationCode'] == $userCode) {
        $userid = $_SESSION['onayid'];


        unset($_SESSION['verificationCode']);

        $sql = "UPDATE users SET mailVerified=1 WHERE id=:id";
        $stmt= DataBaseConnection::getInstance()->getConnection()->prepare($sql);
        $stmt->bindParam(':id',$userid,PDO::PARAM_INT);
        $stmt->execute();




        header('Location: guest.php');
        exit();
    } else {
        echo '<script>window.addEventListener("load", function (event) { bilgiMesaji("Geçersiz Kod"); });</script>';
    }
}

echo '<h1 style="color: red"> ' . $_SESSION['verificationCode'] . ' </h1>'
?>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
<section class="ftco-section ">
    <div class="container " style="margin-top: 7vw;">


        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center"></h3>
                    <form action="#" method="post" class="signin-form mt-5">
                        <div class="form-group">
                            <input type="text" name="verify" class="form-control" placeholder="Onay Kodu" required>
                        </div>

                        <div class="form-group col-6 offset-md-3">
                            <button type="submit" name="verifysubmit" class="form-control btn btn-primary submit px-3">
                                Giriş Yap
                            </button>
                        </div>
                    </form>


                </div>


            </div>
        </div>
    </div>

</section>
<style>

    a, a:hover {
        color: rgb(0, 0, 0);
    }
</style>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/mesaj.js"></script>
</body>

</html>