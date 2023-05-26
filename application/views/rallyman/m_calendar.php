<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Versenynaptár</h1>
		<div class="row">
            <?php foreach($this->Db->sqla("events","*","WHERE startDate >= '" . date("Y-m-d H:i:s") . "' ORDER BY startDate DESC") as $v){ ?>
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$v['name']?></h5>
					</div>
					<div class="card-body">
                        <img src="<?=$v['eventImage']?>" style="width:100%;" class="mb-3"/>
                        <center>
							<a href="results/<?=$v['id']?>" class="btn btn-info">Eredmények</a>
						</center>
					</div>
				</div>
			</div>
			<?php }; ?>
		</div>
	</div>
</main>