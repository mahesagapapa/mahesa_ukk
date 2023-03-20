<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->model('M_Petugas');	

	}

	public function index()

	{

		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$pengaduan = $this->db->get('pengaduan')->num_rows();

		$proses=$this->db->get_where('pengaduan',['status'=>'proses'])->num_rows();

		$selesai=$this->db->get_where('pengaduan',['status'=>'selesai'])->num_rows();

		$data=array(

			'pengaduan'=>$pengaduan,

			'proses'=>$proses,

			'selesai'=>$selesai

		);

		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('template/petu_Header');

        $this->load->view('template/petu_sidebar',$data);

        $this->load->view('template/petu_Topbar',  $data);

		$this->load->view('Petugas/Dash', $data);

		$this->load->view('template/petu_Footer');

	}


	public function kategori()

	{

		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->model('M_Petugas');

		$data['kategori'] = $this->M_Petugas->kategori()->result_array();

		// $data['kategori'] = $this->db->get('kategori');

		$data['subkategori'] = $this->M_Petugas->subkategori()->result_array();
		
		$this->load->view('template/petu_Header');

        $this->load->view('template/petu_Sidebar',$data);

        $this->load->view('template/petu_Topbar',$data);

		$this->load->view('Petugas/Kategori', $data);

		$this->load->view('template/petu_Footer');

	}

	public function tambah_kategori()

	{

		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$kategori = $this->input->post('kategori');

		$add = array(
			'kategori' => $kategori,
		);

		$this->load->model('M_Petugas');

		$this->M_Petugas->tambah_kategori($add);

		redirect('Petugas/kategori');

	}

	// editkategori

    public function editkategori($id)

    {

		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

        $kategori = $this->input->post('kategori');

        $update = array(

            'kategori' => $kategori,

        );

        $this->db->where('id', $id);

        $this->db->update('kategori', $update);

        redirect('Petugas/kategori');

    }

    // deletekategori

    public function deletekategori($id)

    {

        $this->db->where('id', $id);

        $this->db->delete('kategori');

        redirect('Petugas/kategori');

    }

	public function tambah_subkategori()

    {

		$kategori = $this->input->post('kategori');

        $sub_kategori = $this->input->post('subkategori');

        $data = array(

			'id_kategori' => $kategori,

            'sub_kategori' => $sub_kategori,

        );

		// $this->M_Petugas->subkategori();

        $this->db->insert('subkategori', $data);

        redirect('Petugas/kategori');

    }

	// editsubkategori

    public function editsubkategori($id)

    {

		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

        $subkategori = $this->input->post('subkategori');

        $update = array(

            'sub_kategori' => $subkategori,

        );

        $this->db->where('id_subkategori', $id);

        $this->db->update('subkategori', $update);

        redirect('Petugas/kategori');

    }

	// deletesubkategori

    public function deletesubkategori($id)

    {

        $this->db->where('id_subkategori', $id);

        $this->db->delete('subkategori');

        redirect('Petugas/kategori');

    }

	public function masyarakat()

	{

		$data['user'] = $this->M_Petugas->userData($this->session->userData('username'))->row_array();

		$data['masyarakat'] = $this->M_Petugas->masyarakat()->result_array();

		$this->load->view('template/petu_Header');

        $this->load->view('template/petu_Sidebar',$data);

        $this->load->view('template/petu_Topbar',$data);

		$this->load->view('Petugas/Masyarakat', $data);

		$this->load->view('template/petu_Footer');

	}

	public function suspendmasyarakat($id)

	{

		$suspendmasyarakat= [

			'active'=>'suspend',

		];

		$this->db->where('id', $id);

		$this->M_Petugas->suspendmasyarakat($suspendmasyarakat);

		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">

		Berhasil Mengsuspend akun ! 

		</div>');

		redirect('Petugas/masyarakat');

	}

	public function unsuspendmasyarakat($id)

	{

		$unsuspendmasyarakat= [

			'active'=>'active',

		];

		$this->db->where('id', $id);

		$this->M_Petugas->unsuspendmasyarakat($unsuspendmasyarakat);

		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">

		Disuspendkan ! 

		</div>');

		redirect('Petugas/masyarakat');

	}

	public function petugas()

	{

		$data['user'] = $this->M_Petugas->userData($this->session->userData('username'))->row_array();

		$data['petugas'] = $this->M_Petugas->petugas()->result_array();

		$this->load->view('template/petu_Header');

        $this->load->view('template/petu_Sidebar',$data);

        $this->load->view('template/petu_Topbar',$data);

		$this->load->view('Petugas/Petugas', $data);

		$this->load->view('template/petu_Footer');

	}

	public function editpetugas($id)

	{

		$nama_petugas = $this->input->post('nama_petugas');

		$username = $this->input->post('username');

		$telp = $this->input->post('telepon');

		$level = $this->input->post('level');

		$update = [

			'nama_petugas' => $nama_petugas,

			'username' => $username,

			'telp' => $telp,

			'level' => $level,

		];

		$this->db->where('id_petugas', $id);

		$this->M_Petugas->editpetugas($update);

		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">

		Berhasil Mengganti data petugas ! 

		</div>');

		redirect('Petugas/petugas');

	}

	public function suspendpetugas($id)

	{

		$suspend= [

			'active'=>'suspend',

		];

		$this->db->where('id_petugas', $id);

		$this->M_Petugas->suspendpetugas($suspend);

		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">

		Disuspendkan ! 

		</div>');

		redirect('Petugas/petugas');

	}

	public function unsuspendpetugas($id)

	{

		$unsuspend= [
			'active'=>'active',
		];

		$this->db->where('id_petugas', $id);

		$this->M_Petugas->unsuspendpetugas($unsuspend);

		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">

		Berhasil Mengunsuspend akun ! 

		</div>');

		redirect('Petugas/petugas');

	}

	public function pengadu()

	{

		$data['user'] = $this->M_Petugas->userData($this->session->userData('username'))->row_array();

		$data['masyarakat'] = $this->M_Petugas->masyarakat()->result_array();

		$data['pengaduan'] = $this->M_Petugas->pengaduan()->result_array();
		
		$this->load->view('template/petu_Header');

        $this->load->view('template/petu_Sidebar',$data);

        $this->load->view('template/petu_Topbar',$data);

		$this->load->view('Petugas/Pengadu',$data);

		$this->load->view('template/petu_Footer');

	}

	
	public function upload_pengaduan($id_pengaduan){
		
		$data_petugas=$this->M_Petugas->userData($this->session->userData('username'))->row_array();

		$upload_data = array(

			'id_pengaduan'=>$id_pengaduan,

			'tgl_tanggapan'=>date('Y-m-d'),

			'tanggapan'=>$this->input->post('tanggapan'),

			'id_petugas'=>$data_petugas['id_petugas'],

		);

		$this->db->insert('tanggapan',$upload_data);

		$update=array(

			'status'=>$this->input->post('status'),

		);

		$this->db->where('id_pengaduan',$id_pengaduan);

		$this->db->update('pengaduan',$update);

		redirect('Petugas/pengadu');

	}

	public function statusproses($id)

	{

		$data['user'] = $this->M_Petugas->userData($this->session->userData('username'))->row_array();

		$data['masyarakat'] = $this->M_Petugas->masyarakat()->result_array();

		$data['p'] = $this->M_Petugas->detail_pengaduan($id)->row_array();

		$data['petugas'] = $this->M_Petugas->petugas()->result_array();

		$data['tanggapanproses'] = $this->M_Petugas->tanggapanproses($id)->result_array();

		$this->load->view('template/petu_Header');

        $this->load->view('template/petu_Sidebar',$data);

        $this->load->view('template/petu_Topbar',$data);

		$this->load->view('Petugas/Proses',$data);

		$this->load->view('template/petu_Footer');

	}

	public function laporan_pdf(){
		$pengaduan = $this->M_Petugas->pengaduan()->result_array();
		$data = array(

			"dataku" => array(

				"nama" => "Petani Kode",

				"url" => "http://petanikode.com"

			),
            'pengaduan' => $pengaduan
		);
	
		$this->load->library('Pdf');
	
		$this->pdf->setPaper('A4', 'landscape');

		$this->pdf->filename = "laporan-petanikode.pdf";
		
		$this->pdf->load_view('Petugas/laporan_pdf', $data);

	}

}
