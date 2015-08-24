<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Vaga extends CI_Model {

    public function cadastrar($dados=NULL){
        
        if ($dados != NULL){
            
            $this->db->insert('vaga', $dados);  
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
    public function get_id(){
    //    $query = $this->db->select_max('id_vaga');
            $this->db->select('id_vaga');
            $this->db->order_by("id_vaga", "desc"); 
            $this->db->limit(1);
            $query = $this->db->get('vaga')->row();
        return $query;
    }
    public function get_max_vaga_by_entidade($id_entidade){
        if ($id_entidade != NULL){
            $this->db->select('id_vaga');
            $this->db->where('entidade_id_entidade', $id_entidade);
            $this->db->order_by("id_vaga", "desc"); 
            $this->db->limit(1);
            return $this->db->get('vaga')->row();
        }else {
            return FALSE;
        }
    }
     public function get_atividade($id_area=NULL,$id_atividade_projeto=NULL){
        if ($id_area != NULL){
            $this->db->where('id_area', $id_area);
            $this->db->where('id_atividade_projeto', $id_atividade_projeto);
            $query = $this->db->get('atividade');
            if ($query->num_rows == 1):
                    return TRUE;
            else:
                    return FALSE;
            endif;
        }else {
            return FALSE;
        }
         exit;
        
    }
    public function get_entidade_has_atividade($id_entidade=NULL,$id_area=NULL,$id_atividade_projeto=NULL){
        if ($id_entidade != NULL){
            $this->db->where('entidade_id_entidade', $id_entidade);
            $this->db->where('atividade_id_area', $id_area);
            $this->db->where('atividade_id_atividade_projeto', $id_atividade_projeto);
            $query = $this->db->get('entidade_has_atividade');
            if ($query->num_rows == 0):
                    return TRUE;
            else:
                return FALSE;
            endif;
        }  
        
    }
    public function insert_entidade_has_atividade($dados_ent){
        if ($dados_ent != NULL){
            $this->db->insert('entidade_has_atividade', $dados_ent);
            if ($this->db->affected_rows()>0){
               return TRUE;     
            }else{
        //return false
                return FALSE;
            }
        } 
    }
    public function get_vaga_by_entidade_id_entidade($id_entidade=NULL){
        //Busca com condição
        if ($id_entidade != NULL){
            $this->db->where('entidade_id_entidade', $id_entidade);
            return $this->db->get('vaga')->result();
            
        }
        
    }
    public function delete_vaga($id_vaga=NULL){
        //Busca com condição
        if ($id_vaga != NULL){
            $this->db->delete('vaga', array('id_vaga' => $id_vaga));
            if ($this->db->affected_rows()>0){
               return TRUE;     
            }else{
        //return false
                return FALSE;
            }
            
            
        }
        
    }
    public function select_vaga($id_vaga=NULL){
        //Busca com condição
        if ($id_vaga != NULL){
            $this->db->where('id_vaga', $id_vaga);
            return  $this->db->get('vaga');
        }
        
    }
   
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
