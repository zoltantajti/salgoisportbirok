<main class="content">
	<div class="container-fluid p-0">
    	<h1 class="h3 mb-3">Autóim</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<?php if($c[0]['haventCar'] != 1){ ?>
                        <a href="my-cars/add" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Új</a>
                        <a href="my-cars/noCar" class="btn btn-danger"><i class="fa fa-fw fa-times"></i> Nincs autóm</a>
                        <?php }else{ ?>
                        <a href="my-cars/haveCar" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Van autóm</a>
                        <?php }; ?>
					</div>
					<div class="card-body">
                        <?=$this->Msg->get()?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rendszám</th>
                                    <th>Gyártmány</th>
                                    <th>Típus</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($c as $k=>$v){ ?>
                                <tr>
                                    <td><?=$this->Cars->drawLicensePlate($v['carRegLetter'], $v['licensePlate']) ?></td>
                                    <td><?=$v['carManufacturer'] ?></td>
                                    <td><?=$v['carType'] ?></td>
                                    <td>
                                        <a href="my-cars/edit/<?=$v['id']?>"><i class="fa fa-fw fa-pencil"></i></a>
                                        <a href="my-cars/rem/<?=$v['id']?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>
</main>