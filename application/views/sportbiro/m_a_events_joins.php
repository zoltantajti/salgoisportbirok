<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Eseményre jelentkezettek</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$e['name']?></h5>
					</div>
					<div class="card-body">
                        <?=$this->Msg->get()?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Név (ig. szám)</th>
                                    <th>Jelentk. dátum</th>
                                    <th>Autó</th>
                                    <th>Pályabiztosítók</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($u as $k=>$v){ ?>
                                <tr>
                                    <td>#<?=$i?></td>
                                    <td><?=$v['fullName']?> (<?=$v['marshalCardNo']?>)</td>
                                    <td><?=$v['joinDate']?></td>
                                    <td><?=$this->Cars->drawLicensePlate($v['carRegLetter'], $v['licensePlate']) ?></td>
                                    <td>
                                        <?php foreach(json_decode($v['persons'],true) as $person){ ?>
                                        <?=$person['fullName']?><br/>
                                        <?php }; ?>
                                    </td>
                                    <td>
                                        <?php if($v['status'] == "pending"){ ?>
                                        <a href="admin/events/approve/<?=$e['id']?>/<?=$v['id']?>" title="Elfogad"><i class="fa fa-fw fa-check"></i></a>
                                        <a href="admin/events/deny/<?=$e['id']?>/<?=$v['id']?>" title="Elutasít"><i class="fa fa-fw fa-times"></i></a>
                                        <?php }elseif($v['status'] == "approved"){ ?>
                                        <span class="badge bg-success">ELFOGADVA</span>
                                        <?php }elseif($v['status'] == "deny"){ ?>
                                        <span class="badge bg-danger">ELUTASÍTVA</span>
                                        <?php }; ?>
                                    </td>
                                </tr>
                                <?php $i++; }; ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>