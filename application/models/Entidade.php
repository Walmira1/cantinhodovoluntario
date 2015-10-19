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
     //       var_dump($query);
           
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
            return $this->db->get('entidade');
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
    public function get_all(){
            $this->db->select('*');
            return $this->db->get('entidade');
        
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
    public function alterar($id_entidade= NULL, $dados=NULL){
        if (($id_entidade != NULL) && ($dados != NULL)){
            $data = array(
                    'id_entidade' => $dados['id_entidade'],
                    'nome'        => $dados['nome'] ,
                    'endereco'    => $dados['endereco'],
                    'bairro'      => $dados['bairro'],
                    'cidade'      => $dados['cidade'],
                    'telefone'    => $dados['telefone'],
                    'estado'      => $dados['estado'],
                    'cep'         => $dados['cep'],
                    'email'       => $dados['email'],
                    'descricao'   => $dados['descricao'],
                    'logotipo_entidade' => $dados['logotipo_entidade'],
                    'upload_foto' => $dados['upload_foto'],
                    'autoriza_endereco' => $dados['autoriza_endereco'], 
                    'autoriza_foto'     => $dados['autoriza_foto'],
                    'video_youtube'     => $dados['video_youtube'],
                    'site_entidade'     => $dados['site_entidade'],
                    'senha'             => $dados['senha'],
                    'ativo'             => $dados['ativo']
                    );
            $this->db->where('id_entidade', $id_entidade);
            $this->db->update('entidade', $data); 
            if ($this->db->affected_rows()>0){
        //retorna ok
                    return TRUE;
            }else{
                    return FALSE;
                }
        }else{
                    return FALSE;
        }
    }
    public function atualiza($id_entidade=NULL, $file=NULL){
        var_dump($file);
        echo "entidade = ".$id_entidade;
        
        if (($id_entidade != NULL)&& ($file != NULL)){
            $this->db->where('id_entidade', $id_entidade);
            $query = $this->db->get('entidade');
            if ($query->num_rows == 1){
                 var_dump($query);
                 exit;
                $data = array(
                    'id_entidade' => $query[0]['id_entidade'],
                    'nome'        => $query[0]['nome'] ,
                    'endereco'    => $query[0]['endereco'],
                    'bairro'      => $query[0]['bairro'],
                    'cidade'      => $query[0]['cidade'],
                    'telefone'    => $query[0]['telefone'],
                    'estado'      => $query[0]['estado'],
                    'cep'         => $query[0]['cep'],
                    'email'       => $query[0]['email'],
                    'descricao'   => $query[0]['descricao'],
                    'logotipo_entidade' => $file,
                    'upload_foto' => $file,
                    'autoriza_endereco' => $query[0]['autoriza_endereco'], 
                    'autoriza_foto'     => $query[0]['autoriza_foto'],
                    'video_youtube'     => $query[0]['video_youtube'],
                    'site_entidade'     => $query[0]['site_entidade'],
                    'senha'             => $query[0]['senha'],
                    'ativo'             => $query[0]['ativo']
                    );
                $this->db->where('id_entidade', $id_entidade);
                $this->db->update('entidade', $data); 
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
        }else{
            return FALSE;
        }

    }
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
