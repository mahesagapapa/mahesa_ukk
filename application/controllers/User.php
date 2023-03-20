<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller

{

    public function index()

    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

        $u= $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
      
        $proses = $this->db->get_where('pengaduan',['status'=>'proses','nik'=>$u['nik']])->num_rows();

        $pengaduan =$this->db->get_where('pengaduan',['nik'=>$u['nik']])->num_rows();

        $selesai= $this->db->get_where('pengaduan',['status'=>'selesai','nik'=>$u['nik']])->num_rows();

        $data['bar_graph']=array(

            'proses'=>$proses,

            'pengaduan'=>$pengaduan,

            'selesai'=>$selesai,

        );

        $this->load->view('template/Header');

        $this->load->view('template/SideUser');

        $this->load->view('template/TopbarUser', $data);

        $this->load->view('user/Dashboard',$data);

        $this->load->view('template/FooterUser');

    }

    public function pengaduan()

    {

        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$data['pengaduan'] = $this->M_User->pengaduan()->result_array();

        $this->load->view('template/Header');

        $this->load->view('template/SideUser');

        $this->load->view('template/TopbarUser', $data);

        $this->load->view('user/Pengaduan',$data);

        $this->load->view('template/FooterUser');

    }

    public function mengadu()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('M_Admin');

        $data['subkategori'] = $this->M_Admin->subkategori()->result_array();

        $data['kategori'] = $this->M_Admin->kategori()->result_array();

        $this->load->view('template/Header');

        $this->load->view('template/SideUser');

        $this->load->view('template/TopbarUser', $data);

        $this->load->view('user/Mengadu');

        $this->load->view('template/FooterUser');

    }

    public function insertpengaduan()

    {

        $this->load->model('M_Admin');

        $data = [

            'nik' => $this->session->userdata('nik'),

            'id_subkategori' => $this->input->post('subkategori'),

            'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),

            'isi_laporan' => $this->input->post('isi'),

            'foto' => $this->input->post('foto'),

            'status' => 0

        ];

        $this->M_User->insertpengaduan($data);

        $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert"> Berhasil ditambahkan! </div>');

        redirect('User/pengaduan');

    }

    public function get_sub_kategori()

    {

        $id_kategori = $this->input->post('id');

        $sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();

        echo json_encode($sub_kategori);

    }

    public function tambahmengadu()

    {

        $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

        $kategori = $this->input->post('kategori');

        $subkategori = $this->input->post('subkategori');

        $laporan = $this->input->post('laporan');

        $config['upload_path'] = './assets/img/uploads/';

        $config['allowed_types']        = 'gif|jpg|png';

        // $config['max_size']             = 100;

        // $config['max_width']            = 1024;

        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        $this->upload->do_upload('image');

        $uploaded_data = $this->upload->data('file_name');

        echo $uploaded_data;

        $add = array(         

            'nik' => $user['nik'],

            'kategori' => $kategori,

            'subkategori' => $subkategori,

            'tanggal_pengaduan' =>date('Y-m-d'),

            'isi_laporan' => $laporan,

            'foto' => $uploaded_data,

        );

        $this->M_User->insertpengaduan($add);

        $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert"> Berhasil ditambahkan! </div>');

        redirect('User/pengaduan');

    }

    public function profile()

    {

        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/Header');

        $this->load->view('template/SideUser');

        $this->load->view('template/TopbarUser', $data);

        $this->load->view('user/Setting');

        $this->load->view('template/FooterUser');

    }

    public function editprofile()

    {

        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$nama = $this->input->post('nama');

		$username = $this->input->post('username');

		$telepon = $this->input->post('telepon');

		$nik = $this->input->post('nik');

		$update = [

			'nama' => $nama,

			'username' => $username,

			'telepon' => $telepon,

			'nik' => $nik,

		];

		$this->db->where('id', $user['id']);

		$this->M_User->editProfil($update);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">

		Profil berhasil di edit !

		  </div>');

		redirect('User/profile');
        
    }

	public function detailpengaduan($id)
	{
		$data['title'] = 'Home Page';
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		// $data['pengaduan2'] = $this->db->get('pengaduan')->result_array();
		$data['tanggapan'] = $this->m_join->tanggapan($id)->result_array();
		// $data['pengaduan2'] = $this->m_join->pengaduan()->result_array();
		$data['pengaduan2'] = $this->m_join->joinpengaduan2($id)->result_array();
		
		$this->load->view('temp/temp_dash/v_u_header', $data);
		$this->load->view('temp/temp_dash/v_u_sidebar', $data);
		$this->load->view('temp/temp_dash/v_u_topbar', $data);
		$this->load->view('user/v_detail_pengaduan', $data);
		$this->load->view('temp/temp_dash/v_u_footer', $data);
	}

	public function statusproses($id)

	{

		$data['user'] = $this->M_admin->userData($this->session->userData('username'))->row_array();

		$data['masyarakat'] = $this->M_admin->masyarakat()->result_array();

		$data['p'] = $this->M_admin->detail_pengaduan($id)->row_array();

		$data['petugas'] = $this->M_admin->petugas()->result_array();

		$data['tanggapanproses'] = $this->M_admin->tanggapanproses($id)->result_array();

		$this->load->view('template/Header');

        $this->load->view('template/Sidebar',$data);

        $this->load->view('template/Topbar',$data);

		$this->load->view('admin/Proses',$data);

		$this->load->view('template/Footer');

	}

}
