<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_vaga extends CI_Controller {

    	public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('vaga', 'vaga');
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                $this->load->library('upload');
                        
         }	
        public function index($indice=null)
	{       
		$this->load->view('includes/html_header');
               
                if ($indice==1){
                    
                   $data['msg'] = "Vaga Cadastrada com Sucesso";
                   $this->load->view('includes/msg_sucesso',$data); 
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar a Vaga"; 
                    $this->load->view('includes/msg_erro',$data);
                }
               $this->load->view('inicio_entidade',$data);
               $this->load->view('includes/html_rodape_entidade');
               
                                
	}
        public function cadastro()
	{       
		$this->load->view('includes/html_header');
                $this->load->view('cadastro_vaga');
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
            var_dump($this->input->post());
             if($this->input->post('entrar')== "entrar"){
                 echo "o formulario foi submetido";
                 exit;
             }
            $this->lang->load('form_validation','portuguese');
            
           
       
          //Verifica se o form passou nos testes de validação  
     /*      if ($this->form_validation->run('cadastro_vaga_form')==FALSE) {
                $this->load->view('includes/html_header');
                $this->load->view('cadastro_vaga');
                $this->load->view('includes/html_rodape_entidade');
            }else{*/
                echo "sem erro";
            	$data['vaga_de'] = $this->input->post('vaga_de');
                echo "  ";
                echo $this->input->post('vaga_de');
                echo "  ";
                $data['descricao'] = $this->input->post('descricao');
                echo "  ";
                echo $this->input->post('descricao');
                $data['data_inicio'] = $this->input->post('data_inicio');
                echo "  ";
                echo $this->input->post('data_inicio');
                $data['data_fim'] = $this->input->post('data_fim');
                echo "  ";
                echo $this->input->post('data_fim');
                $data['numero_horas'] = $this->input->post('numero_horas');
                echo "  ";
                $data['tipo_carga_horaria'] = $this->input->post('tipo_carga_horaria');
                echo "  ";
                echo $this->input->post('numero_horas');
                $data['data_postagem'] = $this->input->post('data_postagem');
                echo "  ";
                echo $this->input->post('data_postagem');
                $data['numero_vagas'] = $this->input->post('numero_vagas');
           //     $data['dias_semana'] = $this->input->post('dias_semana');
               // $data['entidades_id_entidades'] = $this->input->post('username');
                $data_ent['entidades_id_entidades'] = 1;
                $data['entidades_id_entidades'] = 1;
                $data['atividades_id_area'] = $this->input->post('area');
                $data_ent['atividades_id_area'] = $this->input->post('area');
                $data['atividades_id_atividade_projeto'] = $this->input->post('atividade');
                $data_ent['atividades_id_atividade_projeto'] = $this->input->post('atividade');
                $data['perfil_voluntario'] = $this->input->post('perfil_voluntario');
                if ($this->vaga->cadastrar($data,$data_ent) == TRUE){
                      redirect('cadastro_vaga/index/1');
               } else{
                   redirect('cadastro_vaga/index/2');
                 
                }
                
          // }    
            
	}
       
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
