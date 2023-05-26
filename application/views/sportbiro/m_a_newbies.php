<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Új regisztráltak</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
                        <?=$this->Msg->get_all()?>
                        <table class="table">
                        <?php foreach($this->User->getNew() as $k=>$v){ ?>
                            <tr>
                                <td><?=$v['fullName']?></td>
                                <td><?=$v['marshalCardNo']?></td>
                                <td><?=$v['email']?></td>
                                <td>
                                    <a href="admin/allow/<?=$v['id']?>">Elfogad</a>
                                    <a href="admin/deny/<?=$v['id']?>">Elutasít</a>
                                </td>
                            </tr>
                        <?php }; ?>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>