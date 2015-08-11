<div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column nosso_logo">         
                <a href="index.html">
                <img alt="" src="<?= base_url(); ?>assets/img/cantinho.png" class="logo_cantinho">
                </a>
        </div>
		<div class="col-md-6 column">
			<h3 id="logo">
				Cantinho do Voluntário
			</h3>
		</div>
		<div class="col-md-4 column">
			<div class="sair">
                <a href="#" >
                    Sair
                </a> 
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<!-- [INI]Menu[/INI] -->
		<div class="col-md-12 column">
			<div id="mapa">
			   <a href="index.html">Página Inicial</a>
			   <a href="inicio_instituicao.html">Inicio Instituição</a>
			   <a href="cursos.html">Cursos</a>
			   <a href="#">Campanhas/Noticias</a>
			   <a href="#">Sobre</a>			   
			   <a href="altera_cadastro_entidade.html">Alterar Cadastro</a>
			</div>	
		</div>
		<!-- [FIM]Menu[/FIM] -->
	</div>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <img src="<?= base_url(); ?>assets/img/todos fazendo.jpg" class="imagem_instituicao" alt=""/>
        </div>
    </div>
    <div class="row clearfix">
        <!-- [INI]BreadCrump[/INI] -->
        <div class="col-md-12 column">
            <div id="breadcrump">
               <a href="index.html">Home ></a>
               <a href="inicio_instituicao.html">Instituição ></a>
                           <a href="#">Incluir Curso</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div id="cadastros_vagas">
        <form  method="post"  action="cadastrar">
	<div class="row clearfix">
            <div class="col-md-12 column">
		<!-- [INI][/INI] -->
                    <h2 style="margin-left: 15px;">Criar Noticias de Cursos/h2>
                    <div class="col-md-3 column incluir">
                            Titulo:
                            <br />
                            <?php echo form_error('titulo','<div class="erro">','</div>'); ?>
                            <input type="text" name="titulo" required="" value ="<?php echo set_value('titulo');?>"/>
                    </div> 
                    <div class="col-md-3 column incluir">
                            Inscrição até:
                            <br />
                            <?php echo form_error('inscricao_ate','<div class="erro">','</div>'); ?>
                            <input type="date" name="inscricao_ate" required="" value ="<?php echo set_value('inscricao_ate');?>" />
                    </div>
                    <div class="col-md-3 column incluir">
                            Inicio:
                            <br />
                            <?php echo form_error('data_inicio','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_inicio" required="" value ="<?php echo set_value('data_inicio');?>" />
                    </div>
                    <div class="col-md-3 column incluir">
                            Fim:
                            <br />
                            <?php echo form_error('data_fim','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_fim" required="" value ="<?php echo set_value('data_fim');?>" />
                    </div>
            </div>
		<!-- [INI][/INI] -->
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                
                <div class="col-md-3 column incluir">
                    Video_youtube:
                    <br />
                    <?php echo form_error('video','<div class="erro">','</div>'); ?>
                    <input type="text" name="video" required="" value ="<?php echo set_value('video');?>" />
                </div>
                <div class="col-md-3 column incluir">
                       <h4>Foto para a Noticia</h4>
                        <? Php echo $ erro;?>
                        <? echo form_open_multipart('cadastrar/do_upload');?>
                        <input type="file" name="userfile" /><br />
                </div>
                
            </div>
        </div>    
        <div class="row clearfix">
            <div class="col-md-12 column">   
                <div class="col-md-3 column incluir">
                            Data Inicio:
                            <br />
                            <?php echo form_error('data_inicio','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_inicio" required="" value ="<?php echo set_value('data_inicio');?>" />
                </div>
                <div class="col-md-3 column incluir">
                            Data Fim:
                            <br />
                            <?php echo form_error('data_fim','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_fim" required="" value ="<?php echo set_value('data_fim');?>"/>
                </div>
                <div class="col-md-3 column incluir" style="margin-bottom: 20px;">
                            Data de postagem:
                            <br />
                            <?php echo form_error('telefone','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_postagem" required="" value ="<?php echo set_value('data_postagem');?>"/>
                </div>
                <div style="margin-left: 2%; margin-top: 15px;">
                            Breve descrição:
                            <br />
                            <?php echo form_error('descricao','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="descricao" required="" value ="<?php echo set_value('descricao');?>"></textarea>
                </div>
                <div style="margin-left: 2%; margin-top: 15px;">
                            Descrição:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="perfil_voluntario" required="" value ="<?php echo set_value('perfil_voluntario');?>"></textarea>
                </div>
                
                <div>                                                   
                        <input type="submit" class="btn btn-primary btn-lg " style="margin-top: 20px; margin-left: 75%;" value="Incluir Vaga" />                         
                </div>
                <div style="margin-left: 2%; margin-top: 15px;">
                            Tudo sobre a Oportunidade:
                            <br />
                            <?php echo form_error('descricao','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="descricao" required="" value ="<?php echo set_value('descricao');?>"></textarea>
                </div>
                <div style="margin-left: 2%; margin-top: 15px;">
                            Perfil do Candidato:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="perfil_voluntario" required="" value ="<?php echo set_value('perfil_voluntario');?>"></textarea>
                </div>
            </div>
        </div>
        </form>
    </div>

