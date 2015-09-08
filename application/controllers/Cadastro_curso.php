<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_curso extends CI_Controller {

    	public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('curso', 'curso');
                $this->load->model('entidade', 'entidade');
                $this->load->model('turno', 'turno');
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                
                        
         }	
        public function index($index=null)
	{       
		$mensagem = "Vaga Cadastrada com Sucesso";
                $this->load->view('includes/html_header');
                $id_entidade = $this->session->userdata('id_entidade');
                $data['cursos'] = $this->curso->get_curso_by_entidade_id_entidade($id_entidade); 
        //           $data['msg'] = "Curso Cadastrado com Sucesso";
        //           $this->load->view('includes/msg_sucesso',$data); 
                if($id_entidade==2){
                   $data['msg'] = "Não foi possivel cadastrar o Curso"; 
                    $this->load->view('includes/msg_erro',$data);
                }
               $this->load->view('includes/html_menu_entidade');
               $this->load->view('cursos',$data);
               $this->load->view('includes/html_rodape_entidade');
               
                                
	}
       
        public function cadastro($indice=null)
	{      
                $alerta = NULL;
                $cod_mensagem = $indice; 
                $mensagem = NULL;
                if ($indice==1){
                   $data['msg'] = "Curso Cadastrado com Sucesso";
                   $mensagem = "Curso Cadastrada com Sucesso";
                   $this->load->view('includes/msg_sucesso',$data); 
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar o Curso"; 
                   $mensagem = "Não foi possivel cadastrar o Curso"; 
                    $this->load->view('includes/msg_erro',$data);
                }
                $dados = array(
                     "alerta" => $alerta,
                     "cod_mensagem" => $cod_mensagem,
                     "mensagem" => $mensagem 
                 );
                $dados['mensagem'] = $mensagem;
                $this->load->view('cadastro_curso',$dados);
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
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('cadastro_curso');
                $this->load->view('includes/html_rodape_entidade');
                
            }
          //Verifica se o form passou nos testes de validação  
            if ($this->form_validation->run('cadastro_curso_form')==FALSE) {
        //         var_dump($this->input->post());
                
                      // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
                 $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
                 
                $data['alerta'] = $alerta;
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('cadastro_curso',$data);
                $this->load->view('includes/html_rodape_entidade');
            }else{
                
            	$data['nome'] = $this->input->post('titulo');
                $data['inscricao_ate'] = $this->input->post('inscricao_ate');
                $data['inicio'] = $this->input->post('data_inicio');
                $data['fim'] = $this->input->post('data_fim');
                $data['data_postagem'] = $this->input->post('data_postagem');
                $data['num_horas'] = $this->input->post('num_horas');
                $data['taxa_inscricao'] = $this->input->post('taxa_inscricao');
                $data['horario'] = $this->input->post('horario');
                $data['descricao'] = $this->input->post('descricao');
                $data['local'] = $this->input->post('local');
                $data['entidade_id_entidade'] = $this->input->post('id_entidade');
                $data['upload_foto'] = NULL;
                $data['video_youtube'] = $this->input->post('video');
            //    var_dump($data);
                    
                if ($this->curso->cadastrar($data) == TRUE){
                    
      // vou ler a ultima vaga cadastrada para a entidade para buscar o id_vaga
                        $query = $this->curso->get_max_curso_by_entidade($this->input->post('id_entidade'));
                    
            /*        echo "vaga_id_vaga = " .$query->id_vaga;
                    
                        $turno['tabela_assoc']= 2;
                        $turno['id_vaga_curso']= $query->id_curso;
                        $arrlength1 = 3;
                    for($indice = 0; $indice <  $arrlength1; $indice++) {
                        $turno['id_turno'] = $indice ; 
                        $turno['segunda'] = 0; 
                        $turno['terca'] = 0;
                        $turno['quarta'] = 0; 
                        $turno['quinta'] = 0; 
                        $turno['sexta'] = 0; 
                        $turno['sabado'] = 0; 
                        $turno['domingo'] = 0;
                        
                            
                        if ( $this->input->post('seg')[$indice]){
                             $turno['segunda'] = 1; 
                        }
                        if ( $this->input->post('terca')[$indice]){
                            $turno['terca'] = 1; 
                        }
                        if ( $this->input->post('quarta')[$indice]){
                             $turno['quarta'] = 1; 
                        }
                        if ( $this->input->post('quinta')[$indice]){
                             $turno['quinta'] = 1; 
                        }
                        if ( $this->input->post('sexta')[$indice]){
                             $turno['sexta'] = 1;       
                        }
                        if ( $this->input->post('sab')[$indice]){
                             $turno['sabado'] = 1;
                        }            
                        if ( $this->input->post('dom')[$indice]){
                             $turno['domingo'] = 1;
                        }  
                            // grava o registro do turno
                        $this->turno->cadastrar($turno);
                    } */
                       
                        $data['msg'] = "Curso Cadastrado com Sucesso";
                        $this->load->view('includes/msg_sucesso',$data);
                        $mensagem = "Vaga Cadastrada com Sucesso";
                        $data['mensagem'] = $mensagem;
                        $this->load->view('cadastro_curso',$data);
                        $this->load->view('includes/html_rodape_entidade');
                        
               } else{
                   redirect('cadastro_curso/cadastro/2');
                 
               }
            }
            
	}
        public function delete($id_curso =null){
            if ($id_curso != null){
                if ($this->curso->delete_curso($id_curso) == FALSE){
                        $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Não conseguiu apagar o Registro do Curso <br>" 
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
                            "mensagem" => "Vaga não identificada <br>" 
                             );
                        $dados = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL 
                 );
            }                 
                     
            $id_entidade = NULL;
            $id_entidade = $this->session->userdata('id_entidade');
            $data['cursos'] = $this->curso->get_curso_by_entidade_id_entidade($id_entidade);
            // redirect('cadastro_entidade/index/3');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('cursos',$data);
            $this->load->view('includes/html_rodape_entidade');
    
     }  
     public function altera_curso($id_curso =null){
            $alerta = NULL;
            $data = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL
            );
            if ($id_curso != null){
                $query = $this->curso->select_curso($id_curso) ;
                if ($query->num_rows() == 1){
                $data['curso'] = $query->row(0,'curso') ;
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
            $this->load->view('alterar_curso',$data);
            $this->load->view('includes/html_rodape_entidade');
     }  
      public function volta_curso()
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
            $data['cursos'] = $this->curso->get_curso_by_entidade_id_entidade($id_entidade);
                   // redirect('cadastro_entidade/index/3');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('cursos',$data);
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
                        
                        $query = $this->curso->get_max_curso_by_entidade($id_entidade)->row();
                        $id_curso = $query->id_curso;
                        echo "curso = ".$id_curso;
                        var_dump($query);
                        $data = array(
                            'id_curso' => $query->id_curso  ,
                            'id_nome' => $query->nome,
                            'inscricao_ate' => $query->inscricao_ate,
                            'inicio' => $query->inicio,
                            'fim' => $query->fim,
                            'data_postagem' => $query->data_postagem,
                            'num_horas' => $query->num_horas,
                            'taxa_inscricao' => $query->taxa_inscricao,
                            'horario' => $query->horario,
                            'descricao' => $query->descricao,
                            'local' => $query->local,
                            'entidade_id_entidade' => $query->entidade_id_entidade,
                            '´upload_foto' => $file_info,
                            'video_youtube' => $query->video_youtube);
                        if ($this->curso->alterar($id_curso,$data) != TRUE){
                            echo"erro";
                        }
                        
                        
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
       
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
