<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Esemény</h1>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0"><?=$e['name']?></h5>
					</div>
					<div class="card-body">
                        Kezdés: <b><?=$e['startDate']?></b><br/>
                        Határidő: <b><?=$e['joinDate']?></b><br/>
                        Helyszín: <b><?=$e['location']?></b><br/>
                        Leírás:<br/><?=$e['description']?>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Információk</h5>
					</div>
					<div class="card-body">
                        
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Beosztás</h5>
					</div>
					<div class="card-body">
						<?php $s = $this->Db->sqla("event_schedule","*","WHERE eventID='".$e['id']."'"); ?>
						<div id="map" style="height:360px;"></div>
						<script src="./assets/third_party/leaflet/leaflet-src.js"></script>
						<script>
							var map = L.map('map').setView([<?=$e['mapCenter']?>], <?=$e['mapZoom']?>);
							L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19,attribution: ''}).addTo(map);
							var TCIcon = L.icon({iconUrl: "assets/img/mapmarkers/TC.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var StartIcon  = L.icon({iconUrl: "assets/img/mapmarkers/Start.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var FinishIcon  = L.icon({iconUrl: "assets/img/mapmarkers/Cel.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var StopIcon  = L.icon({iconUrl: "assets/img/mapmarkers/Stop.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var Radio  = L.icon({iconUrl: "assets/img/mapmarkers/R.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var RadioJ  = L.icon({iconUrl: "assets/img/mapmarkers/RJ.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var RadioLassit = L.icon({iconUrl: "assets/img/mapmarkers/L_R.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var RadioLRJ = L.icon({iconUrl: "assets/img/mapmarkers/L_RJ.png",shadowUrl: "",iconSize: [16,16],iconAnchor: [8,8],shadowAnchor: [0,0],popupAnchor: [0,0]});
							var points = [];
							var trackLine = [];
							<?php foreach($s as $k=>$v){ ?>
								<?php if($v['type'] != "TRACKLINE"){ ?>
								var m = L.marker([<?=$v['point']?>], {icon: <?=$v['type']?>}).addTo(map).bindPopup('<?=$v['description']?>');
								points.push(m);
								<?php }else{ ?>
								var item = [<?=$v['point']?>];
								trackLine.push(item);
								<?php }; ?>
							<?php }; ?>
							var tL = L.polyline(trackLine, {color: 'red'}).addTo(map);
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>