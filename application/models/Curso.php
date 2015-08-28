<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Curso extends CI_Model {

    public function cadastrar($dados=NULL){
        
        if ($dados != NULL){
            
            $this->db->insert('curso', $dados);  
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
    public function get_curso_by_entidade_id_entidade($id_entidade=NULL){
        //Busca com condição
        if ($id_entidade != NULL){
            $this->db->where('entidade_id_entidade', $id_entidade);
            return $this->db->get('curso')->result();
            
        }
        
    }
    public function delete_curso($id_curso=NULL){
        //Busca com condição
        if ($id_curso != NULL){
            $this->db->delete('curso', array('id_curso' => $id_curso));
            if ($this->db->affected_rows()>0){
               return TRUE;     
            }else{
        //return false
                return FALSE;
            }
        }
    }
    public function get_max_curso_by_entidade($id_entidade){
        if ($id_entidade != NULL){
            $this->db->select('id_curso');
            $this->db->where('entidade_id_entidade', $id_entidade);
            $this->db->order_by("id_curso", "desc"); 
            $this->db->limit(1);
            return $this->db->get('curso')->row();
        }else {
            return FALSE;
        }
    }
    
   
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
