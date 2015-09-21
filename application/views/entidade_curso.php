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
                           <a href="<?= base_url(); ?>entidades/index">Entidades Cadastradas ></a>
			   <a href="">Cursos por Entidade</a>
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
                    <br /><br />
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
            <div class="col-md-1">
            </div>
            <?php if($cursos != NULL){ ?>
            <?php foreach($cursos as $curso){ ?>
                    <div class="col-md-4 column ">
                        <br /><br />
			<a href="<?= base_url(); ?>pesquisa_curso/curso/<?php echo $curso->id_curso;?>">			
				<img class="img-responsive"  <?php echo 'src="'.base_url().$curso->upload_foto.'">' ?>  
			</a>
			<div class="titulo_curso">	
				<a href="<?= base_url(); ?>pesquisa_curso/curso/<?php echo $curso->id_curso;?>">
					<?php echo $curso->nome ?> 
						</a>
			</div>					
			<p class="article-paragraph ">
				<?php echo $curso->descricao ?>
			</p>
			<span>
				<a class="btn saiba_mais" href="<?= base_url(); ?>pesquisa_curso/curso/<?php echo $curso->id_curso;?>">Saiba mais »</a>
			</span>		
                    </div>                            
            <?php }?>
            <?php }else{?>
                    <div class="col-md-8 column ">
                        <br /><br />
                        Não existem cursos para esta entidade
                    </div>
            <?php }?>
        </div>
    </div>
	<!-- [FIM]cmapnhas[/FIM] -->
        
        <!-- [INI]Paginação[/INI] -->
        <div class="row clearfix" >
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



