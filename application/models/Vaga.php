<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Vaga extends CI_Model {

    public function cadastrar($dados=NULL, $dados_ent=NULL){
        if ($dados != NULL){
            
            $this->db->insert('entidade_has_atividade', $dados_ent);
            
            if ($this->db->affected_rows()>0){
                   $this->db->insert('vaga', $dados);  
      /*  Verifica se mais de zero linhas foi afetadas no banco de dados, se sim ouve alteração no banco e consequentemente é
          sinal que funcionou o insert
      */
                    if ($this->db->affected_rows()>0){
                
        //retorna ok
                 
                        return TRUE;
                    }else{
                        return FALSE; 
                    }
            }else{
        //return false
                return FALSE;
            }
        }else{
              return FALSE;
        }
    }
    public function get_id(){
        $query = $this->db->select_max('id_vaga','vaga');
        return $query;
    }
    public function get_vaga_by_entidades_id_entidades($id_entidade){
        //Busca com condição
        echo "vou pesquisar o email ", $id_entidade;
        $query = $this->db->get_where('vaga', array('entidades_id_entidades' => $id_entidade));
       
          if ($query->num_rows > 0)
           {
                 $data['id_vaga'] = $query->row()->id_vaga;
                 $data['vaga_de'] = $query->row()->vaga_de;
                 $data['descricao'] = $query->row()->descricao;
                 $data['data_inicio'] = $query->row()->data_inicio;
                 $data['data_fim'] = $query->row()->data_fim;
                 $data['numero_horas'] = $query->row()->numero_horas;
                 $data['tipo_carga_horaria'] = $query->row()->tipo_carga_horaria;
                 $data['data_postagem'] = $query->row()->data_postagem;
                 $data['numero_vagas'] = $query->row()->numero_vagas;
                 $data['dias_semana'] = $query->row()->dia_semana;
                 $data['entidades_id_entidades'] = $query->row()->entidades_id_entidades;
                 $data['atividades_id_area'] = $query->row()->atividades_id_area;
                 $data['atividades_id_projeto'] = $query->row()->atividades_id_projeto;
                 $data['perfil_voluntario'] = $query->row()->perfil_voluntario;
                 echo $data['id_entidades'] ;
                 echo $data['nome'] ;
                 echo $data['endereco'] ;
                 echo $data['bairro'] ;
                 echo $data['cidade'] ;
                 echo $data['telefone'] ;
                 echo $data['estado'] ;
                 echo $data['cep'] ;
                 echo $data['email'] ;
                 echo $data['descricao'] ;
                 echo $data['logotipo_entidade'] ;
                 echo $data['upload_foto'] ;
                 echo $data['autoriza_endereco'];
                 echo $data['autoriza_foto'] ;
                 echo $data['video_youtube'] ;
                 echo $data['site_entidade'] ;
                 echo $data['senha'] ;
                 echo $data['nivel'] ;
            }else{
              $data['mensagem'] = "Registro não encontrado";
            }

        //row_object() retorna direto o objeto produto e não um array
        return $data;
    }
   
}

/* End of file Entidade.php */
/* Location: ./application/models/Entidade.php */
