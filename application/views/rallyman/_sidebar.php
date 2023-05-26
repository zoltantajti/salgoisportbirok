<?php if($this->User->isLogin()){ ?>
    <nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="./dashboard">
            <span class="align-middle">Rally Fans</span><br/>
            <span class="small align-middle text-muted">A rally manager játék</span>
        </a>
		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Főmenü
			</li>
			<li class="sidebar-item <?=($m == "dashboard") ? "active" : "" ?>">
				<a class="sidebar-link" href="dashboard">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Kezdőlap</span>
                </a>
            </li>
			<li class="sidebar-item <?=($m == "calendar") ? "active" : "" ?>">
				<a class="sidebar-link" href="calendar">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Versenynaptár</span>
                </a>
            </li>

            <li class="sidebar-header">
				Eredmények
			</li>
            <li class="sidebar-item <?=($m == "results_all" || $m == "raceResults") ? "active" : "" ?>">
				<a class="sidebar-link" href="results">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Eredmények</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "tabella") ? "active" : "" ?>">
				<a class="sidebar-link" href="tabella">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Pontverseny</span>
                </a>
            </li>

            <li class="sidebar-header">
				Csapatom
			</li>
            <li class="sidebar-item <?=($m == "mycars") ? "active" : "" ?>">
				<a class="sidebar-link" href="cars">
                    <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Autó</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "mydrivers") ? "active" : "" ?>">
				<a class="sidebar-link" href="drivers">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Versenyző</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "mycodrivers") ? "active" : "" ?>">
				<a class="sidebar-link" href="codrivers">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Navigátor</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "sponsors") ? "active" : "" ?>">
				<a class="sidebar-link" href="sponsors">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Szponzorok</span>
                </a>
            </li>

            <li class="sidebar-header">
				Piac
			</li>
            <li class="sidebar-item <?=($m == "driverMarket") ? "active" : "" ?>">
				<a class="sidebar-link" href="driverMarket">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Versenyzői Piac</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "codriverMarket") ? "active" : "" ?>">
				<a class="sidebar-link" href="codriverMarket">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Navigátor Piac</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "parts") ? "active" : "" ?>">
				<a class="sidebar-link" href="parts">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Alkatrészek</span>
                </a>
            </li>
        </ul>
	</div>
</nav>
<?php }; ?>