<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Kezdőlap</h1>
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Csapat áttekintés</h5>
					</div>
					<div class="card-body">
						<?php if(!$this->User->haveTeam()){ ?>
                        <div class="alert alert-danger text-center">
                            Jelenleg nincs csapatod!<br/>
                            Kattints <a href="./create-team">ide</a>, hogy létrehozz egyet!
                        </div>
                        <?php }else{ ?>
                        Csapatnév: <b><span style="float: right;"><?=$_SESSION['user']['teamName']?></b></span><br/>
                        Autó: <b><span style="float: right;"><?=$this->User->getAuto()?></b></span><br/>
                        Versenyző: <b><span style="float: right;"><?=$this->User->getDriver()?></b></span><br/>
                        Navigátor: <b><span style="float: right;"><?=$this->User->getCodriver()?></b></span><br/>
                        Egyenleg: <b><span style="float: right;">$<?=number_format($_SESSION['user']['money'],2,"."," ")?></b></span><br/>
                        <?php }; ?>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Szponzorok</h5>
					</div>
					<div class="card-body">
						<?php if($this->User->haveTeam()){ ?>
							<div class="row">
							<?php foreach($this->Db->sqla("user_sponsors","*","WHERE userID='".$_SESSION['user']['id']."'") as $s){ ?>
								<?php $sponsor = $this->Db->sqla("sponsors","*","WHERE id='".$s['sponsorID']."'")[0]; ?>
								<div class="col-12 col-md-4"><img src="./assets/img/sponsors/<?=$sponsor['name']?>.png" width="100%" /></div>
							<?php }; ?>
							</div>
                        <?php }; ?>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Pénzügyi áttekintés</h5>
					</div>
					<div class="card-body">
						<?php foreach($this->Finance->get_interval(7, 10) as $k=>$v){ 
							$class = ($v['dir']	== "-") ? "minus" : "plus";
						?>
						<span class="<?=$class?>">
							<?=str_replace("-",".", $v['date'])?> <?=$v['time']?>:&nbsp; 
							<b><?=$v['dir']?><?=number_format($v['balance'],2,"."," ")?>&nbsp;</b>
							<span class="text-right"><?=$v['reason']?></span>
						</span><br/>
						<?php }; ?>
						<center>
							<a href="finance" class="btn btn-info mt-3">Összes megtekintése</a>
						</center>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Következő verseny</h5>
					</div>
					<div class="card-body">
						<?php if(@$event['name'] != ""){ ?>
						<img src="<?=$event['eventImage']?>" style="width:100%;" class="mb-3"/>
						<center>
							<b><?=$event['name']?></b><br/>
							<b>Kezdés: <?=str_replace("-",".",$event['startDate'])?></b><br/>
							<a href="event/<?=$event['id']?>" class="btn btn-info">Részletek</a>
							<?php if($this->Db->sqln("events_joins","id","WHERE userID='".$_SESSION['user']['id']."' AND eventID = '" . $event['id']."'") == 0){ ?>
								<a href="event/<?=$event['id']?>/join" class="btn btn-info">Nevezés</a>
							<?php }else{ ?>
								<a href="event/<?=$event['id']?>" class="btn btn-danger disabled" disabled>Már neveztél!</a>
							<?php }; ?>
						</center>
						<?php }else{ ?>
							
						<?php }; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>