    <div class="row clearfix">
            <div class="col-md-12 column">
                    <img src="<?= base_url(); ?>assets/img/cisne01.jpg" class="imagem_cursos" alt="imagem de um casal de cisnes" />
            </div>
     </div>
    <div class="row clearfix">
		<!-- [INI]BreadCrump[/INI] -->
		<div class="col-md-12 column">
			<div id="breadcrump">
                           <a href="<?= base_url(); ?>inicio">Home ></a>
			   <a href="">Ver Curso</a>
			</div>	
		</div>
		<!-- [FIM]BreadCrump[/FIM] -->
    </div>
	<!-- [INI]Vagas[/INI] -->
    <div class="row clearfix">
        <div class="col-md-12">
            <?php if($cursos != NULL){ ?>
            <?php foreach($cursos as $curso){ ?>
                    <div class="col-md-4 column ">
                        <br /><br />
			<a href="<?= base_url(); ?>pesquisa_curso/<?php echo $curso->id_curso?>">		
				<img class="img-curso   "  <?php echo 'src="'.base_url().$curso->upload_foto.'">' ?>  
			</a>
			<div class="titulo_curso">	
				<a href="<?= base_url(); ?>pesquisa_curso/curso/<?php echo $curso->id_curso?>">
							<?php echo $curso->nome; ?> 
				</a>
			</div>					
			<p class="article-paragraph ">
				<?php echo $curso->descricao ?>
			</p>
			<span>
				<a class="btn saiba_mais" href="<?= base_url(); ?>pesquisa_curso/curso/<?php echo $curso->id_curso?>">Saiba mais »</a>
			</span>		
                    </div>                            
            <?php }?>
            <?php }else{?>
                    <div class="col-md-8 column ">
                        <br /><br />
                        Não existem cursos cadastrados
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

