<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Altera_vaga extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
         public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('vaga', 'vaga');
                $this->load->model('turno', 'turno');
               
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
               
                        
         }
	public function index($id_vaga =null)
	{       
            $alerta = NULL;
            $cod_mensagem = null;
            $mensagem = null;
            if ($id_vaga != null){
                $query = $this->vaga->select_vaga($id_vaga) ;
                if ($query->num_rows() == 1){
                    $data['vaga'] = $query->row(0,'vaga') ;
                }else {
                    $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Vaga não identificada <br>" 
                             );
                    $data['alerta'] =  $alerta;
                    $this->load->view('includes/html_header');
                    $this->load->view('includes/html_menu_entidade');
                    $this->load->view('alterar_vaga',$data);
                    $this->load->view('includes/html_rodape_entidade');
                }
            }else{
                $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Vaga não identificada <br>" 
                             );
            } 
            $tabela = 1;
            $query = $this->turno->select_turno_vaga($id_vaga,$tabela);
            
            if ($query->num_rows() > 0){
                $data['turno'] = $query->result();
           //     var_dump($data['turno']);
           //     exit;
            }else{
                $data['turno'] = NULL;
            }
            $data['alerta'] =  $alerta;
            $data['cod_mensagem'] =  $cod_mensagem;
            $data['mensagem'] =  $mensagem;
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('alterar_vaga',$data);
            $this->load->view('includes/html_rodape_entidade');
        }  
        public function altera()
	{  
            $alerta = NULL;
            $cod_mensagem = null;
            $mensagem = null;
            $this->lang->load('form_validation','portuguese');
            if($this->input->post('captcha')){
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('alterar_vaga');
                $this->load->view('includes/html_rodape_entidade');
                
            }
          //Verifica se o form passou nos testes de validação  
            if ($this->form_validation->run('cadastro_vaga_form')==FALSE) {
                      // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
                 $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
            }else{
                $data1 = null;
                $data1 = array(
            	'vaga_de' => $this->input->post('vaga_de'),
                'descricao' => $this->input->post('descricao'),
                'data_inicio' => $this->input->post('data_inicio'),
                'data_fim' => $this->input->post('data_fim'),
                'numero_horas' => $this->input->post('numero_horas'),
                'tipo_carga_horaria' => $this->input->post('tipo_carga_horaria'),
                'comprometimento' => $this->input->post('comprometimento'),
                'tipo_compromisso' => $this->input->post('tipo_compromisso'),
                'data_postagem' => $this->input->post('data_postagem'),
                'numero_vagas' => $this->input->post('numero_vagas'),
                'entidade_id_entidade' => $this->input->post('id_entidade'),
                'atividade_id_area' => $this->input->post('area'),
                'atividade_id_atividade_projeto' => $this->input->post('atividade'),
                'perfil_voluntario' => $this->input->post('perfil_voluntario')
                );
                $id_vaga = $this->input->post('id_vaga');
         // verifica a se area e atividade são compativeis pela tabela  de atvidades
                // var_dump($this->input->post());
                $tabela = 1;
                
                if ($this->vaga->alterar_vaga($id_vaga,$data1) == TRUE){
                    $query = $this->vaga->select_vaga($id_vaga) ;
                    if ($query->num_rows() == 1){
                    $data['vaga'] = $query->row(0,'vaga') ;
                     }
                    if ($this->turno->select_vaga($id_vaga, $tabela) == TRUE) {
                        
                        if ($this->turno->delete_vaga($id_vaga, $tabela) == FALSE) { 
                           $alerta = array(
                           "class"=>"danger",
                    "mensagem" => "Atenção falha no delete do banco<br>" . validation_errors()
                           );
                        }
      // vou ler a ultima vaga cadastrada para a entidade para buscar o id_vaga
                       
             //       var_dump($this->input->post('dias_semana'));
            //        exit;
            //        echo "vaga_id_vaga = " .$query->id_vaga;
                    }
                    
                    $turno['tabela_assoc']= 1;
                    $turno['id_vaga_curso']= $id_vaga;
                        $arrlength1 = 3;
                            for($indice = 0; $indice <  $arrlength1; $indice++) {
                                $turno['id_turno'] = $indice + 1; 
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
                            
                            // grava o registro do dia 
                            $this->turno->cadastrar($turno);
                        } 
               } else{
                   $alerta = array(
                           "class"=>"danger",
                    "mensagem" => "Atenção erro na atualização do registro<br>" 
                        );
                    }
            }
            $data['alerta'] =  $alerta;
            $data['cod_mensagem'] =  $cod_mensagem;
            $data['mensagem'] = $mensagem;
            $id_entidade = NULL;
            $id_entidade = $this->session->userdata('id_entidade');
            $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
            $data['entidade'] = $this->entidade->get_id($id_entidade)->row();
            $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row();
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('inicio_entidade',$data);
            $this->load->view('includes/html_rodape_entidade');
            
	}
        public function delete($id_vaga =null){
            if ($id_vaga != null){
                if ($this->vaga->delete_vaga($id_vaga) == FALSE){
                        $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Não conseguiu apagar o Registro de vaga <br>" 
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
            $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
            $data['entidade'] = $this->entidade->get_id($id_entidade)->row();
            $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row();
            // redirect('cadastro_entidade/index/3');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            if ($alerta == NULL){
                $dados['msg'] = "Vaga apagada com Sucesso";
                $this->load->view('includes/msg_sucesso',$dados); 
            }
            $this->load->view('inicio_entidade',$data);
            $this->load->view('includes/html_rodape_entidade');
     }  

        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
