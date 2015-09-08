<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title>Cantinho do Voluntário</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/uploadify/uploadify.css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/uploadify/jquery.uploadify-3.1.min.js"></script>
  <title></title>
</head>
<body>
    <div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column nosso_logo    ">
			<a href="<?= base_url(); ?>inicio">
                <img class="img-responsive" alt="" src="<?= base_url(); ?>assets/img/cantinho.png" >
            </a>
		</div>
		<div class="col-md-8 column">
			<h3 id="logo_entidade">
				Cantinho do Voluntário
			</h3>
		</div>
		<div class="col-md-2 column">
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
               <a href="<?= base_url(); ?>inicio">Página Inicial</a> 
               <a href="<?= base_url(); ?>inicio_entidade/index/<?= $this->session->userdata('id_entidade')?>">Página Inicial</a> 
               <a href="<?= base_url(); ?>cadastro_campanha_noticia/index/<?= $this->session->userdata('id_entidade')?>">Campanhas e Noticias</a>              
               <a href="<?= base_url(); ?>cadastro_vaga/index/<?= $this->session->userdata('id_entidade')?>">Vagas da Entidade</a>                             
               <a href="<?= base_url(); ?>altera_cadastro/index/<?= $this->session->userdata('id_entidade')?>">Altera Cadastro</a>
              
            </div>  
        </div>
		<!-- [FIM]Menu[/FIM] --> 
	</div>
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
               <a href="<?= base_url(); ?>inicio_entidade/index/<?= $this->session->userdata('id_entidade')?>">Instituição ></a>
              <a href="<?= base_url(); ?>cadastro_curso/index">Cursos da Instituição ></a>
               <a href="#">Incluir Curso</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
   
    <div id="cadastros_cursos">
         <?php if($mensagem != null) {?>
            <div class="alert alert-danger">
                    <?php  echo $mensagem; ?>
             </div>    
        <?php  }?> 
        <form  method="post"  action="<?= base_url(); ?>cadastro_curso/cadastrar">
            <input type="hidden" name="pagina" value="<?php echo $this->session->userdata('deondevim')?>"/>
                        <input type="hidden" name="id_entidade" value="<?php echo $this->session->userdata('id_entidade')?>"/>
                        <input type="hidden" name="captcha"/> 
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
                    <input type="text" name="video"  value ="<?php echo set_value('video');?>" />
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
                    <input type="text" name="taxa_inscr"  required="" data-thousands="." data-decimal="," data-prefix="R$ " value ="<?php echo set_value('taxa_inscr');?>" />
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
                            <input type="date" name="data_postagem" required="" min="<?php echo date('Y-m-d');?>"  value ="<?php echo set_value('data_postagem');?>"/>
                    </div>  
                </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="col-md-6 column" id="margem_tabela">
                         <?php echo form_error('dias_semana','<div class="erro">','</div>'); ?>
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
                        </table>
                </div>
                <div class="col-md-6 column incluir_curso" style="margin-bottom: 20px;">
                            <br />
                            Horário:
                            <br />
                            <?php echo form_error('horario','<div class="erro">','</div>'); ?>
                            <input type="text" name="horario" required="" value ="<?php echo set_value('horario');?>"/>
                </div>
                <div class="col-md-6 column incluir_curso" style="margin-bottom: 20px;">
                            <br />
                            Local:
                            <br />
                            <?php echo form_error('local','<div class="erro">','</div>'); ?>
                            <input type="text" name="local" required="" value ="<?php echo set_value('local');?>"/>
                </div>
            </div>    
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div style="margin-left: 2%; margin-top: 15px;">
                            Descrição:
                            <br />
                            <?php echo form_error('perfil_voluntario','<div class="erro">','</div>'); ?>
                            <textarea style="width: 96%; min-height: 120px" name="descricao" required="" value ="<?php echo set_value('perfil_voluntario');?>"></textarea>
                </div>
                
                <div>                                                   
                        <input type="submit" class="btn btn-primary btn-lg " style="margin-top: 20px; margin-left: 75%;" value="Incluir Curso" />                         
                </div>
               
            </div>
        </div>
        </form>
        <div class="uploadify-queue" id="file-queue"></div>
            <input type="hidden" name="id_entidade" value="<?php echo $this->session->userdata('user_id')?>"/>
             <strong>Escolha uma foto para divulgação da campanha </strong>
             <input type="file" name="userfile" id="upload_btn" />
             <a href="<?= base_url(); ?>cadastro_entidade/cadastro"><button type="button" class="btn btn-primary btn-lg" style="float: right"/>Sair</button> </a>
         
    <script type='text/javascript' >
    $(function() {
     $('#upload_btn').uploadify({
      'debug'   : false,
      'checkExisting' : '<?php echo base_url() ?>assets/js/uploadify/check-exists.php',
      'swf'   : '<?php echo base_url() ?>assets/js/uploadify/uploadify.swf',
      'uploader'  : '<?php echo base_url('cadastro_curso/uploadify')?>',
      'cancelImage' : '<?php echo base_url() ?>assets/js/uploadify/uploadify-cancel.png',
      'queueID'  : 'file-queue',
      'buttonClass'  : 'button',
      'height'   : 120,
      'buttonText' : "Campanha",
      'multi'   : true,
      'auto'   : true,

      'fileTypeExts' : '*.jpg; *.png; *.gif; *.PNG; *.JPG; *.GIF;',
      'fileTypeDesc' : 'Image Files',

      'method'  : 'post',
      'fileObjName' : 'userfile',

      'queueSizeLimit': 1,
      'simUploadLimit': 2,
      'sizeLimit'  : 10240000,
	  /*'onUploadSuccess' : function(file, data, response) {
            alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
       },*/
	   'onUploadComplete' : function(file) {
            alert('The file ' + file.name + ' finished processing.');
       },
        'onQueueFull': function(event, queueSizeLimit) {
            alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
            return false;
        },
        });
     });
    </script>
    </div>
    </div>

