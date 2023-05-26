<?php if($this->User->isLogin()){ $perm = $_SESSION['user']['permission']; ?>
    <nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="./dashboard">
            <span class="align-middle">Salgói Sportbírók</span><br/>
            <span class="small align-middle text-muted"></span>
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
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Eseménynaptár</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "myevents") ? "active" : "" ?>">
				<a class="sidebar-link" href="my-events">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Jelentkezéseim</span>
                </a>
            </li>

            <li class="sidebar-header">
				Adataim
			</li>
            <li class="sidebar-item <?=($m == "myprofile") ? "active" : "" ?>">
				<a class="sidebar-link" href="my-profile">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profilom</span>
                </a>
            </li>
            <li class="sidebar-item <?=($m == "mycars_") ? "active" : "" ?>">
				<a class="sidebar-link" href="my-cars">
                    <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Autóim</span>
                </a>
            </li>

            <?php if($perm >= 2){ /*Moderátor*/ ?>
            <li class="sidebar-header">
				Admin
			</li>
            <li class="sidebar-item <?=($m == "newbies") ? "active" : "" ?>">
				<a class="sidebar-link" href="admin/newbies">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">
                        Új regisztráltak <span class="badge"><?=$this->User->countNew()?></span>
                    </span>
                </a>
            </li>
            <?php }; if($perm >= 3){ /*Adminisztrátor*/ ?>
            <li class="sidebar-item <?=($m == "users") ? "active" : "" ?>">
				<a class="sidebar-link" href="admin/users">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle"> Tagok
                </a>
            </li>
            <li class="sidebar-item <?=($m == "aevents") ? "active" : "" ?>">
				<a class="sidebar-link" href="admin/events">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Események kezelése
                </a>
            </li>
            <li class="sidebar-item <?=($m == "amembers") ? "active" : "" ?>">
				<a class="sidebar-link" href="admin/joins">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Jelentkezések kezelése
                </a>
            </li>
            <?php }; if($perm == 99){ /*Webmester*/ ?>
            <li class="sidebar-item <?=($m == "admins") ? "active" : "" ?>">
				<a class="sidebar-link" href="admin/admins">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Adminisztrátorok
                </a>
            </li>
            <?php }; ?>
        </ul>
	</div>
</nav>
<?php }; ?>