<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Versenyzőm</h1>
		<div class="row">
			<div class="col-12 col-lg-4">
                <?php $car = $this->Db->sqla("drivers","*","WHERE id='".$_SESSION['user']['driver_id']."'")[0];?>
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">
                            <img src="./assets/img/flags/<?=$car['nat']?>.png" width="32" /> 
                            <?=$car['name']?> 
                            <i>(<?=$car['age']?>)</i>
                        </h5>
					</div>
					<div class="card-body">
                        <canvas id="carStat" width="500" height="500"></canvas>                        
                        <script>
                            var labels = new Array('Rajt','Sebesség','Kanyarok','Fék','Koncentráció');
                            var data = new Array(<?=($car['start'] * 10)?>,<?=($car['speed'] * 10)?>,<?=($car['curves'] * 10)?>,<?=($car['brakes'] * 10)?>,<?=($car['concentration'] * 10)?>);
                            var myVar = $("#carStat").polygonalGraphWidget({labels: labels,data: data,max_val: 100,circleRadius: 150,grid: true});</script>
                        <div class="row">
                            <div class="col-2 offset-1 text-center">
                                <span class="text-muted">Rajt</span><br/>
                                <span class="value"><?=$car['start']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Gyors.</span><br/>
                                <span class="value"><?=$car['speed']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Tapad.</span><br/>
                                <span class="value"><?=$car['curves']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Fékh.</span><br/>
                                <span class="value"><?=$car['brakes']?></span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-muted">Hiba.</span><br/>
                                <span class="value"><?=$car['concentration']?></span>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Versenyző fejlesztése</h5>
					</div>
					<div class="card-body">
						<form method="POST" action="" name="car-upgrade">
                            <?=$this->Msg->get()?>
                            <div class="mb-3">
                                <label for="start" class="form-label">Rajtképesség</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="start" name="start" value="0" onchange="changeVal('start', 325);"/>
                                <div class="start_output" id="start_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="start_price" id="start_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="speed" class="form-label">Gyorsaság</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="speed" name="speed" value="0"  onchange="changeVal('speed', 365);"/>
                                <div class="speed_output" id="speed_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="speed_price" id="speed_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="curves" class="form-label">Kanyarvétel</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="curves" name="curves" value="0"  onchange="changeVal('curves', 280);"/>
                                <div class="curves_output" id="curves_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="curves_price" id="curves_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="brakes" class="form-label">Fékező képesség</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="brakes" name="brakes" value="0"  onchange="changeVal('brakes', 420);"/>
                                <div class="brakes_output" id="brakes_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="brakes_price" id="brakes_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="concentration" class="form-label">Koncentráció</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="concentration" name="concentration" value="0"  onchange="changeVal('concentration', 1250);"/>
                                <div class="concentration_output" id="concentration_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="concentration_price" id="concentration_price" value="0" />
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
		</div>
	</div>
</main>