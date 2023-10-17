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
        $data['absensi'] = $this->m_model->get_data('absensi')->result();
        $this->load->view('karyawan/index', $data);
    }
    public function absen()
    {
        $data['absensi'] = $this->m_model->get_karyawan();
        $this->load->view('karyawan/absen', $data);
    }
    public function profile()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $this->load->view('karyawan/profile', $data);
    }
    public function ubah_profile()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $this->load->view('karyawan/ubah_profile', $data);
    }
    public function aksi_ubah_profile()
    {
        $passsword_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');
        $email = $this->input->post('email');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');

        if ($foto[0] == false) {
            //data yg akan diubah
            $data = [
                'foto' => 'User.png',
                'email' => $email,
                'username' => $username,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
            ];
        } else {
            //data yg akan diubah
            $data = [
                'foto' => $foto[1],
                'email' => $email,
                'username' => $username,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
            ];
        }
        //kondisi jika ada password baru
        if (!empty($password_baru)) {
            //pastikan password baru dan konfirmasi password sama
            if ($password_baru === $konfirmasi_password) {
                //wadah password baru
                $data['password'] = md5($password_baru);
            } else {
                $this->session->set_flashdata('message', 'password baru dan konfirmasi password harus sama');
                redirect(base_url('karyawan/profile'));
            }
        }

        //untuk melakukan pembaruan data
        $this->session->set_userdata($data);
        $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));

        if ($update_result) {
            redirect(base_url('karyawan/profile'));
        } else {
            redirect(base_url('karyawan/profile'));
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
    public function menu_izin($id)
    {
        $data['absensi'] = $this->m_model->get_by_id('absensi', 'id', $id)->result();
        $this->load->view('karyawan/menu_izin', $data);
    }
    public function menu_absen()
    {
        $data['absensi'] = $this->m_model->get_data('absensi')->result();
        $this->load->view('karyawan/menu_absen', $data);
    }
    public function profilee()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id')->result();
        $data['user'] = $this->m_model->get_data('user')->result();
        $this->load->view('karyawan/ubah_profile', $data);
    }
    public function delete_karyawan($id)
    {
        $this->m_model->delete('absensi', 'id', $id);
        redirect(base_url('karyawan/history'));
    }
    public function delete_absensi($id)
    {
        $this->m_model->delete('absensi', 'id', $id);
        redirect(base_url('karyawan/absen'));
    }
    public function history()
    {
        $data['karyawan'] = $this->m_model->get_data('absensi')->result();
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
        $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id' => $this->input->post('id')));
        if ($eksekusi) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('admin/siswa'));
        } else {
            $this->session->set_flashdata('error', 'gagal...');
            redirect(base_url('karyawan/ubah_absen' . $this->input->post('id')));
        }
    }
    public function pulang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $absensi = $this->db->get_where('absensi', array('id' => $id))->row();
        if ($absensi) {
            $data = [
                'jam_pulang' => date('H.i.s'),
                'status' => 'done'
            ];
            $this->db->where('id', $id);
            $this->db->update('absensi', $data);
            redirect(base_url('karyawan '));
        } else {
            echo 'data absensi tidak ditemukan';
        }
    }
    public function aksi_ubah_karyawan()
    {
        // Pastikan ini adalah metode POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data dari formulir
            $id = $this->input->post('id');
            $keterangan = $this->input->post('keterangan');

            // Validasi data jika diperlukan
            // ...

            // Sekarang Anda dapat memproses pembaruan izin di sini, contohnya dengan menggunakan model
            $data = array(
                'keterangan' => $keterangan,
            );

            // Panggil model Anda untuk memperbarui data izin
            $this->m_model->update_izin('absensi', $id, $data);

            // Redirect ke halaman lain atau tampilkan pesan sukses
            redirect(base_url('karyawan/halaman_lain'));
        }
    }


    public function tambah_absensi()
    {
        $data['absensi'] = $this->m_model->get_karyawan();
        $this->load->view('karyawan/tambah_absensi', $data);
    }

    public function aksi_tambah_absen()
    {
        $data = [
            'id_karyawan' => $this->input->post('username'),
            'kegiatan' => $this->input->post('kegiatan'),
            'date' => $this->input->post('date'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_pulang' => $this->input->post('jam_pulang'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
        ];
        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('karyawan/absen'));
    }

    public function export_absen()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
            ]
        ];

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
            ]
        ];

        // set judul
        $sheet->setCellValue('A1', "ABSEN KARYAWAN");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        // set thead
        $sheet->setCellValue('A3', "Kegiatan");
        $sheet->setCellValue('B3', "Tanggal");
        $sheet->setCellValue('C3', "Jam Masuk");
        $sheet->setCellValue('D3', "Jam Pulang");
        $sheet->setCellValue('E3', "Keterangan");
        // $sheet->setCellValue('F3', "");
        // $sheet->setCellValue('E3', "KELAS");

        // mengaplikasikan style thead
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        // $sheet->getStyle('F3')->applyFromArray($style_col);
        // $sheet->getStyle('E3')->applyFromArray($style_col);

        // get dari database
        // $data_pembayaran = $this->m_model->getDataSiswa();

        $no = 1;
        $numrow = 4;
        foreach ($data as $data) {
            $sheet->setCellValue('A' . $numrow, $data->kegiatan);
            $sheet->setCellValue('B' . $numrow, $data->date);
            $sheet->setCellValue('C' . $numrow, $data->jam_masuk);
            $sheet->setCellValue('D' . $numrow, $data->jam_pulang);
            $sheet->setCellValue('E' . $numrow, $data->keterangan);
            // $sheet->setCellValue('F' . $numrow, $data->foto);
            // $sheet->setCellValue('E' . $numrow, $data->tingkat_kelas . ' ' . $data->jurusan_kelas);

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        // set panjang column
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);

        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // set nama file saat di export
        $sheet->setTitle("Absen");
        header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Absen.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    // public function masuk($id)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $absensi = $this->db->get_where('absensi', array('id' => $id))->row();
    //     if ($absensi) {
    //         $data = [
    //             "id_karyawan" => 'username',
    //             "date" => date('Y-m-d'),
    //             "jam_masuk" => date('H:i:s'),
    //             "status" => 'not',
    //         ];
    //         $this->db-> where('id', $id);
    //         $this->db-> update('absensi', $data);
    //         redirect(base_url('karyawan/index'));
    //     } else {
    //         echo 'Data Absensi Tidak Ditemulkan';
    //     }
    // }
}
