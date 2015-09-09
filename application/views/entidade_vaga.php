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
                           <a href="<?= base_url(); ?>Entidades/index">Entidades Cadastradas ></a>
			   <a href="">Ver Vagas</a>
			</div>	
		</div>
		<!-- [FIM]BreadCrump[/FIM] -->
    </div>
        
	<!-- [INI]Vagas[/INI] -->
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="col_info_instituicao">
                    <a href="<?php echo $entidade->site_entidade;?>" ><img src="<?php echo base_url().$entidade->logotipo_entidade;?>" style="width: 70%;" alt="Logotipo da  Instituição" /></a>
                    <div >
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
            <div class="col-md-9">
                <div id="margem_tabela"> 
                <table class=" table table-responsive">
                    <thead>   
                    <tr id="dias_semana">
                        <th>Funcao</th>
                        <th>Local</th>
                        <th>Cidade</th>
                        <th></th>
                    </tr>
                    </thead> 
                <tbody>
                <?php if ($vagas != NULL){?>
                <?php foreach($vagas as $vaga) {?>
                    <tr >
                        <td ><?= $vaga->vaga_de;?></td>
                        <td ><?= $vaga->endereco;?></td>
                        <td ><?= $vaga->cidade;?></td>
                        <td> <a href="<?= base_url(); ?>pesquisa_vaga/vaga/<?= $vaga->id_vaga;?>"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Saiba mais</button></a> </td>
                        
                    </tr>
                <?php }?>
                <?php }?>
                </tbody>
                </table> 
                </div>  
            
            </div>
        </div>
    </div>
	<!-- [FIM]Vagas[/FIM] -->
        
        <!-- [INI]Paginação[/INI] -->
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="paginacao">
                   < 1, 2, 3, 4, 5 .... 12 >
                </div>
                <div class="mapa">
                    <iframe src="http://mapbuildr.com/frame/cbqyfr" frameborder="0" height="400" width="550"></iframe>
                </div>
            </div>
        </div>
        <!-- [FIM]Paginação[/FIM] -->
        
	