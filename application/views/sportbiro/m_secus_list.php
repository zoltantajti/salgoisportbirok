<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Pályabiztosítóim</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="secus/new" class="btn btn-info">Új hozzáadása</a>
					</div>
					<div class="card-body">
                        <?=$this->Msg->get()?>
                        <table class="table">
                            <tbody>
                                <?php foreach($s as $k=>$v){?>
                                <tr>
                                    <td><?=$v['fullName']?></td>
                                    <td><?=$v['postcode']?>, <?=$v['city']?></td>
                                    <td>
                                        <a href="secus/edit/<?=$v['id']?>"><i class="fa fa-fw fa-pencil"></i></a>
                                        <a href="secus/rem/<?=$v['id']?>"><i class="fa fa-fw fa-trash"></i></a>
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