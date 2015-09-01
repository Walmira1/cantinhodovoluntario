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
                    <a href="ver_vagas.html">
                  		<button type="button" class="btn btn-primary btn-lg btn_ver_vagas_index" alt="ver vagas">Ver Vagas
                  		</button>
                     </a>
                    </div> 
        	</div>   
            <!-- [INI]Fim[/INI] -->
        </div>               
            <!-- [INI]Fim[/INI] -->
            </div>
	<!-- [INI]Vagas[/INI] -->
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="col-md-3 column">
                    <div class="col_logo">
                        Logo
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="col_funcao">
                        Função
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="col_instituicao">
                        Instituição
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="col_local">
                        Local
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="col-md-3 column">
                    <a href="http://www.doutoresdaalegria.org.br/"><img src="img/doutores-da-alegria-logo-novo.jpg" class="logo_instituicoes" alt="doutores da alegria" /></a>
                </div>
                <div class="col-md-3 column">
                    <div class="">
                        <h3>Animador</h3>
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="">
                        <h3>Doutores da Alegria</h3>
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="">
                        <h3>Hospital de Clinicas Porto Alegre / RS</h3>
                        <a href="saiba_mais_vaga.html"><button type="button" class="btn btn-primary btn-sm" style="float: right">Saiba mais</button></a>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.9380271970354!2d-51.20673065!3d-30.03863575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951978495072ab99%3A0x1cbc0b6d6799fecd!2sHospital+de+Cl%C3%ADnicas+de+Porto+Alegre!5e0!3m2!1spt-BR!2sbr!4v1433427648969" width="600" height="450" frameborder="0" style="border:0"></iframe>
                </div>
            </div>
        </div>
        <!-- [FIM]Paginação[/FIM] -->
        
	