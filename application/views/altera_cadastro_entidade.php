
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
                    <form method="post" action="<?= base_url(); ?>altera_cadastro/altera">
                        <input type="hidden" name="pagina" value="<?php echo $this->session->userdata('deondevim')?>"/>
                        <input type="hidden" name="id_entidade" value="<?php echo $this->session->userdata('id_entidade')?>"/>
                        <input type="hidden" name="captcha"/> 
                        <h2>Alteração do Cadastro</h2>
                        <br />
                        <h3>Seja bem vindo ao Cantinho do Voluntário</h3>
                        <div class="box">
                        <h4>Instituição:</h4>
                        <?php echo form_error('nome','<div class="erro">','</div>'); ?>
                        <input type="text" name="nome" value="<?php echo $entidade->nome?>" readonly="true"/>
                        </div>
                        <div class="box">
                        <h4>Telefone:</h4>
                        <?php echo form_error('telefone','<div class="erro">','</div>'); ?>
                        <input type="text"  name="telefone" value="<?php echo $entidade->telefone?>"/>
                        </div>
                        <div class="box">
                        <h4>Endereço:</h4>
                        <?php echo form_error('endereco','<div class="erro">','</div>'); ?>
                        <input type="text" name="endereco" value="<?php echo $entidade->endereco?>" />
                        </div>
                        <div class="box">
                            <h4>Bairro:</h4>
                             <?php echo form_error('bairro','<div class="erro">','</div>'); ?>
                            <input type="text" name="bairro" required="" value ="<?php echo $entidade->bairro?>" />
                        </div> 
                        <div class="box">
                        <h4>Cidade:</h4>
                         <?php echo form_error('cidade','<div class="erro">','</div>'); ?>
                            <select id="cidade"  name="cidade" required="" />
                                <option value="<?php echo $entidade->cidade?>"> <?php echo$cidade ?></option>
                                <?php foreach($cidades as $cidade) {?>
                                <option value="<?= $cidade->identificador?>"> <?= $cidade->cidade; ?></option>
                                <?php }?>
                            </select>        
                        </div>
                        <div class="box">
                        <h4>Estado:</h4>
                        <?php echo form_error('estado','<div class="erro">','</div>'); ?>
                        <input type="text" name="estado" value="<?php echo $entidade->estado?>" />
                        </div>
                        <div class="box">
                        <h4>CEP:</h4>
                        <?php echo form_error('cep','<div class="erro">','</div>'); ?>
                        <input type="text" name="cep" value="<?php echo $entidade->cep?>"/>
                        </div>
                        <div class="box">
                        <h4>E-mail:</h4>
                        <input type="email" name="email" value="<?php echo $entidade->email?>" readonly="true"/>
                        </div>
                        <div class="box">
                        <h4>Autoriza endereço:</h4>
                         <?php echo form_error('autoriza_endereco','<div class="erro">','</div>'); ?>
                        <input type="radio" name="autoriza_endereco" value="1"
                           <?php if($entidade->autoriza_endereco == 1){?> checked <?php }?> />Sim
                        <input type="radio" name="autoriza_endereco" value="2"
                            <?php if($entidade->autoriza_endereco == 2){?> checked <?php }?> />Não
                        </div>
                        <div class="box">
                        <h4>Autoriza foto:</h4>
                         <?php echo form_error('autoriza_foto','<div class="erro">','</div>'); ?>
                        <input type="radio" name="autoriza_foto" value="1"
                           <?php if($entidade->autoriza_foto == 1){?> checked <?php }?> />Sim
                        <input type="radio" name="autoriza_foto" value="2"
                            <?php if($entidade->autoriza_foto == 2){?> checked <?php }?> />Não
                        </div>
                        <div class="box">
                        <h4>Video do youtube</h4>
                        <input type="text" name="video" value="<?php echo $entidade->video_youtube?>"/>
                        </div>
                        <div class="box">
                        <h4>Site</h4>
                        <input type="text" name="site" style="width: 100%;" value="<?php echo $entidade->site_entidade?>"/>
                        </div>
                        <br />
                        <h4>Objetivos da entidade</h4>
                        <?php echo '<textarea style="width: 98%; min-height: 160px" name="descricao"
                            class="editar">'.$entidade->descricao.'></textarea>'?>
                        <br />
                         <input type="submit" class="btn btn-primary btn-lg" style="margin-left: 60%; margin-top: 50px;" value="Alterar" />
                    </form>
                    <a href="<?= base_url(); ?>upload/index/2"><img class="img-responsive" src="<?= base_url(); ?>assets/img/picture.png" style="width: 90px;" alt="" />Altera Fotos</a>
                </div>
            </div>
        </div>
    <!-- [FIM]Login[/FIM] -->
	


