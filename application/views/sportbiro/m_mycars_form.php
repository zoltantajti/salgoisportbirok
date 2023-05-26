<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><?=($f == "new") ? "Új autó hozzáadása" : "Autó szerkesztése" ?></h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<form method="POST">
                        <div class="card-header">
						    <button type="submit" class="btn btn-info">Mentés</button>
                            <a href="my-cars/list" class="btn btn-info">Mégse</a>
					    </div>
					    <div class="card-body">
                            <div class="mb-3">
							    <label class="form-label">Országkód:</label>
								<input class="form-control form-control-lg" type="text" name="carRegLetter" placeholder="Országkód" value="<?=@$c['carRegLetter']?>" />
                                <?php echo form_error('carRegLetter', '<div class="error">', '</div>'); ?>
							</div>
                            <div class="mb-3">
							    <label class="form-label">Rendszám:</label>
								<input class="form-control form-control-lg" type="text" name="licensePlate" placeholder="Rendszám" value="<?=@$c['licensePlate']?>" />
                                <?php echo form_error('licensePlate', '<div class="error">', '</div>'); ?>
							</div>
                            <div class="mb-3">
							    <label class="form-label">Gyártó:</label>
								<input class="form-control form-control-lg" type="text" name="carManufacturer" placeholder="Gyártó" value="<?=@$c['carManufacturer']?>" />
                                <?php echo form_error('carManufacturer', '<div class="error">', '</div>'); ?>
							</div>
                            <div class="mb-3">
							    <label class="form-label">Típus:</label>
								<input class="form-control form-control-lg" type="text" name="carType" placeholder="Típus" value="<?=@$c['carType']?>" />
                                <?php echo form_error('carType', '<div class="error">', '</div>'); ?>
							</div>
					    </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</main>