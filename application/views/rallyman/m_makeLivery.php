<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Autóm</h1>
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">
                            Festés készítése
                        </h5>                        
					</div>
					<div class="card-body">
                        <a href="cars" class="btn btn-info"> Vissza</a>
                        <a href="designer" target="_blank" class="btn btn-info"> BÉTA VERZIÓ KIPRÓBÁLÁSA </a>
                        <hr/>
                        <div class="alert alert-warning">
                            Ez a funkció jelenleg fejlesztés alatt áll!<br/>
                            jelenleg <b>NEM KÉSZÍTHETŐ</b> festés az autóhoz!
                        </div>
                        <div id="drawingCanvas"></div>
                        <style>
                            #drawingCanvas{
                                background: url(<?=$car['livery']?>);
                                width:100%;
                                height: 640px;
                                background-repeat: no-repeat;
                                background-size: 100%;
                                background-position: center;
                            }
                        </style>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>