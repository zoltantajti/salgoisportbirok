<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Autóm</h1>
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Autóm áttekintése</h5>
					</div>
					<div class="card-body">
                        <canvas id="carStat" width="500" height="500"></canvas>
                        <?php $car = $this->Db->sqla("user_cars","*","WHERE userID='".$_SESSION['user']['id']."'")[0];?>
                        <script>var labels = new Array('Sebesség','Gyorsulás','Tapadás','Fékhatás','Hibafaktor');var data = new Array(<?=($car['speed'] * 10)?>,<?=($car['acceleration'] * 10)?>,<?=($car['grip'] * 10)?>,<?=($car['brake'] * 10)?>,<?=($car['failure'] * 10)?>);var myVar = $("#carStat").polygonalGraphWidget({labels: labels,data: data,max_val: 100,circleRadius: 150,grid: true});</script>
                        <div class="row">
                            <div class="col-2 offset-1 text-center">
                                <span class="text-muted">Seb.</span><br/>
                                <span class="value"><?=$car['speed']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Gyors.</span><br/>
                                <span class="value"><?=$car['acceleration']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Tapad.</span><br/>
                                <span class="value"><?=$car['grip']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Fékh.</span><br/>
                                <span class="value"><?=$car['brake']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Hiba.</span><br/>
                                <span class="value"><?=$car['failure']?></span>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Autóm fejlesztése</h5>
					</div>
					<div class="card-body">
						<form method="POST" action="" name="car-upgrade">
                            <?=$this->Msg->get()?>
                            <div class="mb-3">
                                <label for="speed" class="form-label">Végsebesség</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="speed" name="speed" value="0" onchange="changeVal('speed', 2250);"/>
                                <div class="speed_output" id="speed_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="speed_price" id="speed_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="acceleration" class="form-label">Gyorsulás</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="acceleration" name="acceleration" value="0"  onchange="changeVal('acceleration', 4550);"/>
                                <div class="acceleration_output" id="acceleration_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="acceleration_price" id="acceleration_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="grip" class="form-label">Tapadás</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="grip" name="grip" value="0"  onchange="changeVal('grip', 3850);"/>
                                <div class="grip_output" id="grip_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="grip_price" id="grip_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="brake" class="form-label">Fékhatás</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="brake" name="brake" value="0"  onchange="changeVal('brake', 1120);"/>
                                <div class="brake_output" id="brake_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="brake_price" id="brake_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="failure" class="form-label">Megbízhatóság</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="failure" name="failure" value="0"  onchange="changeVal('failure', 3500);"/>
                                <div class="failure_output" id="failure_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="failure_price" id="failure_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" value="1" class="btn btn-info">
                                    Fejlesztés
                                </button>
                            </div>
                            <script>
                                function changeVal(element, price)
                                {
                                    var value = $("#" + element).val();
                                    var upgradePrice = value * price;
                                    $("#" + element + "_output").attr('data-price', upgradePrice);
                                    $("#" + element + "_output").attr('data-add',value).html("$" + upgradePrice);
                                    $("#" + element + "_price").val(upgradePrice);
                                }
                            </script>
                        </form>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Autóm festése</h5>
					</div>
					<div class="card-body">
						<img src="<?=$car['livery']?>" class="img-responsive mb-3" width="100%"/>
                        <center>
                            <a href="designer" target="_blank" class="btn btn-info">Festés készítése <i>(BETA)</i></a>  
                        </center>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>