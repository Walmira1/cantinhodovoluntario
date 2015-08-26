<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Vaga_turno extends CI_Model {

    public function cadastrar($dados=NULL){
        
        if ($dados != NULL){
            
            $this->db->insert('vaga_turno', $dados);  
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
    public function select_vaga($id_vaga,$tabela){
         if ($id_vaga != NULL){
            $this->db->where('tabela', $tabela);
            $this->db->where('vaga_id_vaga', $id_vaga);
      //      $this->db->order_by("id_vaga", "desc");
            $query = $this->db->get('vaga_turno');
            if ($query->num_rows > 0):
                    return TRUE;
            else:
                    return FALSE;
            endif;
        }else {
            return FALSE;
        }
    }
    public function select_turno_vaga($id_vaga,$tabela){
         if ($id_vaga != NULL){
            $this->db->where('tabela', $tabela);
            $this->db->where('vaga_id_vaga', $id_vaga);
      //      $this->db->order_by("id_vaga", "desc");
            return $this->db->get('vaga_turno');
            
        }else {
            return FALSE;
        }
    }
    public function delete_vaga($id_vaga,$tabela){
         if ($id_vaga != NULL){
            $this->db->where('tabela', $tabela);
            $this->db->where('vaga_id_vaga', $id_vaga);
      //      $this->db->order_by("id_vaga", "desc");
            $this->db->delete('vaga_turno');
            if ($this->db->affected_rows()> 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }else {
            return FALSE;
        }
    }
    public function alterar_turno_vaga($id_vaga, $tabela,$id_vaga_turno,$data){
    //    $query = $this->db->select_max('id_vaga');
        if (($id_vaga != NULL) && ($data != NULL)){
            $this->db->where('id_vaga',$id_vaga);
            $this->db->where('tabela',$tabela);
            $this->db->where('id_turno_vaga',$id_turno_vaga);
            $this->db->update('turno_vaga', $data); 
            if ($this->db->affected_rows()> 0){
                return TRUE;
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
