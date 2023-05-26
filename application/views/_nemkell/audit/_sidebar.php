<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="<?=site_url()?>">
            <span class="align-middle">Audit 2023</span>
        </a>
		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Főmenü
			</li>
			<li class="sidebar-item <?=($m == "index") ? "active" : "" ?>">
				<a class="sidebar-link" href="<?=site_url()?>">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Kezdőlap</span>
                </a>
            </li>
			<li class="sidebar-item">
			    <a class="sidebar-link" href="exam">
                    <i class="align-middle" data-feather="award"></i> <span class="align-middle">Tesztlap</span>
                </a>
			</li>
			<li class="sidebar-item <?=($m == "questions") ? "active" : ""?>">
				<a class="sidebar-link" href="questions">
                    <i class="align-middle" data-feather="eye"></i> <span class="align-middle">Kérdések</span>
                </a>
			</li>

			<?php if($_SESSION['perm'] == "admin"){ ?>
			<li class="sidebar-header">
				Admin felület
			</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="<?=site_url()?>/admin" target="_blank">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Belépés az adminba</span>
                </a>
			</li>
			<?php }; ?>
        </ul>
	</div>
</nav>