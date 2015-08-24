
    <div class="row clearfix">
        <div class="col-md-12 column">
           <?php  
            if($this->session->userdata('upload_foto')== NULL){
                    echo '<img src=".base_url().assets/img/maosnovas.jpg" class="imagem_cursos" alt="" />';
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
               <a href="inicio_instituicao.html">Instituição ></a>
                           <a href="#">cursos</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div class="row" style="margin-top: 0.313em; margin-left: 0.938em;">
        <a href="<?= base_url(); ?>cadastro_curso/cadastro"><button type="button" class="btn btn-primary btn-lg" style="float: right">
            Incluir novo curso</button></a>
    </div>
    <!-- [INI]Cursos[/INI] -->
        <div class="row clearfix">
        <div class="col-md-12 column">
                <div class="col-md-3 column">
                    <?php 
                        if($this->session->userdata('logotipo_entidade')== NULL) {
                                echo '<img src="'.base_url().'assets/img/globo.jpg" class="logo_instituicao" alt="" />';
                        }else{
                                echo '<img src="'.base_url().$this->session->userdata('logotipo_entidade').'" class="logo_instituicao" alt="foto da entidade" />';
                        } 
                    ?>
                </div>
                <div class="col-md-9 column">
                    <div id="margem_tabela"> 
                        <table class="table table-responsive">
                            <thead> 
                            <tr id="dias_semana">
                                <th>Curso</th>
                                <th>Data de Inicio</th>
                                <th>Data de Fim</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead> 
                            <tbody>
                            <?php 
                            foreach($cursos as $curso) {?> 
                            <tr>
                                <td ><?= $curso->nome;?></td>
                                <td ><?= $curso->inicio;?></td>
                                <td ><?= $curso->fim;?></td>
                                <td> <a href="<?= base_url(); ?>cadastro_curso/delete/<?= $curso->id_curso;?>"><button type="button" class="btn btn-primary btn-sm" onclick=" return confirma()" style="float: right;">Excluir</button></a> </td>
                                <td><a href="<?= base_url(); ?>cadastro_curso/altera_curso/<?= $curso->id_curso;?>"><button type="button" class="btn btn-primary btn-sm" style="margin-left: 50%;">Alterar</button></a></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table> 
                    </div>    
                </div>  
            </div>
        </div>
	<!-- [FIM]Cursps[/FIM] -->
