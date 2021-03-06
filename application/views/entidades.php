    <div class="row clearfix">
        <div class="col-md-12 column">
            <img src="<?= base_url(); ?>assets/img/globo.jpg" class="imagem_instituicao" alt="" />
        </div>
    </div>
    <div class="row clearfix">
		<!-- [INI]BreadCrump[/INI] -->
		<div class="col-md-12 column">
			<div id="breadcrump">
			   <a href="<?= base_url(); ?>inicio">Home ></a>
			   <a href="ver_vagas.html">Instituições Cadastradas</a>
			</div>	
		</div>
		<!-- [FIM]BreadCrump[/FIM] -->
	</div>
        
	<!-- [INI]Vagas[/INI] -->
    
    <div class="row clearfix">
        <div id="margem_tabela"> 
            <div class="table-responsive">
            <table class="table">
                <thead>   
                    <tr id="dias_semana">
                        <th>Logo Entidade</th>
                        <th>Entidades</th>
                        <th>Cidade</th>
                        <th>E-mail</th>
                        <th>Site</th>
                        <th>Telefone</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>
                <?php foreach($entidades as $ent) {?>
                    <tr >
                        <?php if($ent->logotipo_entidade != NULL){?>
                        <td ><a href="<?php echo $ent->site_entidade;?>"><?php echo '<img class="img-responsive"  src="'.base_url().$ent->logotipo_entidade;?>"/> </a></td>
                        <?php }else{ ?>
                            <td ><a href="<?php echo $ent->site_entidade;?>"><img class="img-responsive"  src="<?=base_url();?>assets/img/criancas_2.png"/></a> </td>
                        <?php } ?>    
                        <td ><?= $ent->nome;?></td>
                        <td ><?= $ent->cidade;?></td>
                        <td ><?= $ent->email;?></td>
                        <td ><a href="<?php echo $ent->site_entidade;?>"><?= $ent->site_entidade;?> </a> </td>
                        <td ><?= $ent->telefone;?></td>
                        <td> <a href="<?= base_url(); ?>pesquisa_vaga/entidade/<?= $ent->id_entidade;?>"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Vagas</button></a> </td>
                        <td> <a href="<?= base_url(); ?>pesquisa_campanha/entidade/<?= $ent->id_entidade;?>"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Campanhas</button></a> </td>
                        <td> <a href="<?= base_url(); ?>pesquisa_curso/entidade/<?= $ent->id_entidade;?>"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Cursos</button></a> </td>
                    
                    </tr>
                <?php }?>
                </tbody>
            </table> 
        </div>  
        </div>
    </div>
    <!-- [FIM]Vagas[/FIM] -->
        
        <!-- [INI]Paginação[/INI] -->
    
                <div class="paginacao">
                   < 1, 2, 3, 4, 5 .... 12 >
                </div>
            </div>
    </div>
    <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="mapa">
                    <iframe src="http://mapbuildr.com/frame/cbqyfr" frameborder="0" height="400" width="550"></iframe>
                </div>
            </div>
    </div>
        <!-- [FIM]Paginação[/FIM] -->

</body>
</html>
