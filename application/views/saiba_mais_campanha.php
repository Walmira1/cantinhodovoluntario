<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=475771712587276";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
       <!-- [INI]Imagem instituição[/INI] -->
    <div class="row clearfix">
            <div class="col-md-12 column">
            <?php  
            if($campanha->foto_campanha == NULL){
                    echo '<img src="'.base_url()."assets/img/maosnovas.jpg".'" class="imagem_cursos" alt="imagem da instituição" />';
                }else{   
                    echo '<img src="'.base_url().$campanha->foto_campanha.'" class="imagem_cursos" alt="" />';
                }
            ?> 
            </div>
	</div>
        <!-- [FIM]Imagem instituição[/FIM] -->
    <div class="row clearfix">
        <!-- [INI]BreadCrump[/INI] -->
        <div class="col-md-12 column">
            <div id="breadcrump">
               <a href="index.html">Home ></a>
               <a href="campanhas_noticias.html">Campanhas & Noticias ></a>
                           <a href="#">Saiba Mais</a>
            </div>  
        </div>
        <!-- [FIM]BreadCrump[/FIM] -->
    </div>
	<!-- [INI]Vaga[/INI] -->
    <div class="row">
            <div class="col-md-12">
                <div class="descricao_vaga">
                    <div class="col-md-8">
                        <div style="max-width: 100%; margin-bottom: 20px;">
                            <div style="float: left; font-weight: bold; font-size: 24px;"><?php echo $campanha->titulo_campanha_noticia;?>
                            </div> 
                            
                           </br>
                        </div> 
                        <div>
                         <p class="article-paragrafo ">
                        <?php echo $campanha->descricao;?>
                         </p>  
                        </div> 
                    </div>
                    <div class="col-md-1">
                        <div class="fb-like"></div>
                        <div class="fb-share-button" 
                     data-href="http://tcc-voluntario.rhcloud.com/pesquisa_campanha/campanha/<?php echo $campanha->id_campanha;?>" data-layout="button">
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
        <?php if($campanha->video) {?>
        <div class="col-md-12 column ">
            <div class="row clearfix">    
                <div class="col-md-2 column ">
                </div> 
                <div class="col-md-6 column ">
                    <div class="embed-responsive embed-responsive-4by3">
                            <object data="" width="420" height="315">
                                <param name="movie" value="<?php echo $campanha->video;?>"/>
                                        <embed width="420" height="315" src="<?php echo $campanha->video;?>" /> 
                             </object>
                    </div> 
                </div>
                <div class="col-md-4 column ">
                </div> 
            </div> 
        </div> 
        <?php } ?>
	<!-- [FIM]noticia[/FIM] -->
    <div class="row clearfix">
        <div class="col-md-12">
            <?php if($campanhas != NULL){ ?>
            <?php foreach($campanhas as $campanha){ ?>
                    <div class="col-md-4 column ">
                        <br /><br />
			<a href="<?= base_url(); ?>pesquisa_campanha/campanha/<?php echo $campanha->id_campanha?>">		
				<img class="img-curso   "  <?php echo 'src="'.base_url().$campanha->foto_campanha.'">' ?>  
			</a>
			<div class="titulo_curso">	
				<a href="<?= base_url(); ?>pesquisa_campanha/campanha/<?php echo $campanha->id_campanha?>">
							<?php echo $campanha->titulo_campanha_noticia; ?> 
				</a>
			</div>					
			<p class="article-paragraph ">
				<?php echo $campanha->descricao ?>
			</p>
			<span>
				<a class="btn saiba_mais" href="saiba_mais_campanha1.html">Saiba mais »</a>
			</span>		
                    </div>                            
            <?php }?>
            <?php }else{?>
                    <div class="col-md-8 column ">
                        <br /><br />
                        Não existem campanhas para esta entidade
                    </div>
            <?php }?>
        </div>
    </div>
    
        
    
	