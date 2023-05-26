<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta charset="utf-8">
    	<title>Festőműhely - beta</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">
		<!--[if lt IE 9]>
      		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    	<![endif]-->
    	<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
		<script type="text/javascript" src="./assets/third_party/Designer/js/fabric.js"></script>
		<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
		<link type="text/css" rel="stylesheet" href="./assets/third_party/Designer/css/jquery.miniColors.css" />
    	<link href="./assets/third_party/Designer/css/bootstrap.min.css" rel="stylesheet">
    	<link href="./assets/third_party/Designer/css/bootstrap-responsive.min.css" rel="stylesheet">
	 	<script type="text/javascript"></script>
	 	<style type="text/css">.footer{padding:70px 0;margin-top:70px;border-top:1px solid #e5e5e5;background-color:#f5f5f5}body{padding-top:60px}.color-preview{border:1px solid #ccc;margin:2px;zoom:1;vertical-align:top;display:inline-block;cursor:pointer;overflow:hidden;width:20px;height:20px}.rotate{-webkit-transform:rotate(90deg);-moz-transform:rotate(90deg);-o-transform:rotate(90deg);-ms-transform:rotate(90deg)}.Arial{font-family:Arial}.Helvetica{font-family:Helvetica}.MyriadPro{font-family:"Myriad Pro"}.Delicious{font-family:Delicious}.Verdana{font-family:Verdana}.Georgia{font-family:Georgia}.Courier{font-family:Courier}.ComicSansMS{font-family:"Comic Sans MS"}.Impact{font-family:Impact}.Monaco{font-family:Monaco}.Optima{font-family:Optima}.HoeflerText{font-family:"Hoefler Text"}.Plaster{font-family:Plaster}.Engagement{font-family:Engagement}</style>
  	</head>
	<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
		<div class="container-fluid">
			<section id="typography">
				<div class="page-header">
					<h1>Festőműhely <i>beta</i></h1>
				</div>
				<div class="row">			
					<div class="span4">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">Színek</a></li>				    
								<li><a href="#tab2" data-toggle="tab">Matricák</a></li>
								<li><a href="#tab3" data-toggle="tab">Funkciók</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane" id="tab3">
									<div class="well">
										<button type="button" class="btn btn-success" onclick="saveAsImage()">
											Mentés
										</button>
									</div>
								</div>
								<div class="tab-pane active" id="tab1">
									<div class="well">
										<ul class="nav">
											<li class="color-preview" title="White" style="background-color:#ffffff;"></li>
											<li class="color-preview" title="Dark Heather" style="background-color:#616161;"></li>
											<li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
											<li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
											<li class="color-preview" title="Black" style="background-color:#222222;"></li>
											<li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
											<li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
											<li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
											<li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
											<li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
											<li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
											<li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
											<li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
											<li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
											<li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
											<li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
											<li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
											<li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
											<li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
											<li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>							
											<li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
										</ul>
									</div>			      
								</div>				   
								<div class="tab-pane" id="tab2">
									<div class="well">
										<div class="input-append">
											<input class="span2" id="text-string" type="text" placeholder="egyedi szöveg...">
											<button id="add-text" class="btn" title="Hozzáadás"><i class="icon-share-alt"></i></button>
											<hr>
										</div>
										<div id="avatarlist">
											<img style="cursor:pointer;" class="img-polaroid" src="./assets/third_party/Designer/img/invisibleman.jpg">
										</div>	
										<div>
											<hr>
											<form action="" method="post" enctype="multipart/form-data">
												<input type="file" name="fileToUpload" id="fileToUpload">
												<input class="btn btn-primary" type="submit" value="Kép feltöltés" name="submit">
											</form>
										</div>
									</div>				      
								</div>
							</div>
						</div>				
					</div>		
					<div class="span12">		    
						<div align="center" style="min-height: 32px;">
							<div class="clearfix">
								<div class="btn-group inline pull-left" id="texteditor" style="display:none">						  
									<button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style">
										<i class="icon-font" style="width:19px;height:19px;"></i>
									</button>
									<ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
										<li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a></li>
										<li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a></li>
									</ul>
									<button id="text-bold" class="btn" data-original-title="Bold">
										<img src="./assets/third_party/Designer/img/font_bold.png" height="" width="">
									</button>
									<button id="text-italic" class="btn" data-original-title="Italic">
										<img src="./assets/third_party/Designer/img/font_italic.png" height="" width="">
									</button>
									<button id="text-strike" class="btn" title="Strike" style="">
										<img src="./assets/third_party/Designer/img/font_strikethrough.png" height="" width="">
									</button>
									<button id="text-underline" class="btn" title="Underline" style="">
										<img src="./assets/third_party/Designer/img/font_underline.png">
									</button>
									<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color">
										<input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000">
									</a>
									<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color">
										<input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000">
									</a>
								</div>							  
								<div class="pull-right" id="imageeditor" style="display:none">
								<div class="btn-group">										      
										<button class="btn" id="bring-to-front" title="Bring to Front">
											<i class="icon-fast-backward rotate" style="height:19px;"></i>
										</button>
										<button class="btn" id="send-to-back" title="Send to Back">
											<i class="icon-fast-forward rotate" style="height:19px;"></i>
										</button>
										<button id="flip" type="button" class="btn" title="Show Back View">
											<i class="icon-retweet" style="height:19px;"></i>
										</button>
										<button id="remove-selected" class="btn" title="Delete selected item">
											<i class="icon-trash" style="height:19px;"></i>
										</button>
								</div>
								</div>			  
							</div>												
						</div>
						<?php 
							$car = $this->Db->sqla("cars","*","WHERE id='".$_SESSION['user']['car_id']."'")[0];
							$carName = explode(" ", $car['name'])[0];	
						?>
						<button id="flipback" type="button" class="btn" title="Rotate View"><i class="icon-retweet" style="height:19px;"></i></button>
						<div id="shirtDiv" class="page" style="width: 100%; height: 650px; position: relative; background-color: rgb(255, 255, 255);">
							<img name="tshirtview" id="tshirtFacing" src="./assets/img/vectors/<?=$carName?>_background.png" style="width: 100%"/>
							<div id="drawingArea" style="position: absolute;top: 150px; left: 80px; z-index: 10; width:1020px; height:380px;">					
								<canvas id="tcanvas" width=1020 height="380" class="" style="-webkit-user-select: true;"></canvas>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<script>$(document).ready(function(){$("#tshirttype").change(function(){$("img[name=tshirtview]").attr("src",$(this).val());});});</script>
		<script>
			canvas.renderAll();
			setTimeout(function() {canvas.calcOffset();},200);
			function saveAsImage()
			{
				const divToSave = document.getElementById('shirtDiv');
				html2canvas(divToSave).then(function (canvas) {
					const imageURL = canvas.toDataURL('image/png');
					const formData = new FormData();
					formData.append('image', imageURL);
					fetch('designer/save', {
						method: 'POST',
						body: formData
					})
					.then(response => response.json())
					.then(data => {
						if (data.success) {
							alert("A festés mentve! Most már bezárhatod az ablakot!");
						} else {
							console.error('Hiba a kép mentése közben');
						}
					})
					.catch(error => {
						console.error('Hálózati hiba:', error);
					});
				});
			}
		</script>
		<script src="./assets/third_party/Designer/js/bootstrap.min.js"></script>  
		<script type="text/javascript" src="./assets/third_party/Designer/js/tshirtEditor.js"></script>
		<script type="text/javascript" src="./assets/third_party/Designer/js/jquery.miniColors.min.js"></script>
  	</body>
</html>
