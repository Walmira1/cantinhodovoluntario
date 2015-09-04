<div class="row clearfix">
        <div class="col-md-12 column">
            <?php  
            if($this->session->userdata('upload_foto')== NULL){
                    echo '<img src="'.base_url()."assets/img/maosnovas.jpg".'" class="imagem_cursos" alt="" />';
                }else{   
                    echo '<img src="'.base_url().$this->session->userdata('upload_foto').'" class="imagem_cursos" alt="" />';
                }
        ?>   
        </div>
    </div>
    <div class="row clearfix">
        <!-- [INI]BreadCrump[/INI] -->
        <div class="col-md-12 column">
            <div id="breadcrump">
               <a href="<?= base_url(); ?>inicio">Home ></a>
               <a href="inicio_instituicao/<?php $this->session->userdata('id_instituicao')?>">Instituição ></a>
               <a href="#">Incluir Campanha ou Curso</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div id="cadastros_campanhas">
         <?php if($alerta["mensagem"] != null) {?>
            <div class="alert alert-danger">
                    <?php  echo $alerta["mensagem"]; ?>
             </div>    
        <?php  }?> 
        <form  method="post"  action="cadastrar">
            <input type="hidden" name="pagina" value="<?php echo $this->session->userdata('deondevim')?>"/>
                        <input type="hidden" name="id_entidade" value="<?php echo $this->session->userdata('id_entidade')?>"/>
                        <input type="hidden" name="captcha"/> 
	<div class="row clearfix">
            <div class="col-md-12 column">
		<!-- [INI][/INI] -->
                    <h2 style="margin-left: 15px;">Criar Novas Campanhas ou Noticias</h2>
                <div class="col-md-3 column incluir_curso">
                            <br />
                            Titulo:
                            <br />
                            <?php echo form_error('titulo','<div class="erro">','</div>'); ?>
                            <input type="text" name="titulo" required="" value ="<?php echo set_value('titulo');?>" autofocus/>
                </div>
                <div class="col-md-3 column incluir_curso">
                    <br />
                    Video_youtube:
                    <br />
                    <?php echo form_error('video','<div class="erro">','</div>'); ?>
                    <input type="text" name="video"  value ="<?php echo set_value('video');?>" />
                </div>
                <div class="col-md-3 column incluir_curso">
                            <br />
                            Data Inclusão:
                            <br />
                            <?php echo form_error('data_inclusao','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_inclusao" min="<?php echo date('Y-m-d');?>" required="" value ="<?php echo set_value('data_inclusao');?>" />
                </div>
                <div class="col-md-3 column incluir_curso">
                            <br />
                            Data Fim:
                            <br />
                            <?php echo form_error('data_fim','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_fim" min="<?php echo date('Y-m-d');?>" required="" value ="<?php echo set_value('data_fim');?>" />
                </div>
                
            </div>
        </div>
       
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div style="margin-left: 2%; margin-top: 15px;">
                            Descrição:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="descricao" required="" value ="<?php echo set_value('perfil_voluntario');?>"></textarea>
                </div>
                <div>                                                   
                        <input type="submit" class="btn btn-primary btn-lg " style="margin-top: 20px; margin-left: 75%;" value="Incluir Campanha"/>                         
                </div>
            </div>
        </div>
        </form>
         <a href="<?= base_url(); ?>upload/index/2"><img class="img-responsive" src="<?= base_url(); ?>assets/img/picture.png" style="width: 90px;" alt="" />Incluir foto para Campanha
    </div>

