<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Meghívó linkjeim</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="invlinks/generate" class="btn btn-info">Új generálása</a>
					</div>
					<div class="card-body">
                        <?=$this->Msg->get()?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Felhasznált</th>
                                    <th>Lejárt?</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($inv as $v){ ?>
                            <tr>
                                <td><?=($v['used'] == "0" ? "<span class='badge bg-success'>NEM</span>" : "<span class='badge bg-danger'>IGEN</span>")?></td>
                                <td><?=($v['expiredDate'] <= date("Y-m-d H:i:s") ? "<span class='badge bg-danger'>LEJÁRT</span>" : $v['expiredDate'])?></td>
                                <td>
                                    <?php if($v['expiredDate'] >= date("Y-m-d H:i:s") && $v['used'] == "0"){ ?>
                                        <a href="invlinks/open/<?=$v['id']?>"><i class="fa-solid fa-share-from-square"></i></a>
                                    <?php }; ?>
                                    <a href="invlinks/rem/<?=$v['id']?>"><i class="fa fa-fw fa-trash"></i></a>
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