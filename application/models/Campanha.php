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
            $this->db->select('id_campanha');
            $this->db->where('entidade_id_entidade', $id_entidade);
            $this->db->order_by("id_campanha", "desc"); 
            $this->db->limit(1);
            return $this->db->get('campanha')->row();
        }else {
            return FALSE;
        }
    }
    
   
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
