<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-1">
                <form method="post" action="" id="register-form" name="register-form" autocomplete="off">
                    <div class="mb-3">
                        <input type="email" name="email" value="<?=set_value('email')?>" class="form-control" placeholder="E-mail cím" data-parsley-type="email" />
                        <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" value="<?=set_value('name')?>" class="form-control" placeholder="Felhasználónév" data-parsley-pattern="^[a-zA-Z0-9]+$" />
                        <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" value="<?=set_value('password')?>" class="form-control" placeholder="Jelszó" data-parsley-minlength="6" data-parsley-maxlength="12" data-parsley-pattern="^[a-zA-Z0-9]+$"/>
                        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                    </div>
                    <div>
                        <button type="submit" name="submit" value="1" class="btn btn-info validate">Regisztráció</button>
                        <a class="btn btn-info" href="index">Belépés</a>
                        <a class="btn btn-info" href="lost_password">Elfelejtett jelszó</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>