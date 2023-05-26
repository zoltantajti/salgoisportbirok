<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Jelentkezéseim</h1>
		<div class="row">
            <?php foreach($e as $k=>$v){ ?>
			<div class="col-12 col-md-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$v['name']?></h5>
					</div>
					<div class="card-body">
                        <b>Helyszín: </b><?=$v['location']?><br/>
                        <b>Kezdés: </b><?=str_replace('-','.',$v['startDate'])?><br/>
                        <b>Jelentkezési határidő: </b><?=str_Replace('-','.',$v['joinDate'])?><br/>
                        <?php if($v['joinDate'] < date("Y-m-d")){ ?>
                            <div class="alert alert-danger">A jelentkezési határidő lejárt!</div>
                        <?php }else{ ?>
                            <center>
                                <a href="event/<?=$v['id']?>" class="btn btn-info">Részletek<a>
                            </center>
                        <?php }; ?>
					</div>
				</div>
			</div>
            <?php }; ?>
		</div>
	</div>
</main>