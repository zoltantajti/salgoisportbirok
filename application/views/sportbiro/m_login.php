<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center">
							<h1 class="h2">{logo helye}</h1>
							<p class="lead">
								A folytatáshoz be kell jelentkezned!
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="POST">
                                        <?=$this->Msg->get()?>
										<div class="mb-3">
											<label class="form-label">E-mail cím:</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="E-mail cím" />
										</div>
										<div class="mb-3">
											<label class="form-label">Jelszó:</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Jelszó" />
											<small>
                                                <a href="lostpw">Elfelejtetted a jelszavad?</a>
                                            </small>
										</div>
										<div>
											<label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                                <span class="form-check-label">
                                                    Jegyezz meg!
                                                </span>
                                            </label>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Belépés</button>
                                            <a href="register" class="btn btn-lg btn-primary">Regisztráció</a>
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