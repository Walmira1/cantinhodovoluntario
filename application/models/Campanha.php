<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Campanha extends CI_Model {

    public function cadastrar($dados=NULL){
        
        if ($dados != NULL){
            
            $this->db->insert('campanha', $dados);  
      /*  Verifica se mais de zero linhas foi afetadas no banco de dados, se sim ouve alteração no banco e consequentemente é
          sinal que funcionou o insert
      */
            if ($this->db->affected_rows()> 0){
        //retorna ok
                return TRUE;
            }else{
                return FALSE; 
            }
        }
    }
    public function get_campanha_by_entidade_id_entidade($id_entidade=NULL){
        //Busca com condição
        if ($id_entidade != NULL){
            $this->db->where('entidade_id_entidade', $id_entidade);
            return $this->db->get('campanha')->result();
            
        }
        
    }
    public function get_campanha($id_campanha=NULL){
        //Busca com condição
        if ($id_campanha != NULL){
            $this->db->where('id_campanha', $id_campanha);
            return $this->db->get('campanha');
        }else{
            return false;
        }
        
    }
    public function delete_campanha($id_campanha=NULL){
        //Busca com condição
        if ($id_campanha != NULL){
            $this->db->delete('campanha', array('id_campanha' => $id_campanha));
            if ($this->db->affected_rows()>0){
               return TRUE;     
            }else{
        //return false
                return FALSE;
            }
        }
    }
    public function get_max_campanha_by_entidade($id_entidade){
        if ($id_entidade != NULL){
            $this->db->where('entidade_id_entidade', $id_entidade);
            $this->db->order_by("id_campanha", "desc"); 
            $this->db->limit(1);
            return $this->db->get('campanha');
        }else {
            return FALSE;
        }
    }
    public function alterar($id_campanha= NULL, $dados=NULL){
        if (($id_campanha != NULL) && ($dados != NULL)){
            $data = array(
                    'id_campanha'               => $dados['id_campanha'],
                    'entidade_id_entidade'      => $dados['entidade_id_entidade'],
                    'titulo_campanha_noticia'   => $dados['titulo_campanha_noticia'] ,
                    'descricao'                 => $dados['descricao'],
                    'data_inclusao'             => $dados['data_inclusao'],
                    'data_fim'                  => $dados['data_fim'],
                    'foto_campanha'             => $dados['foto_campanha'],
                    'video'                     => $dados['video']
                    );
            $this->db->where('id_campanha', $id_campanha);
            $this->db->update('campanha', $data); 
            if ($this->db->affected_rows()>0){
        //retorna ok
                    return TRUE;
            }else{
        //return false
        echo "Não altereou nenhum registro";
                    return FALSE;
                }
        }else{
                    return FALSE;
        }
    }
    public function get_all_campanha(){
        //Busca sem condição
            $this->db->select('*');
            return $this->db->get('campanha');
            
       
        
    }
    public function select_all_campanha_entidade($id_entidade=NULL){
        //Busca todas as campanhas de uma entidade
        if ($id_entidade != NULL){
            $this->db->select('campanha.id_campanha, campanha.titulo_campanha_noticia, foto_campanha,campanha.descricao, campanha.entidade_id_entidade, entidade.logotipo_entidade, entidade.nome, entidade.endereco,entidade.site_entidade,entidade.cidade');
            $this->db->from('campanha');
            $this->db->where('campanha.entidade_id_entidade',$id_entidade);
            $this->db->join('entidade', 'entidade.id_entidade = campanha.entidade_id_entidade');
            return  $this->db->get();
        }else {
            return NULL;
        }
        
    }
    
   
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
