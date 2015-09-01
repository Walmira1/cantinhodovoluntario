        <div class="row clearfix">
            <div class="col-md-12 column">
		<div class="carousel slide" id="carousel" data-ride="carousel" data-interval="3000">
			<ol class="carousel-indicators">
				<li class="active" data-slide-to="0" data-target="#carousel">
				</li>
				<li data-slide-to="1" data-target="#carousel">
				</li>
				<li data-slide-to="2" data-target="#carousel">
				</li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img  alt="" src="<?= base_url(); ?>assets/img\maosnovas.jpg" >
					<div class="carousel-caption">
						<h4>
							Primeira ideia
						</h4>
						<p>
						<h3>
							Seja a mudança que você quer ver no mundo(Gandhi) ... 
						</h3>	
						</p>
					</div>
				</div>
				<div class="item">
					<img alt="" src="<?= base_url(); ?>assets/img\maoscerta.jpg">
					<div class="carousel-caption">
						<h4>
							Segunda ideia
						</h4>
						<p>
							<h3>
							Se você pensa que é muito pequeno para fazer a diferença, esperimente dormir com um mosquito(Gandhi)
							</h3>
						</p>
					</div>
				</div>
				<div class="item">
					<img alt="" src="<?= base_url(); ?>assets/img\globobranco.jpg">
					<div class="carousel-caption">
						<h4>
							Terceira ideia
						</h4>
						<p>
							<h3>
							Sei que o meu trabalho é uma gota no oceano, mas sem ele o oceano seria menor (Madre Teresa)
							</h3>
						</p>
					</div>											
				</div>	
			</div> <a class="left carousel-control" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>				
		</div>
            </div>
		<!-- [FIM]Menu[/FIM] -->
	</div>
	<div class="pesquisa_index">
            <div class="col-md-12 column ">
                <div class="row clearfix">
			<!-- [INI]Pesquisa[/INI] -->
                        <div class="col-md-3 ">
					<h3>
					Gosto de:
					</h3>
                            <?php echo form_error('area','<div class="erro">','</div>'); ?>
                            <select name ="area">
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
                               
                                <select id="incluir_pessoas" name="atividade">
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
                        
                            <select name="tipo_carga_horaria">
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
                            <input type="text" name="numero_horas" value ="<?php echo set_value('numero_horas');?>"/>
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
                          <select id="estado"  name="estado" required="" />
                          <option value=" ">   </option>
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
                            <select id="cidade"  name="cidade" required="" />
                                <option value=" ">      </option>
                                <?php foreach($cidades as $cidade) {?>
                                <option value="<?= $cidade->cidade?>"> <?= $cidade->cidade; ?></option>
                                <?php }?>
                            </select>   
                    </div>
                    <div class="col-md-6 column ">
                    <a href="<?= base_url(); ?>pesquisa_vaga/index">
                  		<button type="button" class="btn btn-primary btn-lg btn_ver_vagas_index">Ver Vagas
                  		</button>
                     </a>
                    </div> 
        	</div>   
            <!-- [INI]Fim[/INI] -->
        </div>
    </div>    
	<!-- [INI]Curso[/INI] -->
	<div class="col-md-12 column col_cursos">
		<div id="lista_cursos">
			<div class="row clearfix">
				<div class="col-md-4 column ">	
					<a href="saiba_mais_campanha1.html">			
						<img class="img-responsive"  src="<?= base_url(); ?>assets/img/Dogs-and-cats.jpg"  >
					</a>
					<div class="titulo_curso">	
						<a href="saiba_mais_campanha1.html">
							Padrinho Virtual. Amigo Real  
						</a>
					</div>					
					<p class="article-paragraph ">
						Sabe aquela velha história de morrer de pena dos animais abandonados? 
						Na verdade, quem sente pena não morre, mas aquele animal que é alvo da pena, pode morrer sim! Morre aguardando uma ação, uma pequena ajuda. Com a Campanha Padrinhos Virtuais você pode mudar essa fala já tão batida e a situação de abandono de muitos animais.
					</p>
					<span>
						<a class="btn saiba_mais" href="saiba_mais_campanha1.html">Saiba mais »</a>
					</span>		
				</div>
				<div class="col-md-4 column ">	
					<a href="saiba_mais_curso.html">		
					<img class="img-responsive"  src="<?= base_url(); ?>assets/img/images.jpg"  >	
					</a>	
					<div class="titulo_curso">	
						<a href="saiba_mais_campanha.html">
						Curso de BREC - Busca e Resgate em estruturas colapsadas 
						</a>					 
					</div>						
					<p class="article-paragraph ">
						Este curso é direcionado a profissionais da emergencia como bombeiros, policiais, enfermeiros, médicos e socorristas e 
						tem como objetivo orientar quanto aos procedimentos e referências internacionais no âmbito do resgate técnico. 	
					</p>
					<span>
						<a class="btn saiba_mais" href="saiba_mais_campanha.html">Saiba mais »</a>
					</span>	
				</div> 
				<div class="col-md-4 column ">
					<a href="saiba_mais_campanha.html">			
						<img class="img-responsive"  src="<?= base_url(); ?>assets/img/agasalho1.jpg" >
					</a>
					<div class="titulo_curso">	
						<a href="saiba_mais_campanha.html">
						Campanha do agasalho 2015 - Aqueça um coração
						</a>				 
					</div>		
					<p class="article-paragraph ">
						Iniciou hoje a Campanha do Agasalho 2015 que se encerrará em 19 de junho de 2015. Os agasalhos arrecadados serão doados a uma instituição de assistência social na Guarnição de Porto Alegre-RS.</b> Quem quiser fazer a doação é só entregar na portaria da 8ª CSM no Centro Histórico 
					</p>
					<span>
						<a class="btn saiba_mais" href="saiba_mais_campanha.html">Saiba mais »</a>
					</span>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-4 column ">
					
					<a href="saiba_mais_campanha.html">			
						<img class="img-responsive"  src="<?= base_url(); ?>assets/img/agasalho1.jpg"  >
					</a>
					
					<div class="titulo_curso">	
						<a href="saiba_mais_campanha.html">
						Campanha do agasalho 2015 - Aqueça um coração
						</a>				 
					</div>		
					<p class="article-paragraph ">
						Iniciou hoje a Campanha do Agasalho 2015 que se encerrará em 19 de junho de 2015. Os agasalhos arrecadados serão doados a uma instituição de assistência social na Guarnição de Porto Alegre-RS.</b> Quem quiser fazer a doação é só entregar na portaria da 8ª CSM no Centro Histórico 
					</p>
					<span>
						<a class="btn saiba_mais" href="saiba_mais_campanha.html">Saiba mais »</a>
					</span>
				</div>
				<div class="col-md-4 column ">
					<a href="saiba_mais_campanha.html">
						<img class="img-responsive" src="<?= base_url(); ?>assets/img/campanha-do-agasalho-para-animais.jpg"  >
					</a>
					<div class="titulo_curso">	
						<a href="saiba_mais_campanha.html">
						Campanha do agasalho para animais
						</a>					 
					</div>		
					<p class="article-paragraph ">
						A USPA, presidida por Álvaro Pacheco, está realizando a campanha do agasalho para a doação aos animais (cães e gatos). As doações podem ser feitas na feirinha que acontece aos finais de semana no Shopping Center Salto.
					</p>
					<span>
						<a class="btn saiba_mais" href="saiba_mais_campanha.html">Saiba mais »</a>
					</span>
				</div>
				<div class="col-md-4 column "  >
					<a href="saiba_mais_campanha.html">
						<img class="img-responsive"  src="<?= base_url(); ?>assets/img/criancasorrindo.jpg"  >
					</a>
					<div class="titulo_curso">	
						<a href="saiba_mais_campanha.html">
							O seu sorriso pode mudar o dia de alguém  
						</a>					 
					</div>		
					<p class="article-paragraph ">
						Oferecer um sorriso torna feliz o coração. Enriquece quem o recebe sem empobrecer quem o doa, dura somente um instante, mas sua lembrança permanece por longo tempo. Ninguém é tão rico a ponto de dispensá-lo, nem tão pobre que não possa doá-lo. 			
					</p>
					<span>
						<a class="btn saiba_mais" href="saiba_mais_campanha.html">Saiba mais »</a>
					</span>
				</div>
			</div>
		</div>
	</div>
	<!-- [FIM]Curso[/FIM] -->
	


