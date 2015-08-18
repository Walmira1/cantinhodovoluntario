
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.9380271970354!2d-51.20673065!3d-30.03863575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951978495072ab99%3A0x1cbc0b6d6799fecd!2sHospital+de+Cl%C3%ADnicas+de+Porto+Alegre!5e0!3m2!1spt-BR!2sbr!4v1433427648969" width="600" height="450" frameborder="0" style="border:0"></iframe>
                </div>
            </div>
    </div>
        <!-- [FIM]Paginação[/FIM] -->

</body>
</html>
