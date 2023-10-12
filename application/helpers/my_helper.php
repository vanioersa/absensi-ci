<?php

function convRupiah($value) {
    return 'Rp. ' . number_format($value);
}

function tampil_full_karyawan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('user');
    foreach ($result->result() as $c) {
        $stmt = $c->username;
        return $stmt;
    }
}

?>
