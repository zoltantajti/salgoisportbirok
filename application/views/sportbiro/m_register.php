<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center">
							<h1 class="h2">{logo helye}</h1>
							<p class="lead">
								A regisztrációhoz töltsd ki az alábbi adatokat
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">E-mail cím:</label>
											<input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="E-mail cím" />
                                            <?php echo form_error('email', '<div class="error">', '</div>'); ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Jelszó:</label>
											<input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Jelszó" />
                                            <?php echo form_error('password', '<div class="error">', '</div>'); ?>
										</div>
                                        <div class="mb-3">
											<label class="form-label">Jelszó megerősítése:</label>
											<input class="form-control form-control-lg" type="password" id="password_rep" name="password_rep" placeholder="Jelszó" />
                                            <?php echo form_error('password_rep', '<div class="error">', '</div>'); ?>
										</div>
                                        <div class="mb-3">
											<label class="form-label">Teljes név:</label>
											<input class="form-control form-control-lg" type="text" id="name" name="name" placeholder="Teljes név" />
                                            <?php echo form_error('name', '<div class="error">', '</div>'); ?>
										</div>
                                        <div class="mb-3">
											<label class="form-label">Sportbírói ig. száma:</label>
											<input class="form-control form-control-lg" type="number" maxlength="4" id="marshalCardNo" name="marshalCardNo" placeholder="Sportbírói ig. száma" />
                                            <?php echo form_error('marshalCardNo', '<div class="error">', '</div>'); ?>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Regisztráció</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
