<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Események</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="admin/events/new" class="btn btn-info">Új esemény</a>
					</div>
					<div class="card-body">
                        <?=$this->Msg->get_all()?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Név</th>
                                    <th>Helyszín</th>
                                    <th>Kezdés</th>
                                    <th>Jelentkezési határidő</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($e as $k=>$v){ ?>
                                <tr>
                                    <td><a href="admin/events/open/<?=$v['id']?>"><?=$v['name']?></a></td>
                                    <td><?=$v['location']?></td>
                                    <td><?=$v['startDate']?></td>
                                    <td><?=$v['joinDate']?></td>
                                    <td>
                                        <a href="admin/events/edit/<?=$v['id']?>"><i class="fa fa-fw fa-pencil"></i></a>
                                        <a href="admin/events/rem/<?=$v['id']?>"><i class="fa fa-fw fa-trash"></i></a>
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