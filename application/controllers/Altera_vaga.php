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
                $this->load->model('vaga_turno', 'vaga_turno');
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                $this->load->library('upload');
                        
         }
	public function index()
	{       
		$this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('alterar_vaga');
                                
	}
        public function altera()
	{  
            
            $this->lang->load('form_validation','portuguese');
            $alerta = null;
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
                 
                 $dados = array(
                     "alerta" => $alerta,
                     "cod_mensagem" => NULL,
                     "mensagem" => NULL 
                 );
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('alterar_vaga',$dados);
                $this->load->view('includes/html_rodape_entidade');
            }else{
                
                $data = array(
            	'vaga_de' => $this->input->post('vaga_de'),
                'descricao' => $this->input->post('descricao'),
                'data_inicio' => $this->input->post('data_inicio'),
                'data_fim' => $this->input->post('data_fim'),
                'numero_horas' => $this->input->post('numero_horas'),
                'tipo_carga_horaria' => $this->input->post('tipo_carga_horaria'),
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
                if ($this->vaga->alterar_vaga($id_vaga,$data) == TRUE){
                    if ($this->vaga_turno->select_vaga($id_vaga, $tabela) == TRUE) {
                        if ($this->vaga_turno->delete_vaga($id_vaga, $tabela) == FALSE) { 
                           $alerta = array(
                           "class"=>"danger",
                    "mensagem" => "Atenção falha no delete do banco<br>" . validation_errors()
                        );
                 
                            $dados = array(
                            "alerta" => $alerta,
                            "cod_mensagem" => NULL,
                            "mensagem" => NULL 
                        );
                        $this->load->view('includes/html_header');
                        $this->load->view('includes/html_menu_entidade');
                        $this->load->view('alterar_vaga',$dados);
                        $this->load->view('includes/html_rodape_entidade');
                    }
      // vou ler a ultima vaga cadastrada para a entidade para buscar o id_vaga
                       
            //        var_dump($query);
            //        exit;
            //        echo "vaga_id_vaga = " .$query->id_vaga;
                    
                        $vaga_turno['vaga_id_vaga']= $id_vaga;
                      
                     
                        $arrlength2 = 3;
                        $arrlength1 = 8;
                        for($indice1 = 1; $indice1 <  $arrlength1; $indice1++) {
                            $vaga_turno['dia_da_semana'] = $indice1;
                            $vaga_turno['manha'] = 0;
                            $vaga_turno['tarde'] = 0;
                            $vaga_turno['manha'] = 0;
                            for($indice2 = 0; $indice2 <  $arrlength2; $indice2++) {
                                if ($indice1 == 1){ // segunda
                                    if ( $this->input->post('seg')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $vaga_turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $vaga_turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $vaga_turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 2){ // terça
                                    if ( $this->input->post('terca')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $vaga_turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $vaga_turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $vaga_turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 3){ // quarta
                                    if ( $this->input->post('quarta')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $vaga_turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $vaga_turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $vaga_turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 4){ // quinta
                                    if ( $this->input->post('quinta')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $vaga_turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $vaga_turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $vaga_turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 5){ // sexta
                                    if ( $this->input->post('sexta')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $vaga_turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $vaga_turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $vaga_turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 6){ // sabado
                                    if ( $this->input->post('sab')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $vaga_turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $vaga_turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $vaga_turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 7){ // segunda
                                    if ( $this->input->post('dom')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $vaga_turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $vaga_turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $vaga_turno['noite'] = 1;
                                        }
                                    }
                                }
                            }
                            // escrever novamente o  registro
                            
                            $vaga_turno['id_vaga_turno'] = $indice1;
                            $this->vaga_turno->cadastrar($vaga_turno);
                        } 
                    $this->load->view('includes/html_header');
                    $data['msg'] = "Vaga Alterada com Sucesso";
                    $this->load->view('includes/msg_sucesso',$data);
                    $this->load->view('includes/html_menu_entidade');
                    $this->load->view('alterar_vaga',$data);
                    $this->load->view('includes/html_rodape_entidade');
               } else{
                   $this->load->view('includes/html_header');
                   $data['msg'] = "Não foi possivel alterar a Vaga"; 
                   $this->load->view('includes/msg_erro',$data);
                   $this->load->view('includes/html_menu_entidade');
                   $this->load->view('alterar_vaga',$data);
                   $this->load->view('includes/html_rodape_entidade');
                 
                }
                
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
            // redirect('cadastro_entidade/index/3');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('inicio_entidade',$data);
            $this->load->view('includes/html_rodape_entidade');
    
     }  
/*     public function altera_vaga($id_vaga =null){
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
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL
                 );
            } 
            
           $query = $this->vaga_turno->select_vaga($id_vaga);
            
            if ($query->num_rows() > 0){
                $data['turno_vaga'] = $query->row();
            //    var_dump($data['turno_vaga']);
            //    exit;
            } var_dump($this->input->post());
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('alterar_vaga',$data);
            $this->load->view('includes/html_rodape_entidade');
     } */ 
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
