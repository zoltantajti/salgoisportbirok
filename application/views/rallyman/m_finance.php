<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Pénzügyek</h1>
		<div class="row">
            <div class="col-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Teljes áttekintés</h5>
					</div>
					<div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Dátum/Idő</th>
                                    <th>Összeg</th>
                                    <th>Indok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($f as $v){ ?>
                                <tr class="<?=($v['dir'] == "-") ? "minus" : "plus"?>">
                                    <td>
                                        <?=$v['date']?><br/>
                                        <?=$v['time']?><br/>
                                    </td>
                                    <td>
                                        <?=$v['dir']?><?=number_format($v['balance'],2,"."," ")?>
                                    </td>
                                    <td>
                                        <?=$v['reason']?>
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