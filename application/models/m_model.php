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

    public function get_by_id($tabel, $id_column)
    {
        $data = $this->db->where($id_column)->get($tabel);
        return $data;
    }

}
