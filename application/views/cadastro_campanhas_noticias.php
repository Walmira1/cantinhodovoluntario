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
               <a href="<?= base_url(); ?>inicio_entidade/<?php echo $this->session->userdata('id_entidade');?>">Instituição ></a>
                <a href="#">Campanhas e Noticias</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div class="row" style="margin-top: 0.313em; margin-left: 0.938em;">
        <a href="<?= base_url(); ?>cadastro_campanha_noticia/cadastro"><button type="button" class="btn btn-primary btn-lg" style="float: right">
            Incluir nova Campanha ou Noticia</button></a>
    </div>
    <!-- [INI]Cursos[/INI] -->
        <div class="row clearfix">
        <div class="col-md-12 column">
                <div class="col-md-3 column">
                   <?php 
                        if($this->session->userdata('logotipo_entidade')== NULL) {
                                 echo '<img class="img-responsive" src="'.base_url()."assets/img/criancas_4.png".'" class="imagem_cursos img_responsive" alt="" />';
                        }else{
                                echo '<img class="img-responsive" src="'.base_url().$this->session->userdata('logotipo_entidade').'" class="logo_instituicao" alt="foto da entidade" />';
                        } 
                    ?>
                </div>
                <div class="col-md-9 column">
                    <div id="margem_tabela"> 
                        <table class="table table-responsive">
                            <thead> 
                            <tr id="dias_semana">
                                <th>Campanha/Curso</th>
                                <th>Data de Inicio</th>
                                <th>Data de Fim</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead> 
                            <tbody>
                            <?php 
                            foreach($campanhas as $campanha) {?> 
                            <tr>
                                <td ><?= $campanha->titulo_campanha_noticia;?></td>
                                <td ><?= $campanha->data_inclusao;?></td>
                                <td ><?= $campanha->data_fim;?></td>
                                <td> <a href="<?= base_url(); ?>cadastro_campanha_noticia/delete/<?= $campanha->id_campanha;?>"><button type="button" class="btn btn-primary btn-sm" onclick=" return confirma()" style="float: right;">Excluir</button></a> </td>
                                <td> <a href="<?= base_url(); ?>altera_campanha_noticia/index<?= $campanha->id_campanha;?>"><button type="button" class="btn btn-primary btn-sm" style="margin-left: 50%;">Alterar</button></a></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table> 
                    </div>    
                </div>  
            </div>
        </div>
	<!-- [FIM]Campanhas[/FIM] -->
