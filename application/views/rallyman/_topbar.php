<section id="topbar">
    <div class="container-fluid topbar-main">
        <?php if($this->User->isLogin()){ ?>
            <nav class="navbar navbar-expand">
				<a class="sidebar-toggle js-sidebar-toggle text-white">
                    <i class="fa-solid fa-bars"></i>
                </a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
                        <li class="nav-item text-white">
                            <a class="nav-link text-white" href="javascript:;">
                                <i class="align-middle" data-feather="dollar-sign"></i> <?=number_format($_SESSION['user']['money'],2,"."," ")?>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle text-white" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
									<span class="indicator" id="notify-indicator">0</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header" id="notify-header">
									0 új értesítés
								</div>
								<div class="list-group" id="nofity-frame">
                                    <?php if(!$this->User->haveTeam()){ ?>
									<a href="create-team" class="list-group-item" id="notify-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
											</div>
											<div class="col-10">
												<div class="text-dark">Nincs még csapatod!</div>
												<div class="text-muted small mt-1">Kérlek, szerződj le egy autógyártóval és igazolj le egy versenyzőt és navigátort!</div>
												<div class="text-muted small mt-1"></div>
											</div>
										</div>
									</a>
									<?php }; ?>
									<?php foreach($this->Db->sqla("notify","*","WHERE userID='".$_SESSION['user']['id']."' AND seen = 0 ORDER BY date DESC") as $v){ ?>
									<a href="results/last" class="list-group-item" id="notify-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
											</div>
											<div class="col-10">
												<div class="text-dark">Esemény véget ért!</div>
												<div class="text-muted small mt-1">Véget ért egy esemény, amelyre neveztél!</div>
												<div class="text-muted small mt-1"></div>
											</div>
										</div>
									</a>
									<?php }; ?>
								</div>
							</div>
						</li>
                        <li class="nav-item dropdown text-white">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block text-white" href="#" data-bs-toggle="dropdown">
                                <span class="text-white">
									<i class="align-middle" data-feather="user"></i> <?=$_SESSION['user']['name']?>
								</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="logout">Kilépés</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        <?php }; ?>
    </div>
</section>