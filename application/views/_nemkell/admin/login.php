<!doctype html>
<html lang="en">
    <head>
        <base href="<?=site_url()?>" />
  	    <title>Adminisztrátori belépés</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	
	    <link rel="stylesheet" href="./assets/css/admin_login.css">
	</head>
	<body class="img js-fullheight" style="background-image: url(./assets/img/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Audit felkészítés</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	        <form action="" method="POST" class="signin-form">
                            <?php echo validation_errors(); ?>
		      		        <div class="form-group">
		      			        <input type="text" name="username" class="form-control" placeholder="Felhasználónév" required>
		      		        </div>
	                        <div class="form-group">
	                            <input id="password-field" name="password" type="password" class="form-control" placeholder="Jelszó" required>
	                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	                        </div>
	                        <div class="form-group">
	            	            <button type="submit" class="form-control btn btn-primary submit px-3">Belépés</button>
	                        </div>
                        </form>
		            </div>
				</div>
			</div>
		</div>
	</section>

	<script src="./assets/js/admin_login/jquery.min.js"></script>
    <script src="./assets/js/admin_login/popper.js"></script>
    <script src="./assets/js/admin_login/bootstrap.min.js"></script>
    <script src="./assets/js/admin_login/main.js"></script>

	</body>
</html>

