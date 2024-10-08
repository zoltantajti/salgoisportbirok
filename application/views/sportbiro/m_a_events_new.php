<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Esemény</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
                    <form method="POST" enctype="multipart/form-data">
					<div class="card-header">
                        <button type="submit" class="btn btn-info">Mentés</button>
						<a href="admin/events" class="btn btn-info">Mégse</a>
					</div>
					<div class="card-body">
                        <div class="mb-3">
                            <label for="name">Esemény neve</label>
                            <input class="form-control form-control-lg" type="text" name="name" value="<?=@$e['name']?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="location">Esemény helyszíne</label>
                            <input class="form-control form-control-lg" type="text" name="location" value="<?=@$e['location']?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="startDate">Esemény kezdete</label>
                            <input class="form-control form-control-lg" type="date" name="startDate" value="<?=@$e['startDate']?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="joinDate">Esemény kezdete</label>
                            <input class="form-control form-control-lg" type="date" name="joinDate" value="<?=@$e['joinDate']?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="joinDate">Térkép beállítások</label>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-lg" type="text" name="mapCenter" value="<?=@$e['mapCenter']?>" placeholder="Középpont"/>
                                <input class="form-control form-control-lg" type="number" min="8" max="14" step="1" name="mapZoom" value="<?=@$e['mapZoom']?>" placeholder="Nagyítás"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="joinDate">Esemény képe</label>
                            <input class="form-control form-control-lg" type="file" name="image" value="<?=@$e['image']?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="description">Esemény leírása</label>
                            <textarea class="form-control form-control-lg" id="tinymce" name="description"><?=@$e['description']?></textarea>
                        </div>
					</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</main>