<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-12 logoFrame">
                <img src="./assets/img/logo_blue.png" width="320" />
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6">
                <h3 class="title">Tudod, milyen egy <b>Rally</b> csapatot irányítani?</h3>
                <h3 class="title mb-5">Szeretnéd kipróbálni magad?</h3>
                <h1 class="title">Csatlakozz, még ma, a legújabb Rally Manager játékba!</h1>
            </div>
            <div class="col-md-6">
                <?php echo($this->Msg->get()) ?>
                <form method="post" action="" id="login-form" name="login-form">
                    <div class="mb-3">
                        <input type="text" name="name" value="<?=set_value('name')?>" class="form-control" placeholder="Felhasználómév" data-parsley-pattern="^[a-zA-Z0-9]+$" />
                        <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" value="" class="form-control" placeholder="Jelszó" data-parsley-minlength="6" data-parsley-maxlength="12" data-parsley-pattern="^[a-zA-Z0-9]+$"/>
                        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                    </div>
                    <div>
                        <button type="submit" name="submit" value="1" class="btn btn-info validate">Bejelentkezés</button>
                        <a class="btn btn-info" href="register">Regisztráció</a>
                        <a class="btn btn-info" href="lost_password">Elfelejtett jelszó</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="segment-title text-center mb-3">Miért érdemes regisztrálni?</h1>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <i class="fa fa-fw fa-check"></i> Valós pályák<br/>
                        <i class="fa fa-fw fa-check"></i> Izgalmas versenyek<br/>
                        <i class="fa fa-fw fa-check"></i> Minden héten verseny<br/>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fa fa-fw fa-check"></i> Valós autók<br/>
                        <i class="fa fa-fw fa-check"></i> Kihívással teli időtöltés<br/>
                        <i class="fa fa-fw fa-check"></i> Egyéni versenyzői edzés<br/>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fa fa-fw fa-check"></i> Valós fejlesztések<br/>
                        <i class="fa fa-fw fa-check"></i> Rallyfanoktól, Rallyfanoknak<br/>
                        <i class="fa fa-fw fa-check"></i> Szabad ötletbörze<br/>
                    </div>
                </div>
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
                <h1 class="segment-title text-center mb-3">Fejleszétsi napló</h1>
                <div class="row">
                    <?php foreach($this->Db->sqla("devblog","*","ORDER BY date DESC LIMIT 6") as $v){ ?>
                    <div class="col-12 col-md-4 card">
                        <img src="<?=$v['image']?>" width="100%" style="margin-bottom:5px;"/>
                        <center><h3><?=$v['title']?></center>
                        <center><span class="small"><?=str_replace("-",".",$v['date'])?></span></center>
                        <span class="mb-3"><?=$v['kivonat']?></span>
                        <a href="devblog/<?=$v['alias']?>" class="btn btn-info mb-3">Elolvasom</a>
                    </div>    
                    <?php }; ?>
                </div>
            </div>
        </div>
    </div>
</section>