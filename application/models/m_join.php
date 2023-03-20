<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_join extends CI_Model
{

    public function kategori()
    {
        $this->db->select('*');
        $this->db->FROM('subkategori');
        $this->db->JOIN('kategori', 'kategori.id=sub_kategori.id_kategori');
        return $this->db->get();
    }

    public function pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id=pengaduan.id_kategori');
        $this->db->join('subkategori', 'sub_kategori.subkategori_id=pengaduan.id_subkategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        // $this->db->where('nik', $this->session->userdata('nik'));
        // $this->db->where('id_pengaduan',$id);
        return $this->db->get();
    }

    public function admin_pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id=pengaduan.id_kategori');
        $this->db->join('subkategori', 'sub_kategori.subkategori_id=pengaduan.id_subkategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        // $this->db->where('nik', $this->session->userdata('nik'));
        // $this->db->where('id_pengaduan',$id);
        return $this->db->get();
    }

    function tanggapan_pengaduan2($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id=pengaduan.id_kategori');
        $this->db->join('subkategori', 'sub_kategori.subkategori_id=pengaduan.id_subkategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get();
    }

    function tanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('tanggapan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
        $this->db->where('pengaduan.id_pengaduan', $id);
        return $this->db->get();
    }

    function joinpengaduandata2()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id=pengaduan.id_kategori');
        $this->db->join('subkategori', 'sub_kategori.subkategori_id=pengaduan.id_subkategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }

    function joinpengaduan2($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id=pengaduan.id_kategori');
        $this->db->join('subkategori', 'sub_kategori.subkategori_id=pengaduan.id_subkategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get();
    }

}
