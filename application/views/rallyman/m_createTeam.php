<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Csapat létrehozása</h1>
		<form method="POST" action="" id="create-team-form">
        <div class="row">            
			<div class="col-md-12 col-lg-3">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Csapatnév és Autómárka kiválasztása</h5>
					</div>
					<div class="card-body">
						<div class="mb-3">
                            <input type="text" name="teamName" class="form-control" placeholder="Csapatnév" />
                            <?php echo form_error('teamName', '<div class="error">', '</div>'); ?>
                        </div>
                        <div class="mb-3 row">
                            <div>
                                <?php echo form_error('car_id', '<div class="error">', '</div>'); ?>
                                <?php foreach($this->Db->sqla("cars","*") as $k=>$v){ $car = explode(" ", $v['name'])[0];
                                    $carAttr = array(
                                        "speed" => $v['speed'],
                                        "acc" => $v['acceleration'],
                                        "brake" => $v['brake'],
                                        "grip" => $v['grip']
                                    );
                                ?>
							    <label class="form-check">
                                    <input class="form-check-input" data-price="<?=$v['price']?>" type="radio" value="<?=$v['id']?>" name="car_id" onchange="addToCart('car', $(this));">
                                    <span class="form-check-label" onmouseover="showPopover(this)" onmouseout="hidePopover(this)" popover-content='<?=json_encode($carAttr)?>'>
                                        <img src="./assets/img/cars/<?=$car?>.png" width="32" /> 
                                        <?=$v['name']?> 
                                        <span style="float:right;" id="car_price">$<?=number_format($v['price'],2,"."," ")?></span>
                                    </span>
                                </label>
                                <?php }; ?>
							</div>
                        </div>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-3">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Versenyző kiválasztása</h5>
					</div>
					<div class="card-body">
						<div class="mb-3 row">
                            <div>
                                <?php echo form_error('driver_id', '<div class="error">', '</div>'); ?>
                                <?php foreach($this->Db->sqla("drivers","*") as $k=>$v){?>
                                <?php if($this->Db->sqln("users","driver_id","WHERE driver_id='".$v['id']."'") == 0){ 
                                    $driverAttr = array(
                                        "age" => $v['age'],
                                        "start" => $v['start'],
                                        "speed" => $v['speed'],
                                        "curves" => $v['curves'],
                                        "dbrakes" => $v['brakes'],
                                        "conc" => $v['concentration']
                                    );
                                ?>
							    <label class="form-check">
                                    <input class="form-check-input" data-price="<?=$v['base_price']?>" type="radio" value="<?=$v['id']?>" name="driver_id" onchange="addToCart('driver', $(this));">
                                    <span class="form-check-label" onmouseover="showPopover(this)" onmouseout="hidePopover(this)" popover-content='<?=json_encode($driverAttr)?>'>
                                        <img src="./assets/img/flags/<?=$v['nat']?>.png" width="32" /> 
                                        <?=$v['name']?> 
                                        <span style="float:right;" id="driver_price">$<?=number_format($v['base_price'],2,"."," ")?></span>
                                    </span>
                                </label>
                                <?php }; }; ?>
							</div>
                        </div>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-3">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Navigátor kiválasztása</h5>
					</div>
					<div class="card-body">
						<div class="mb-3 row">
                            <div>
                                <?php echo form_error('codriver_id', '<div class="error">', '</div>'); ?>
                                <?php foreach($this->Db->sqla("codrivers","*") as $k=>$v){?>
                                <?php if($this->Db->sqln("users","codriver_id","WHERE codriver_id='".$v['id']."'") == 0){ 
                                    $codriverAttr = array(
                                        "age" => $v['age'],
                                        'itin' => $v['itinarity'],
                                        'conc' => $v['concentration']
                                    );
                                ?>
							    <label class="form-check">
                                    <input class="form-check-input" data-price="<?=$v['base_price']?>" type="radio" value="<?=$v['id']?>" name="codriver_id" onchange="addToCart('codriver', $(this));">
                                    <span class="form-check-label" onmouseover="showPopover(this)" onmouseout="hidePopover(this)" popover-content='<?=json_encode($codriverAttr)?>'>
                                        <img src="./assets/img/flags/<?=$v['nat']?>.png" width="32" /> 
                                        <?=$v['name']?> 
                                        <span style="float:right;" id="codriver_price">$<?=number_format($v['base_price'],2,"."," ")?></span>
                                    </span>
                                </label>
                                <?php }; }; ?>
							</div>
                        </div>
					</div>
				</div>
			</div> 
            <div class="col-12 col-lg-3">
                <div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Áttekintés</h5>
					</div>
					<div class="card-body">
                        <b>Nyitó egyenleg: <span style="float:right;" id="start_balance" value="<?=$_SESSION['user']['money']?>"><?=$_SESSION['user']['money']?></span><br/></b>
                        <hr/>
                        Autó ára: <span style="float:right;" id="car_price_sum" value="0">0</span><br/>
                        Versenyző ára: <span style="float:right;" id="driver_price_sum" value="0">0</span><br/>
                        Navigátor ára: <span style="float:right;" id="codriver_price_sum" value="0">0</span><br/>
                        <hr/>
                        <b>Végösszeg: <span style="float:right;" id="price_sum" value="0">0</span><br/></b>
                        <b>Záró egyenleg: <span style="float:right;" id="end_balance" value="0">0</span><br/></b>
                        <hr/>
                        <button type="submit" name="submit" value="1" class="btn btn-info">Létrehozás</button>
					</div>
				</div>
            </div>
        </div>
        </form>
	</div>
</main>