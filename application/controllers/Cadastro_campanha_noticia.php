<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_campanha_noticia extends CI_Controller {

    	public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('campanha', 'campanha');
                $this->load->model('entidade', 'entidade');
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                
                        
         }	
        public function index($id_entidade=null)
	{       
		$this->load->view('includes/html_header');
               
                if ($id_entidade !=NULL){
                   $data['campanhas'] = $this->campanha->get_campanha_by_entidade_id_entidade($id_entidade); 
             //      var_dump($data['campanhas']);
             //      exit;
        //           $data['msg'] = "Curso Cadastrado com Sucesso";
        //           $this->load->view('includes/msg_sucesso',$data); 
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar a Campanha/Noticia"; 
                    $this->load->view('includes/msg_erro',$data);
                }
               $this->load->view('includes/html_menu_entidade');
               $this->load->view('cadastro_campanhas_noticias',$data);
               $this->load->view('includes/html_rodape_entidade');
               
                                
	}
       
        public function cadastro($indice=null)
	{  //     $this->load->view('includes/html_header');
           //     $this->load->view('includes/html_menu_entidade');
                $alerta = NULL;
                $cod_mensagem = $indice; 
                $mensagem = NULL;
                if ($indice==1){
                   $data['msg'] = "Campanha Cadastrada com Sucesso";
                   $mensagem = "Campanha Cadastrada com Sucesso";
                   $this->load->view('includes/msg_sucesso',$data); 
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar a Campanha"; 
                   $mensagem = "Não foi possivel cadastrar a Campanha"; 
                    $this->load->view('includes/msg_erro',$data);
                }
                $dados = array(
                     "alerta" => $alerta,
                     "cod_mensagem" => $cod_mensagem,
                     "mensagem" => $mensagem 
                 );
                $this->load->view('cadastro_campanha',$dados);
                $this->load->view('includes/html_rodape_entidade');
                
                
                                
	}
        public function cadastrar()
	{   
            /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
         //   $this->load->library('form_validation');
            /* Define as regras para validação
               Referencia:
        http://www.codeigniter.com/user_guide/libraries/form_validation.html?highlight=form%20validation#rule-reference
              */
            
         /*     if($this->input->post('entrar')== "Incluir Vaga"){
                 echo "o formulario foi submetido";
                 if ( $this->input->post('seg')[1]){
                     echo "trabalho na segunda de manha";
                 }
                 if ($this->input->post('seg')[2]){
                     echo "trabalho na segunda de tarde";
                 }
                 if ($this->input->post('terca')[2]){
                     echo "trabalho na terça de tarde";
                 }
                else {
                    echo "Não trabalho na terça de tarde"; 
                }
                 exit;
             } */
            $this->lang->load('form_validation','portuguese');
            $alerta = null;
            if($this->input->post('captcha')){
         //       $this->load->view('includes/html_header');
         //       $this->load->view('includes/html_menu_entidade');
                $this->load->view('cadastro_campanha');
                $this->load->view('includes/html_rodape_entidade');
                
            }
          //Verifica se o form passou nos testes de validação  
            if ($this->form_validation->run('cadastro_campanha_form')==FALSE) {
        //         var_dump($this->input->post());
                
                      // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
                 $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
                 
                $data['alerta'] = $alerta;
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('cadastro_campanha',$data);
                $this->load->view('includes/html_rodape_entidade');
            }else{
                $data['entidade_id_entidade'] = $this->input->post('id_entidade');
            	$data['titulo_campanha_noticia'] = $this->input->post('titulo');
                $data['descricao'] = $this->input->post('descricao');
                $data['data_inclusao'] = $this->input->post('data_inclusao');
                $data['data_fim'] = $this->input->post('data_fim');
                $data['foto_campanha'] = NULL;
                $data['video'] = $this->input->post('video');
                
            //    var_dump($data);
                    
                if ($this->campanha->cadastrar($data) == TRUE){
      // vou ler a ultima vaga cadastrada para a entidade para buscar o id_vaga
                        $query = $this->campanha->get_max_campanha_by_entidade($this->input->post('id_entidade'));
                    
           
                         redirect('cadastro_campanha_noticia/cadastro/1');
                        
               } else{
                   redirect('cadastro_campanha_noticia/cadastro/2');
                 
               }
            }
            
	}
        public function delete($id_campanha =null){
            if ($id_campanha != null){
                if ($this->campanha->delete_campanha($id_campanha) == FALSE){
                        $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Não conseguiu apagar o Registro da Campanha <br>" 
                             );
                        $dados = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL 
                 );
                }
            }else{
                $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Campanha não identificada <br>" 
                             );
                        $dados = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL 
                 );
            }                 
                     
            $id_entidade = NULL;
            $id_entidade = $this->session->userdata('id_entidade');
            $data['campanhas'] = $this->campanha->get_campanha_by_entidade_id_entidade($id_entidade);
            // redirect('cadastro_entidade/index/3');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('cadastro_campanhas_noticias',$data);
            $this->load->view('includes/html_rodape_entidade');
    
     }  
     public function altera_campanha($id_campanha =null){
            $alerta = NULL;
            $data = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL
            );
            if ($id_campanha != null){
                $query = $this->campanha->select_campanha($id_campanha) ;
                if ($query->num_rows() == 1){
                $data['campanha'] = $query->row(0,'campanha') ;
                }else {
                    $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Curso não identificado <br>" 
                             );
                    $data = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL
                    );
                }
            }else{
                $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Curso não identificado <br>" 
                             );
                $data = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL
            );
                        
            } 
            
    /*        $query = $this->vaga_turno->select_vaga($id_vaga);
            
            if ($query->num_rows() > 0){
                $data['turno_vaga'] = $query->row();
            //    var_dump($data['turno_vaga']);
            //    exit;
            } */
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('alterar_campanha',$data);
            $this->load->view('includes/html_rodape_entidade');
     }  
      public function volta_campanha()
	{   
            /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
         //   $this->load->library('form_validation');
            /* Define as regras para validação
               Referencia:
        http://www.codeigniter.com/user_guide/libraries/form_validation.html?highlight=form%20validation#rule-reference
              */
             
             //var_dump($this->input->post());
            $alerta = null;
            $id_entidade = $this->session->userdata('id_entidade');
            $data['campanhas'] = $this->campanha->get_campanha_by_entidade_id_entidade($id_entidade);
                   // redirect('cadastro_entidade/index/3');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('campanhas',$data);
            $this->load->view('includes/html_rodape_entidade');
	}
        public function uploadify()
                //upload de foto
	{     
		$config['upload_path'] = "./images/";
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("userfile"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
                        
                        $file_info = "/"."images"."/".$response['file_name'];
                        $id_entidade = $this->session->userdata('id_entidade');
                       // echo "id_entidade = ".$id_entidade;
                        
                        $query = $this->campanha->get_max_campanha_by_entidade($id_entidade)->row();
                        $id_campanha = $query->id_campanha;
                   //     echo "campanha = ".$id_campanha;
                  //      var_dump($query);
                        $data = array(
                            'id_campanha' => $query->id_campanha,
                            'entidade_id_entidade' => $query->entidade_id_entidade,
                            'titulo_campanha_noticia' =>$query->titulo_campanha_noticia,
                            'descricao' => $query->descricao,
                            'data_inclusao' => $query->data_inclusao,
                            'data_fim' => $query->data_fim,
                            'foto_campanha' => $file_info,
                            'video' => $query->video);
                        if ($this->campanha->alterar($id_campanha,$data) != TRUE){
                            echo"erro";
                        }
                        
                        
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
       
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
