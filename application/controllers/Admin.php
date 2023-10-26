<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        if ($this->session->userdata('loged_in') != true || $this->session->userdata('role') != 'admin') {
            redirect(base_url() . 'auth');
        }
    }

    public function index()
    {
        $data['admin'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $data['total_pulang'] = $this->m_model->get_pulang('absensi', $this->session->userdata('id'))->num_rows();
        $data['total_izin'] = $this->m_model->get_izin('absensi', $this->session->userdata('id'))->num_rows();
        $data['total_absen'] = $this->m_model->get_absen('absensi', $this->session->userdata('id'))->num_rows();
        $data['absensi'] = $this->m_model->get_data('absensi')->result();
        $this->load->view('admin/index', $data);
    }

    //from untuk siswa

    public function karyawan()
    {
        // $data['user'] = $this->m_model->get_role('user')->result();
        $data['admin'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $data['user'] = $this->m_model->get_data('user')->result();
        $this->load->view('admin/karyawan', $data);
    }

    public function delete($id)
    {
        $this->m_model->delete('absensi', 'id', $id);
        redirect(base_url('admin/karyawan'));
    }

    public function rekap_mingguan()
    {
        $data['admin'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $data['absensi'] = $this->m_model->getAbsensiLast7Days();
        $data['absensi'] = $this->m_model->get_karyawan();
        $this->load->view('admin/rekap_mingguan', $data);
    }

    public function rekap_harian()
    {
        $data['admin'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $hari_ini = date('Y-m-d');
        $data['absensi_harian'] = $this->m_model->get_harian();
        $data['absensi'] = $this->m_model->get_karyawan();
        $this->load->view('admin/rekap_harian', $data);
    }

    public function rekap_bulanan()
    {
        $data['admin'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $bulan = $this->input->post('bulan');
        $data['absensi_bulanan'] = $this->m_model->get_bulanan($bulan);
        $data['absensi'] = $this->m_model->get_karyawan();
        $this->load->view('admin/rekap_bulanan', $data);
    }

    public function delete_admin($id)
    {
        $this->m_model->delete('absensi', 'id', $id);
        redirect(base_url('admin/karyawan'));
    }

    public function profile()
    {
        $data['admin'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $this->load->view('admin/profile', $data);
    }

    public function upload_image($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './image/karyawan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 30000;
        // Ukuran dalam kilobita ( 30 MB )
        $config['file_name'] = $kode;

        $this->load->library('upload', $config);
        // Load library 'upload' with config

        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }

    public function aksi_update_profile()
    {
        $image = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');

        // Jika ada foto yang diunggah
        if ($image) {
            $kode = round(microtime(true) * 100);
            $file_name = $kode . '_' . $image;
            $upload_path = './image/karyawan/' . $file_name;

            if (move_uploaded_file($foto_temp, $upload_path)) {
                // Hapus image lama jika ada
                $old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
                if ($old_file && file_exists('./image/karyawan/' . $old_file)) {
                    unlink('./image/karyawan/' . $old_file);
                }

                $data = [
                    'image' => $file_name,
                    'email' => $email,
                    'username' => $username,
                    'nama_depan' => $nama_depan,
                    'nama_belakang' => $nama_belakang,
                ];
            } else {
                // Gagal mengunggah image baru
                redirect(base_url('admin/profile'));
            }
        } else {
            // Jika tidak ada image yang diunggah
            $data = [
                'email' => $email,
                'username' => $username,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
            ];
        }

        // Kondisi jika ada password baru
        if (!empty($password_baru)) {
            // Pastikan password baru dan konfirmasi password sama
            if ($password_baru === $konfirmasi_password) {
                $data['password'] = md5($password_baru);
            } else {
                $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                redirect(base_url('admin/profile'));
            }
        }

        // Eksekusi dengan model ubah_data untuk profil pengguna
        $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));

        if ($update_result) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Merubah Profile
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
            redirect(base_url('admin/profile'));
        } else {
            redirect(base_url('admin/profile'));
        }
    }

    function logout_account()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }

    public function export_minggu()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->getAbsensiLast7Days();

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA KARYAWAN', 'KEGIATAN', 'TANGGAL', 'JAM MASUK', 'JAM PULANG', 'KETERANGAN', 'STATUS'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $nama_karyawan = '';
            $kegiatan = '';
            $tanggal = '';
            $jam_masuk = '';
            $jam_pulang = '';
            $keterangan = '';
            $status = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'kegiatan') {
                    $kegiatan = $cellData;
                } else if ($cellName == 'id_karyawan') {
                    $nama_karyawan = tampil_id_karyawan($cellData);
                } elseif ($cellName == 'date') {
                    $tanggal = $cellData;
                } elseif ($cellName == 'jam_masuk') {
                    if ($cellData == NULL) {
                        $jam_masuk = '-';
                    } else {
                        $jam_masuk = $cellData;
                    }
                } elseif ($cellName == 'jam_pulang') {
                    if ($cellData == NULL) {
                        $jam_pulang = '-';
                    } else {
                        $jam_pulang = $cellData;
                    }
                } elseif ($cellName == 'keterangan') {
                    $keterangan = $cellData;
                } elseif ($cellName == 'status') {
                    $status = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_pulang);
            $sheet->setCellValueByColumnAndRow(7, $rowIndex, $keterangan);
            $sheet->setCellValueByColumnAndRow(8, $rowIndex, $status);
            $no++;

            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'REKAP_MINGGUAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    public function export_harian()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $tanggal = date('Y-m-d'); // Ambil nilai tanggal yang dipilih dari form
        $data = $this->m_model->get_harian($tanggal);

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA KARYAWAN', 'KEGIATAN', 'TANGGAL', 'JAM MASUK', 'JAM PULANG', 'KETERANGAN', 'STATUS'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $nama_karyawan = '';
            $kegiatan = '';
            $tanggal = '';
            $jam_masuk = '';
            $jam_pulang = '';
            $keterangan = '';
            $status = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'kegiatan') {
                    $kegiatan = $cellData;
                } else if ($cellName == 'id_karyawan') {
                    $nama_karyawan = tampil_id_karyawan($cellData);
                } elseif ($cellName == 'date') {
                    $tanggal = $cellData;
                } elseif ($cellName == 'jam_masuk') {
                    if ($cellData == NULL) {
                        $jam_masuk = '-';
                    } else {
                        $jam_masuk = $cellData;
                    }
                } elseif ($cellName == 'jam_pulang') {
                    if ($cellData == NULL) {
                        $jam_pulang = '-';
                    } else {
                        $jam_pulang = $cellData;
                    }
                } elseif ($cellName == 'keterangan') {
                    $keterangan = $cellData;
                } elseif ($cellName == 'status') {
                    $status = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_pulang);
            $sheet->setCellValueByColumnAndRow(7, $rowIndex, $keterangan);
            $sheet->setCellValueByColumnAndRow(8, $rowIndex, $status);
            $no++;

            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'REKAP_HARIAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    public function export_bulanan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Ambil bulan dari input formulir
        $bulan = $this->input->post('bulan');
        // Data yang akan diekspor (contoh data)
        $bulan = date('m');; // Ambil nilai bulan yang dipilih dari form
        $data = $this->m_model->get_bulanan($bulan);

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA KARYAWAN', 'KEGIATAN', 'TANGGAL', 'JAM MASUK', 'JAM PULANG', 'KETERANGAN IZIN', 'STATUS'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $nama_karyawan = '';
            $kegiatan = '';
            $tanggal = '';
            $jam_masuk = '';
            $jam_pulang = '';
            $keterangan = '';
            $status = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'kegiatan') {
                    $kegiatan = $cellData;
                } else if ($cellName == 'id_karyawan') {
                    $nama_karyawan = tampil_id_karyawan($cellData);
                } elseif ($cellName == 'date') {
                    $tanggal = $cellData;
                } elseif ($cellName == 'jam_masuk') {
                    if ($cellData == NULL) {
                        $jam_masuk = '-';
                    } else {
                        $jam_masuk = $cellData;
                    }
                } elseif ($cellName == 'jam_pulang') {
                    if ($cellData == NULL) {
                        $jam_pulang = '-';
                    } else {
                        $jam_pulang = $cellData;
                    }
                } elseif ($cellName == 'keterangan') {
                    $keterangan = $cellData;
                } elseif ($cellName == 'status') {
                    $status = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_pulang);
            $sheet->setCellValueByColumnAndRow(7, $rowIndex, $keterangan);
            $sheet->setCellValueByColumnAndRow(8, $rowIndex, $status);
            $no++;

            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'REKAP_BULANAN' . $bulan . '.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    public function export_karyawan()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
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
        $sheet->setCellValue('A1', "REKAP BULANAN");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        // set thead
        $sheet->setCellValue('A3', "Nama Pegawai");
        $sheet->setCellValue('B3', "Kegiatan");
        $sheet->setCellValue('C3', "Tanggal");
        $sheet->setCellValue('D3', "Waktu Datang");
        $sheet->setCellValue('E3', "Waktu Pulang");
        $sheet->setCellValue('F3', "Keterangan");
        $sheet->setCellValue('G3', "Status");

        // mengaplikasikan style thead
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);

        // get dari database
        // $data_pembayaran = $this->m_model->getDataSiswa();

        $no = 1;
        $numrow = 4;
        foreach ($data as $data) {
            $sheet->setCellValue('A' . $numrow, $data->username);
            $sheet->setCellValue('B' . $numrow, $data->kegiatan);
            $sheet->setCellValue('C' . $numrow, $data->date);
            $sheet->setCellValue('D' . $numrow, $data->jam_masuk);
            $sheet->setCellValue('E' . $numrow, $data->jam_pulang);
            $sheet->setCellValue('F' . $numrow, $data->keterangan);
            $sheet->setCellValue('E' . $numrow, $data->status);

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

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
        $sheet->setTitle("Karyawan");
        header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Karyawan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    // public function import()
    // {
    //     if (isset($_FILES["file"]["name"])) {
    //         $path = $_FILES["file"]["tmp_name"];
    //         $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
    //         foreach ($object->getWorksheetIterator() as $worksheet) {
    //             $highestRow = $worksheet->getHighestRow();
    //             $highestColumn = $worksheet->getHighestColumn();
    //             for ($row = 2; $row <= $highestRow; $row++) {
    //                 $nama_siswa = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    //                 $nisn = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
    //                 $gender = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
    //                 $tingkat_kelas = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
    //                 $jurusan_kelas = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

    //                 $get_by_kelas = $this->m_model->get_by_kelas($tingkat_kelas, $jurusan_kelas);
    //                 $data = array(
    //                     'nama_siswa' => $nama_siswa,
    //                     'nisn' => $nisn,
    //                     'gender' => $gender,
    //                     'id_kelas' => $get_by_kelas,
    //                     'foto' => 'User.png'
    //                 );
    //                 $this->m_model->tambah_data('siswa', $data);
    //             }
    //         }
    //         redirect(base_url('admin/siswa'));
    //     } else {
    //         echo 'Invalid File';
    //     }
    // }
    // public function export_guru()
    // {
    //     $data['data_guru'] = $this->m_model->get_data('guru')->result();
    //     $data['nama'] = 'guru';
    //     if ($this->uri->segment(3) == "pdf") {
    //         $this->load->library('pdf');
    //         $this->pdf->load_view('admin/export_data_guru', $data);
    //         $this->pdf->load_view('admin/export_data_guru', $data);
    //         $this->pdf->render();
    //         $this->pdf->stream("data_guru.pdf", array("Attachment" => false));
    //     } else {
    //         $this->load->view('admin/download_data_guru', $data);
    //     }
    // }
}
