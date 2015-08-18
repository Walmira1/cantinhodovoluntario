<?php
class Voluntario extends CI_Model {
function insert()
{
  $data = $_POST;
  return $this->db->insert('voluntario', $data);
}
function get_where($id)
{
    $this->db->where('id_voluntarios', $id);
    $query = $this->db->get('voluntario');
    return $query->row();
}
function update($id)
{
    $data = $_POST;
    $this->db->where('id_voluntarios', $id);
    $this->db->update('voluntario', $data);
}
function verifica_fk($id)
{
    $this->db->where('id_voluntarios', $id);
    $query = $this->db->get('historia_voluntario');
    if ($query->num_rows > 0)
    {
        // se houver fk, retorne falso
        return false;
    } else
    {
        return true;
    }
} 
function delete($id)
{
   // se for verdadeiro, pode apagar o registro
   if ($this->verifica_fk($id))
   {
      $this->db->where('id_voluntarios', $id);
      return $this->db->delete('voluntario');
   }
   else
   {
      return false;
   }
}
}

