<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Verseny végeredmény</h1>
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">
                            <?=$e['name']?>
                        </h5>                        
					</div>
					<div class="card-body">
                        <?php 
                            $wins = json_decode($e['winnings'],true);
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="6" class="text-center">Abszolút végeredmeny</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Versenyző - Navigátor<br/>Autó - Csapat</th>
                                    <th>Kat.</th>
                                    <th>Idő</th>
                                    <th>Kül.</th>
                                    <th>Pont</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($results as $k=>$v){ $carName = explode(" ",$v['car'])[0];?>
                                <tr>
                                    <td><?=$i?>.</td>
                                    <td>
                                        <img src="./assets/img/flags/<?=$v['driverNat']?>.png" width="32" /> <?=$v['driverName']?> - 
                                        <img src="./assets/img/flags/<?=$v['codriverNat']?>.png" width="32" /> <?=$v['codriverName']?><br/>
                                        <img src="./assets/img/cars/<?=$carName?>.png" width="32" /> <?=$v['car']?> - 
                                        <?=$v['teamName']?>
                                    </td>
                                    <td>
                                        ORB
                                    </td>
                                    <td>
                                        <?=$v['cTime']?>
                                    </td>
                                    <td></td>
                                    <td><?=$wins[$i - 1]['pts']?></td>
                                </tr>
                                <?php $i++; }; ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>