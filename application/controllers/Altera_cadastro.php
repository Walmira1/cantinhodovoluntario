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
                $this->load->model('vaga', 'vaga');
                $this->load->model('cidade', 'cidade');
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
                        $id_cidade = $dados['entidade']->cidade;
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
           
        //   if($this->input->post('entrar')== "Alterar"){
       //    echo "o formulario foi submetido";}
       //            var_dump($this->input->post());
      //      echo "o formulario foi submetido";
      //    exit;
            if ($this->form_validation->run('altera_entidade_form')==FALSE) {
               $alerta = array(
                    "class"=>"danger",
                    "mensagem" => "Atenção falha na validação do formulário<br>" . validation_errors()
                    );
               $dados = array(
                   "alerta" => $alerta   );
                
                $this->load->view('altera_cadastro_entidade',$dados);
                $this->load->view('includes/html_rodape_entidade');
            }else{
                //Upload do arquivo
             //   $upload = $this->do_upload($this->input->post('userfile'));
             //    echo  $upload;
             // outra maneira
             // usando elements...em uma unica linha
             // $dados = elements(array('nome', 'endereço' .....
                $data = array(
                    'id_entidade' => $this->input->post('id_entidade'),
                    'nome'        => $this->input->post('nome') ,
                    'endereco'    => $this->input->post('endereco'),
                    'bairro'      => $this->input->post('bairro'),
                    'cidade'      => $this->input->post('cidade'),
                    'telefone'    => $this->input->post('telefone'),
                    'estado'      => $this->input->post('estado'),
                    'cep'         => $this->input->post('cep'),
                    'email'       => $this->input->post('email'),
                    'descricao'   => $this->input->post('descricao'),
                    'logotipo_entidade' => $this->input->post('logotipo_entidade'),
                    'upload_foto' => $this->input->post('upload_foto'),
                    'autoriza_endereco' => $this->input->post('autoriza_endereco'), 
                    'autoriza_foto'     => $this->input->post('autoriza_foto'),
                    'video_youtube'     => $this->input->post('video'),
                    'site_entidade'     => $this->input->post('site'),
                    'senha'             => $this->input->post('senha'),
                    'ativo'             => $this->input->post('ativo')
                    );
                $id_entidade = $this->input->post('id_entidade');
                if ($this->entidade->alterar($id_entidade, $data) == TRUE){
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
                        $query = $this->entidade->get_id($id_entidade);
                        $dados['entidade'] = $query->row(0,'entidade');
                        $query = $this->vaga->get_vaga_by_id_entidade($id_entidade);
                        $dados['vagas'] = $query;
                        $dados['alerta'] = $alerta;
                        $this->load->view('includes/html_header');
                        $data['msg'] = "Entidade Alterada com Sucesso";
                        $this->load->view('includes/msg_sucesso',$data); 
                        $this->load->view('includes/html_menu_entidade');
                        $this->load->view('inicio_entidade',$dados);
                        $this->load->view('includes/html_rodape_entidade');
               }else{
                    $data['msg'] = "Não foi possivel Alterar a Entidade"; 
                    $this->load->view('includes/msg_erro',$data);
                    $query = $this->entidade->get_id($id_entidade);
                    $dados['entidade'] = $query->row(0,'entidade');
                    $dados['alerta'] = $alerta;
                    $this->load->view('altera_cadastro_entidade',$dados);
                    $this->load->view('includes/html_rodape_entidade');
                }
                
           }    
            
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
