<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Jelentkezés az eseményre</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$e['name']?></h5>
					</div>
					<div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label>Autó kiválasztása</label>
                                <select name="carID" class="form-control form-control-lg">
                                    <option selected disabled>Válaszd ki az autód!</option>
                                    <?php foreach($this->Cars->listmycars() as $k=>$v){ ?>
                                    <option value="<?=$v['id']?>"><?=$v['licensePlate']?> - <?=$v['carManufacturer']?> <?=$v['carType']?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pályabiztosítók kiválasztása</label>
                                <div class="row">
                                    <?php $i = 0; foreach($this->Db->sqla("persons","*","WHERE marshalID='".$_SESSION['user']['ID']."'") as $k=>$v){ ?>
                                    <div class="col-12 col-md-4">
                                        <input type="checkbox" id="person_<?=$i?>" name="person[]" value="<?=$v['id']?>">
                                        <label for="person_<?=$i?>"> <?=$v['fullName']?> </label><br>
                                    </div>
                                    <?php $i++; }; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info">Jelentkezem!</button>
                            </Div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>