   
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
                        <div>
                        <strong>Divulgue </strong>
                        </div>
                        <div style="float: left;"><img src="<?php echo base_url()?>assets/img/facebook.png" alt="Facebook" 
                            style="max-width: 5em;" />
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
    <div class="col-md-12 column col_cursos">
        <div id="lista_cursos">
            <div class="row clearfix">
                <div class="col-md-4 column ">  
                   <a href="saiba_mais_campanha.html">          
                      <img class="img-responsive"  src="img/agasalho1.jpg" class="foto-campanha" >
                    </a>
                    <div class="titulo_curso">  
                        <a href="saiba_mais_campanha.html">
                        Campanha do agasalho 2015 - Aqueça um coração   
                        </a>             
                    </div>      
                    <p class="article-paragraph ">
                        Iniciou hoje a Campanha do Agasalho 2015 que se encerrará em 19 de junho de 2015. Os agasalhos arrecadados serão doados a uma instituição de assistência social na Guarnição de Porto Alegre-RS.</b> Quem quiser fazer a doação é só entregar na portaria da 8ª CSM no Centro Histórico 
                    </p>
                    <span>
                        <a class="btn saiba_mais" href="saiba_mais_campanha.html">Saiba mais »</a>
                    </span>
                </div>
                <div class="col-md-4 column ">
                    <a href="saiba_mais_campanha1.html">
                       <img class="img-responsive" src="img/campanha-do-agasalho-para-animais.jpg" class="foto-campanha" >
                    </a>
                    <div class="titulo_curso">  
                        <a href="saiba_mais_campanha1.html">
                            Campanha do agasalho para animais   
                        </a>                 
                    </div>      
                    <p class="article-paragraph ">
                        A USPA, presidida por Álvaro Pacheco, está realizando a campanha do agasalho para a doação aos animais (cães e gatos). As doações podem ser feitas na feirinha que acontece aos finais de semana no Shopping Center Salto.
                    </p>
                    <span>
                        <a class="btn saiba_mais" href="saiba_mais_campanha.html">Saiba mais »</a>
                    </span>
                </div>
                <div class="col-md-4 column "  >
                    <a href="saiba_mais_campanha1.html">
                      <img  class="img-responsive" src="img/criancasorrindo.jpg" class="foto-campanha" >
                    </a>
                    <div class="titulo_curso">  
                        <a href="saiba_mais_campanha1.html">
                           O seu sorriso pode mudar o dia de alguém  
                        </a>                     
                    </div>      
                    <p class="article-paragraph ">
                        Oferecer um sorriso torna feliz o coração. Enriquece quem o recebe sem empobrecer quem o doa, dura somente um instante, mas sua lembrança permanece por longo tempo. Ninguém é tão rico a ponto de dispensá-lo, nem tão pobre que não possa doá-lo.             
                    </p>
                    <span>
                        <a class="btn saiba_mais" href="saiba_mais_campanha1.html">Saiba mais »</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
        
    
	