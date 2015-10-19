    <div class="row clearfix">
		<!-- [INI]BreadCrump[/INI] -->
		<div class="col-md-12 column">
			<div id="breadcrump">
			   <a href="<?= base_url(); ?>inicio">Home ></a>
			   <a href="">Ver Vagas</a>
			</div>	
		</div>
		<!-- [FIM]BreadCrump[/FIM] -->
	</div>
        <!-- [INI]Pesquisa[/INI] -->
        <div class="pesquisa">
            <form method="post" action="<?= base_url(); ?>pesquisa_vaga/pesquisa">
                <div class="col-md-12 column ">
                <div class="row clearfix">
			<!-- [INI]Pesquisa[/INI] -->
                        <div class="col-md-3 ">
					<h3>
					Gosto de:
					</h3>
                            <?php echo form_error('area','<div class="erro">','</div>'); ?>
                            <select name ="area" alt="gosto de">
                                <option value= "0"> </option>
				<option value= "1">Educação</option>
				<option value= "2">Solidariedade Social</option>
				<option value= "7">Ambiente</option>
				<option value= "3">Cultura e Artes</option>
				<option value= "4">Desporto e Laser</option>
				<option value= "5">Novas Tecnologias</option>
				<option value= "6">Saúde</option>
                            </select>
                        </div>
                        <div class="col-md-3 column ">
					<h3>
					Quero trabalhar com:
					</h3>
					<?php echo form_error('atividade','<div class="erro">','</div>'); ?>
                             
                                <select id="incluir_pessoas" name="atividade" alt="quero trabalhar com">
                                    <option value= "0"> </option>
                                    <option value= "1">Adultos</option>
                                    <option value= "19">Animais</option>
                                    <option value= "2">Crianças e Jovens</option>
                                    <option value= "3">Crianças e Jovens com Deficiência</option>
                                    <option value= "4">Crianças e Jovens em Situação de Risco</option>
                                    <option value= "5">Família e Comunidade em Geral</option>
                                    <option value= "6">Grávidas, Mães Adolescentes, Bebes</option>
                                    <option value= "7">Jovens</option>
                                    <option value= "8">Mães Solteiras</option>
                                    <option value= "9">Mulheres Grávidas</option>
                                    <option value= "10">Mães Solteiras</option>
                                    <option value= "11">Outros</option>
                                    <option value= "12">Pessoas Adultas com Deficiência</option>
                                    <option value= "13">Pessoas com doenças Psiquiatricas</option>
                                    <option value= "14">Pessoas Toxico-Dependentes</option>
                                    <option value= "15">Pessoas dependentes(acamados)</option>
                                    <option value= "16">Pessoas idosas</option>
                                    <option value= "17">Pessoas sem Abrigo </option>
                                    <option value= "18">Presos</option>
                                    <option value= "20">Sozinho em Casa</option>
                                </select>
                        </div>
			<div class="col-md-3 column ">
                            <h3>Tempo disponivel:
                            </h3>
					<?php echo form_error('tipo_carga_horaria','<div class="erro">','</div>'); ?>
                            
                            <select name="tipo_carga_horaria" alt="tipo de carga horária">
				<option value= "0"> </option>
                                <option value= "1">Fins de Semana</option>
				<option value= "2">Fins de Semana - Sábados</option>
				<option value= "3">Fins de Semana - Domingos</option>
				<option value= "4">Todos os dias</option>
				<option value= "5">uma vez por semana</option>
				<option value= "6">duas vezes por semana</option>
				<option value= "7">Uma vez por Quinzena</option>
				<option value= "8">Duas vezes por Quinzena</option>
				<option value= "9">Uma vez por Mês</option>
				<option value= "10">Qualquer dia</option>
                            </select>				
			</div>
			<div class="col-md-3 column " >
				<h3>Numero de Horas:
				</h3> 
                            <?php echo form_error('numero_horas','<div class="erro">','</div>'); ?>
                            <input type="text" name="numero_horas" alt="numero de horas" value ="<?php echo set_value('numero_horas');?>"/>
			</div>
                </div>
	    </div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="col-md-3 column ">
                     <h3>
                            Estado: 
                     </h3>  
                     <?php echo form_error('estado','<div class="erro">','</div>'); ?>
                          <select id="estado"  name="estado" required="" alt="estado" />
                          <option value=" ">    </option>
                                <?php foreach($estados as $estado) {?>
                                <option value="<?= $estado->uf?>"> <?= $estado->uf; ?></option>
                                <?php }?>
                            </select>
                    </div>
                    <div class="col-md-3 column ">
                    <h3>
                       Cidade:
                    </h3>
                             <?php echo form_error('cidade','<div class="erro">','</div>'); ?>
                            <select id="cidade"  name="cidade" required="" alt="cidade" />
                                <option value=" ">      </option>
                                <?php foreach($cidades as $cidade) {?>
                                <option value="<?= $cidade->cidade?>"> <?= $cidade->cidade; ?></option>
                                <?php }?>
                            </select>   
                    </div>
                    <div class="col-md-6 column ">
                        <input type="submit" class="btn btn-primary btn-lg btn_ver_vagas_index" value = "Ver Vagas" />
                    </div> 
        	</div>   
            <!-- [INI]Fim[/INI] -->
            </div>               
            <!-- [INI]Fim[/INI] -->
            </form>
        </div>
	<!-- [INI]Vagas[/INI] -->
    <div class="row clearfix">
        <div id="margem_tabela">
            <div class="table-responsive" > 
                <table class="table">
                <thead>   
                    <tr id="dias_semana">
                        <th>Logo Entidade</th>
                        <th>Entidades</th>
                        <th>funcao</th>
                        <th>Local</th>
                        <th>Cidade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>
                <?php if($vagas != NULL) {?>
                <?php foreach($vagas as $vaga) {?>
                    <tr >
                        <td ><?php echo '<a href="'.$vaga->site_entidade.'"> <img class="img-responsive"  src="'.base_url().$vaga->logotipo_entidade;?>"> </a></td>
                        <td ><?= $vaga->nome;?></td>
                        <td ><?= $vaga->vaga_de;?></td>
                        <td ><?= $vaga->endereco;?></td>
                        <td ><?= $vaga->cidade;?></td>
                        <td> <a href="<?= base_url(); ?>pesquisa_vaga/vaga/<?= $vaga->id_vaga;?>"><button type="button" class="btn btn-primary btn-sm" ">Saiba mais</button></a> </td>
                        
                    </tr>
                <?php }?>  <!-- foreach  -->
                <?php }?>  <!-- if not null  -->
                </tbody>
            </table> 
            </div> 
        </div>
    </div> 
	<!-- [FIM]Vagas[/FIM] -->
        
        <!-- [INI]Paginação[/INI] -->
        <div class="row clearfix">
            <div class="col-md-12 column">
                <?php if($vagas != NULL) {?>
                <div class="paginacao">
                   < 1, 2, 3, 4, 5 .... 12 >
                </div>
                <div class="mapa">
                    <iframe src="http://mapbuildr.com/frame/cbqyfr" frameborder="0" height="400" width="550"></iframe>
                </div>
                <?php }?>
            </div>
        </div>
        <!-- [FIM]Paginação[/FIM] -->
        
	