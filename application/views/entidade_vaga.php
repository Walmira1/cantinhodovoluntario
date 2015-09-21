<body onload="carregar()">   
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
                           <a href="<?= base_url(); ?>Entidades/index">Entidades Cadastradas ></a>
			   <a href="">Ver Vagas</a>
			</div>	
		</div>
		<!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div class="row" style="margin-top: 0.313em; margin-left: 0.938em;">
        <a href="<?= base_url(); ?>entidades/index"><button type="button" class="btn btn-primary btn-lg" style="float: right">
            voltar as entidades</button></a>
    </div>    
	<!-- [INI]Vagas[/INI] -->
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="col_info_instituicao">
                    <?php if($entidade->logotipo_entidade != NULL){ ?>
                        <a href="<?php echo $entidade->site_entidade;?>" ><img src="<?php echo base_url().$entidade->logotipo_entidade;?>" style="width: 70%;" alt="Logotipo da  Instituição" /></a>
                    <?php }else{ ?>
                        <a href="<?php echo $entidade->site_entidade;?>" ><img src="<?=base_url();?>assets/img/criancas_2.png" style="width: 70%;" alt="Logotipo da  Instituição" /></a>
                    <?php } ?>   
                    
                    <div >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                        <img  class="clas_star" alt="estrela amarela" src="<?= base_url(); ?>assets/img/star_yellow.png" >
                    </div>
        <!--             <a href="<//?php echo $entidade->site_entidade;?>"><?//php echo $entidade->nome;?></a>-->
                    <br /><br />
                    <input type="text" disabled="disabled" style="width: 40px" value="<?php if($sum_vaga != null){ echo $sum_vaga->numero_vagas;}else{echo "0";}?>" />
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
            <div class="col-md-9">
                <div id="margem_tabela"> 
                <table class=" table table-responsive">
                    <thead>   
                    <tr id="dias_semana">
                        <th>Funcao</th>
                        <th>Local</th>
                        <th>Cidade</th>
                        <th></th>
                    </tr>
                    </thead> 
                <tbody>
                <?php if ($vagas != NULL){?>
                <?php foreach($vagas as $vaga) {?>
                    <tr >
                        <td ><?= $vaga->vaga_de;?></td>
                        <td ><?= $vaga->endereco;?></td>
                        <td ><?= $vaga->cidade;?></td>
                        <td> <a href="<?= base_url(); ?>pesquisa_vaga/vaga/<?= $vaga->id_vaga;?>"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Saiba mais</button></a> </td>
                        
                    </tr>
                <?php }?>
                <?php }else{?>
                    <tr >
                        <td >Não existem vagas cadastradas para esta entidade</td>
                    </tr>
                <?php }?>
                </tbody>
                </table> 
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
                <div id="mapa_campanha"></div> 
            </div>
        </div>
        <!-- [FIM]Paginação[/FIM] -->
        <script type="text/javascript">
	var map = null; 
    	function carregar(){
		//Endereço da marcação
		var endereco = "<?php echo $entidade->endereco. ",". $entidade->cidade. " ".$entidade->estado; ?>"
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
  		var contentString = '<strong><?php echo $entidade->endereco. " ". $entidade->cidade?></strong>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 700
		});

		//criando o mapa
    		map = new google.maps.Map(document.getElementById("mapa_campanha"), myOptions);


    	}
    </script>


        
	