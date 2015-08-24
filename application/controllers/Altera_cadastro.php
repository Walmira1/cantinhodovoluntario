<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Altera_cadastro extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
     public function __construct(){
                parent::__construct();
                $this->load->helper(array('form','url'));
                /* Carrega o model para interação com o banco de dados
       Obs: O primeiro parametro 'teste_model' é o nome que deve estar o arquivo do model.
            O segundo parametro 'teste' é somente um apelido para o model para não precisar digitar o nome completo
    */
		$this->load->model('entidade', 'entidade');
                $this->load->model('Vaga', 'vaga');
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                
                        
         }
	public function index($id_entidade=NULL){
                $alerta = NULL;
		if ($id_entidade!=NULL){
                    $dados = array(
                    "alerta" => $alerta
                    ); 
                    $query = $this->entidade->get_id($id_entidade);
                    if ($query->num_rows() == 1){
                        $dados['entidade'] = $query->row(0,'entidade') ;
                        $this->load->view('includes/html_header');
                        $this->load->view('altera_cadastro_entidade',$dados);
                        $this->load->view('includes/html_rodape_entidade');
                    }else{                            
                            $alerta = array(
                            "class"=>"danger",
                            "mensagem" => "Atenção Erro na validação da entidade <br>" 
                            );
                            $dados = array(
                            "alerta" => $alerta
                            );        
                        }
                }  else {
                    $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção Erro na validação da entidade <br>" 
                    );
                    $dados = array(
                    "alerta" => $alerta
                ); 
                }    
                                
	}
        public function altera()
	{   
            /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
         //   $this->load->library('form_validation');
            /* Define as regras para validação
               Referencia:
        http://www.codeigniter.com/user_guide/libraries/form_validation.html?highlight=form%20validation#rule-reference
              */
            $alerta = NULL;
            $this->lang->load('form_validation','portuguese');
            
           
        /*    $upload = $this->do_upload($this->input->post('userfile'));
      //Se o upload deu certo entra nesse if
                
		if (is_array($upload) && $upload['file_name'] != ''){
                 echo  $upload['file_name'];
                } 
                
        $upload = $this->upload->do_upload($this->input->post('userfile')); 
        */
          //Verifica se o form passou nos testes de validação  
           
             if($this->input->post('entrar')== "Alterar Vaga"){
             echo "o formulario foi submetido";}
        //    var_dump($this->input->post());
            exit;
           if ($this->form_validation->run('altera_entidade_form')==FALSE) {
               $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
               $dados = array(
                   "alerta" => $alerta   );
                $this->load->view('includes/html_header');
                $this->load->view('altera_cadastro_entidade',$dados);
                $this->load->view('includes/html_rodape_entidade');
            }else{
                //Upload do arquivo
             //   $upload = $this->do_upload($this->input->post('userfile'));
             //    echo  $upload;
             // outra maneira
             // usando elements...em uma unica linha
             // $dados = elements(array('nome', 'endereço' .....
            	$data['nome'] = $this->input->post('nome');
                $data['endereco'] = $this->input->post('endereco');
                $data['bairro'] = $this->input->post('bairro');
                $data['cidade'] = $this->input->post('cidade');
                $data['telefone'] = $this->input->post('telefone');
                $data['estado'] = $this->input->post('estado');
                $data['cep'] = $this->input->post('cep');
                $data['email'] = $this->input->post('email');
                $data['descricao'] = $this->input->post('descricao');
             //   $data['logotipo_entidade'] = $this->input->post('logotipo_entidade');
             //   $data['upload_foto'] = $this->input->post('username');
                $data['logotipo_entidade'] = null;
                $data['upload_foto'] = null;
                $data['autoriza_endereco'] = $this->input->post('autoriza_endereco'); 
                $data['autoriza_foto'] = $this->input->post('autoriza_foto');
                $data['video_youtube'] = $this->input->post('video');
                $data['site_entidade'] = $this->input->post('site');
                
                if ($this->entidade->alterar($data) == TRUE){
                   $query = $this->entidade->get_entidade_by_email($data['email']);
                   
                   // redirect recarrega a página ou seja perdi o array dados  
                   // para não perder os dados crio uma variavel de sessão
                   $dados = array(
                            'user_id' => $query[0]['id_entidade'],
                            'logotipo_entidade' => $query[0]['logotipo_entidade'],
                            'upload_foto' => $query[0]['upload_foto'],
                            'site_entidade' => $query[0]['site_entidade'],
                            'user_nome' => $query[0]['nome'],
                            'user_logado' => TRUE
                    );
                   
                   //redirect('cadastro_entidade/index/1');
                   $this->load->view('upload_form');
               } else{
                    
                   redirect('cadastro_entidade/index/2');
                 
                }
                
           }    
            
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
