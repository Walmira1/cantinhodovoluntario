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
               
                        
         }	
	public function index($id_curso =null)
	{       
            $alerta = NULL;
            $cod_mensagem = null;
            $mensagem = null;
            $data['turno'] = NULL;
            if ($id_curso != null){
                $query = $this->curso->get_curso($id_curso) ;
                if ($query->num_rows() == 1){
                    $data['curso'] = $query->row(0,'curso') ;
                }else {
                    $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Curso não identificado <br>" 
                             );
                    $data['alerta'] =  $alerta;
                    
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
                $data['turno'] = $query->result();
            //    var_dump($data['turno_vaga']);
            //    exit;
            } else {
                $data['turno'] = NULL;
            }
            $data['alerta'] =  $alerta;
            $data['cod_mensagem'] =  $cod_mensagem;
            $data['mensagem'] =  $mensagem;
            $this->load->view('altera_curso',$data);
            $this->load->view('includes/html_rodape_entidade');
        }  
        public function altera()
	{  
        //      var_dump($this->input->post());
        //    exit;
            $alerta = NULL;
            $cod_mensagem = null;
            $mensagem = null;
            $data['turno'] = NULL;
            $this->lang->load('form_validation','portuguese');
            if($this->input->post('captcha')){

                $this->load->view('altera_curso');
                $this->load->view('includes/html_rodape_entidade');
                
            }
          //Verifica se o form passou nos testes de validação  
            if ($this->form_validation->run('altera_curso_form')==FALSE) {
                      // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
                 $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
            }else{
                $query = $this->curso->get_curso($this->input->post('id_curso')) ;
                if ($query->num_rows() == 1){
                         $data['curso'] = $query->row(0,'curso') ;
                }
                $data1 = null;
                $data1 = array(
                'id_curso' => $this->input->post('id_curso'),
            	'nome' => $this->input->post('titulo'),
                'inscricao_ate' => $this->input->post('inscricao_ate'),
                'inicio' => $this->input->post('data_inicio'),
                'fim' => $this->input->post('data_fim'),
                'data_postagem' => $this->input->post('data_postagem'),
                'num_horas' => $this->input->post('num_horas'),
                'taxa_inscricao' => $this->input->post('taxa_inscr'),
                'horario'=> $this->input->post('horario'),
                'descricao' => $this->input->post('descricao'),
                'local' => $this->input->post('local'),
                'entidade_id_entidade' => $this->input->post('id_entidade'),
                'upload_foto' => $this->input->post('upload_foto'),
                'video_youtube'=>  $this->input->post('video')
                );
                $id_curso = $this->input->post('id_curso');
                if ($this->curso->alterar($id_curso,$data1) == TRUE){
                    $query = $this->curso->get_curso($id_curso) ;
                    if ($query->num_rows() == 1){
                         $data['curso'] = $query->row(0,'curso') ;
                     }
                     $tabela = 2;
                     if ($this->turno->delete_vaga($id_curso, $tabela) == FALSE) { 
                    /*       $alerta = array(
                           "class"=>"danger",
                    "mensagem" => "Atenção falha no delete do banco<br>" 
                           );*/
                        }
      
                    $turno['tabela_assoc']= 2;
                        $turno['id_vaga_curso']= $id_curso;
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
                            // grava o registro do turno
                        $this->turno->cadastrar($turno);
                    } 
                     $mensagem = "Curso Alterado com Sucesso";
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

            $this->load->view('altera_curso',$data);
            $this->load->view('includes/html_rodape_entidade');
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
