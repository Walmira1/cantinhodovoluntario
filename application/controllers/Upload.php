<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->helper(array('url', 'form'));
           $this->load->model('entidade', 'entidade');
	}

	public function index($pagina=NULL)
	{
            if ($pagina != null){
                $data['pagina'] = $pagina;
            }
		$this->load->view('upload_form',$data);
                    
	}

	public function uploadify()
	{     
		$config['upload_path'] = "./images/";
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("userfile"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
                        var_dump($response);
                        $file_info = "/"."images"."/".$response['file_name'];
                        $id_entidade = $this->session->userdata('id_entidade');
                        $query = $this->entidade->get_id($id_entidade)->row();
                        var_dump($query);
                    //    echo "entidade = ".$id_entidade;
                   //     exit;
                        $data = array(
     /*                       'id_entidade' => $query[0]['id_entidade'],
                            'nome'        => $query[0]['nome'] ,
                            'endereco'    => $query[0]['endereco'],
                            'bairro'      => $query[0]['bairro'],
                            'cidade'      => $query[0]['cidade'],
                            'telefone'    => $query[0]['telefone'],
                            'estado'      => $query[0]['estado'],
                            'cep'         => $query[0]['cep'],
                            'email'       => $query[0]['email'],
                            'descricao'   => $query[0]['descricao'],
                            'logotipo_entidade' =>  $file_info,
                            'upload_foto' =>        $file_info,
                            'autoriza_endereco' => $query[0]['autoriza_endereco'], 
                            'autoriza_foto'     => $query[0]['autoriza_foto'],
                            'video_youtube'     => $query[0]['video'],
                            'site_entidade'     => $query[0]['site'],
                            'senha'             => $query[0]['senha'],
                            'ativo'             => $query[0]['ativo']
                        );*/
                            'id_entidade' => $query->id_entidade,
                            'nome' =>$query->nome,
                            'endereco' => $query->endereco,
                            'bairro' => $query->bairro,
                            'cidade' => $query->cidade,
                            'telefone' => $query->telefone,
                            'estado' => $query->estado,
                            'cep' => $query->cep,
                            'email' => $query->email,
                            'descricao' => $query->descricao,
                            'logotipo_entidade' => $file_info,
                            'upload_foto' => $file_info,
                            'autoriza_endereco' => $query->autoriza_endereco, 
                            'autoriza_foto' => $query->autoriza_foto,
                            'video_youtube' => $query->video_youtube,
                            'site_entidade' => $query->site_entidade,
                            'senha' => $query->senha,
                            'ativo' => $query->ativo);
                        if ($this->entidade->alterar($id_entidade,$data) != TRUE){
                            echo"erro";
                        }
                        
                        
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
        
    
}

/* End of file uploadify.php */
/* Location: ./application/controllers/uploadify.php */