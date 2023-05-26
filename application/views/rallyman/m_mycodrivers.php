<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Versenyzőm</h1>
		<div class="row">
			<div class="col-12 col-lg-4">
                <?php $car = $this->Db->sqla("codrivers","*","WHERE id='".$_SESSION['user']['codriver_id']."'")[0];?>
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
                            var labels = new Array('Koncentráció','Itiner ismeret','','');
                            var data = new Array(<?=($car['concentration'] * 10)?>,<?=($car['itinarity'] * 10)?>,0,0);
                            var myVar = $("#carStat").polygonalGraphWidget({labels: labels,data: data,max_val: 100,circleRadius: 150,grid: true});</script>
                        <div class="row">
                            <div class="col-4 offset-1 text-center">
                                <span class="text-muted">Koncentráció</span><br/>
                                <span class="value"><?=$car['concentration']?></span>
                            </div>
                            <div class="col-4 text-center">
                                <span class="text-muted">Itiner ismeret</span><br/>
                                <span class="value"><?=$car['itinarity']?></span>
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
                                <label for="concentration" class="form-label">Koncentráció</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="concentration" name="concentration" value="0"  onchange="changeVal('concentration', 1250);"/>
                                <div class="concentration_output" id="concentration_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="concentration_price" id="concentration_price" value="0" />
                            </div>
                            <div class="mb-3">
                                <label for="itinarity" class="form-label">Itiner ismeret</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="itinarity" name="itinarity" value="0" onchange="changeVal('itinarity', 1000);"/>
                                <div class="itinarity_output" id="itinarity_output" data-price="0" data-add="0">$0</div>
                                <input type="hidden" name="itinarity_price" id="itinarity_price" value="0" />
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