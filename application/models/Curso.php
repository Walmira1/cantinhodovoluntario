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
    
    public function get_curso($id_curso=NULL){
        //Busca com condição
        if ($id_curso != NULL){
            $this->db->where('id_curso', $id_curso);
            return $this->db->get('curso');
            
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
            $this->db->where('entidade_id_entidade', $id_entidade);
            $this->db->order_by("id_curso", "desc"); 
            $this->db->limit(1);
            return $this->db->get('curso');
        }else {
            return FALSE;
        }
    }
    
    public function alterar($id_curso= NULL, $dados=NULL){
        if (($id_curso != NULL) && ($dados != NULL)){
            $data = array(
                    'id_curso'       => $dados['id_curso'],
                    'nome'           => $dados['nome'],
                    'inscricao_ate'  => $dados['inscricao_ate'],
                    'inicio'         => $dados['inicio'],
                    'fim'           => $dados['fim'] ,
                    'data_postagem' => $dados['data_postagem'] ,
                    'num_horas'     => $dados['num_horas'] ,
                    'taxa_inscricao'   => $dados['taxa_inscricao'] ,
                    'horario'       => $dados['horario'] ,
                    'descricao'     => $dados['descricao'],
                    'local'             => $dados['local'],
                    'entidade_id_entidade'    => $dados['entidade_id_entidade'],
                    'upload_foto'             => $dados['upload_foto'],
                    'video_youtube'           => $dados['video_youtube']
                    );
            $this->db->where('id_curso', $id_curso);
            $this->db->update('curso', $data); 
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
    public function get_all_curso(){
        //Busca sem condição
            $this->db->select('*');
            return $this->db->get('curso');
        
    }
    public function select_all_curso_entidade($id_entidade=NULL){
        //Busca todas os cursos  de uma entidade
        //Busca com condição
        if ($id_entidade != NULL){
            $this->db->where('entidade_id_entidade', $id_entidade);
            return $this->db->get('curso');
        }else {
            return NULL;
        }
        
    }
   
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
