<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro_entidade extends CI_Controller {

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
        public function index($indice=null)
	{       
		$this->load->view('includes/html_header');
               
                if ($indice==1){
                    
               //    $data['msg'] = "Entidade Cadastrada com Sucesso";
               //    $this->load->view('includes/msg_sucesso',$data); 
                    $this->load->view('upload',array('error' => ' ' ));
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar a Entidade"; 
                    $this->load->view('includes/html_menu_voluntario');
                    $this->load->view('includes/msg_erro',$data); 
                    $this->load->view('home');
                    $this->load->view('includes/html_rodape_voluntario');
                }else if($indice==3){
                    $data['msg'] = NULL;
                    $this->load->view('includes/html_menu_entidade');
                    $this->load->view('inicio_entidade',$data);
                    $this->load->view('includes/html_rodape_voluntario');
                }else{
                    $data['msg'] = "Não foi possivel cadastrar a Entidade"; 
                    $this->load->view('includes/html_menu_voluntario');
                    $this->load->view('includes/msg_erro',$data); 
                    $this->load->view('home');
                    $this->load->view('includes/html_rodape_voluntario');
                }
               
               
                                
	}
        public function cadastro($indice=null)
	{      
                $this->load->view('includes/html_header');
                if ($indice==1){
                   $this->load->view('includes/msg_sucesso',$data['mensagem']); 
                }
                $alerta = NULL;
                $dados = array(
                 "alerta" => $alerta
                );
                $dados['cidades'] = $this->db->get('cidades')->result();
                $this->load->view('cadastro_entidade',$dados);
                $this->load->view('includes/html_rodape_voluntario');
                                
	}
        public function cadastrar()
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
           if ($this->form_validation->run('cadastro_entidade_form')==FALSE) {
               $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
               $dados = array(
                   "alerta" => $alerta   );
                $this->load->view('includes/html_header');
                $this->load->view('cadastro_entidade',$dados);
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
                $data['senha'] = md5($this->input->post('senha'));
                
                
                if ($this->entidade->cadastrar($data) == TRUE){
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
       public function login()
	{   
            /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
         //   $this->load->library('form_validation');
            /* Define as regras para validação
               Referencia:
        http://www.codeigniter.com/user_guide/libraries/form_validation.html?highlight=form%20validation#rule-reference
              */
             
             //var_dump($this->input->post());
            $alerta = null;
            $this->lang->load('form_validation','portuguese');
            if($this->input->post('captcha')){
                $this->load->view('includes/html_header');
                $this->load->view('cadastro_entidade');
                $this->load->view('includes/html_rodape_entidade');
                redirect('cadastro_entidade/cadastro');
                 
            }
            if ($this->form_validation->run('login_entidade_form')== TRUE) {
                 $email = $this->input->post('email_login');
                 $senha = $this->input->post('senha');
                 // chamo o login
                if ($this->entidade->do_login($email, $senha) == TRUE):
                    $query = $this->entidade->get_byemail($email)->row();
                    $dados = array(
				'id_entidade' => $query->id_entidade,
				'logotipo_entidade' => $query->logotipo_entidade,
                                'upload_foto' => $query->upload_foto,
                                'site_entidade' => $query->site_entidade,
                                'user_nome' => $query->nome,
				'user_logado' => TRUE
                    );
                    $this->session->set_userdata($dados);
                    $id_entidade = null;
                    $id_entidade = $query->id_entidade;
                    $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
                   // redirect('cadastro_entidade/index/3');
                    $this->load->view('includes/html_header');
                    $this->load->view('includes/html_menu_entidade');
                    $this->load->view('inicio_entidade',$data);
                    $this->load->view('includes/html_rodape_entidade');
                else:
                    $query = $this->entidade->get_byemail($email)->row();
                    if (empty($query)):
                        $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Email inexistente<br>" 
                             );
			//set_msg('errologin', 'Email inexistente', 'erro');
                    elseif ($query->senha != $senha):
                        $alerta = array(
                         "class"=>"danger",
                         "mensagem" => "Senha incorreta<br>" 
                            );
			//set_msg('errologin', 'Senha incorreta', 'erro');
			elseif ($query->ativo == 0):
                                $alerta = array(
                                         "class"=>"danger",
                                         "mensagem" => "Usuário Inativo <br>" 
                                          );
				//set_msg('errologin', 'Este usuário está inativo', 'erro');
                            else:
                                $alerta = array(
                                         "class"=>"danger",
                                         "mensagem" => "Erro desconhecido <br>" 
                                          );
				
				//set_msg('errologin', 'Erro desconhecido, contate o desenvolvedor', 'erro');
                            endif;
                     $dados = array(
                     "alerta" => $alerta
                    );
                    $this->load->view('includes/html_header');
                
                    $this->load->view('cadastro_entidade',$dados);
                    $this->load->view('includes/html_rodape_voluntario');   
                endif;                
                 
             }
            else{
                  // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
                 $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
                 $dados = array(
                 "alerta" => $alerta
             );
             $this->load->view('includes/html_header');
                
            $this->load->view('cadastro_entidade',$dados);
            $this->load->view('includes/html_rodape_voluntario');
             }
             // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
             
	}
       
        
    
         
        
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
