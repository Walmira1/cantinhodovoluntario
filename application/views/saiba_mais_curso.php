<body onload="carregar()">
        <!-- [INI]Imagem instituição[/INI] -->
    <div class="row clearfix">
            
        <div class="col-md-12 column">
            <?php  
            if($curso->upload_foto == NULL){
                    echo '<img src="'.base_url()."assets/img/maosnovas.jpg".'" class="imagem_cursos" alt="imagem da instituição" />';
                }else{   
                    echo '<img src="'.base_url().$curso->upload_foto.'" class="imagem_cursos" alt="" />';
                }
            ?> 
            
        </div>
   
	</div>
        <!-- [FIM]Imagem instituição[/FIM] -->
    <div class="row clearfix">
        <!-- [INI]BreadCrump[/INI] -->
        <div class="col-md-12 column">
            <div id="breadcrump">
               <a href="<?= base_url(); ?>inicio">Home ></a>
               <a href="<?= base_url(); ?>entidades">Entidades></a>
               <a href="<?= base_url(); ?>pesquisa_curso/entidade/<?php echo $entidade->id_entidade;?>">Entidades></a>
                           <a href="#">Saiba Mais</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
	<!-- [INI]Vaga[/INI] -->
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="descricao_vaga">                   
                <div style="width: 100%; margin-bottom: 20px;">
                    <div style="float: left; font-weight: bold; font-size: 24px;"><?php echo $curso->nome;?>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
	<!-- [FIM]noticia[/FIM] -->
    
    <div class="row">
            <div class="col-md-12">
                <div class="descricao_vaga">
                    <div class="col-md-9">
                        <div style="width: 100%; margin-bottom: 20px;">
                            <div style="float: left; font-weight: bold; font-size: 24px;">Descrição do Curso</div>
                            <div style="float: left; margin-left: 20px; margin-right: 20px;"><button type="button" class="btn btn-primary btn-sm">Inscrever-se</button></div>
                            <div style="float: left; margin-right: 20px;"><button type="button" class="btn btn-primary btn-sm">Imprimir</button></div>
                            <strong>Divulgue </strong>
                            <div style="float: left;"><img src="<?php echo base_url()?>assets/img/facebook.png" alt="Facebook" style="width: 32px" /></div>
                        </div> 
                        <br /><br />
                        <div>
                            <div class="box">
                                Data Inicio
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $curso->inicio;?>" />  
                            </div>
                            <div class="box">
                                Data Fim
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $curso->fim;?>" />  
                            </div>
                            <div class="box">
                                Inscrições até ..
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $curso->inscricao_ate;?>" />  
                            </div>
                            <div class="box">
                                Número de horas do curso
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $curso->num_horas;?>" />
                            </div>
                            <div class="box">
                                Horário das
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $curso->horario;?>" />
                            </div>
                            
                            <div class="box">
                                Taxa de Inscrição
                                <br />
                                <input type="text" disabled="disabled" value="<?php echo $curso->taxa_inscricao;?>" />
                            </div>
                            
                        </div>
                        <div>
                            <br />
                            <table class="table table-condensed" style="max-width:10%;" >
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
                                if($turno->id_turno == 2){
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
                        <div><h3>Sobre o Curso</h3></div>
                        <div>
                            <?php echo $curso->descricao;?>
                        </div>
                        <div><h3>Sobre a Instituição</h3></div>
                        <div>
                            <?php echo $entidade->descricao;?>
                        </div>
                        
                        <div><h3>Local do Curso</h3></div>
                        <div>
                            <?php echo $curso->local;?>
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
                <div id="mapa_campanha">
                </div>
            </div>
        </div>
    <script type="text/javascript">
	var map = null; 
    	function carregar(){
		//Endereço da marcação
		var endereco = "<?php echo $curso->local. ",". $entidade->cidade. " ".$entidade->estado; ?>"
		geocoder = new google.maps.Geocoder();		
		geocoder.geocode({'address':endereco}, function(results, status){ 
			if( status = google.maps.GeocoderStatus.OK){
				latlng = results[0].geometry.location;
				//Define o marcador e a localização dele
				// animation: google.maps.Animation.BOUNCE(Fica pulando) / google.maps.Animation.DROP(O icone cai quando carrega)
					
				markerInicio = new google.maps.Marker({position: latlng,
									map: map,
									animation: google.maps.Animation.DROP
									});		
				map.setCenter(latlng); 
				//Clique no Marcador
				google.maps.event.addListener(markerInicio, 'click', function() {
				  infowindow.open(map,markerInicio);
				});
			}			
		});
		//Zoom - Quando maior o numero maior é o zoom no mapa
		//mapTypeId - .ROADMAP(Mapa de rua) / .SATELITE (Mapa de satelite) / .HYBRID (Junção dos 2 tipos)
    		var myOptions = {
      			zoom: 16,
      			mapTypeId: google.maps.MapTypeId.HYBRID
    		};
		// Parâmetros do texto que será exibido no clique do marcador;
  		var contentString = '<strong><?php echo $curso->local. " ". $entidade->cidade?></strong>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 700
		});

		//criando o mapa
    		map = new google.maps.Map(document.getElementById("mapa_campanha"), myOptions);


    	}
    </script>

    </body>
    
