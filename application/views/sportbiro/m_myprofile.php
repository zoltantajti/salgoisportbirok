<main class="content">
	<div class="container-fluid p-0">
    	<h1 class="h3 mb-3">Profilom szerkesztése</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
                    <form method="POST">
					    <div class="card-header">
						    <button type="submit" class="btn btn-info">Mentés</button>
                            <a href="dashboard" class="btn btn-info">Mégse</a>
					    </div>
					    <div class="card-body">
                            <?php echo validation_errors('<div class="row"><div class="col-md-12"><div class="error">', '</div></div></div>'); ?>
                            <?=$this->Msg->get(); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="text-muted">Személyes adatok</h3>
                                    <div class="mb-3">
									    <label class="form-label">Teljes név:</label>
										<input class="form-control form-control-lg" type="text" name="fullName" placeholder="Teljes név" value="<?=$p['fullName']?>" />
									</div>
                                    <div class="mb-3">
									    <label class="form-label">Személyi ig. szám:</label>
										<input class="form-control form-control-lg" type="text" name="idcardno" placeholder="Személyi ig. szám" value="<?=$p['idcardno']?>" />
									</div>
                                    <div class="mb-3">
									    <label class="form-label">Születési hely:</label>
										<input class="form-control form-control-lg" type="text" name="bornplace" placeholder="Születési hely" value="<?=$p['bornplace']?>" />
									</div>
                                    <div class="mb-3">
                                        <?php
                                            $bd = explode("-", $p['borndate']);
                                        ?>
									    <label class="form-label">Születési dátum:</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input class="form-control form-control-lg" type="number" min="1940" max="<?=(date("Y") - 18)?>" name="borndate_y" placeholder="Év" value="<?=@$bd[0]?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-lg" type="number" min="1" max="12" name="borndate_m" placeholder="Hónap" value="<?=@$bd[1]?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-lg" type="number" min="1" max="31" name="borndate_d" placeholder="Nap" value="<?=@$bd[2]?>" />
                                            </div>
                                        </div>
									</div>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="text-muted">Kapcsolattartási adatok</h3>
                                    <div class="mb-3">
									    <label class="form-label">Lakcím:</label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control form-control-lg" type="number" min="1000" max="9999" maxlength="4" name="postcode" placeholder="Irányítószám" value="<?=$p['postcode']?>" />
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-lg" type="text" name="city" placeholder="Város" value="<?=$p['city']?>" />
                                            </div>										
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control form-control-lg" type="text" name="address" placeholder="Utca, házszám, emelet, ajtó" value="<?=$p['address']?>" />
                                            </div>										
                                        </div>
									</div>
                                    <div class="mb-3">
                                        <label class="form-label">E-mail cím: <span class="text-muted">Nem módosítható!</span></label>
                                        <input class="form-control form-control-lg disabled" type="text" value="<?=$u['email']?>" readonly disabled/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Telefonszám:</label>
                                        <input class="form-control form-control-lg" type="text"  name="phoneNo" placeholder="Telefonszám" value="<?=$p['phoneNo']?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="text-muted">Adózással kapcsolatos adatok</h3>
                                    <div class="mb-3">
									    <label class="form-label">Adószám:</label>
                                        <input class="form-control form-control-lg" type="text" name="vatNo" placeholder="Adószám" value="<?=$p['vatNo']?>" />
									</div>
                                    <div class="mb-3">
                                        <label class="form-label">TAJ szám:</label>
                                        <input class="form-control form-control-lg" type="text"  name="tajNo" placeholder="TAJ szám" value="<?=$p['tajNo']?>" />
                                    </div>
                                </div>
                            </div>                            
					    </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</main>