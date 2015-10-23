<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Cantinho do Voluntário</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta property="og:type"               content="article" />
  <meta property="og:description"        content="<?php echo $curso->descricao;?>" />
  <meta property="og:title"              content="<?php echo $curso->nome;?>" />

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img<?= base_url(); ?>assets/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url(); ?>assets/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url(); ?>assets/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?= base_url(); ?>assets/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.png">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <title></title>
</head>
<body>
    <div class="container">
	<div class="row clearfix">
            <div class="col-md-2 column nosso_logo    ">
            <a href="<?= base_url(); ?>/inicio">
            <img  class="img-responsive" alt="" src="<?= base_url(); ?>assets/img/cantinho.png" >
            </a>
            </div>
            <div class="col-md-6 column">
			<h3 id="logo">
				Cantinho do Voluntário
			</h3>
            </div>
            <div class="col-md-4 column">
			<div class="login" >
				<a href="<?= base_url(); ?>login" >
					Faça Login ou
				</a> 
				<a href="<?= base_url(); ?>cadastro_voluntario/cadastro" ><button type="button" class="btn btn-primary btn-sm">
                                        Cadastre-se</button></a>
			</div>
            </div>
	</div>
	<div class="row clearfix">
		<!-- [INI]Menu[/INI] -->
		<div class="col-md-12 column">
			<div id="mapa">
			   <a href="<?= base_url(); ?>cadastro_entidade/cadastro">Instituições</a>
			   <a href="<?= base_url(); ?>pesquisa_vaga/index">Vagas</a>
                           <a href="<?= base_url(); ?>pesquisa_campanha/index">Campanhas</a>
                           <a href="<?= base_url(); ?>pesquisa_curso/index">Cursos</a>
			   <a href="<?= base_url(); ?>testemunhos">Depoimentos</a>
			   <a href="<?= base_url(); ?>entidades/index">Instituições Reg.</a>
			   <a href="<?= base_url(); ?>sobre">Sobre</a>	
			</div>
                </div>
        </div>  
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=475771712587276";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
                            
                            <div class="fb-like" style="float: left;" data-layout="button_count" data-show-faces="true" data-href="http://tcc-voluntario.rhcloud.com/pesquisa_curso/curso/<?php echo $curso->id_curso;?>" data-ref="noone" data-kid-directed-site="false" data-share="false"></div>
                            <div class="fb-share-button" style="float: left;"
                     data-href="http://tcc-voluntario.rhcloud.com/pesquisa_curso/curso/<?php echo $curso->id_curso;?>" data-layout="button">
                        </div>
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
    
