<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Szponzorok</h1>
		<div class="row">
            <div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Szponzoraim</h5>
					</div>
					<div class="card-body">
                        <div class="row mb-2 title">
                            <div class="col-md-4">
                                Szponzor<br/>neve
                            </div>
                            <div class="col-md-4">
                                Versenyenként<br/>ad
                            </div>
                            <div class="col-md-4">
                                Hátralévő<br/>idő
                            </div>
                        </div>
                        <?php foreach($this->Db->sqla("user_sponsors","*","WHERE userID='".$_SESSION['user']['id']."'") as $v){ ?>
                        <?php $sponsor = $this->Db->sqla("sponsors","*","WHERE id='".$v['sponsorID']."'")[0]; ?>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <?=$sponsor['name']?>
                            </div>
                            <div class="col-md-4">
                                $<?=number_format($sponsor['raceFee'],2,"."," ")?>
                            </div>
                            <div class="col-md-4">
                                <?=$v['raceLeft']?> verseny
                            </div>
                        </div>
                        <?php }; ?>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Szponzor ajánlataim</h5>
					</div>
					<div class="card-body">
                        <?=$this->Msg->get()?>
                        <div class="row mb-2 title">
                            <div class="col-md-2">
                                Szponzor<br/>neve
                            </div>
                            <div class="col-md-3">
                                Szerződéskötéskor<br/>ad
                            </div>
                            <div class="col-md-3">
                                Versenyenként<br/>ad
                            </div>
                            <div class="col-md-2">
                                Szerződés<br/>hossza
                            </div>
                        </div>
                        <?php foreach($this->Db->sqla("sponsors","*") as $k=>$v){?>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <?=$v['name']?>
                            </div>
                            <div class="col-md-3">
                                $<?=number_format($v['contractFee'],2,"."," ")?>
                            </div>
                            <div class="col-md-3">
                                $<?=number_format($v['raceFee'],2,"."," ")?>
                            </div>
                            <div class="col-md-2">
                                <?=$v['defaultLength']?> verseny
                            </div>
                            <div class="col-md-2">
                                <a href="sponsors/contract/<?=$v['id']?>" class="btn btn-info">Aláír</a>
                            </div>
                        </div>
                        <?php }; ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</main>