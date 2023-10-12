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
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
            ]
        ];

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
            ]
        ];

        // set judul
        $sheet->setCellValue('A1', "DATA PEMBAYARAN");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        // set thead
        $sheet->setCellValue('A3', "ID");
        $sheet->setCellValue('B3', "JENIS PEMBAYARAN");
        $sheet->setCellValue('C3', "TOTAL PEMBAYARAN");
        $sheet->setCellValue('D3', "SISWA");
        // $sheet->setCellValue('E3', "KELAS");

        // mengaplikasikan style thead
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        // $sheet->getStyle('E3')->applyFromArray($style_col);

        // get dari database
        $data_pembayaran = $this->m_model->getDataPembayaran();

        $no = 1;
        $numrow = 4;
        foreach ($data_pembayaran as $data) {
            $sheet->setCellValue('A' . $numrow, $data->id);
            $sheet->setCellValue('B' . $numrow, $data->jenis_pembayaran);
            $sheet->setCellValue('C' . $numrow, $data->total_pembayaran);
            $sheet->setCellValue('D' . $numrow, $data->nama_siswa);
            // $sheet->setCellValue('E' . $numrow, $data->tingkat_kelas . ' ' . $data->jurusan_kelas);

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        // set panjang column
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);

        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // set nama file saat di export
        $sheet->setTitle("LAPORAN DATA PEMBAYARAN");
        header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="PEMBAYARAN.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    public function export_pembayaran()
    {
        $data['data_pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $data['nama'] = 'pembayaran';
        if ($this->uri->segment(3) == "pdf") {
            $this->load->library('pdf');
            $this->pdf->load_view('keuangan/export_data_pembayaran', $data);
            $this->pdf->load_view('keuangan/export_data_pembayaran', $data);
            $this->pdf->render();
            $this->pdf->stream("data_pembayaran.pdf", array("Attachment" => false));
        } else {
            $this->load->view('keuangan/download_data_pembayaran', $data);
        }
    }
    public function import()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $jenis_pembayaran = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $total_pembayaran = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $nisn = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    $get_id_by_nisn = $this->m_model->get_by_nisn($nisn);
                    $data = array(
                        'jenis_pembayaran' => $jenis_pembayaran,
                        'total_pembayaran' => $total_pembayaran,
                        'id_siswa' => $get_id_by_nisn
                    );
                    $this->m_model->tambah_data('pembayaran', $data);
                }
            }
            redirect(base_url('keuangan/pembayaran'));
        } else {
            echo 'Invalid File';
        }
    }
    public function index()
    {
        $data[ 'karyawan' ] = $this->m_model->get_data('absensi')->result();
        $this->load->view('karyawan/index', $data);
    }
    public function absensi()
    {
        $data[ 'absensi' ] = $this->m_model->get_data( 'absensi' )->result();
        $this->load->view('karyawan/absensi', $data);
    }
    public function profile()
    {
        $data[ 'absensi' ] = $this->m_model->get_data( 'absensi' )->result();
        $this->load->view('karyawan/profile', $data);
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
    public function ubah_profile()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id')->result();
        $this->load->view('karyawan/ubah_profile', $data);
    }
    public function aksi_update_profile()
    {
        $data = [
            'username' => $this->input->post('username'),
            'email  ' => $this->input->post('email    '),
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
    public function ubah_absensi($id)
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id', $id)->result();
        $data['absensi'] = $this->m_model->get_data('absensi')->result();
        $this->load->view('karyawan/ubah_absensi', $data);
    }
    public function aksi_update_absensi()
    {
        $data = [
            'id_karyawan' => $this->input->post('id_karyawan'),
            'kegiatan' => $this->input->post('kegiatan'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_pulang' => $this->input->post('jam_pulang'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
        ];
        $eksekusi = $this->m_model->ubah_data('absensi', $data, ['id' => $this->input->post('id')]);
        if ($eksekusi) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('karyawan/absensi'));
        } else {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('karyawan/ubah_absensi/' . $this->input->post('id')));
        }
    }
    public function tambah_absensi()
    {
        $data['absensi'] = $this->m_model->get_data('absensi')->result();
        $this->load->view('karyawan/tambah_absensi', $data);
    }
    public function aksi_tambah_absensi()
    {
        $data = [
            'id_karyawan' => $this->input->post('id_karyawan'),
            'kegiatan' => $this->input->post('kegiatan'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_pulang' => $this->input->post('jam_pulang'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
        ];
        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('keuangan/absensi'));
    }
    public function delete_absensi($id)
    {
        $this->m_model->delete('absensi', 'id', $id);
        redirect(base_url('karyawan/absensi'));
    }
}
