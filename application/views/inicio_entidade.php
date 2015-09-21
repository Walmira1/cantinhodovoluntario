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
                <a href="#">Inicio Instituição</a> 
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div class="row" style="margin-top:0.313em; margin-left:0.938em;">
        <a href="<?= base_url(); ?>cadastro_vaga/cadastro"><button type="button" class="btn btn-primary btn-lg" style="float: right">
            Incluir nova vaga</button></a>
    </div>
    <!-- [INI]Vagas[/INI] -->
    <div class="row clearfix" >
            <div class="col-md-12 column">
                <div class="col-md-3 column">
                    <div class="col_info_instituicao">
                        <?php if($entidade->logotipo_entidade != NULL){ ?>
                        <a href="<?php echo $entidade->site_entidade;?>" ><img src="<?php echo base_url().$entidade->logotipo_entidade;?>" style="width: 70%;" alt="Logotipo da  Instituição" /></a>
                        <?php }else{ ?>
                        <a href="<?php echo $entidade->site_entidade;?>" ><img src="<?=base_url();?>assets/img/criancas_2.png" style="width: 70%;" alt="Logotipo da  Instituição" /></a>
                        <?php } ?>   
                    
                        <div>
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        </div>
        <!--             <a href="<//?php echo $entidade->site_entidade;?>"><?//php echo $entidade->nome;?></a>-->
                        <br /><br />
                        <input type="text" disabled="disabled" style="width: 40px" value="<?php if($sum_vaga != null){ echo $sum_vaga->numero_vagas;}else{echo "0";}?>" />
                        Novas Oportunidades    
                        <br /><br />
                        Endereço: <?php echo $entidade->endereco;?>
                        <br /><br />
                        Cidade:  <?php echo $entidade->cidade;?>
                        <br /><br />
                        Telefone: <?php echo $entidade->telefone;?>
                        <br /><br />
                        Responsável:
                        <br /><br />
                        E-mail: <?php echo $entidade->email;?>
                    </div>
                </div>
                <div class="col-md-9 column">
                    <div id="margem_tabela"> 
                        <table class="table table-responsive">
                            <thead> 
                            <tr id="dias_semana">
                                <th>Vaga de</th>
                                <th>Inicio</th>
                                <th>Fim</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead> 
                            <tbody>
                            <?php 
                            foreach($vagas as $vag) {?> 
                            <tr>
                                <td ><?= $vag->vaga_de;?></td>
                                <td ><?= $vag->data_inicio;?></td>
                                <td ><?= $vag->data_fim;?></td>
                                <td> <a href="<?= base_url(); ?>cadastro_vaga/delete/<?= $vag->id_vaga;?>"><button type="button" class="btn btn-primary btn-sm" onclick=" return confirma()" style="float: right;">Excluir</button></a> </td>
                                <td><a href="<?= base_url(); ?>altera_vaga/index/<?= $vag->id_vaga;?>"><button type="button" class="btn btn-primary btn-sm" style="margin-left: 50%;">Alterar</button></a></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table> 
                    </div>    
                </div>
            </div>
               
        </div>
	<!-- [FIM]Vagas[/FIM] -->


