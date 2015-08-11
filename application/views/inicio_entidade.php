<div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column nosso_logo    ">
			<a href="index.html">
                <img alt="" src="<?= base_url(); ?>assets/img/cantinho.png" class="logo_cantinho">
            </a>
		</div>
		<div class="col-md-6 column">
			<h3 id="logo">
				Cantinho do Voluntário
			</h3>
		</div>
		<div class="col-md-4 column">
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
               <a href="index.html">Página Inicial</a> 
               <a href="cursos.html">Cursos</a>              
               <a href="campanhas_noticias.html">Campanhas/Noticias</a>                             
               <a href="altera_cadastro_entidade.html">Altera Cadastro</a>
               <a href="#">Sobre</a> 
            </div>  
        </div>
		<!-- [FIM]Menu[/FIM] -->
	</div>
    <div class="row clearfix">
        <div class="col-md-12 column">
        <?php  if($this->session->userdata('upload_foto')== NULL){?>
            <img src="<?= base_url(); ?>assets/img/maosnovas.jpg" class="imagem_cursos" alt="" />
        <?php }else {?>    
            <img src="<?php echo base_url().$this->session->userdata('upload_foto');?>" class="imagem_cursos" alt="" />
         <?php }?>    
        </div>
    </div>
    <div class="row clearfix">
        <!-- [INI]BreadCrump[/INI] -->
        <div class="col-md-12 column">
            <div id="breadcrump">
               <a href="index.html">Home ></a>
               <a href="inicio_instituicao.html">Instituição ></a>
                           <a href="#">Inicio Instituição</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
    <div class="row" style="margin-top:0.313em; margin-left:0.938em;">
        <a href="incluir_nova_vaga.html"><button type="button" class="btn btn-primary btn-lg" style="float: right">
            Incluir nova vaga</button></a>
    </div>
    <!-- [INI]Vagas[/INI] -->
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="col-md-3 column">
                    
                </div>
                <div class="col-md-3 column">
                    <div class="col_funcao">
                        Função
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="col_instituicao">
                        Data de Inicio
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="col_local">
                        Data de Fim
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix" style="margin-bottom: 0.625em;">
        <div class="col-md-12 column">
            <table> 
                <td></td>
                <div class="col-md-3 column">
                    <?php // if($this->session->userdata('logotipo_entidade')== NULL){?>
                       <img src="<?= base_url(); ?>assets/img/globo.jpg" class="logo_instituicao" alt="" /> 
                     <?php}else{?>
                      <img src="<?php echo base_url().$this->session->userdata('logotipo_entidade');?>" class="logo_instituicao" alt="foto da entidade" /> 
                   <?php// }?>
                </div>
                <div class="col-md-3 column">
                    <div class="">
                        <h3>Animador</h3>
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="">
                        <h3>10/12/2015</h3>
                    </div>
                </div>
                <div class="col-md-3 column">
                    <div class="">
                        <h3>12/12/2015</h3>
                        <div>
                            <a href="saiba_mais_vaga.html"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Excluir</button></a>
                        </div>
                        <div>
                            <a href="altera_vaga.html"><button type="button" class="btn btn-primary btn-sm" style="margin-left: 50%;">Alterar</button></a>
                        </div>
                    </div>
                </div>
            </table>    
        </div>
        </div>
	<!-- [FIM]Vagas[/FIM] -->
	
</div>
</body>
</html>

