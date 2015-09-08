
        <!-- [INI]Imagem instituição[/INI] -->
        <div class="row clearfix">
            <div class="col-md-12 column">
                <img src="<?php echo base_url().$entidade->upload_foto;?>" class="imagem_instituicao" alt="imagem da instituição"/>
            </div>
	</div>
        <!-- [FIM]Imagem instituição[/FIM] -->
        <div class="row clearfix">
        <!-- [INI]BreadCrump[/INI] -->
        <div class="col-md-12 column">
            <div id="breadcrump">
               <a href="index.html">Home ></a>
               <a href="ver_vagas.html">Ver Vagas ></a>
                           <a href="#">Saiba Mais</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
	<!-- [INI]Vaga[/INI] -->
        <div class="row">
            <div class="col-md-12">
                <div class="descricao_vaga">
                    <div class="col-md-9">
                        <div style="width: 100%; margin-bottom: 20px;">
                            <div style="float: left; font-weight: bold; font-size: 24px;">Descrição da Oportunidade</div>
                            <div style="float: left; margin-left: 20px; margin-right: 20px;"><button type="button" class="btn btn-primary btn-sm">Inscrever-se</button></div>
                            <div style="float: left; margin-right: 20px;"><button type="button" class="btn btn-primary btn-sm">Imprimir</button></div>
                            <strong>Divulgue </strong>
                            <div style="float: left;"><img src="<?php echo base_url()?>assets/img/facebook.png" alt="Facebook" style="width: 32px" /></div>
                        </div> 
                        <br /><br />
                        <div>
                             <div class="box">
                                 Vaga de 
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $vaga->vaga_de;?>" />
                            </div>
                            <div class="box">
                                Tipo de Compromisso
                                <br />
                                 <?php
                            $tipo_compromisso = null;
                            switch($vaga->tipo_compromisso){
                            case 1: $tipo_compromisso = "Ocasional";break;
                            case 2: $tipo_compromisso = "Regular";break;
                            }
                            ?>
                                <input type="text" disabled="disabled" value="<?php echo $tipo_compromisso;?>" />
                            </div>
                            <div class="box">
                                 Número de Vagas
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $vaga->numero_vagas;?>" />
                            </div>
                            <div class="box">
                                Número de horas
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $vaga->numero_horas;?>" />
                            </div>
                            <div class="box">
                                Horas
                                <br />
                            <?php
                            $comprometimento = NULL;
                            switch($vaga->comprometimento){
                            case 1: $area = "Diário";break;
                            case 2: $area = "Semanal";break;
                            case 3: $area = "Quinzenal";break;
                            case 4: $area = "Mensal";break;
                            case 5: $area = "Fins de Semana";break;
                            }
                            ?>
                                <input type="text" disabled="disabled" value="<?php echo $comprometimento;?>" />  
                            </div>
                            <div class="box">
                                Data Inicio
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $vaga->data_inicio;?>" />  
                            </div>
                            <div class="box">
                                Data Fim
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $vaga->data_fim;?>" />  
                            </div>
                            <div class="box">
                                Data Postagem
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $vaga->data_postagem;?>" />  
                            </div>
                        </div>
                        <div>
                            <br />
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
                                    echo '<input type="checkbox" name="seg[]" value="1" disabled="disabled"';
                                    if($turno->segunda == 1){
                                        echo ' checked';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="terca[]" value="1" disabled="disabled"';
                                    if($turno->terca == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quarta[]" value="1" disabled="disabled"';
                                    if($turno->quarta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quinta[]" value="1" disabled="disabled"';
                                    if($turno->quinta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sexta[]" value="1" disabled="disabled"' ;
                                    if($turno->sexta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sab[]" value="1" disabled="disabled"' ;
                                    if($turno->sabado == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">'; 
                                    echo '<input type="checkbox" name="dom[]" value="1" disabled="disabled"';
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
                                    echo '<input type="checkbox" name="seg[]" value="2" disabled="disabled"';
                                    if($turno->segunda == 1){
                                        echo ' checked';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="terca[]" value="2" disabled="disabled"';
                                    if($turno->terca == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quarta[]" value="2" disabled="disabled"';
                                    if($turno->quarta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quinta[]" value="2" disabled="disabled"';
                                    if($turno->quinta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sexta[]" value="2" disabled="disabled"' ;
                                    if($turno->sexta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sab[]" value="2" disabled="disabled"' ;
                                    if($turno->sabado == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">'; 
                                    echo '<input type="checkbox" name="dom[]" value="2" disabled="disabled"';
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
                                    echo '<input type="checkbox" name="seg[]" value="3" disabled="disabled"';
                                    if($turno->segunda == 1){
                                        echo ' checked';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="terca[]" value="3" disabled="disabled"';
                                    if($turno->terca == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quarta[]" value="3" disabled="disabled"';
                                    if($turno->quarta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="quinta[]" value="3" disabled="disabled"';
                                    if($turno->quinta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sexta[]" value="3" disabled="disabled"' ;
                                    if($turno->sexta == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">';
                                    echo '<input type="checkbox" name="sab[]" value="3" disabled="disabled"' ;
                                    if($turno->sabado == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '<td class="tabela_turno">'; 
                                    echo '<input type="checkbox" name="dom[]" value="3" disabled="disabled"';
                                    if($turno->domingo == 1){
                                        echo ' checked ';
                                    } 
                                    echo '>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }                                 
                            }?>
                        </table>
                            
                        </div>
                        <div><h3>Sobre a Oportunidade</h3></div>
                        <div>
                            <?php echo $vaga->descricao;?>
                        </div>
                        <div><h3>Sobre a Instituição</h3></div>
                        <div>
                            <?php echo $entidade->descricao;?>
                        </div>
                        <div><h3>Considerações Finais</h3></div>
                        <div style="margin-bottom: 30px;">
                            <?php echo $vaga->perfil_voluntario;?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col_info_instituicao">
                            <a href="<?php echo $entidade->site_entidade;?>" ><img src="<?php echo base_url().$entidade->logotipo_entidade;?>" style="width: 70%;" alt="Logotipo da  Instituição" /></a>
                            <div >
                                <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                                <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                                <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                                <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                                <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                            </div>
                            <a href="<?php echo $entidade->site_entidade;?>" ><?php echo $entidade->nome;?></a>
                            <br /><br />
                            <input type="text" disabled="disabled" style="width: 40px" value="<?php echo $sum_vaga->numero_vagas;?>" />
                            Novas Oportunidades    
                            <br /><br />
                            Endereço: <?php echo $entidade->endereco;?>
                            <br /><br />
                            Cidade:  <?php echo $entidade->cidade;?>
                            <br /><br />
                            Telefone: <?php echo $entidade->telefone;?>
                            <br /><br />
                            Responsável:
                            <br /><br />
                            E-mail: <?php echo $entidade->email;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<!-- [FIM]Vaga[/FIM] -->
    <!-- [INI]Paginação[/INI] -->
        <div class="row clearfix">
            <div class="col-md-12 column">                
                <div class="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.9380271970354!2d-51.20673065!3d-30.03863575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951978495072ab99%3A0x1cbc0b6d6799fecd!2sHospital+de+Cl%C3%ADnicas+de+Porto+Alegre!5e0!3m2!1spt-BR!2sbr!4v1433427648969" width="700" height="400" frameborder="0" style="border:0"></iframe>
                </div>
            </div>
        </div>
        <!-- [FIM]Paginação[/FIM] -->

	