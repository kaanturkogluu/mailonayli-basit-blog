<?php
session_start();
$_SESSION['mainPath'] = $_SERVER['DOCUMENT_ROOT'];
$basePath = $_SERVER['DOCUMENT_ROOT'];

include $basePath . '/admin/patterns/login.php';
?>
<!doctype html>
<html lang="en">


<head>
	<title>Giriş Sayfası</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<script src="js/sweetalert2.all.min.js"></script>

</head>
<?php
if (isset($_GET['out']) && $_GET['out'] == 1) {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            sureliBasariliMesajiGoster(2500,'Başarıyla Cıkış Yapıldı');
        });
    </script>
    <?php
}
if (isset($_GET['invalid']) && $_GET['invalid'] == 1) {
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

			sureliBasarisizMesajiGoster('Giriş Başarısız','Kullanici Adi Veya Şifre Yanlış',2000);
        });
    </script>
<?php
}
?>
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section " >
		<div class="container "style="margin-top: 7vw;">
			
			
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center"></h3>
						<form action="admin/routes/loginroutes.php" method="POST" class="signin-form mt-5">
						<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" name="password" class="form-control" placeholder="Şifre"
									required>
								<span toggle="#password-field"
									class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="row">
							<div class="form-group col-6">
								<button type="submit" name="giris" 
									class="form-control btn btn-primary submit ">Giriş Yap</button>
							</div>
							
							<div class="form-group col-6">
								<a href="kayit.php"
									class="form-control btn btn-primary submit ">Kayıt Ol</a>
							</div>
						</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Beni Hatırla
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Şifremi Unuttum</a>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<style>

		a,a:hover{
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