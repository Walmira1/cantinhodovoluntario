<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Cantinho do Voluntário</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url();?>assets/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url();?>assets/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url();?>assets/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url();?>assets/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?= base_url();?>assets/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/favicon.png">
	<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.maskedinput-1.3.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
		$("#telefone").mask("(99)9999-9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#data").mask("99/99/9999");
	});
        </script>
</head>
<body>
<div class="container">
    <div class="row clearfix topo "  >
        <div class="col-md-2 column logo">
            <a href="<?= base_url(); ?>inicio">
            <img  class="img-responsive" alt="" src="<?= base_url(); ?>assets/img/cantinho.png" >
            </a>
	</div>
	<div class="col-md-8 column">
			<h3 id="logo_entidade">
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

    <!-- [INI]Login[/INI] -->
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="container_cadastro">
                <?php if($alerta["mensagem"] != null) {?>
                <div class="alert alert-danger">
                    <?php  echo $alerta["mensagem"]; ?>
                </div>    
                <?php  }?> 
                <form method="post" name="login" action="login">
                    <!-- tenho uma variavel escondida na qual coloco de onde eu vim para saber ...-->
                    <input type="hidden" name="pagina" value="<?php echo $this->session->userdata('deondevim')?>"/>
                    <input type="hidden" name="id_entidade" value="<?php echo $this->session->userdata('id_entidade')?>"/>
                    <input type="hidden" name="captcha"/>
                    <div >
                            <h2>Faça Login:</h2>
                            <br />
                    </div>
                    <div class="box1">    
                            Usuário:
                            <?php echo form_error('email_login','<div class="erro">','</div>'); ?>
                            <input type="email" name="email_login"  value ="<?php echo set_value('email_login');?>" placeholder="E-mail" required="" autofocus/>
                    </div>
                    <div class="box1"> 
                            Senha:
                            <?php echo form_error('senha','<div class="erro">','</div>'); ?>
                            <input type="password" name="senha" required="" placeholder="Senha"/>
                            <br />
                    </div>
                    <div class="checkbox box">
                     <label>
                         <input type="checkbox" value="remember-me"> Esqueci a senha
                    </label>
                    </div>
                    
                    <input type="submit" class="btn btn-primary btn-lg" style="margin-top:1.2em; margin-left: 70%;" name="entrar" value="entrar" />
                
                </form>
                <form  method="post"  action="cadastrar">
                        <h2>Ou Cadastre-se</h2>
                        <br />
                        <h3>Seja bem vindo ao Cantinho do Voluntário</h3>
                    <div class="box">
                            <h4>Instituição:</h4>
                             <?php echo form_error('nome','<div class="erro">','</div>'); ?>
                            <input type="text" name="nome" required="" value ="<?php echo set_value('nome');?>" />
                    </div>
                    <div class="box">
                           <h4>Telefone:</h4>
                            <?php echo form_error('telefone','<div class="erro">','</div>'); ?>
                           <input type="text" name="telefone" id="telefone" required="" value ="<?php echo set_value('telefone');?>"/>
                    </div>
                    <div class="box">
                            <h4>Endereço:</h4>
                             <?php echo form_error('endereco','<div class="erro">','</div>'); ?>
                            <input type="text" name="endereco" required="" value ="<?php echo set_value('endereco');?>" />
                    </div>
                    <div class="box">
                            <h4>Bairro:</h4>
                             <?php echo form_error('bairro','<div class="erro">','</div>'); ?>
                            <input type="text" name="bairro" required="" value ="<?php echo set_value('bairro');?>" />
                    </div>    
                    <div class="box">
                          <h4>Estado:</h4>
                           <?php echo form_error('estado','<div class="erro">','</div>'); ?>
                          <select id="estado"  name="estado" required="" />
                          <option value=" "> -- </option>
                                <?php foreach($estados as $estado) {?>
                                <option value="<?= $estado->uf?>"> <?= $estado->uf; ?></option>
                                <?php }?>
                            </select>
                          
                    </div>
                    <div class="box">
                            <h4>Cidade:</h4>
                             <?php echo form_error('cidade','<div class="erro">','</div>'); ?>
                            <select id="cidade"  name="cidade" required="" />
                                <option value=" "> ---- </option>
                                <?php foreach($cidades as $cidade) {?>
                                <option value="<?= $cidade->cidade?>"> <?= $cidade->cidade; ?></option>
                                <?php }?>
                            </select>
                    </div>
                    <div class="box">
                           <h4>CEP:</h4>
                            <?php echo form_error('cep','<div class="erro">','</div>'); ?>
                           <input type="text" name="cep" id="cep" required="" value ="<?php echo set_value('cep');?>"/>
                    </div>
                    <div class="box">
                           <h4>E-mail:</h4>
                            <?php echo form_error('email','<div class="erro">','</div>'); ?>
                           <input type="email" name="email"  required="" value ="<?php echo set_value('email');?>"/>
                    </div>
                    <br />    
                    <div class="box">
                           <h4>Autoriza divulgação de endereço:</h4>
                           <?php echo form_error('autoriza_endereco','<div class="erro">','</div>'); ?>
                           <input type="checkbox" name="autoriza_endereco" value="1" checked/> Sim
                           <input type="checkbox" name="autoriza_endereco" value="2" /> Não
                    </div>
                    <div class="box">
                            <h4>Autoriza divulgação de fotos e videos:</h4>
                            <?php echo form_error('autoriza_foto','<div class="erro">','</div>'); ?>
                            <input type="checkbox" name="autoriza_foto" value="1" checked /> Sim
                            <input type="checkbox" name="autoriza_foto" value="2"  /> Não
                    </div>
                    <br />
                    <div class="box">
                             <?php echo form_error('video','<div class="erro">','</div>'); ?>
                             <h4>Video do youtube</h4>
                             <input type="text" name="video"  value ="<?php echo set_value('video');?>"/>
                    </div>
                    <div class="box">
                             <h4>Site</h4>
                             <?php echo form_error('site','<div class="erro">','</div>'); ?>
                             <input type="url" name="site" value ="<?php echo set_value('site');?>"  style="width: 100%;" />
                    </div>
                    
                    <div class="box">
                             <h4>Senha</h4>
                             <?php echo form_error('senha','<div class="erro">','</div>'); ?>
                             <input type="password" name="senha" required="" />
                    </div>
                    <div class="box">
                            <h4>Confirme a senha:</h4>
                             <?php echo form_error('confirma_senha','<div class="erro">','</div>'); ?>
                            <input type="password" name="confirma_senha" required="" />
                    </div>
                    <br />
                    <h4>Objetivos da entidade</h4>
                    <?php echo form_error('descricao','<div class="erro">','</div>'); ?>
                    <textarea style="width: 98%; height: 160px; margin-bottom: 10px;" name="descricao"  value ="<?php echo set_value('descricao');?>" required=""></textarea>
                    <br />
                        <!--<input type="file" name="foto" /><br />
                           <img  class="img-responsive" src="<?= base_url(); ?>assets/img/picture.png" style="width: 90px;" alt="" /> </a> !-->
                        <input type="submit" class="btn btn-primary btn-lg" style="margin-left: 60%; margin-top: 50px;" value="Cadastrar" />
                </form>
            </div>
        </div>
    </div>  
    <!-- [INI]Rodapé[/INI] -->
	<div class="row clearfix">
		<div class="col-md-12 column">
                    <div class="rodape">
                        <div class="rodape_links">
                                    <a href="<?= base_url(); ?>inicio">Página Inicial</a>
				    <a href="<?= base_url(); ?>sobre">Sobre</a>	
			</div>
                        <a href="https://www.facebook.com/pages/Cantinho-do-Volunt%C3%A1rio/793095697472047" >
                         <strong>Nossa Página no Face </strong>
                        </a>
                        <a href="https://www.facebook.com/pages/Cantinho-do-Volunt%C3%A1rio/793095697472047" >
                          <img src="<?= base_url(); ?>assets/img/Facebook_creatures.png" alt="Facebook" 
                                  style="width: 4em"/>
                        </a>           
                    
                    <h5 id="rodape_logo">
                          Cantinho do Voluntario@2015
                    </h5>
                    </div>
		</div>	
	</div>
	<!-- [FIM]Rodapé[/FIM] -->
</div>
</body>
</html>

