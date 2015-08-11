<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entidades extends CI_Controller {

    		
        public function index()
	{       
		$this->load->view('includes/html_header');
               
                $this->db->select('*');
                $dados['entidades'] = $this->db->get('entidade')->result();
                $this->load->view('includes/html_menu_voluntario');
                $this->load->view('entidades',$dados);
                $this->load->view('includes/html_rodape_voluntario');
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
