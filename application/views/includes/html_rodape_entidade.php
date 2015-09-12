<!-- [INI]Rodapé[/INI] -->
	<div class="row clearfix">
		<div class="col-md-12 column">
                    <div class="rodape">
                        <div class="rodape_links">
                                    <a href="<?= base_url(); ?>inicio">Página Inicial</a>
				    <a href="<?= base_url(); ?>inicio_entidade/index/<?=$this->session->userdata('id_entidade')?>">Inicio Instituição</a>
                                    <a href="<?= base_url(); ?>inicio_entidade/index/<?= $this->session->userdata('id_entidade')?>">Vagas</a> 
				    <a href="<?= base_url(); ?>cadastro_curso/index/<?= $this->session->userdata('id_entidade')?>">Cursos</a>
				    <a href="<?= base_url(); ?>cadastro_campanha_noticia/index/<?= $this->session->userdata('id_entidade')?>">Campanhas/Noticias</a>
                                    <a href="<?= base_url(); ?>altera_cadastro/index/<?= $this->session->userdata('id_entidade')?>">Altera Cadastro</a>
				    <a href="#">Termos e Condições</a>
			</div>
                        <a href="https://www.facebook.com/pages/Cantinho-do-Volunt%C3%A1rio/793095697472047" >
                         <strong>Nossa Página no Face </strong>
                        </a>
                        <a href="https://www.facebook.com/pages/Cantinho-do-Volunt%C3%A1rio/793095697472047" >
                          <img src="<?= base_url(); ?>assets/img/Facebook_creatures.png" alt="Facebook" 
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

