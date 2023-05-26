<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Bajnokság állása</h1>
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card">
					<div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Felhasználónév</th>
                                    <th>Pont</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($this->Db->sqla("users","name,avatar,pts") as $v){ ?>
                                <tr>
                                    <td><?=$i?>.</td>
                                    <td>
                                        <img src="<?=$v['avatar']?>" width="32" />&nbsp;
                                        <?=$v['name']?>
                                    </td>
                                    <td><?=$v['pts']?></td>
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