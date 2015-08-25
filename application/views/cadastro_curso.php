
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
               <a href="inicio_instituicao/<?php $this->session->userdata('id_instituicao')?>">Instituição ></a>
               <a href="#">Incluir Curso</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div id="cadastros_cursos">
        <form  method="post"  action="cadastrar">
	<div class="row clearfix">
            <div class="col-md-12 column">
		<!-- [INI][/INI] -->
                    <h2 style="margin-left: 15px;">Criar Noticias de Cursos</h2>
                <div class="col-md-3 column incluir_curso">
                            <br />
                            Titulo:
                            <br />
                            <?php echo form_error('titulo','<div class="erro">','</div>'); ?>
                            <input type="text" name="titulo" required="" value ="<?php echo set_value('titulo');?>" autofocus/>
                </div>
                <div class="col-md-3 column incluir_curso">
                    <br />
                    Video_youtube:
                    <br />
                    <?php echo form_error('video','<div class="erro">','</div>'); ?>
                    <input type="text" name="video" required="" value ="<?php echo set_value('video');?>" />
                </div>
                <div class="col-md-3 column incluir_curso">
                    <br />
                    Numero de Horas:
                    <br />
                    <?php echo form_error('num_horas','<div class="erro">','</div>'); ?>
                    <input type="text" name="num_horas" required="" value ="<?php echo set_value('num_horas');?>" />
                </div>
                <div class="col-md-3 column incluir_curso">
                    <br />
                    Taxa de Inscrição:
                    <br />
                    <?php echo form_error('taxa_inscr','<div class="erro">','</div>'); ?>
                    <input type="text" name="taxa_inscr" id="taxa_inscr" required="" data-thousands="." data-decimal="," data-prefix="R$ " value ="<?php echo set_value('taxa_inscr');?>" />
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                    <div class="col-md-3 column incluir_curso">
                            <br />
                            Inscrição até:
                            <br />
                            <?php echo form_error('inscricao_ate','<div class="erro">','</div>'); ?>
                            <input type="date" min="<?php echo date('Y-m-d');?>" name="inscricao_ate" required="" value ="<?php echo set_value('inscricao_ate');?>" />
                    </div>
                    <div class="col-md-3 column incluir_curso">
                            <br />
                            Data Inicio:
                            <br />
                            <?php echo form_error('data_inicio','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_inicio" min="<?php echo date('Y-m-d');?>" required="" value ="<?php echo set_value('data_inicio');?>" />
                    </div>
                    
                    <div class="col-md-3 column incluir_curso">
                            <br />
                            Data Fim:
                            <br />
                            <?php echo form_error('data_fim','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_fim" min="<?php echo date('Y-m-d');?>" required="" value ="<?php echo set_value('data_fim');?>" />
                    </div>
                    <div class="col-md-3 column incluir_curso" style="margin-bottom: 20px;">
                            <br />
                            Data de postagem:
                            <br />
                            <?php echo form_error('data_postagem','<div class="erro">','</div>'); ?>
                            <input type="date" name="data_postagem" required="" value ="<?php echo set_value('data_postagem');?>"/>
                    </div>  
                </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="col-md-6 column" id="margem_tabela">
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
                <div class="col-md-6column incluir_curso" style="margin-bottom: 20px;">
                            <br />
                            Horário:
                            <br />
                            <?php echo form_error('horario','<div class="erro">','</div>'); ?>
                            <input type="text" name="horario" required="" value ="<?php echo set_value('horario');?>"/>
                </div>
            </div>    
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div style="margin-left: 2%; margin-top: 15px;">
                            Breve descrição:
                            <br />
                            <?php echo form_error('breve_descricao','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="breve_descricao" required="" value ="<?php echo set_value('breve_descricao');?>"></textarea>
                </div>
                <div style="margin-left: 2%; margin-top: 15px;">
                            Descrição:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="perfil_voluntario" required="" value ="<?php echo set_value('perfil_voluntario');?>"></textarea>
                </div>
                
                <div>                                                   
                        <input type="submit" class="btn btn-primary btn-lg " style="margin-top: 20px; margin-left: 75%;" value="Incluir Curso" />                         
                </div>
               
            </div>
        </div>
        </form>
    </div>

