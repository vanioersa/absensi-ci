<?php
class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }

    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id($table);
    }

    public function register($username, $email,  $nama_depan, $nama_belakang, $password, $role)
    {
        $pass = md5($password);
        $data = array(
            'username' => $username,
            'email' => $email,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'password' => $pass,
            'role' => $role
        );

        // Simpan data ke dalam tabel pengguna (ganti 'users' sesuai dengan nama tabel Anda)
        $this->db->insert('user', $data);
    }

    public function registeri($username, $email,  $nama_depan, $nama_belakang, $password, $role)
    {
        $pass = md5($password);
        $data = array(
            'username' => $username,
            'email' => $email,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'password' => $pass,
            'role' => $role
        );

        // Simpan data ke dalam tabel pengguna (ganti 'users' sesuai dengan nama tabel Anda)
        $this->db->insert('user', $data);
    }

    public function registerii($username, $email,  $nama_depan, $nama_belakang, $password, $role)
    {
        $pass = md5($password);
        $data = array(
            'username' => $username,
            'email' => $email,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'password' => $pass,
            'role' => $role
        );

        // Simpan data ke dalam tabel pengguna (ganti 'users' sesuai dengan nama tabel Anda)
        $this->db->insert('user', $data);
    }

    public function ubah_data($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }
    public function getAbsensiLast7Days()
    {
        $this->load->database();
        $end_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));
        $query = $this->db->select('date, kegiatan, jam_masuk, jam_pulang, keterangan, status, COUNT(*) AS total_absences')
            ->from('absensi')
            ->where('date >=', $start_date)
            ->where('date <=', $end_date)
            ->group_by('date, kegiatan, jam_masuk, jam_pulang, keterangan, status')
            ->get();
        return $query->result_array();
    }

    public function getbulanan($bulan)
    {
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%m') =", $bulan);
        $db = $this->db->get();
        $result = $db->result();
        return $result;
    }

    public function get_harian()
    {
        $this->db->select('absensi.*, user.nama_depan, nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where('date', date('Y-m-d'));
        $db = $this->db->get();
        return $db->result();
    }

    public function getData()
    {
        $this->db->select('absensi.*,user.username');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        // $this->db->join('kelas', 'pembayaran.id_kelas = kelas.id', 'left');
        // Query database untuk mengambil data
        $query = $this->db->get();
        return $query->result();
    }

    function get_karyawan() {
        $this->db->select( 'absensi.*, user.username' );
        $this->db->from( 'absensi' );
        $this->db->join( 'user', 'absensi.id_karyawan = user.id', 'left' );
        $query = $this->db->get();
        return $query->result();
}

}