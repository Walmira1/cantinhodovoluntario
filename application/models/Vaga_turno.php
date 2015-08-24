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
    public function select_vaga($id_vaga){
         if ($id_vaga != NULL){
            $this->db->where('vaga_id_vaga', $id_vaga);
            return  $this->db->get('vaga_turno');
        }else {
            return FALSE;
        }
    }
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
