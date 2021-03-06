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
                $this->load->model('Cidade', 'cidade');
                $this->output->enable_profiler(TRUE);
       // a classe Manipulação de Imagem é inicializada em seu controller usando a função $this->load_library:         
                
                        
         }	
        public function index($indice=null)
	{       
		$this->load->view('includes/html_header');
                $id_entidade = $this->session->userdata('id_entidade');
                $data['entidade'] = $this->entidade->get_id($id_entidade)->row(); 
                $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row(); 
                $dados['cidades'] = $this->db->get('cidade')->result();
                $dados['estados'] = $this->cidade->get_estado();
                if ($indice==1){
                   
                   $data['msg'] = "Entidade Cadastrada com Sucesso";
                   $this->load->view('includes/msg_sucesso',$data); 
                   $this->load->view('includes/html_menu_entidade');
                   $this->load->view('inicio_entidade',$data);
                   $this->load->view('includes/html_rodape_entidade');
                    
                }else if($indice==2){
                   $data['msg'] = "Não foi possivel cadastrar a Entidade"; 
                    $this->load->view('includes/html_menu_voluntario');
                    $this->load->view('includes/msg_erro',$data); 
                    $this->load->view('home');
                    $this->load->view('includes/html_rodape_entidade');
                }else if($indice==3){
                    $data['msg'] = NULL;
                    $this->load->view('includes/html_menu_entidade');
                    $this->load->view('inicio_entidade',$data);
                    $this->load->view('includes/html_rodape_entidade');
                }else{
                    $data['msg'] = "Não foi possivel cadastrar a Entidade"; 
                    $this->load->view('includes/html_menu_entidade');
                    $this->load->view('includes/msg_erro',$data); 
                    $this->load->view('home');
                    $this->load->view('includes/html_rodape_entidade');
                }
               
               
                                
	}
        public function cadastro($indice=null)
	{      
        //        $this->load->view('includes/html_header');
                if ($indice==1){
                   $this->load->view('includes/msg_sucesso',$data['mensagem']); 
                }
                $alerta = NULL;
                $dados = array(
                 "alerta" => $alerta
                );
                $dados['cidades'] = $this->db->get('cidade')->result();
                $dados['estados'] = $this->cidade->get_estado();
                $this->load->view('cadastro_entidade',$dados);
                                
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
                $dados['cidades'] = $this->db->get('cidade')->result();
                $dados['estados'] = $this->cidade->get_estado();
                $this->load->view('cadastro_entidade',$dados);
                
            }else{
                
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
                   $query = $this->entidade->get_entidade_by_email($data['email'])->row();
                   
                   // redirect recarrega a página ou seja perdi o array dados  
                   // para não perder os dados crio uma variavel de sessão
                        $dados = array(
            /*                'id_entidade' => $query[0]['id_entidade'],
                            'logotipo_entidade' => $query[0]['logotipo_entidade'],
                            'upload_foto' => $query[0]['upload_foto'],
                            'site_entidade' => $query[0]['site_entidade'],
                            'user_nome' => $query[0]['nome'],*/
                            'id_entidade' => $query->id_entidade,
                            'logotipo_entidade' => $query->logotipo_entidade,
                            'upload_foto' => $query->upload_foto,
                            'site_entidade' => $query->site_entidade,
                            'user_nome' => $query->nome,
                            'user_logado' => TRUE
                           
                        );
                   $this->session->set_userdata($dados);
                   $autoriza_foto = $query->autoriza_foto;
                   if($autoriza_foto == 2){
                       $query = $this->vaga->get_vaga_by_id_entidade($query->id_entidade);
                        $dados['vagas'] = $query;
                       redirect('cadastro_entidade/index/1');
                   }else {
                   //redirect('cadastro_entidade/index/1');
                        $this->load->view('upload_form');
                   }
                
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
                
               
                 
            }
            if ($this->form_validation->run('login_entidade_form')== TRUE) {
                 $email = $this->input->post('email_login');
                 $senha = $this->input->post('senha');
                $query = $this->entidade->get_byemail($email)->row();
                if (($query->senha == $senha) && ($query->ativo == 1)){
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
                        $data['mensagem'] = null;
                        $id_entidade = $query->id_entidade;
                        $data['vagas'] = $this->vaga->get_vaga_by_entidade_id_entidade($id_entidade);
                        $id_entidade = $this->session->userdata('id_entidade');
                        $data['entidade'] = $this->entidade->get_id($id_entidade)->row();
                        $data['sum_vaga'] = $this->vaga->select_sum_vaga($id_entidade)->row(); 
                   // redirect('cadastro_entidade/index/3');
                        $this->load->view('includes/html_header');
                        $this->load->view('includes/html_menu_entidade');
                        $this->load->view('inicio_entidade',$data);
                        $this->load->view('includes/html_rodape_entidade');
                }else{
                        if (empty($query)){
                        $alerta = array(
                          "class"=>"danger",
                            "mensagem" => "Email inexistente<br>" 
                             );
			//set_msg('errologin', 'Email inexistente', 'erro');
                    
			//set_msg('errologin', 'Senha incorreta', 'erro');
                        }else {
                            if ($query->ativo == 0){   
                                $alerta = array(
                                "class"=>"danger",
                                         "mensagem" => "Usuário Inativo <br>" 
                                );
				//set_msg('errologin', 'Este usuário está inativo', 'erro');
                            }else {
                                $alerta = array(
                                         "class"=>"danger",
                                         "mensagem" => "Senha Inválida <br>" 
                                          );
				//set_msg('errologin', 'Erro desconhecido, contate o desenvolvedor', 'erro');
                            }
                        } 
                        $dados = array(
                        "alerta" => $alerta
                        );  
                        $this->load->view('includes/html_header');
                        $this->load->view('cadastro_entidade',$dados);
                        $this->load->view('includes/html_rodape_entidade');
                    }
                    
            }else{
                  // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
                 $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
                 $dados = array(
                 "alerta" => $alerta
             );
                
            }     
             
             
             // todo o indice vira variavel na view (vamos ter uma variavel "alerta"
             
	}
        public function nova_senha(){
            $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|strtolower');
            $data['mensagem'] = null;
            if ($this->form_validation->run()==TRUE):
                $email = $this->input->post('email_login');
                $query = $this->entidade->get_entidade_by_email($email);
		if ($query->num_rows()==1):
                    $novasenha = substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm0123456789'), 0, 6);
                    $mensagem = "<p>Você solicitou uma nova senha para acesso ao painel de administração do site, a partir de agora use a seguinte senha para acesso: <strong>$novasenha</strong></p><p>Troque esta senha para uma senha segura e de sua preferência o quanto antes.</p>";
                    if ($this->sistema->enviar_email($email, 'Nova senha de acesso', $mensagem)):
                        $dados['senha'] = md5($novasenha);
			$this->entidade->do_update($dados, array('email'=>$email), FALSE);
                        $data['mensagem'] = 'Uma nova senha foi enviada para seu email';
			$this->load->view('includes/html_header');
                        $this->load->view('cadastro_entidade',$dados);
                        $this->load->view('includes/html_rodape_entidade');
			
                    else:
                            set_msg('msgerro', 'Erro ao enviar nova senha, contate o administrador', 'erro');
                    endif;
		else:
                    set_msg('msgerro', 'Este email não possui cadastro no sistema', 'erro');
                    redirect('cadastro_entidade/nova_senha');
		endif;
            endif;		
            set_tema('titulo', 'Recuperar senha');
            set_tema('conteudo', load_modulo('usuarios', 'nova_senha'));
            set_tema('rodape', '');
            load_template();
	}
        
        public function inicio(){
            $query = get_id($id_entidade)->row();
            $data[entidade] = $query[0];
            $data[vagas] = $query[0];
            
        }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
