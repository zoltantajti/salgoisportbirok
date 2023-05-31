<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?=site_url()?>" />
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="./assets/img/icons/icon-48x48.png" />
	<title>Salgói Sportbírók</title>
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/admin.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="./assets/css/custom.css" rel="stylesheet">
	<link href="./assets/css/fa.all.min.css" rel="stylesheet">

	<script src="./assets/js/jquery-1.11.1.min.js"></script>
	<script src="./assets/js/jquery-ui-1.11.0.min.js"></script>
	<script src="./assets/third_party/polygraph/polygraph.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="main">
        <main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center">
							<h1 class="h2">{logo helye}</h1>
							<p class="lead">
								A regisztrációhoz töltsd ki az alábbi adatokat
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">Sportbíród:</label>
											<input class="form-control form-control-lg" type="text" readonly disabled value="<?=$marshal['fullName']?>"/>
                                            <input type="hidden" name="marshalID" value="<?=$marshal['credentialsID']?>"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Teljes név:</label>
											<input class="form-control form-control-lg" type="text" id="fullName" name="fullName" placeholder="Teljes név" />
                                            <?php echo form_error('fullName', '<div class="error">', '</div>'); ?>
										</div>
                                        <div class="mb-3">
											<label class="form-label">Személyi ig. száma:</label>
											<input class="form-control form-control-lg" type="text" id="idcardno" name="idcardno" placeholder="Személyi ig. száma" />
                                            <?php echo form_error('idcardno', '<div class="error">', '</div>'); ?>
										</div>
                                        <div class="mb-3">
											<label class="form-label">Születési hely és idő:</label>
                                            <div class="input-group">
                                                <input class="form-control form-control-lg" type="text" id="bornplace" name="bornplace" placeholder="Születési hely" />
                                                <input class="form-control form-control-lg" type="date" id="borndate" name="borndate" placeholder="Születési dátum" />
                                            </div>
                                            <?php echo form_error('borndate', '<div class="error">', '</div>'); ?>
                                            <?php echo form_error('bornplace', '<div class="error">', '</div>'); ?>
										</div>
                                        <div class="mb-3">
                                            <label class="form-label">Lakcím:</label>
                                            <div class="input-group">
                                                <input class="form-control form-control-lg" type="number" min="1000" max="9999" maxlength="4" id="postcode" name="postcode" placeholder="Irányítószám" />
                                                <input class="form-control form-control-lg" type="text" id="city" name="city" placeholder="Város" />
                                            </div>
                                            <input class="form-control form-control-lg" type="text" id="address" name="address" placeholder="Utca, házszám" />
                                            <?php echo form_error('postcode', '<div class="error">', '</div>'); ?>
                                            <?php echo form_error('city', '<div class="error">', '</div>'); ?>
                                            <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                                        </div>
                                        <div class="mb-3">
											<label class="form-label">Bejelentéshez szükséges adatok:</label>
                                            <div class="input-group">
											    <input class="form-control form-control-lg" type="text" id="vatNo" name="vatNo" placeholder="Adóazonosító jel" />
                                                <input class="form-control form-control-lg" type="text" id="tajNo" name="tajNo" placeholder="TAJ szám" />
                                            </div>
                                            <?php echo form_error('vatNo', '<div class="error">', '</div>'); ?>
                                            <?php echo form_error('tajNo', '<div class="error">', '</div>'); ?>
										</div>
                                        <div class="mb-3">
											<label class="form-label">Kapcsolattartási adatok:</label>
                                            <div class="input-group">
											    <input class="form-control form-control-lg" type="text" id="phoneNo" name="phoneNo" placeholder="Telefonszám" />
                                                <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="E-mail cím" />
                                            </div>
                                            <?php echo form_error('phoneNo', '<div class="error">', '</div>'); ?>
                                            <?php echo form_error('email', '<div class="error">', '</div>'); ?>
										</div>
										<div class="text-center mt-3">
                                            <button type="button" id="modalBtn" class="btn btn-lg btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Adatvédelmi infók
                                            </button>
											<button type="submit" id="submitBtn" class="btn btn-lg btn-info" disabled>Regisztráció</button>
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
   
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adatvédelem</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?=$this->Texts->getByAlias("adatvedelem")?>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Elutasítom</button>
                    <button type="button" onClick="acceptRules();" data-bs-dismiss="modal" class="btn btn-success">Elfogadom</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("document").ready(function(){
            $("#submitBtn").hide();
        });
        function acceptRules(){
            $("#submitBtn").removeAttr("disabled").show();
            $("#modalBtn").hide();
        }
    </script>
    <script src="./assets/third_party/parsley/parsley.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
	<!--<script src="./assets/js/bootstrap.bundle.min.js"></script>-->
	<scritp src="./assets/js/custom.js"></scritp>
	<script src="./assets/js/admin.js"></script>	
</body>
</html>