<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Esemény</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$e['name']?></h5>
					</div>
					<div class="card-body">
                        Kezdés: <b><?=$e['startDate']?></b><br/>
                        Határidő: <b><?=$e['joinDate']?></b><br/>
                        Helyszín: <b><?=$e['location']?></b><br/>
                        Leírás:<br/><?=$e['description']?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>