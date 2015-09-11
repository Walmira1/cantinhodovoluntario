<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapa extends CI_Controller {

	public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('cidade', 'cidade');
                $this->load->model('curso', 'curso');
                $this->load->model('campanha', 'campanha');
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                
                        
         }
	
        public function index()
	{       
                
		$this->load->view('mapa');
                
	}
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
