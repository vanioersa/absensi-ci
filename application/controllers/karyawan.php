<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class karyawan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        if ($this->session->userdata('loged_in') != true || $this->session->userdata('role') != 'karyawan') {
            redirect(base_url() . 'auth');
        }
    }
    public function index()
    {
        $data[ 'absensi' ] = $this->m_model->get_data('absensi')->result();
        $this->load->view('karyawan/index', $data);
    }
    public function absensi()
    {
        $data[ 'absensi' ] = $this->m_model->get_data( 'absensi' )->result();
        $this->load->view('karyawan/absensi', $data);
    }
    public function profile()
    {
        $data[ 'user' ] = $this->m_model->get_by_id( 'user',          'id', $this->session->userdata( 'id' ) )->result();
        $this->load->view( 'karyawan/profile', $data );
    }
    public function ubah_profile()
    {
        $data[ 'user' ] = $this->m_model->get_by_id( 'user', 'id', $this->session->userdata( 'id' ) )->result();
        $this->load->view( 'karyawan/ubah_profile', $data );
    }
    public function aksi_ubah_profile()
    {
            $passsword_baru = $this->input->post( 'password_baru' );
            $konfirmasi_password = $this->input->post( 'konfirmasi_password' );
            $email = $this->input->post( 'email' );
            $nama_depan = $this->input->post( 'nama_depan' );
            $nama_belakang = $this->input->post( 'nama_belakang' );

            if ( $foto[ 0 ] == false ) {
                //data yg akan diubah
                $data = [
                    'foto'=> 'User.png',
                    'email'=> $email,
                    'username'=> $username,
                    'nama_depan'=> $nama_depan,
                    'nama_belakang'=> $nama_belakang,
                ];
            } else {
                //data yg akan diubah
                $data = [
                    'foto'=> $foto[ 1 ],
                    'email'=> $email,
                    'username'=> $username,
                    'nama_depan'=> $nama_depan,
                    'nama_belakang'=> $nama_belakang,
                ];

            }
            //kondisi jika ada password baru
            if ( !empty( $password_baru ) ) {
                //pastikan password baru dan konfirmasi password sama
                if ( $password_baru === $konfirmasi_password ) {
                    //wadah password baru
                    $data[ 'password' ] = md5( $password_baru );
                } else {
                    $this->session->set_flashdata( 'message', 'password baru dan konfirmasi password harus sama' );
                    redirect( base_url( 'karyawan/profile' ) );
                }
            }

            //untuk melakukan pembaruan data
            $this->session->set_userdata( $data );
            $update_result = $this->m_model->ubah_data( 'user', $data, array( 'id' => $this->session->userdata( 'id' ) ) );

            if ( $update_result ) {
                redirect( base_url( 'karyawan/profile' ) );
            } else {
                redirect( base_url( 'karyawan/profile' ) );
            }
    }
    public function aksi_update_profile()
    {
        $data = [
            'username' => $this->input->post('username'),
            'email  ' => $this->input->post('email'),
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'password' => $this->input->post('password'),
        ];
        $eksekusi = $this->m_model->ubah_data('user', $data, ['id' => $this->input->post('id')]);
        if ($eksekusi) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('karyawan/profile'));
        } else {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('karyawan/ubah_profile/' . $this->input->post('id')));
        }
    }
    public function menu_izin()
    {
        $data[ 'absensi' ] = $this->m_model->get_data( 'absensi' )->result();
        $this->load->view('karyawan/menu_izin', $data);
    }
    public function menu_absen()
    {
        $data[ 'absensi' ] = $this->m_model->get_data( 'absensi' )->result();
        $this->load->view('karyawan/menu_absen', $data);
    }
    public function profilee()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id')->result();
        $data['user'] = $this->m_model->get_data('user')->result();
        $this->load->view('karyawan/ubah_profile', $data);
    }
    public function delete_absensi($id)
    {
        $this->m_model->delete('absensi', 'id', $id);
        redirect(base_url('karyawan/absensi'));
    }
    public function history()
    {
        $data[ 'karyawan' ] = $this->m_model->get_data('absensi')->result();
        $this->load->view('karyawan/history', $data);
    }
    public function ubah_absen()
	{
		$data['absensi'] = $this->m_model->get_by_id('absensi', 'id')->result();
         $this->load->view('karyawan/ubah_absen', $data);
	}
	public function aksi_ubah_absen()
	{
		$data = [
			'kegiatan' => $this->input->post('kegiatan'),
		];
		 $eksekusi=$this->m_model->ubah_data
		 ('siswa', $data, array('id'=>$this->input->post('id')));
		 if($eksekusi){
			$this->session->set_flashdata('sukses', 'berhasil');
			redirect(base_url('admin/siswa'));
		 } else {
			$this->session->set_flashdata('error', 'gagal...');
			redirect(base_url('karyawan/ubah_absen'.$this->input->post('id')));
		 }
	}
}
