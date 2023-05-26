<?php $this->load->view('admin/_header'); ?>
<div class="wrapper">
	<nav id="sidebar" class="sidebar js-sidebar">
		<div class="sidebar-content js-simplebar">
			<a class="sidebar-brand" href="./admin">
                <span class="align-middle">Admin | Audit 2023</span>
            </a>
            <ul class="sidebar-nav">
                <?php $segs = $this->uri->segment_array(); ?>
			    <li class="sidebar-item <?=(!isset($segs[2]) ? "active" : "")?>">
					<a class="sidebar-link" href="./admin">
                        <i class="align-middle" data-feather="home"></i>
                        <span class="align-middle">Kezdőoldal</span>
                    </a>
				</li>
                <li class="sidebar-item <?=(@$segs[2] == "pages" ? "active" : "")?>">
					<a class="sidebar-link" href="./admin/kerdesek">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Kérdések</span>
                    </a>
				</li>
            </ul>
        </div>
    </nav>
    <div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
		<a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>
        <div class="navbar-collapse collapse">
			<ul class="navbar-nav navbar-align">
				<li class="nav-item dropdown">
					<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>
					<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <span class="text-dark"><?=$_SESSION['user']?></span>
                    </a>
			    	<div class="dropdown-menu dropdown-menu-end">
				    	<a class="dropdown-item" href="./admin/logout">Kilépés</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
    <main class="content">
    	<div class="container-fluid p-0">
            <?php $this->load->view('admin/m_' . $m); ?>
        </div>
    </main>
</div>   
 
<?php $this->load->view('admin/_footer'); ?>