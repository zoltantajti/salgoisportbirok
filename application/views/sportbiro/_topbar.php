<?php if($m != "login" && $m != "register"){ ?>
<section id="topbar">
    <div class="container-fluid topbar-main">
        <?php if($this->User->isLogin()){ ?>
            <nav class="navbar navbar-expand">
				<a class="sidebar-toggle js-sidebar-toggle text-white">
                    <i class="fa-solid fa-bars"></i>
                </a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
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
                                    
								</div>
							</div>
						</li>
                        <li class="nav-item dropdown text-white">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block text-white" href="#" data-bs-toggle="dropdown">
                                <span class="text-white">
									<i class="align-middle" data-feather="user"></i> <?=$_SESSION['user']['fullName']?>
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
<?php }; ?>