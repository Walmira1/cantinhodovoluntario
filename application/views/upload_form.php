<!DOCTYPE HTML>
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
        <div class="row clearfix topo "  >
            <div class="col-md-2 column logo">
                <a href="<?= base_url(); ?>inicio">
                <img  class="img-responsive" alt="" src="<?= base_url(); ?>assets/img/cantinho.png" >
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

        <div class="uploadify-queue" id="file-queue"></div>
        <strong>Escolha uma foto para divulgação da entidade </strong>
        <input type="file" name="userfile" id="upload_btn" />
        <strong>Escolha uma foto para divulgação da entidade </strong>
        <a href="<?= base_url(); ?>cadastro_entidade/cadastro"><button type="button" class="btn btn-primary btn-lg" style="float: right"/>Sair</button> </a>
         
    <script type='text/javascript' >
    $(function() {
     $('#upload_btn').uploadify({
      'debug'   : false,
      'checkExisting' : '<?php echo base_url() ?>assets/js/uploadify/check-exists.php',
      'swf'   : '<?php echo base_url() ?>assets/js/uploadify/uploadify.swf',
      'uploader'  : '<?php echo base_url('upload/uploadify')?>',
      'cancelImage' : '<?php echo base_url() ?>assets/js/uploadify/uploadify-cancel.png',
      'queueID'  : 'file-queue',
      'buttonClass'  : 'button',
      'height'   : 120,
      'buttonText' : "Logo da Instituição",
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
    <div class="uploadify-queue" id="file-queue"></div>
        
        <input type="file" name="userfile" id="upload_btn2" />

    <script type='text/javascript' >
    $(function() {
     $('#upload_btn2').uploadify({
      'debug'   : false,

      'swf'   : '<?php echo base_url() ?>assets/js/uploadify/uploadify.swf',
      'uploader'  : '<?php echo base_url('upload/uploadify')?>',
      'cancelImage' : '<?php echo base_url() ?>assets/js/uploadify/uploadify-cancel.png',
      'queueID'  : 'file-queue',
      'buttonClass'  : 'button',
      'height'   : 120,
      'buttonText' : "Foto da Instituição",
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
    <!-- [INI]Rodapé[/INI] -->
	<div class="row clearfix">
		<div class="col-md-12 column">
                    <div class="rodape">
                        
                        <a href="https://www.facebook.com/pages/Cantinho-do-Volunt%C3%A1rio/793095697472047" >
                         <strong>Nossa Página no Face </strong>
                        </a>
                        <a href="https://www.facebook.com/pages/Cantinho-do-Volunt%C3%A1rio/793095697472047" >
                            <img  class="img-responsive" src="<?= base_url(); ?>assets/img/Facebook_creatures.png" alt="Facebook" 
                                  style="width: 4em"/>
                        </a>           
                    
                    <h5 id="rodape_logo">
                          Cantinho do Voluntario@2015
                    </h5>
                    </div>
		</div>	
	</div>
	<!-- [FIM]Rodapé[/FIM] -->
    </div>
</body>
</html>