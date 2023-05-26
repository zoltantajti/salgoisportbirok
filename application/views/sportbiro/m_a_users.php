<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Új regisztráltak</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
                        <?=$this->Msg->get_all()?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Név</th>
                                    <th>Sportbíró ig. szám</th>
                                    <th>E-mail cím</th>
                                    <th>Telefonszám</th>
                                </tr>
                            </thead>
                        <?php foreach($this->User->getAll() as $k=>$v){ ?>
                            <tr>
                                <td><a href="admin/user/<?=$v['id']?>"><?=$v['fullName']?></a></td>
                                <td><?=$v['marshalCardNo']?></td>
                                <td><?=$v['email']?></td>
                                <td><?=$v['phoneNo']?></td>
                            </tr>
                        <?php }; ?>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>