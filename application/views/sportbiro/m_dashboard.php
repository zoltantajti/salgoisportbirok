<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Kezdőlap</h1>
		<?php if(!$this->User->checkProfile()){ ?>
        <div class="row">
			<div class="col-12">
                <div class="alert alert-danger">
                    <b>Figyelmeztetés!</b><br/>
                    A profilodban <b>hiányzó adatok vannak</b>! Amíg nem töltöd ki <b>hiánytalanul</b> a profilod, addig nem tudsz versenyre jelentkezni!<br/>
                    <br/>
                    <a href="my-profile">Profilom kitöltése</a>
                </div>
            </div>
        </div>
        <?php }; if(!$this->User->checkCars()){ ?>
        <div class="row">
			<div class="col-12">
                <div class="alert alert-danger">
                    <b>Figyelmeztetés!</b><br/>
                    Nem töltöttél fel gépjárművet! Amennyiben nincs gépjárműved, a <b>Gépjárműveim</b> menüpontban jelöld azt!<br/>
                    <br/>
                    <a href="my-cars">Gépjárműveim</a>
                </div>
            </div>
        </div>
        <?php }; ?>
        <div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Empty card</h5>
					</div>
					<div class="card-body">
                    
                    </div>
				</div>
			</div>
		</div>
	</div>
</main>