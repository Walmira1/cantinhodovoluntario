<div class="container">
   <div class="row clearfix" style="background-color: #ccc;">
        <div class="col-md-2 column">
            <a href="<?= base_url(); ?>inicio">
            <img  alt="" src="<?= base_url(); ?>assets/img/cantinho.png" class="logo_cantinho">
            </a>
	</div>
	<div class="col-md-8 column">
		  	<h3 id="logo">
				Cantinho do Voluntário
		  	</h3>
	</div>
	<div class="col-md-2 column">
            <div class="sair">
                <a href="#" >
                    Sair
                </a> 
            </div>
        </div>
    </div>
    <div class="row clearfix">
    <!-- [INI]BreadCrump[/INI] -->
        <div class="col-md-12 column">
            <div id="breadcrump">
                <a href="<?= base_url(); ?>inicio">Home ></a>
                <a href="">Login</a>
            </div>  
        </div>
    <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <!-- [INI]Login[/INI] -->
    <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="container_cadastro">
                    <form method="post" action="#" >
                        <h2>Login</h2>
                        <br />
                        <h3>Seja bem vindo ao Cantinho do Voluntário</h3>
                        <!--@$user_profile check when user login is successed -->
                        <!--Display profile photo -->
                        <?php if (@$user_profile): // call var_dump($user_profile) to view all data ?>
                        <img src="https://graph.facebook.com/<?=$user_profile['id']?>/picture/type=large" style="width: 140px; height: 140px;" />
                        <!--Display profile photo -->
                        <h2><?=$user_profile['name']?></h2>
                        <a href="<?=$user_profile['link']?>">Visualização do perfil</a>
                        <a href="<?=$logout_url ?>">Sair</a>
                        <?php else: ?>
                        <h2>Login com codeigniter</h2>
                        <a href="<?=$login_url ?>">Login</a>
                        <?php endif; ?>
                <!--        <a href=""><img class="img-responsive" src="<?= base_url(); ?>assets/img/signin-facebook-large.png"  alt="" /></a>
                        <h3>Ou cadastre-se</h3> -->
                    </form>
                </div>
            </div>
    </div>
    <!-- [FIM]Login[/FIM] -->
	
