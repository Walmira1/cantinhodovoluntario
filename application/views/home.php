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
                                    <img  alt="" src="assets/img\maosnovas.jpg" alt="seja a mudança que você quer ver no mundo"> 
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
                                    <img alt="" src="assets/img/maoscerta.jpg" alt="se você pensa que é muito pequeno para fazer a diferença, experimente dormir com um mosquito">
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
					<img alt="" src="assets/img/globobranco.jpg">
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
        <form method="post" action="pesquisa_vaga/pesquisa">	
            <div class="pesquisa_index">
            <div class="row clearfix">    
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
                        <input type="submit" class="btn btn-primary btn-lg btn_ver_vagas_index" value = "Ver Vagas" />
                        
                    </div> 
        	</div>   
            <!-- [INI]Fim[/INI] -->
            </div>
            </div> 
        </form>    
	<!-- [INI]Curso[/INI] -->
	<div class="col-md-12 column" id="lista_cursos">
            <div class="row clearfix">
                    <?php foreach($campanhas as $campanha){ ?>
                        <div class="col-md-4 column ">	
                            <a href="pesquisa_campanha/campanha/<?php echo $campanha->id_campanha?>">			
                                <img class="img-curso"  <?php echo 'src="'.base_url().$campanha->foto_campanha.'">' ?>  
                            </a>
                            <div class="titulo_curso">	
                                <a href="pesquisa_campanha/campanha/<?php echo $campanha->id_campanha?>">
					<?php echo $campanha->titulo_campanha_noticia; ?> 
				</a>
                            </div>					
                                <p class="article-paragraph ">
                                    <?php echo $campanha->descricao ?>
				</p>
                                <span>
                                    <a class="btn saiba_mais" href="pesquisa_campanha/campanha/<?php echo $campanha->id_campanha;?>">Saiba mais »</a>
				</span>
                        </div>
                        <?php }?>                            
                        <?php foreach($cursos as $curso){ ?>
                            <div class="col-md-4 column ">
				<a href="pesquisa_curso/curso/<?php echo $curso->id_curso;?>">			
                                    <img class="img-curso"  <?php echo 'src="'.base_url().$curso->upload_foto.'">' ?>  
				</a>
                            	<div class="titulo_curso">	
                                	<a href="pesquisa_curso/curso/<?php echo $curso->id_curso;?>">
					<?php echo $curso->nome; ?> 
					</a>
				</div>					
				<p class="article-paragraph ">
					<?php echo $curso->descricao; ?>
				</p>
				<span>
					<a class="btn saiba_mais" href="pesquisa_curso/curso/<?php echo $curso->id_curso;?>">Saiba mais »</a>
				</span>		
                            </div>                            
                            <?php }?>
            </div> 
	</div>
	<!-- [FIM]Curso[/FIM] -->
	<!-- [INI]Rodapé[/INI] -->