<!DOCTYPE html>
<html lang="en">
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
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/scripts.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/js/ajaxfileupload.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.maskedinput-1.3.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function(){
		$("#telefone").mask("(99)9999-9999");
                $("#valor").mask("9999-9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#data").mask("99/99/9999");
                $("#taxa_inscr").maskMoney();
	});
        function confirma() {
             if (confirm("Tem certeza que deseja realmente excluir este registro?\nEsta operação não poderá ser desfeita!")) return true; else return false;
        }
</script>
</head>

<body>

