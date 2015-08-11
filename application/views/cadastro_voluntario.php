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
                <a href="">Cadastro</a>
            </div>  
        </div>
    <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <!-- [INI]Login[/INI] -->
    <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="container_cadastro">
                    <form method="post" action="#" >
                        <h2>Cadastro</h2>
                        <br />
                        <h3>Seja bem vindo ao Cantinho do Voluntário</h3>
                        <img class="img-responsive" src="<?= base_url(); ?>assets/img/signin-facebook-large.png"  alt="" />
                        <h3>Ou cadastre-se</h3>
                    </form>
                    <form  method="post"  action="cadastrar">
                        <div class="box">
                        <h3>Nome:</h3>
                        <input type="text" style="width: 100%;" name="nome" required=""/>
                        </div>
                        <div class="box">
                        <h3>Endereço:</h3>
                        <input type="text" name="endereco" required=""/>
                        </div>
                        <div class="box">
                        <h3>Cidade:</h3>
                        <input type="text" name="cidade" required=""/>
                        </div>
                        <div class="box">
                        <h3>Telefone:</h3>
                        <input type="text" name="telefone" id="telefone" required=""/>
                        </div>
                        <div class="box">
                        <h3>CEP:</h3>
                        <input type="text" name="cep" id="cep" required=""/>
                        </div>
                        <div class="box">
                        <h3>Estado:</h3>
                        <input type="text" name="estado" required=""/>
                        </div>
                        <div class="box">
                        <h3>E-mail:</h3>
                        <input type="email" name="email" required=""/>
                        </div>
                        <div class="box">
                            <h3>Data de nascimento:</h3>
                            <input type="date" name="data_nasc" required=""/>
                        </div>
                        <div class="box">
                        <h3>Senha:</h3>
                        <input type="password" name="senha" required=""/>
                        </div>
                        <div class="box">
                        <h3>Confirme a senha:</h3>
                        <input type="password" name="confirma_senha" required=""/>
                        </div>
                        <br />
                        <img class="img-responsive" src="<?= base_url(); ?>assets/img/picture.png" style="width: 90px;" alt="" />
                        <input type="submit" class="btn btn-primary btn-lg" style="margin-left: 60%; margin-top: 50px;" />
                    </form>
                </div>
            </div>
    </div>
    <!-- [FIM]Login[/FIM] -->
	