<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Eseménynaptár</h1>
		<div class="row">
            <?php foreach($e as $k=>$v){ ?>
			<div class="col-12 col-lg-4">
				<div class="card">
					<img src="<?=$v['image']?>" class="card-img-top" alt="">	
					<div class="card-header text-center">
						<h5 class="card-title mb-0"><?=$v['name']?></h5>
					</div>					
					<div class="card-body text-center">
                        <b>Helyszín: </b><?=$v['location']?><br/>
                        <b>Kezdés: </b><?=str_replace('-','.',$v['startDate'])?><br/>
                        <b>Jelentkezési határidő: </b><?=str_Replace('-','.',$v['joinDate'])?><br/>
						<hr/>
                        <?php if($v['joinDate'] < date("Y-m-d")){ ?>
                            <div class="alert alert-danger">A jelentkezési határidő lejárt!</div>
                        <?php }else{ ?>
                            <center>
                                <a href="event/<?=$v['id']?>" class="btn btn-info">Részletek<a>
                                <?php if(!$this->Events->hasEventByUserId($_SESSION['user']['ID'], $v['id'])){ ?>
									<a href="event/<?=$v['id']?>/join" class="btn btn-info">Jelentkezem</a>
								<?php }else{ ?>
									<a href="javascript:;" disabled class="btn btn-success disabled btn-disabled">Jelentkeztél!</a>
								<?php }; ?>
                            </center>
                        <?php }; ?>
					</div>
				</div>
			</div>
            <?php }; ?>
		</div>
	</div>
</main>