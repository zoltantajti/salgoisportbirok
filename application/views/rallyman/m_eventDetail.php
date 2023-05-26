<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Esemény részletek</h1>
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">
                            <?=$event['name']?>
                        </h5>                        
					</div>
					<div class="card-body">
                        Kezdés időpontja: <span style="float:right;"><?=str_replace("-",".",$event['startDate'])?></span><br/>
                        Helyszín: <span style="float:right;"><?=$location['location']?></span><br/>
                        Nevezési díj: <span style="float:right;">$<?=number_format($event['joinPrice'],2,"."," ")?></span><br/>
                        <hr/>
                        <b>Pályák:</b><br/>
                        <?php
                        $tracks = json_decode($event['tracks'],true);
                        foreach($tracks as $k=>$v)
                        {
                            if(!isset($v['type'])){
                            $track = $this->Db->sqla("tracks","*","WHERE id='".$v['id']."'")[0];
                            ?>
                            <b><?=$v['name']?></b> <i>(<?=$track['length']?> km)</i><br/>
                            <?php
                            }else{
                                echo("<b>&nbsp;</b><br/>");
                            };
                        }
                        ?>
                        <hr/>
                        <b>Díjazás:</b><br/>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Pénzdíj</th>
                                    <th class="text-center">Pontok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(json_decode($event['winnings'],true) as $k=>$v){ ?>
                                <tr>
                                    <td class="text-center"><?=$v['pos']?></td>
                                    <td class="text-center">$<?=number_format($v['price'],2,"."," ")?></td>
                                    <td class="text-center"><?=$v['pts']?></td>
                                </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-6">
                <div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Nevezés leadása </h5>                        
					</div>
					<div class="card-body">
                        <?php if($_SESSION['user']['money'] >= $event['joinPrice']){ ?>
                            <?php if($this->Db->sqln("events_joins", "id", "WHERE eventID='".$event['id']."' AND userID='".$_SESSION['user']['id']."'") == 0){ ?>
                            <center>
                                <a href="event/<?=$event['id']?>/join" class="btn btn-info">Nevezés</a>
                            </center>
                            <?php }else{ ?>
                                <div class="alert alert-success">Már neveztél erre az eseményre!</div>    
                            <?php }; ?>
                        <?php }else{ ?>
                            <div class="alert alert-danger">A nevezéshez nincs elegendő egyenleged!</div>    
                        <?php };?>
					</div>
				</div>
                <div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Nevezett versenyzők</h5>                        
					</div>
					<div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">R.sz</th>
                                    <th class="text-center">Csapat</th>
                                    <th class="text-center">KAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1; 
                                    foreach($this->Db->sqla("events_joins","*","WHERE eventID='".$event['id']."'") as $k=>$v){ 
                                        $user = $this->Db->sqla("users","teamName,car_id,driver_id,codriver_id","WHERE id='".$v['userID']."'")[0];
                                        $driver = $this->Db->sqla("drivers","name,nat","WHERE id='".$user['driver_id']."'")[0];
                                        $codriver = $this->Db->sqla("codrivers","name,nat","WHERE id='".$user['codriver_id']."'")[0];
                                        $car = $this->Db->sqla("cars","name,category","WHERE id='".$user['car_id']."'")[0];
                                        $ucar = $this->Db->sqla("user_cars","livery","WHERE userID='".$v['userID']."'")[0];
                                        $carIcon = explode(" ", $car['name']);
                                ?>
                                <tr>
                                    <td class="text-center"><?=$i?>.</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="./assets/img/flags/<?=$driver['nat']?>.png" width="32" /> <?=$driver['name']?> -                                             
                                                <img src="./assets/img/flags/<?=$codriver['nat']?>.png" width="32" /> <?=$codriver['name']?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="./assets/img/cars/<?=$carIcon[0]?>.png" width="32" /> 
                                                <?=$car['name']?> - 
                                                <b><?=$user['teamName']?></b>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?=$car['category']?><br/>
                                        <img src="./assets/img/cars/<?=$carIcon[0]?>.png" width="32" /> 
                                    </td>
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