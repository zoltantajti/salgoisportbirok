<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Audit felkészítő portál</h1>
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Teszteredményeim</h5>
					</div>
					<div class="card-body">
						<canvas id="chartjs-doughnut"></canvas>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Teszteredményeim %-ban</h5>
					</div>
					<div class="card-body">
						<canvas id="chartjs-line"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Kitöltött tesztjeim</h5>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>Azonosító</th>
									<th class="d-none d-xl-table-cell">Dátum</th>
									<th class="d-none d-xl-table-cell">Max. pontszám</th>
									<th class="d-none d-xl-table-cell">Elért pontszám</th>
									<th>%</th>
									<th>Eredmény</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($tests as $k=>$v){ ?>
								<tr>
									<td><a href="exam/result/<?=$v['testID']?>"><?=$v['testID']?></a></td>
									<td class="d-none d-xl-table-cell"><?=str_replace("-",".",$v['date'])?></td>
									<td class="d-none d-xl-table-cell"><?=$v['max']?></td>
									<td class="d-none d-xl-table-cell"><?=$v['pont']?></td>
									<td><?=$v['percent']?></td>
									<td><?=($v['result'] == "Megfelelt") ? '<div class="text-success">Megfelelet</div>' : '<div class="text-danger">Nem felelt meg</div>'?></td>
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
<script>
document.addEventListener("DOMContentLoaded", function() {
	new Chart(document.getElementById("chartjs-doughnut"), {
		type: "doughnut",
		data: {
			labels: ["Sikeres", "Sikertelen"],
			datasets: [{
				data: [<?=$success?>, <?=$fail?>],
				backgroundColor: [
					window.theme.success,
					window.theme.danger
				],
				borderColor: "transparent"
			}]
		},
		options: {
			maintainAspectRatio: false,
			cutoutPercentage: 65,
			legend: {
				display: true
			}
		}
	});

	new Chart(document.getElementById("chartjs-line"), {
		type: "line",
		data: {
			labels: [<?php foreach($tests as $k=>$v){ echo("\"" . $v['date'] . "\","); }; ?>],
			datasets: [{
				label: "Eredmény (%)",
				fill: true,
				backgroundColor: "transparent",
				borderColor: window.theme.primary,
				data: [<?php foreach($tests as $k=>$v){ echo("" . $v['percent'] . ","); }; ?>],
			},{
				label: "Megfelelt határvonal (%)",
				fill: true,
				backgroundColor: "transparent",
				borderColor: window.theme.danger,
				borderDash: [4, 4],
				data: [<?php foreach($tests as $k=>$v){ echo("75,"); }; ?>],
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: true
			},
			tooltips: {
				intersect: false
			},
			hover: {
				intersect: true
			},
			plugins: {
				filler: {
					propagate: false
				}
			},
			scales: {
				xAxes: [{
					reverse: true,
					gridLines: {
						color: "rgba(0,0,0,0.05)"
					}
				}],
				yAxes: [{
					ticks: {
						stepSize: 500
					},
					display: true,
					borderDash: [5, 5],
					gridLines: {
						color: "rgba(0,0,0,0)",
						fontColor: "#fff"
					}
				}]
			}
		}
	});
});
</script>