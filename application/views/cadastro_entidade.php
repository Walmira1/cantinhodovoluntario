
<div class="container">
    <div class="row clearfix" style="background-color: #ccc;" >
        <div class="col-md-2 column">
            <a href="index.html">
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
                    <input type="hidden" name="captcha"/>
                    <div >
                            <h2>Faça Login:</h2>
                            <br />
                    </div>
                    <div class="box1">    
                            Usuário:
                            <?php echo form_error('email_login','<div class="erro">','</div>'); ?>
                            <input type="email" name="email_login"  value ="<?php echo set_value('email_login');?>" placeholder="E-mail" required=""/>
                    </div>
                    <div class="box1"> 
                            Senha:
                            <?php echo form_error('senha','<div class="erro">','</div>'); ?>
                            <input type="password" name="senha" required="" />
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
                          <input type="text" name="estado" required="" value ="<?php echo set_value('estado');?>" />
                    </div>
                    <div class="box">
                            <h4>Cidade:</h4>
                             <?php echo form_error('cidade','<div class="erro">','</div>'); ?>
                            <input type="text" name="cidade" required="" value ="<?php echo set_value('cidade');?>"/>
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
        <!--        <h4>Logo e Foto da Instituição</h4>
                        
                        <form method="POST" class="myForm" enctype="multipart/form-data">
                                <!-- add your span and pther stuff here
                                <input type="file" id="foto1" name="userfile" />
                                <input type="button" id="teste" value="submit"/>
                        </form>  -->
                </div>
        </div>
    </div>   