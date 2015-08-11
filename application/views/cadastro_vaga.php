<div class="container">
	<div class="row clearfix">
            <div class="col-md-2 column nosso_logo">         
                <a href="index.html">
                <img alt="" src="<?= base_url(); ?>assets/img/cantinho.png" class="logo_cantinho">
                </a>
            </div>
            <div class="col-md-6 column">
			<h3 id="logo">
				Cantinho do Voluntário
			</h3>
            </div>
            <div class="col-md-4 column">
			<div class="sair">
                <a href="#" >
                    Sair
                </a> 
			</div>
            </div>
	</div>
	<div class="row clearfix">
		<!-- [INI]Menu[/INI] -->
            <div class="col-md-12 column">
			<div id="mapa">
			   <a href="index.html">Página Inicial</a>
			   <a href="inicio_instituicao.html">Inicio Instituição</a>
			   <a href="cursos.html">Cursos</a>
			   <a href="#">Campanhas/Noticias</a>
			   <a href="#">Sobre</a>			   
			   <a href="altera_cadastro_entidade.html">Alterar Cadastro</a>
			</div>	
            </div>
		<!-- [FIM]Menu[/FIM] -->
	</div>
        <div class="row clearfix">
              <div class="col-md-12 column">
                   <img src="<?= base_url(); ?>assets/img/todos fazendo.jpg" class="imagem_instituicao" alt=""/>
               </div>
          </div>
        <div class="row clearfix">
        <!-- [INI]BreadCrump[/INI] -->
             <div class="col-md-12 column">
                <div id="breadcrump">
                  <a href="index.html">Home ></a>
                   <a href="inicio_instituicao.html">Instituição ></a>
                           <a href="#">Incluir Nova Vaga</a>
                </div>  
             </div>
        <!-- [FIM]BreadCrump[/FIM] -->
        </div>
        
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div id="cadastros_vagas">
                <form  method="post"  action="cadastrar">
		<!-- [INI][/INI] -->
                    <h2 style="margin-left: 15px;">Criar oportunidade de Voluntáriado</h2>
                        <div class="incluir">
                        	Tipo de Voluntáriado:
                            <br />
                            <?php echo form_error('area','<div class="erro">','</div>'); ?>
                            <select name ="area">
				<option value= "1">Educação</option>
				<option value= "2">Solidariedade Social</option>
				<option value= "7">Ambiente</option>
				<option value= "3">Cultura e Artes</option>
				<option value= "4">Desporto e Laser</option>
				<option value= "5">Novas Tecnologias</option>
				<option value= "6">Saúde</option>
                            </select>
                        </div>	
                        <div class="incluir">
                            Pessoas afetadas:
                           <?php echo form_error('atividade','<div class="erro">','</div>'); ?>
                            <br />
                            <select id="incluir_pessoas" name="atividade">
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
                        <div class="incluir">
                            Tempo disponivel:
                              <?php echo form_error('tipo_carga_horaria','<div class="erro">','</div>'); ?>
                            <br />
                            <select name=tipo_carga_horaria">
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
                        <div class="incluir">
                            Vaga de:
                            <br />
                            <?php echo form_error('vaga_de','<div class="erro">','</div>'); ?>
                            <input type="text" name="vaga_de" required="" value ="<?php echo set_value('vaga_de');?>"/>
                        </div> 
                        <div class="incluir">
                            Tipo de compromisso
                            <br />
                            <?php echo form_error('tipo_compromisso','<div class="erro">','</div>'); ?>
                            <select name="tipo_compromisso">
                                <option value= "1">Ocasional</option>
                                <option value= "2">Regular</option>
                            </select>
                        </div>
                        <div class="incluir">
                            Número de vagas:
                            <br />
                            <?php echo form_error('numero_vagas','<div class="erro">','</div>'); ?>
                            <input type="text" name="numero_vagas" required="" value ="<?php echo set_value('numero_vagas');?>" />
                        </div>
                        <div class="incluir">
                            Número de horas:
                            <br />
                            <?php echo form_error('numero_horas','<div class="erro">','</div>'); ?>
                            <input type="text" name="numero_horas" value ="<?php echo set_value('numero_horas');?>"/>
                        </div>
                        <div class="incluir">
                            Comprometimento:
                             <br />
                            <?php echo form_error('comprometimento','<div class="erro">','</div>'); ?>
                            <select name="comprometimento">
                                   <option value= "1">Diário</option>
                                   <option value= "2">Semanal</option>
                                   <option value= "3">Quinzenal</option>
                                   <option value= "4">Mensal</option>
                                   <option value= "5">Fins de semana</option>
                            </select>
                        </div>
                        <div class="incluir">
                            Data Inicio:
                            <br />
                            <?php echo form_error('data_inicio','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_inicio" required="" value ="<?php echo set_value('data_inicio');?>" />
                        </div>
                        <div class="incluir">
                            Data Fim:
                            <br />
                            <?php echo form_error('data_fim','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_fim" required="" value ="<?php echo set_value('data_fim');?>"/>
                        </div>
                        <div class="incluir" >
                            Data de postagem:
                            <br />
                            <?php echo form_error('data_postagem','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_postagem" required="" value ="<?php echo set_value('data_postagem');?>"/>
                        </div>
                    <div id="margem_tabela">
                         <?php echo form_error('dias_semana','<div class="erro">','</div>'); ?>
                        <table style="width:10%;" name="dias_semana">
                            <tr id="dias_semana">
                                <td>
                                </td>
                                <td class="tabela_semanal">
                                    Segunda
                                </td>
                                <td class="tabela_semanal">
                                    Terça
                                </td>
                                <td class="tabela_semanal">
                                    Quarta
                                </td>
                                <td class="tabela_semanal">
                                    Quinta
                                </td>
                                <td class="tabela_semanal">
                                    Sexta
                                </td>
                                <td class="tabela_semanal">
                                    Sábado
                                </td>
                                <td class="tabela_semanal">
                                    Domingo
                                </td>
                            </tr>
                            <tr id="tabela_turno">
                                <td >Manhã</td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td style="text-align: center;">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                            </tr>
                            <tr id="tabela_turno">
                                <td >Tarde</td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                            </tr>
                            <tr id="tabela_turno">
                                <td >Noite</td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="" value="">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-left: 2%; margin-top: 15px;">
                            Tudo sobre a Oportunidade:
                            <br />
                            <?php echo form_error('descricao','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="descricao" required="" value ="<?php echo set_value('descricao');?>"></textarea>
                    </div>
                    <div style="margin-left: 2%; margin-top: 15px;">
                            Perfil do Candidato:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="perfil_voluntario" required="" value ="<?php echo set_value('perfil_voluntario');?>"></textarea>
                    </div>                        
                    <input type="submit" class="btn btn-primary btn-lg " style="margin-top: 20px; margin-left: 75%;" value="Incluir Vaga" />   
                
                </form>
            </div>
         </div>
            
    </div>
	