<?php
class M_User extends CI_Model
{  
   public function userData($username)
   {
      return $this->db->get_where('petugas', ['username' => $username]);
   }

   function detail_pengaduan($id)
   {
      $this->db->select('*');
      $this->db->from('pengaduan');
      $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
      $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
      $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.subkategori');
      $this->db->where('id_pengaduan',$id);
      return $this->db->get();     
   }
   
   function insertpengaduan($data)
   {
      $this->db->insert('pengaduan', $data);
   }

   public function masyarakat()
   {
      return $this->db->get('masyarakat');
   }

   public function pengaduan()
   {
      $user = $this->db->get_where('masyarakat',['username'=>$this->session->userdata('username')])->row_array();
      
      $this->db->select('*');
      $this->db->from('pengaduan');
      $this->db->join('kategori','kategori.id=pengaduan.kategori');
      $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.subkategori');
      $this->db->where('pengaduan.nik',$user['nik']);

      return $this->db->get(); 
   }


   public function editProfil($update)
	{
		$this->db->update('masyarakat', $update);
	}

   public function petugas()
   {
      return $this->db->get('petugas');
   }

}
