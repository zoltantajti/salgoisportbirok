<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Beosztás készítése</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Pályabeosztás</h5>
					</div>
					<div class="card-body">
                        <?=$this->Msg->get()?>
                        <?php 
                        foreach($s as $k=>$v){ 
                            if($v['type'] != "TRACKLINE"){
                            $p = explode(",", $v['point']);    
                        ?>
                        <form method="POST">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="point_lat" name="point_lat" value="<?=$p[0]?>" />
                                    <input type="text" class="form-control" id="point_lon" name="point_lon" value="<?=$p[1]?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select name="type" id="type" class="form-control">
                                    <option value="TCIcon" <?=($v['type'] == "TCIcon") ? "selected" : "" ?>>Időellenőrző</option>
                                    <option value="StartIcon" <?=($v['type'] == "StartIcon") ? "selected" : "" ?>>Rajt</option>
                                    <option value="FinishIcon" <?=($v['type'] == "FinishIcon") ? "selected" : "" ?>>Cél</option>
                                    <option value="StopIcon" <?=($v['type'] == "StopIcon") ? "selected" : "" ?>>Stop</option>
                                    <option value="Radio" <?=($v['type'] == "Radio") ? "selected" : "" ?>>Rádiós pont</option>
                                    <option value="RadioJ" <?=($v['type'] == "RadioJ") ? "selected" : "" ?>>Jelzett rádiós pont</option>
                                    <option value="RadioLassit" <?=($v['type'] == "RadioLassit") ? "selected" : "" ?>>Lassító + Rádiós pont</option>
                                    <option value="RadioLRJ" <?=($v['type'] == "RadioLRJ") ? "selected" : "" ?>>Lassító + Jelzett rádiós pont</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <textarea row="3" class="form-control" name="description" id="description"><?=$v['description']?></textarea>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="ftype" value="edit">
                                <input type="hidden" name="fID" value="<?=$v['id']?>">
                                <button type="submit" class="btn btn-info">Módosítás</button>
                            </div>
                        </div>
                        </form>
                        <?php }; }; ?>
                        <form method="POST">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="point_lat" name="point_lat" value="" placeholder="Szélesség" />
                                    <input type="text" class="form-control" id="point_lon" name="point_lon" value="" placeholder="Hosszúság" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select name="type" id="type" class="form-control">
                                    <option readonly disabled selected>***Poszt típusa!***</option>
                                    <option value="TCIcon" >Időellenőrző</option>
                                    <option value="StartIcon">Rajt</option>
                                    <option value="FinishIcon">Cél</option>
                                    <option value="StopIcon">Stop</option>
                                    <option value="Radio">Rádiós pont</option>
                                    <option value="RadioJ">Jelzett rádiós pont</option>
                                    <option value="RadioLassit">Lassító + Rádiós pont</option>
                                    <option value="RadioLRJ">Lassító + Jelzett rádiós pont</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <textarea row="3" class="form-control" name="description" id="description"></textarea>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="ftype" value="new">
                                <button type="submit" class="btn btn-info">Mentés</button>
                            </div>
                        </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>