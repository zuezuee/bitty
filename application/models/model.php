<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {

public function save_validasi($data)
{
$this->name = $data['name'];
$this->email = $data['email'];
$this->website = $data['website'];
$this->comment = $data['comment'];
$this->gender = $data['gender'];
$this->db->insert('validasi', $this);
}

public function tampil_validasi()
{
return $this->db->get('validasi')->result();
}

public function delete_validasi($id_validasi)
{
$this->db->where('id_validasi', $id_validasi);
$this->db->delete('validasi'); //
}

function edit_validasi($where, $table)
{
return $this->db->get_where('validasi',$where);
}

function update_validasi($where, $data, $table)
{
$this->db->where($where);
$this->db->update('validasi', $data);
}
}