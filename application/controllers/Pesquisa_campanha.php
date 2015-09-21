<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pesquisa_campanha extends CI_Controller {

    	public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('campanha', 'campanha');
                $this->load->model('entidade', 'entidade');
                $this->load->model('vaga', 'vaga');
                $this->load->model('cidade', 'cidade');
                
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                
                        
         }	
        public function index($indice=null)
	{      
               $dados['campanhas'] = $this->campanha->get_all_campanha()->result();
               $this->load->view('includes/html_header');
               $this->load->view('includes/html_menu_voluntario');
               $this->load->view('pesquisa_campanha',$dados);
               $this->load->view('includes/html_rodape_voluntario');
               
                                
	}
        public function campanha($id_campanha=null)
	{       
            if ($id_campanha != NULL){
                $query = $this->campanha->get_campanha($id_campanha) ;
                if ($query->num_rows() == 1){
                    $data['campanha'] = $query->row(0,'campanha') ;
         //           var_dump($data['campanhas']);
        //        exit;
                    $id_entidade = $data['campanha']->entidade_id_entidade;
                    $query = $this->entidade->get_id($id_entidade);
                    if ($query->num_rows() == 1){
                        $data['entidade'] = $query->row(0,'entidade') ;
                    }
                    $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row();  
             //var_dump($data['sum_campanha']);
             //exit;
                }else {
                    $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Vaga não identificada <br>" 
                             );
                    $data['alerta'] =  $alerta;
                    // ver depois erro;
                   
                }
                
            }
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_voluntario');
            $this->load->view('saiba_mais_campanha',$data);
            $this->load->view('includes/html_rodape_voluntario');
                
                
                                
	}
        public function pesquisa()
	{   
        
            $this->lang->load('form_validation','portuguese');
            $alerta = null;
            $mensagem = null;
            $cod_mensagem = null;
            if($this->input->post('captcha')){
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('cadastro_campanha');
                $this->load->view('includes/html_rodape_entidade');
                
            }
            $data['atividade_id_area'] = $this->input->post('area');
            $data['atividade_id_atividade_projeto'] = $this->input->post('atividade');
            $data['tipo_carga_horaria'] = $this->input->post('tipo_carga_horaria');
            $data['numero_horas'] = $this->input->post('numero_horas');
            
            if (($this->input->post('area') == 0) &&
               ($this->input->post('atividade') == 0) &&
               ($this->input->post('tipo_carga_horaria') == 0) &&
               ($this->input->post('numero_horas') ==  null)    
            ){
            // busca todas as campanhas existentes
                    $query = $this->campanha->select_all_campanha() ;
                    if ($query->num_rows() > 0){
                        $data['campanhas'] = $query->result();
                    }
            }
        //        var_dump($dados['campanhas']);
        //        exit;
         // verifica a se area e atividade são compativeis pela tabela  de atvidades
            
            $data['cidades'] = $this->db->get('cidade')->result();
            $data['estados'] = $this->cidade->get_estado();
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_menu_entidade');
            $this->load->view('pesquisa_campanha',$data);
            $this->load->view('includes/html_rodape_entidade');
        }
            
	
      public function entidade($id_entidade=null)
	{   
            /* Pesquisa as campanhas para uma determinada entidade
        http://www.codeigniter.com/user_guide/libraries/form_validation.html?highlight=form%20validation#rule-reference
              */
             
             //var_dump($this->input->post());
            if($id_entidade != NULL){
                $alerta = null;
                $query = $this->entidade->get_id($id_entidade)->row();
                   
                   // redirect recarrega a página ou seja perdi o array dados  
                   // para não perder os dados crio uma variavel de sessão
                        $dados = array(
                            'id_entidade' => $query->id_entidade,
                            'logotipo_entidade' => $query->logotipo_entidade,
                            'upload_foto' => $query->upload_foto,
                            'site_entidade' => $query->site_entidade,
                            'user_nome' => $query->nome,
                            'user_logado' => NULL
                           
                        );
                $this->session->set_userdata($dados);
                $data['entidade'] = $query;
                $query = $this->campanha->select_all_campanha_entidade($id_entidade);
                if ($query->num_rows() > 0){
                        $data['campanhas'] = $query->result();
                        $query = $this->vaga->select_sum_vaga($id_entidade); 
                        $data['sum_vaga'] = $query->row();
                        
                }else{
                    $data['campanhas'] = NULL;
                    $data['sum_vaga'] = NULL;
                }
                               
             //   var_dump($data['sum_campanha']);
             //   exit;
                $this->load->view('includes/html_header_mapa');
                $this->load->view('includes/html_menu_voluntario');
                $this->load->view('entidade_campanha',$data);
                $this->load->view('includes/html_rodape_voluntario');
            }else{
                $data['mensagem'] = "erro";                
            }
	}
       
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


