<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Entidade extends CI_Model {

    public function cadastrar($dados=NULL){
        if ($dados != NULL){
        
        	$this->db->insert('entidade', $dados);
      /*  Verifica se mais de zero linhas foi afetadas no banco de dados, se sim ouve alteração no banco e consequentemente é
          sinal que funcionou o insert
      */
            if ($this->db->affected_rows()>0){
        //retorna ok
                 
                 return TRUE;
            }else{
        //return false
                return FALSE;
            }
        }else{
              return FALSE;
        }
    }
    public function get_id($id_entidade=NULL){
        if ($id_entidade != NULL):
            $this->db->where('id_entidade', $id_entidade);
            return $this->db->get('entidade');
        else:
            return FALSE;
        endif;

        //row_object() retorna direto o objeto produto e não um array
        return $data;
    }
    public function get_entidade_by_email($email=NULL){
        //Busca com condição
        if ($email != NULL):
            $this->db->where('email', $email);
            $query = $this->db->get('entidade');
            if ($query->num_rows == 1):
                    return TRUE;
            else:
                    return FALSE;
            endif;
        else:
            return FALSE;
        endif;
        //row_object() retorna direto o objeto produto e não um array
        
    }
    public function do_login($email=NULL, $senha=NULL){
	if ($email && $senha):
            $this->db->where('email', $email);
            $this->db->where('senha', $senha);
            $this->db->where('ativo', 1);
            $query = $this->db->get('entidade');
            if ($query->num_rows == 1):
                    return TRUE;
            else:
                    return FALSE;
            endif;
	else:
            return FALSE;
	endif;
    }
	

    public function get_byemail($email=NULL){
        if ($email != NULL):
            $this->db->where('email', $email);
            $this->db->limit(1);
            return $this->db->get('entidade');
        else:
		return FALSE;
        endif;
    }
    public function atualiza($id_entidade=NULL, $file=NULL){
        var_dump($file);
        echo "entidade = ".$id_entidade;
        exit;
        if ($id_entidade != NULL):
            $this->db->where('id_entidade', $id_entidade);
            $query = $this->db->get('entidade')->row();
            if ($query->num_rows == 1):
                $data = array(
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
                    'logotipo_entidade' => $query->logotipo_entidade,
                    'upload_foto' => $query->username,
                    'logotipo_entidade' => $file,
                    'upload_foto' => $file,
                    'autoriza_endereco' => $query->autoriza_endereco, 
                    'autoriza_foto' => $query->autoriza_foto,
                    'video_youtube' => $query->video,
                    'site_entidade' => $query->site,
                    'senha' => md5($query->senha));
            
              //      $query[0]['upload_foto']= $file;
            else:
                    return FALSE;
            endif;
        else:
            return FALSE;
        endif;

        //row_object() retorna direto o objeto produto e não um array
        return $data;
    }
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
