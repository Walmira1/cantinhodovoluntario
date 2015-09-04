
    <div class="row clearfix">
        <div class="col-md-12 column">
            <img src="<?= base_url(); ?>assets/img/globo.jpg" class="imagem_instituicao" alt="" />
        </div>
    </div>
    <div class="row clearfix">
		<!-- [INI]BreadCrump[/INI] -->
		<div class="col-md-12 column">
			<div id="breadcrump">
			   <a href="index.html">Home ></a>
			   <a href="ver_vagas.html">Instituições Cadastradas</a>
			</div>	
		</div>
		<!-- [FIM]BreadCrump[/FIM] -->
	</div>
        
	<!-- [INI]Vagas[/INI] -->
    
    <div class="row clearfix">
        <div id="margem_tabela"> 
            <table class=" table table-responsive">
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
                    </tr>
                </thead> 
                <tbody>
                <?php foreach($entidades as $ent) {?>
                    <tr >
                       
                        <td ><?php echo '<img class="img-responsive"  src="'.base_url().$ent->logotipo_entidade;?>"/> </td>
                        <td ><?= $ent->nome;?></td>
                        <td ><?= $ent->cidade;?></td>
                        <td ><?= $ent->email;?></td>
                        <td ><?= $ent->site_entidade;?></td>
                        <td ><?= $ent->telefone;?></td>
                    
                    </tr>
                <?php }?>
                </tbody>
            </table> 
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
