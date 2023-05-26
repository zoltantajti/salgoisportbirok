<h1 class="h3 mb-3">Kérdések</h1>
<div class="row">
    <div class="col-12">
		<div class="card">
	    	<div class="card-header">
				<h5 class="card-title mb-0">Kérdések listája</h5>
			</div>
			<div class="card-body">
                <a href="./admin/kerdesek/new" class="btn btn-success">Új hozzáadása</a>
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Azonosító</th>
                            <th>Kérdés</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->Db->sqla("kerdesek","*") as $k=>$v){ ?>
                        <tr>
                            <td><?=$v['id']?></td>
                            <td><?=$v['kerdes']?></td>
                            <td>
                                <a href="./admin/kerdesek/edit/<?=$v['id']?>"><i class="fa-solid fa-pencil"></i></a>&nbsp;&nbsp; &nbsp; 
                                <a href="./admin/kerdesek/delete/<?=$v['id']?>"><i class="fa-sharp fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>