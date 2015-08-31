<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Altera_curso extends CI_Controller {

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
                $this->load->library('upload');
                        
         }	
	public function index($id_curso =null)
	{       
            $alerta = NULL;
            $cod_mensagem = null;
            $mensagem = null;
            if ($id_curso != null){
                $query = $this->curso->select_curso($id_curso) ;
                if ($query->num_rows() == 1){
                    $data['curso'] = $query->row(0,'curso') ;
                }else {
                    $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Curso não identificado <br>" 
                             );
                    $data['alerta'] =  $alerta;
                    $this->load->view('includes/html_header');
                    $this->load->view('includes/html_menu_entidade');
                    $this->load->view('altera_curso',$data);
                    $this->load->view('includes/html_rodape_entidade');
                }
            }else{
                $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Curso não identificado <br>" 
                             );
            } 
            $tabela = 2;
            $query = $this->turno->select_turno_vaga($id_curso,$tabela);
            
            if ($query->num_rows() > 0){
                $data['turno'] = $query->row();
            //    var_dump($data['turno_vaga']);
            //    exit;
            } 
            $data['alerta'] =  $alerta;
            $data['cod_mensagem'] =  $cod_mensagem;
            $data['mensagem'] =  $mensagem;
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('altera_curso',$data);
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
                'data_postagem' => $this->input->post('data_postagem'),
                'numero_vagas' => $this->input->post('numero_vagas'),
                'entidade_id_entidade' => $this->input->post('id_entidade'),
                'atividade_id_area' => $this->input->post('area'),
                'atividade_id_atividade_projeto' => $this->input->post('atividade'),
                'perfil_voluntario' => $this->input->post('perfil_voluntario')
                );
                $id_curso = $this->input->post('id_curso');
         // verifica a se area e atividade são compativeis pela tabela  de atvidades
                // var_dump($this->input->post());
                $tabela = 1;
                
                if ($this->curso->alterar_curso($id_curso,$data1) == TRUE){
                    $query = $this->curso->select_vaga($id_curso) ;
                    if ($query->num_rows() == 1){
                    $data['curso'] = $query->row(0,'curso') ;
                     }
                    if ($this->turno->select_vaga($id_curso, $tabela) == TRUE) {
                        
                        if ($this->turno->delete_vaga($id_curso, $tabela) == FALSE) { 
                           $alerta = array(
                           "class"=>"danger",
                    "mensagem" => "Atenção falha no delete do banco<br>" . validation_errors()
                           );
                        }
      // vou ler a ultima vaga cadastrada para a entidade para buscar o id_curso
                       
            //        var_dump($query);
            //        exit;
            //        echo "vaga_id_curso = " .$query->id_curso;
                    }
                    
                    $turno['tabela_assoc']= 1;
                        $turno['id_vaga_curso']= $id_curso;
                        $arrlength2 = 3;
                        $arrlength1 = 8;
                        for($indice1 = 1; $indice1 <  $arrlength1; $indice1++) {
                            $turno['id_turno'] = $indice1;
                            $turno['dia_da_semana'] = $indice1;
                            $turno['manha'] = 0;
                            $turno['tarde'] = 0;
                            $turno['manha'] = 0;
                            for($indice2 = 0; $indice2 <  $arrlength2; $indice2++) {
                                if ($indice1 == 1){ // segunda
                                    if ( $this->input->post('seg')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 2){ // terça
                                    if ( $this->input->post('terca')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 3){ // quarta
                                    if ( $this->input->post('quarta')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 4){ // quinta
                                    if ( $this->input->post('quinta')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 5){ // sexta
                                    if ( $this->input->post('sexta')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 6){ // sabado
                                    if ( $this->input->post('sab')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $turno['noite'] = 1;
                                        }
                                    }
                                }
                                if ($indice1 == 7){ // segunda
                                    if ( $this->input->post('dom')[$indice2]){
                                        if ($indice2 == 0){ 
                                            $turno['manha'] = 1;
                                        }
                                        if ($indice2 == 1){ 
                                            $turno['tarde'] = 1;
                                        }
                                        if ($indice2 == 2){ 
                                            $turno['noite'] = 1;
                                        }
                                    }
                                }
                            }
                            // grava o registro do dia 
                            $this->turno->cadastrar($turno);
                        }
                     $mensagem = "Vaga Alterada com Sucesso";
               } else{
                   $alerta = array(
                           "class"=>"danger",
                    "mensagem" => "Atenção erro na atualização do registro<br>" . validation_errors()
                        );
                    }
            }
            $data['alerta'] =  $alerta;
            $data['cod_mensagem'] =  $cod_mensagem;
            $data['mensagem'] = $mensagem;
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('alterar_curso',$data);
            $this->load->view('includes/html_rodape_entidade');
            
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
