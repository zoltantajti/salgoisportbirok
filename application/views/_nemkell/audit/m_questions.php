<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Kérdések</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Kérdések</h5>
					</div>
					<div class="card-body">
                        <?php $i = 1; foreach($this->Db->sqla("kerdesek","*") as $k=>$v) { ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="row kerdes text-danger"><div class="col-12 text-bold"><?=$i?>) <?=$v['kerdes']?></div></div>
                                <div class="row valasz valasz_1 <?=($v['helyes'] == 1) ? 'helyes text-success' : 'text-muted'?>"><div class="col-12">A) <?=$v['valasz_1']?></div></div>
                                <div class="row valasz valasz_2 <?=($v['helyes'] == 2) ? 'helyes text-success' : 'text-muted'?>"><div class="col-12">B) <?=$v['valasz_2']?></div></div>
                                <div class="row valasz valasz_3 <?=($v['helyes'] == 3) ? 'helyes text-success' : 'text-muted'?>"><div class="col-12">C) <?=$v['valasz_3']?></div></div>
                                <?php if($v['valasz_4'] != null) { ?>
                                <div class="row valasz valasz_4 <?=($v['helyes'] == 4) ? 'helyes text-success' : 'text-muted'?>"><div class="col-12">D) <?=$v['valasz_4']?></div></div>
                                <?php }; ?>
                            </div>
                        </div>                              
                        <?php $i++; }; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>