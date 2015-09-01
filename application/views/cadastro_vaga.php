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
                   <a href="<?= base_url();?>inicio_entidade/index/<?php $this->session->userdata('id_entidade')?>">Instituição ></a>
                           <a href="#">Incluir Nova Vaga</a>
                </div>  
             </div>
        <!-- [FIM]BreadCrump[/FIM] -->
        </div>
         
        <div class="row clearfix">
            <div class="col-md-12 column">
                <?php if($alerta["mensagem"] != null) {?>
                <div class="alert alert-danger">
                    <?php  echo $alerta["mensagem"];?> 
                    
                </div>    
                <?php  }?> 
                <?php if($mensagem != null) {?>
                <div class="alert alert-success">
                    <?php  echo $mensagem;?> 
                    <?php   $mensagem = NULL;?> 
                </div>  
                <div>
                    <a href="<?= base_url(); ?>cadastro_vaga/volta_entidade"><button type="button" class="btn btn-primary btn-sm" style="margin-left: 50%;">Volta a Instituição</button></a>
                    
                </div>    
                <?php  }?> 
                <div id="cadastros_vagas">
                    <form  method="post"  action="cadastrar">
                     <!-- tenho uma variavel escondida na qual coloco de onde eu vim para saber ...-->
                    <input type="hidden" name="pagina" value="<?php echo $this->session->userdata('deondevim')?>"/>
                    <input type="hidden" name="id_entidade" value="<?php echo $this->session->userdata('id_entidade')?>"/>
                    <input type="hidden" name="captcha"/>   
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
                            <select name="tipo_carga_horaria">
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
                            <input type="text" name="vaga_de" required="" value ="<?php echo set_value('vaga_de');?>" autofocus/>
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
                        <?php date_default_timezone_set('America/Sao_Paulo');?>
                        <div class="incluir">
                            Data Inicio:
                            <br />
                            <?php echo form_error('data_inicio','<div class="erro">','</div>'); ?>
                            <input type="date" min="<?php echo date('Y-m-d');?>" name="data_inicio" required="" value ="<?php echo set_value('data_inicio');?>" />
                        </div>
                        <div class="incluir">
                            Data Fim:
                            <br />
                            <?php echo form_error('data_fim','<div class="erro">','</div>'); ?>
                            <input type="date" min="<?php echo date('Y-m-d');?>" name="data_fim" required="" value ="<?php echo set_value('data_fim');?>"/>
                        </div>
                        <div class="incluir" >
                            Data de postagem:
                            <br />
                            <?php echo form_error('data_postagem','<div class="erro">','</div>'); ?>
                            <input type="date" min="<?php echo date('Y-m-d');?>" name="data_postagem" required="" value ="<?php echo set_value('data_postagem');?>"/>
                        </div>
                    <div id="margem_tabela">
                         <?php echo form_error('dias_semana','<div class="erro">','</div>'); ?>
                        <table class="table table-condensed" style="max-width:10%;" name="dias_semana">
                            <tr id="dias_semana">
                                <td>
                                </td>
                                <td class="tabela_semanal">
                                    Seg.
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
                                    Sáb.
                                </td>
                                <td class="tabela_semanal">
                                    Dom.
                                </td>
                            </tr>
                            <tr id="tabela_turno">
                                <td >Manhã</td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="seg[]" value="1">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="terca[]" value="1">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="quarta[]" value="1">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="quinta[]" value="1">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="sexta[]" value="1">
                                </td>
                                <td style="text-align: center;">
                                    <input type="checkbox" name="sab[]" value="1">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="dom[]" value="1">
                                </td>
                            </tr>
                            <tr id="tabela_turno">
                                <td >Tarde</td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="seg[]" value="2">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="terca[]" value="2">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="quarta[]" value="2">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="quinta[]" value="2">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="sexta[]" value="2">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="sab[]" value="2">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="dom[]" value="2">
                                </td>
                            </tr>
                            <tr id="tabela_turno">
                                <td >Noite</td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="seg[]" value="3">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="terca[]" value="3">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="quarta[]" value="3">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="quinta[]" value="3">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="sexta[]" value="3">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="sab[]" value="3">
                                </td>
                                <td class="tabela_turno">
                                    <input type="checkbox" name="dom[]" value="3">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-left: 2%; margin-top: 15px;">
                            Tudo sobre a Oportunidade:
                            <br />
                            <?php echo form_error('descricao','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="descricao" > </textarea>
                    </div>
                    <div style="margin-left: 2%; margin-top: 15px;">
                            Perfil do Candidato:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="perfil_voluntario"  >
                            </textarea>
                    </div>   
                    <div style="margin-top: 20px; margin-left: 65%;">
                         <input type="submit" class="btn btn-primary btn-lg "  value="Incluir Vaga" name="entrar"  />  
                    </div>
                
                </form>
            </div>
         </div>
            
    </div>
	