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
                $this->load->model('turno', 'turno');
                $this->load->model('entidade', 'entidade');
       // Ferramenta de debug profile - nativa do codeigniter         
                $this->output->enable_profiler(TRUE);
                        
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
                $this->load->view('includes/html_menu_entidade');
                $alerta = NULL;
                $cod_mensagem = $indice; 
                $mensagem = NULL;
                if ($indice==1){
                   $data['msg'] = "Vaga Cadastrada com Sucesso";
                   $mensagem = "Vaga Cadastrada com Sucesso";
                   $this->load->view('includes/msg_sucesso',$data); 
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar a Vaga"; 
                   $mensagem = "Não foi possivel cadastrar a Vaga"; 
                    $this->load->view('includes/msg_erro',$data);
                }
                $dados = array(
                     "alerta" => $alerta,
                     "cod_mensagem" => $cod_mensagem,
                     "mensagem" => $mensagem 
                 );
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
      //       echo "dados do formulario";
     //        var_dump($this->input->post());
     //        echo "========================================================================"; 
       /*      if($this->input->post('entrar')== "Incluir Vaga"){
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
            $mensagem = null;
            $cod_mensagem = null;
            if($this->input->post('captcha')){
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('cadastro_vaga');
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
                
            	$data['vaga_de'] = $this->input->post('vaga_de');
                $data['descricao'] = $this->input->post('descricao');
                $data['data_inicio'] = $this->input->post('data_inicio');
                $data['data_fim'] = $this->input->post('data_fim');
                $data['numero_horas'] = $this->input->post('numero_horas');
                $data['tipo_carga_horaria'] = $this->input->post('tipo_carga_horaria');
                $data['comprometimento'] = $this->input->post('comprometimento');
                $data['tipo_compromisso'] = $this->input->post('tipo_compromisso');
                $data['data_postagem'] = $this->input->post('data_postagem');
                $data['numero_vagas'] = $this->input->post('numero_vagas');
                $data_ent['entidade_id_entidade'] = $this->input->post('id_entidade');
                $data['entidade_id_entidade'] = $this->input->post('id_entidade');
                $data['atividade_id_area'] = $this->input->post('area');
                $data_ent['atividade_id_area'] = $this->input->post('area');
                $data['atividade_id_atividade_projeto'] = $this->input->post('atividade');
                $data_ent['atividade_id_atividade_projeto'] = $this->input->post('atividade');
                $data['perfil_voluntario'] = $this->input->post('perfil_voluntario');
      //           pd($this->input->post('seg[]'));
                
         // verifica a se area e atividade são compativeis pela tabela  de atvidades
                if ($this->vaga->get_atividade($this->input->post('area'),$this->input->post('atividade'))== FALSE){
                    $alerta = array(
                        "class"=>"danger",
                        "mensagem" => "Area e Atividade incompativeis<br>" 
                        );
          //          var_dump($dados);
                }else{
                    if ($this->vaga->get_entidade_has_atividade($this->input->post('id_entidade'),$this->input->post('area'),$this->input->post('atividade'))):
                        if ($this->vaga->insert_entidade_has_atividade($data_ent) == FALSE):
                            $alerta = array(
                                "class"=>"danger",
                                "mensagem" => "Erro na base de dados <br>" 
                             );
                        endif;
                    endif;
                    if ($this->vaga->cadastrar($data) == TRUE){
      // vou ler a ultima vaga cadastrada para a entidade para buscar o id_vaga
                        $query = $this->vaga->get_max_vaga_by_entidade($this->input->post('id_entidade'));
                      var_dump($query);
            //          exit;
            //        echo "vaga_id_vaga = " .$query->id_vaga;
                    
                        $turno['tabela_assoc']= 1;
                        $turno['id_vaga_curso']= $query->id_vaga;
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
                    redirect('cadastro_vaga/cadastro/1');                     
               } 
            }
            $data['alerta'] =  $alerta;
            $data['cod_mensagem'] =  $cod_mensagem;
            $data['mensagem'] = $mensagem;
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('cadastro_vaga',$data);
            $this->load->view('includes/html_rodape_entidade');
        }
            
	}
        public function delete($id_vaga =null){
            $alerta = NULL;
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
                }else{
                    $tabela = 1;
                    if ($this->turno->delete_vaga($id_vaga,$tabela)== FALSE){
                         $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Não conseguiu apagar o Registro de turno <br>" 
                             );
                        $dados = array(
                        "alerta" => $alerta,
                        "cod_mensagem" => NULL,
                        "mensagem" => NULL 
                        );    
                    }
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
            $data['mensagem'] = NULL;
            $id_entidade = $this->session->userdata('id_entidade');
            $data['entidade'] = $this->entidade->get_id($id_entidade)->row();
            $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
            $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row();
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
                $data['mensagem'] = NULL;
                $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
                $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row(); 
                
                $data['entidade'] = $this->entidade->get_id($id_entidade)->row();
              //  var_dump($data['entidade']);
                   // redirect('cadastro_entidade/index/3');
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('inicio_entidade',$data);
                $this->load->view('includes/html_rodape_entidade');
            
	}
       
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
