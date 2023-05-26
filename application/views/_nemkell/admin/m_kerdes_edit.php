<h1 class="h3 mb-3">Új kérdés hozzáadása</h1>
<div class="row">
    <div class="col-12">
		<div class="card">
	    	<div class="card-header">
				<h5 class="card-title mb-0">Új kérdés hozzáadása</h5>
			</div>
			<div class="card-body">
                <form method="POST" action="./admin/kerdes_save/true/<?=$kerdes['id']?>">
					<div class="row mb-3">
						<div class="col-6">
							<label for="kerdes">Kérdés <i>(Kötelező mező!)</i></label>
							<input type="text" name="kerdes" id="kerdes" class="form-control" required value="<?=$kerdes['kerdes']?>">
						</div>
						<div class="col-6">
							<label for="helyes">Helyes válasz száma <i>(Kötelező mező!)</i></label>
							<input type="number" name="helyes" id="helyes" class="form-control" min="1" max="4" step="1" required value="<?=$kerdes['helyes']?>">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<label for="valasz_1">Válasz 1</label>
							<input type="text" name="valasz_1" id="valasz_1" class="form-control" required value="<?=$kerdes['valasz_1']?>">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<label for="valasz_2">Válasz 2</label>
							<input type="text" name="valasz_2" id="valasz_2" class="form-control" required value="<?=$kerdes['valasz_2']?>">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<label for="valasz_3">Válasz 3</label>
							<input type="text" name="valasz_3" id="valasz_3" class="form-control" required value="<?=$kerdes['valasz_3']?>">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<label for="valasz_4">Válasz 4</label>
							<input type="text" name="valasz_4" id="valasz_4" class="form-control" value="<?=$kerdes['valasz_4']?>">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="./admin/kerdesek" class="btn btn-danger">Vissza</a>
							<button type="submit" name="submit" value="1" class="btn btn-success">Mentés</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>