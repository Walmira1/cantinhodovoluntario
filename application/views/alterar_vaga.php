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
                   <a href="<?= base_url(); ?>inicio_instituicao/<?php$this->session->userdata('id_entidade')?>">Instituição ></a>
                           <a href="#">Alterar Vaga</a>
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
                    
                </div>  
                <div>
                    <a href="<?= base_url(); ?>cadastro_vaga/volta_entidade"><button type="button" class="btn btn-primary btn-sm" style="margin-left: 50%;">Volta a Instituição</button></a>
                    
                </div>    
                <?php  }?> 
                <div id="cadastros_vagas">
                    <form  method="post"  action="<?= base_url(); ?>altera_vaga/altera">
                     <!-- tenho uma variavel escondida na qual coloco de onde eu vim para saber ...-->
                    <input type="hidden" name="pagina" value="<?php echo $this->session->userdata('deondevim')?>"/>
                    <input type="hidden" name="id_entidade" value="<?php echo $this->session->userdata('id_entidade')?>"/>
                    <input type="hidden" name="id_vaga" value="<?php echo $vaga->id_vaga?>"/>
                    <input type="hidden" name="atividade" value="<?php echo $vaga->atividade_id_atividade_projeto?>"/>
                    <input type="hidden" name="area" value="<?php echo $vaga->atividade_id_area?>"/>
                    
                    <input type="hidden" name="captcha"/>   
		<!-- [INI][/INI] -->
                    <h2 style="margin-left: 15px;">Alterar oportunidade de Voluntáriado</h2>
                        <div class="incluir">
                        	Tipo de Voluntáriado:
                            <br />
                            <?php
                            $area = null;
                            switch($vaga->atividade_id_area){
                            case 1: $area = "Educação";break;
                            case 2: $area = "Solidariedade Social";break;
                            case 7: $area = "Ambiente";break;
                            case 3: $area = "Cultura e Artes";break;
                            case 4: $area = "Desporto e Laser";break;
                            case 5: $area = "Novas Tecnologias";break;
                            case 6: $area = "Saúde";break;
                            }
                            ?>
                            
                            <input type="text"  required="" value ="<?php echo $area;?>"  readonly="true"/>
                        </div>	
                        <div class="incluir">
                            Pessoas afetadas:
                            <?php
                            switch($vaga->atividade_id_atividade_projeto){
                            case 1: $atividade= "Adultos";break;
                            case 19: $atividade = "Animais";break;
                            case 2: $atividade = "Crianças e Jovens";break;
                            case 3: $atividade = "Crianças e Jovens com Deficiência";break;
                            case 7: $atividade = "Jovens";break;
                            case 3: $atividade = "Cultura e Artes";break;
                            case 4: $atividade = "Crianças e Jovens em Situação de Risco";break;
                            case 5: $atividade = "Família e Comunidade em Geral";break;
                            case 6: $atividade = "Grávidas, Mães Adolescentes, Bebes";break;
                            case 8: $atividade = "Mães Solteiras";break;
                            case 9: $atividade = "Mulheres Grávidas";break;
                            case 10: $atividade = "Mães Solteiras";break;
                            case 11: $atividade = "Outros";break;
                            case 12: $atividade = "Pessoas Adultas com Deficiência";break;
                            case 13: $atividade = "Pessoas com doenças Psiquiatricas";break;
                            case 14: $atividade = "Pessoas Toxico-Dependentes";break;
                            case 15: $atividade = "Pessoas dependentes(acamados)";break;
                            case 16: $atividade = "Pessoas idosas";break;
                            case 17: $atividade = "Pessoas sem Abrigo";break;
                            case 18: $atividade = "Presos";break;
                            case 20: $atividade = "Sozinho em Casa";break;
                            }
                            ?>
                           
                            <br />
                            <input type="text"  required="" value ="<?php echo $atividade;?>"  readonly="true" />
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
                            <input type="text" name="vaga_de" required="" value ="<?php echo $vaga->vaga_de;?>" autofocus/>
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
                            <input type="text" name="numero_vagas" required="" value ="<?php echo $vaga->numero_vagas;?>" />
                        </div>
                        <div class="incluir">
                            Número de horas:
                            <br />
                            <?php echo form_error('numero_horas','<div class="erro">','</div>'); ?>
                            <input type="text" name="numero_horas" value ="<?php echo $vaga->numero_horas;?>"/>
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
                            <input type="date" min="2015-08-01" name="data_inicio" required="" value ="<?php echo $vaga->data_inicio;?>" />
                        </div>
                        <div class="incluir">
                            Data Fim:
                            <br />
                            <?php echo form_error('data_fim','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_fim" required="" value ="<?php echo $vaga->data_fim;?>"/>
                        </div>
                        <div class="incluir" >
                            Data de postagem:
                            <br />
                            <?php echo form_error('data_postagem','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_postagem" required="" value ="<?php echo $vaga->data_postagem;?>"/>
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
                            <?php if ($turno != NULL){
                            foreach ($turno as $turno){
                                if($turno->id_turno == 1){
                                    echo '<tr id="tabela_turno">';
                                    echo '<td >Manhã</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="seg[]" value="1"';
                                    if($turno->segunda == 1){
                                        echo ' checked';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="terca[]" value="1" ';
                                    if($turno->terca == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quarta[]" value="1"';
                                    if($turno->quarta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quinta[]" value="1"';
                                    if($turno->quinta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sexta[]" value="1"' ;
                                    if($turno->sexta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sab[]" value="1"' ;
                                    if($turno->sabado == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">'; 
                                    echo '<input type="checkbox" name="dom[]" value="1"';
                                    if($turno->domingo == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                if($turno->id_turno == 2){
                                    echo '<tr id="tabela_turno">';
                                    echo '<td >Tarde</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="seg[]" value="2"';
                                    if($turno->segunda == 1){
                                        echo ' checked';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="terca[]" value="2" ';
                                    if($turno->terca == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quarta[]" value="2"';
                                    if($turno->quarta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quinta[]" value="2"';
                                    if($turno->quinta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sexta[]" value="2"' ;
                                    if($turno->sexta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sab[]" value="2"' ;
                                    if($turno->sabado == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">'; 
                                    echo '<input type="checkbox" name="dom[]" value="2"';
                                    if($turno->domingo == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                if($turno->id_turno == 3){
                                    echo '<tr id="tabela_turno">';
                                    echo '<td >Noite</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="seg[]" value="3"';
                                    if($turno->segunda == 1){
                                        echo ' checked';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="terca[]" value="3" ';
                                    if($turno->terca == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quarta[]" value="3"';
                                    if($turno->quarta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quinta[]" value="3"';
                                    if($turno->quinta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sexta[]" value="3"' ;
                                    if($turno->sexta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sab[]" value="3"' ;
                                    if($turno->sabado == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">'; 
                                    echo '<input type="checkbox" name="dom[]" value="3"';
                                    if($turno->domingo == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }                                 
                            }else{?>
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
                                <td class="tabela_turno">
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
                            <?php } ?>
                        </table>
                    </div>
                    <div style="margin-left: 2%; margin-top: 15px;">
                            Tudo sobre a Oportunidade:
                            <br />
                            <?php echo form_error('descricao','<div class="erro">','</div>'); ?>
                        <?php echo '<textarea style="width: 96%; min-height: 120px" name="descricao"
                            class="editar">'.$vaga->descricao.'</textarea>'?>
                    </div>
                    <div style="margin-left: 2%; margin-top: 15px;">
                            Perfil do Candidato:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <?php echo '<textarea style="width: 96%; min-height: 120px" name="perfil_voluntario" 
                                      class="editar">'.$vaga->perfil_voluntario.'</textarea>'?>
                    </div>   
                    <div style="margin-top: 20px; margin-left: 65%;">
                        <input type="submit" class="btn btn-primary btn-lg " value="Alterar Vaga" name="entrar" />  
                    </div>
                
                </form>
            </div>
         </div>
            
    </div>
