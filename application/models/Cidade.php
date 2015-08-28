<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Cidade extends CI_Model {

    
    
    public function get_cidade($identificador=NULL){
        if ($identificador != NULL): 
            $this->db->where('identificador', $identificador);
            $query = $this->db->get('cidade');
            if ($query->num_rows == 1):
                    return TRUE;
            else:
                    return FALSE;
            endif;
        else:
            return FALSE;
        endif;
            
    }
}

