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
               <a href="<?= base_url(); ?>cadastro_curso/index/<?= $this->session->userdata('id_entidade')?>">Cursos</a>              
               <a href="<?= base_url(); ?>cadastro_campanha_noticia/index/<?= $this->session->userdata('id_entidade')?>">Campanhas/Noticias</a>                             
               <a href="<?= base_url(); ?>altera_cadastro/index/<?= $this->session->userdata('id_entidade')?>">Altera Cadastro</a>
              
            </div>  
        </div>
		<!-- [FIM]Menu[/FIM] --> 
	</div>

