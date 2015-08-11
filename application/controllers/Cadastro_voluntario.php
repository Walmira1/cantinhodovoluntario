<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_voluntario extends CI_Controller {

	
         public function index($indice=null)
	{       
		$this->load->view('includes/html_header');
                $this->load->view('includes/html_menu_voluntario');
                if ($indice==1){
                    
                   $data['msg'] = "Voluntário Cadastrado com Sucesso";
                   $this->load->view('includes/msg_sucesso',$data); 
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar o voluntário"; 
                   $this->load->view('includes/msg_erro',$data); 
                }else {
                    $this->load->view('includes/html_header');
                    $this->load->view('cadastro_voluntario');
                    $this->load->view('includes/html_rodape_voluntario');
                }
               $this->load->view('home');
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
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
