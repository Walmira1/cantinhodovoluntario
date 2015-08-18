<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('voluntario', 'voluntario');
                
                $this->load->helper('url');
              
               
                        
         }
	
         public function index()
	{       
		$this->load->view('includes/html_header');
                $this->load->view('login_voluntario');
                $this->load->view('includes/html_rodape_voluntario');
                                
	}
        public function cadastro()
	{       
		$this->load->view('includes/html_header');
                $this->load->view('cadastro_voluntario');
                $this->load->view('includes/html_rodape_voluntario');
                
                                
	}

	
        public function cadastrar()
	{        
		echo "vou cadastrar voluntário";
                $data['nome'] = $this->input->post('nome');
                $data['endereco'] = $this->input->post('endereco');
                $data['cidade'] = $this->input->post('cidade');
                $data['telefone'] = $this->input->post('telefone');
                $data['cep'] = $this->input->post('cep');
                $data['estado'] = $this->input->post('estado');
                $data['email'] = $this->input->post('email');
                $data['data_nasc'] = $this->input->post('data_nasc');
            //    $data['id_facebook'] = $this->input->post('id_facebook');
                 $data['id_facebook'] = null;
            //    $data['foto'] = $this->input->post('foto');
                $data['foto'] = null;
                $data['senha'] = md5($this->input->post('senha'));
                
                if ($this->db->insert('voluntario',$data)){
                    
                    redirect('cadastro_voluntario/index/1');
                }else{
                    redirect('cadastro_voluntario/index/2');
                 
                }
                
        }
        public function login()
	{       //  Automatically picks appId and secret from config
                $this->load->library('facebook');
		$user = $this->facebook->getUser();
                
                if ($user) {
                    try {
                       $data['user_profile'] = $this->facebook->api('/me'); 
                    } catch (FacebookApiException $e) {
                        $user = null;
                    }
                    
                }else{
                    $this->facebook->destroySession();
                }
                if ($user) {
                    $data['login_url'] = site_url('cadastro_voluntario/logout'); //logs of application
                    //OR
                    //logs off FB!
                    // $data['logout_url'] = this->facebook->getLogoutUrl()
                }  else {
                    $data['login_url'] = $this->facebook->getLoginUrl(array('redirect_url'=>  site_url('cadastro_voluntario/login'),'scope'=>array("email")//permissions here
                    //
                    ));
                }
                $this->load->view('includes/html_header');
                $this->load->view('login',$data);
                $this->load->view('includes/html_rodape_voluntario');
                
               
                
                
        } 
        public function logout()
	{       //  Automatically picks appId and secret from config
                $this->load->library('facebook');
		
                $this->facebook->destroySession();
                // Make sure you destroy website session as well
                $this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_voluntario');
                $this->load->view('home');
                $this->load->view('includes/html_rodape_voluntario');
                
                
        } 
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
