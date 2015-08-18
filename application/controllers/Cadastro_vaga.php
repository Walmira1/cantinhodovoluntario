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
               $this->load->view('includes/html_menu_entidade');
               $this->load->view('inicio_entidade',$data);
               $this->load->view('includes/html_rodape_entidade');
               
                                
	}
        public function cadastro($indice=null)
	{       $this->load->view('includes/html_header');
                $alerta = NULL;
                     $dados = array(
                     "alerta" => $alerta
                    );
                $this->load->view('includes/html_menu_entidade');
                if ($indice==1){
                    
                   $data['msg'] = "Vaga Cadastrada com Sucesso";
                   $this->load->view('includes/msg_sucesso',$data); 
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar a Vaga"; 
                    $this->load->view('includes/msg_erro',$data);
                }
                $this->load->view('cadastro_vaga',$dados);
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
         //   var_dump($this->input->post());
        //     if($this->input->post('entrar')== "Incluir Vaga"){
        //         echo "o formulario foi submetido";
        //         exit;
        //     }
            $this->lang->load('form_validation','portuguese');
            $alerta = null;
            if($this->input->post('captcha')){
                $this->load->view('includes/html_header');
                $this->load->view('cadastro_vaga');
                $this->load->view('includes/html_rodape_entidade');
                redirect('cadastro_entidade/cadastro');
            }
          //Verifica se o form passou nos testes de validação  
            if ($this->form_validation->run('cadastro_vaga_form')==FALSE) {
                      // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
                 $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
                 $dados = array(
                 "alerta" => $alerta
                 );
                $this->load->view('includes/html_header');
                
                $this->load->view('cadastro_vaga',$dados);
                $this->load->view('includes/html_rodape_entidade');
            }else{
                
            	$data['vaga_de'] = $this->input->post('vaga_de');
                $data['descricao'] = $this->input->post('descricao');
                $data['data_inicio'] = $this->input->post('data_inicio');
                $data['data_fim'] = $this->input->post('data_fim');
                $data['numero_horas'] = $this->input->post('numero_horas');
                $data['tipo_carga_horaria'] = $this->input->post('tipo_carga_horaria');
                $data['data_postagem'] = $this->input->post('data_postagem');
                $data['numero_vagas'] = $this->input->post('numero_vagas');
                $data['dias_semana'] = implode(',',$this->input->post('turno'));
               // $data['entidade_id_entidade'] = $this->input->post('username');
                $data_ent['entidade_id_entidade'] = $this->input->post('id_entidade');
                $data['entidade_id_entidade'] = $this->input->post('id_entidade');
                $data['atividade_id_area'] = $this->input->post('area');
                $data_ent['atividade_id_area'] = $this->input->post('area');
                $data['atividade_id_atividade_projeto'] = $this->input->post('atividade');
                $data_ent['atividade_id_atividade_projeto'] = $this->input->post('atividade');
                $data['perfil_voluntario'] = $this->input->post('perfil_voluntario');
         // verifica a se area e atividade são compativeis pela tabela  de atvidades
                if ($this->vaga->get_atividade($this->input->post('area'),$this->input->post('atividade'))== FALSE){
                    $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Area e Atividade incompativeis<br>" 
                             );
                    $dados = array(
                     "alerta" => $alerta
                    );
                    $this->load->view('includes/html_header');
                    $this->load->view('cadastro_vaga',$dados);
                    $this->load->view('includes/html_rodape_entidade');
                }
                if ($this->vaga->get_entidade_has_atividade($this->input->post('id_entidade'),$this->input->post('area'),$this->input->post('atividade'))){
                    if ($this->vaga->insert_entidade_has_atividade($data_ent) == FALSE){
                        $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Erro na base de dados <br>" 
                             );
                        $dados = array(
                         "alerta" => $alerta
                        );
                        $this->load->view('includes/html_header');
                        $this->load->view('cadastro_vaga',$dados);
                        $this->load->view('includes/html_rodape_entidade');
                    }
                }
                if ($this->vaga->cadastrar($data) == TRUE){
                    redirect('cadastro_vaga/cadastro/1');
               } else{
                   redirect('cadastro_vaga/cadastro/2');
                 
                }
                
            }    
            
	}
        public function delete($id_vaga =null){
            if ($id_vaga != null){
                if ($this->vaga->delete_vaga($id_vaga) == FALSE){
                        $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Não conseguiu apagar o Registro de vaga <br>" 
                             );
                        $dados = array(
                          "alerta" => $alerta
                        );
                }
            }else{
                $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Vaga não identificada <br>" 
                             );
                        $dados = array(
                         "alerta" => $alerta
                        );
            }                 
                     
            $id_entidade = NULL;
            $id_entidade = $this->session->userdata('id_entidade');
            $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
            // redirect('cadastro_entidade/index/3');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('inicio_entidade',$data);
            $this->load->view('includes/html_rodape_entidade');
    
     }  
     public function altera_vaga($id_vaga =null){
            if ($id_vaga != null){
                $query = $this->vaga->select_vaga($id_vaga) ;
                if ($query->num_rows() == 1){
                $data['vaga'] = $query->row(0,'vaga') ;
                }       
            }else{
                $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Vaga não identificada <br>" 
                             );
                        $dados = array(
                         "alerta" => $alerta
                        );
            }   
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('alterar_vaga',$data);
            $this->load->view('includes/html_rodape_entidade');
     }  
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
