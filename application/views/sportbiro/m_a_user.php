<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Sportbíró adatlap</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$u['fullName']?> (<?=$u['marshalCardNo']?>)</h5>
					</div>
					<div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="text-muted">Személyes adatok</h3>
                                Sportbíró ig. szám: <b><?=$u['marshalCardNo']?></b><br/>
                                Születési hely: <b><?=$u['bornplace']?></b><br/>
                                Születési dátum: <b><?=str_replace("-",".",$u['borndate'])?></b><br/>
                                Lakcím: <b><?=$u['postcode']?> <?=$u['city']?>, <?=$u['address']?></b><br/>
                                Telefonszám: <b><?=$u['phoneNo']?></b><br/>
                                E-mail cím: <b><?=$u['email']?></b><br/>
                                Személyi ig. szám.: <b><?=$u['idcardno']?></b><br/>
                                Adószám: <b><?=$u['vatNo']?></b><br/>
                                TAJ szám: <b><?=$u['tajNo']?></b><br/>
                            </div>
                            <div class="col-md-3">
                                <h3 class="text-muted">Gépjármű információk</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rendszám</th>
                                            <th>Gyártmány</th>
                                            <th>Típus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($this->Cars->listCarsByOwner($u['id']) as $k=>$v){ ?>
                                        <tr>
                                            <td><?=$this->Cars->drawLicensePlate($v['carRegLetter'], $v['licensePlate']); ?></td>
                                            <td><?=$v['carManufacturer']?></td>
                                            <td><?=$v['carType']?></td>
                                        </tr>
                                        <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3">
                                <h3 class="text-muted">Esemény információk</h3>
                                <div class="alert alert-warning">Fejlesztés alatt</div>
                            </div>
                            <div class="col-md-3">
                                <h3 class="text-muted">Admini megjegyzések</h3>
                                <div class="alert alert-warning">Fejlesztés alatt</div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>