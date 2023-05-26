<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-12 logoFrame">
                <a href="<?=site_url()?>"><img src="./assets/img/logo_blue.png" width="320" /></a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mb-5">
                <div class="col-md-12 panel-c3-wrc">
                    
                </div>
            </div>
        <div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="segment-title text-center mb-3"><?=$a['title']?></h1>
                <span class="small meta"><?=str_replace("-",".",$a['date'])?></span><br/>
                <span class="article">
                    <?=$a['content']?>
                </span>
            </div>
        </div>
    </div>
</section>