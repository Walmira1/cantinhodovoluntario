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
                $this->load->model('entidade', 'entidade');
           //     $this->output->enable_profiler(TRUE);
               
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
            /*    foreach ($turno as $turno){
                    $dados = array(
                            'id_entidade' => $query->id_entidade,
                            'logotipo_entidade' => $query->logotipo_entidade,
                            'upload_foto' => $query->upload_foto,
                            'site_entidade' => $query->site_entidade,
                            'user_nome' => $query->nome,
                            'user_logado' => TRUE
                           
                        );
                }*/
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
                // pd($this->input->post('seg'));
                $id_vaga = $this->input->post('id_vaga');
                $id_entidade = $this->input->post('id_entidade');
         // verifica a se area e atividade são compativeis pela tabela  de atvidades
                // var_dump($this->input->post());
                $tabela = 1;
                
                if ($this->vaga->alterar_vaga($id_vaga,$data1) == TRUE){
                    $mensagem = "vaga alterada com sucesso";
                }    
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
               //     pd($this->input->post('terca'));
                    $turno['tabela_assoc']= 1;
                        $turno['id_vaga_curso']= $id_vaga;
                        $arrlength1 = 4;
                            for($indice = 1; $indice <  $arrlength1; $indice++) {
                                $turno['id_turno'] = $indice; 
                                $turno['segunda'] = 0; 
                                $turno['terca'] = 0;
                                $turno['quarta'] = 0; 
                                $turno['quinta'] = 0; 
                                $turno['sexta'] = 0; 
                                $turno['sabado'] = 0; 
                                $turno['domingo'] = 0;
                                for($ind = 0; $ind < count($this->input->post('seg')); $ind++){
                                    if ($this->input->post('seg')[$ind] == $indice){
                                         $turno['segunda'] = 1;
                                         $ind = 3;
                                    }else{
                                        $turno['segunda'] = 0;
                                    } 
                                }
                                for($ind = 0; $ind < count($this->input->post('terca')); $ind++){
                                    if ($this->input->post('terca')[$ind] == $indice){
                                         $turno['terca'] = 1;
                                         $ind = 3;
                                    }else{
                                        $turno['terca'] = 0;
                                    } 
                                }
                                for($ind = 0; $ind < count($this->input->post('quarta')); $ind++){
                                    if ($this->input->post('quarta')[$ind] == $indice){
                                         $turno['quarta'] = 1;
                                         $ind = 3;
                                    }else{
                                        $turno['quarta'] = 0;
                                    } 
                                }
                                for($ind = 0; $ind < count($this->input->post('quinta')); $ind++){
                                    if ($this->input->post('quinta')[$ind] == $indice){
                                         $turno['quinta'] = 1;
                                         $ind = 3;
                                    }else{
                                        $turno['quinta'] = 0;
                                    } 
                                }
                                for($ind = 0; $ind < count($this->input->post('sexta')); $ind++){
                                    if ($this->input->post('sexta')[$ind] == $indice){
                                         $turno['sexta'] = 1;
                                         $ind = 3;
                                    }else{
                                        $turno['sexta'] = 0;
                                    } 
                                }
                                for($ind = 0; $ind < count($this->input->post('sab')); $ind++){
                                    if ($this->input->post('sab')[$ind] == $indice){
                                         $turno['sabado'] = 1;
                                         $ind = 3;
                                    }else{
                                        $turno['sabado'] = 0;
                                    } 
                                }
                                for($ind = 0; $ind < count($this->input->post('dom')); $ind++){
                                    if ($this->input->post('dom')[$ind] == $indice){
                                         $turno['domingo'] = 1;
                                         $ind = 3;
                                    }else{
                                        $turno['domingo'] = 0;
                                    } 
                                }
                            // grava o registro do dia 
                            $this->turno->cadastrar($turno);
                        } 
                                
            } 
               
           
            $data['alerta'] =  $alerta;
            $data['cod_mensagem'] =  $cod_mensagem;
            $data['mensagem'] = $mensagem;
            $query = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
            $data['vagas'] = $query;
            $query = $this->entidade->get_id($id_entidade);
            $data['entidade'] = $query->row();
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
     public function volta_entidade()
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
            $data['entidade'] = $this->entidade->get_id($id_entidade); 
            $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
            $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row(); 
                   // redirect('cadastro_entidade/index/3');
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('inicio_entidade',$data);
                $this->load->view('includes/html_rodape_entidade');
            
	}

        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
