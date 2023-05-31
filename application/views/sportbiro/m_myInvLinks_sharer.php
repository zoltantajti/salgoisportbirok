<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Meghívó linkjeim</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h5 class="card-title mb-0">Pályíbiztosító adatok bekérése</h5>
					</div>
					<div class="card-body text-center">
                        A Kulcsod elkészült! A kék mezőben lévő linket küldd el, az általad meghívni kívánt pályabiztosítónak, hogy töltse ki az adatait!
                        <br/><br/>
                        <div class="alert alert-info">
                            <?=site_url()?>invite/<?=$inv['authKey']?>
                        </div>
                        <br/>
                        Kérlek, tájékoztasd, hogy jelen link a következő időpontban lejár: <b><?=$inv['expiredDate']?></b>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>