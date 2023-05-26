<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Tesztlap eredménye</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$result['testID']?> tesztlap eredménye</h5>
					</div>
					<div class="card-body">
						<center>
                            <b>Elérhető pontszám: <?=$result['max']?></b><br/>
                            <b>Elért pontszám: <?=$result['pont']?> (<?=$result['percent']?>%)</b><br/>
                            <b>Eredmény: <?=$result['result']?></b>
                        </center>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Helytelen válaszok: <?=count(json_decode($result['fails']))?></h5>
					</div>
					<div class="card-body">
						<?php if(count(json_decode($result['fails'])) > 0) { ?>
						<?php
							$fails = json_decode($result['fails'], true);
							foreach($fails as $k=>$v){ 
								$kerdes = $this->Db->sqla("kerdesek","*","WHERE id='".$v['kerdes']."'")[0];
						?>
						<div class="row kerdes text-warning"><div class="col-12 text-bold"><?=$v['kerdes']?>) <?=$kerdes['kerdes']?></div></div>
						<div class="row valasz helyes text-success"><div class="col-12">Helyes válasz: <?=$kerdes['valasz_' . $kerdes['helyes']]?></div></div>
						<?php if($v['valasz'] != "") { ?>
							<div class="row valasz helytelen text-danger mb-3"><div class="col-12"><i>Válaszod: <?=$kerdes['valasz_' . $kerdes['helyes']]?></i></div></div>
						<?php }else{ ?>
							<div class="row valasz helytelen text-danger mb-3"><div class="col-12"><i>Nem válaszoltál</i></div></div>
						<?php }; ?>
						<?php }; ?>
						<?php }else{ ?>
						<div class="row text-center text-success"><div class="col-12">Minden kérdésre helyesen válaszoltál!</div></div>
						<?php }; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>