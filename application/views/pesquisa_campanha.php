    <div class="row clearfix">
            <div class="col-md-12 column">
                    <img src="<?= base_url(); ?>assets/img/cisne01.jpg" class="imagem_cursos" alt="" />
            </div>
     </div>
    <div class="row clearfix">
		<!-- [INI]BreadCrump[/INI] -->
		<div class="col-md-12 column">
			<div id="breadcrump">
                           <a href="<?= base_url(); ?>inicio">Home ></a>
			   <a href="">Ver Campanha</a>
			</div>	
		</div>
		<!-- [FIM]BreadCrump[/FIM] -->
    </div>
	<!-- [INI]Vagas[/INI] -->
    <div class="row clearfix">
        <div class="col-md-12">
            <?php if($campanhas != NULL){ ?>
            <?php foreach($campanhas as $campanha){ ?>
                    <div class="col-md-4 column ">
                        <br /><br />
			<a href="saiba_mais_campanha1.html">			
				<img class="img-responsive"  <?php echo 'src="'.base_url().$campanha->foto_campanha.'">' ?>  
			</a>
			<div class="titulo_curso">	
				<a href="saiba_mais_campanha1.html">
					<?php echo $campanha->titulo_campanha_noticia ?> 
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
	<!-- [FIM]cmapnhas[/FIM] -->
        
        <!-- [INI]Paginação[/INI] -->
    <div class="row clearfix" >
            <div class="col-md-12 column">
                <div class="paginacao">
                   < 1, 2, 3, 4, 5 .... 12 >
                
                </div>
                
            </div>
    </div>

