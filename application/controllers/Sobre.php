<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sobre extends CI_Controller {

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
		$this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_voluntario');
                $this->load->view('sobre');
                $this->load->view('includes/html_rodape_voluntario');
                                
	}
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
