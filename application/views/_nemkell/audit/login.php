<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=site_url()?>" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="./assets/img/icons/icon-48x48.png" />
	<title>Audit 2023</title>
    <link href="./assets/css/admin.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Audit felkészítés 2023</h1>
							<p class="lead">
								A folytatáshoz be kell jelentkezned!
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="POST" action="">
                                        <?=$this->Msg->get()?>
                                        <?php echo validation_errors('<div class="mb-3 text-danger">','</div>'); ?>
										<div class="mb-3">
											<label class="form-label">Azonosító <small>(58121/neved)</small></label>
											<input class="form-control form-control-lg" type="text" name="authCode" placeholder="Add meg az azonosítód" />
										</div>
										<div class="mb-3">
											<label class="form-label">Jelszó</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Add meg a jelszavad" />
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Belépés</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="./assets/js/admin.js"></script>
</body>
</html>