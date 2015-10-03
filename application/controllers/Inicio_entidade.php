<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio_entidade extends CI_Controller {

	public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('entidade', 'entidade');
                $this->load->model('vaga', 'vaga');
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                
                        
         }
	
        public function index($id_entidade=NULL)
	{      
            if($id_entidade != NULL){
                $data['mensagem'] = NULL;
                $data['entidade'] = $this->entidade->get_id($id_entidade)->row();
                $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
                $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row(); 
		$this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_entidade');
                $this->load->view('inicio_entidade',$data);
                $this->load->view('includes/html_rodape_entidade');
             }    
                                
	}
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
