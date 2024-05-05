<!doctype html>
<html lang="en">

<head>
	<title>Login 10</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<script src="js/sweetalert2.all.min.js"></script>
</head>

<?php
if (isset($_POST['invalidMail']) && $_POST['invalidMail'] == 1) {
?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			sureliBasarisizMesajiGoster();
		});
	</script>
<?php
}
?>


<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section ">
		<div class="container ">


			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center"></h3>
						<form action="admin/routes/registerRoutes.php" method="post" class="signin-form">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="usersurname" placeholder="Kullanıcı Soyadı" required>
							</div>
							<div class="form-group">
								<input type="mail" class="form-control" name="usermail" placeholder="Mail" required>
							</div>
							<div class="form-group">
								<input type="tel" class="form-control" name="userphone" placeholder="(5XX)-XXX-XXXX" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" name="userpassword" class="form-control" placeholder="Şifre" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" name="kayit" class="form-control btn btn-primary submit ">Kayıt Ol</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</section>
	<style>
		a,
		a:hover {
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