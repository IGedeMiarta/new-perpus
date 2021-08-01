<?php

class DashboardModel extends CI_Model
{
    function countAllBuku()
    {
        return $this->db->query("SELECT COUNT(id) as all_buku FROM buku")->row_array();
    }
    function countAllAnggota()
    {
        return $this->db->query("SELECT COUNT(id_anggota) as all_anggota FROM anggota")->row_array();
    }
    function countPeminjamanActive()
    {
        return $this->db->query("SELECT COUNT(*) as all_peminjaman FROM peminjaman WHERE peminjaman.detail=1 OR peminjaman.detail=4")->row_array();
    }
    function sumAllDonasi()
    {
        return $this->db->query("SELECT SUM(jml_donasi) as jml_donasi FROM donasi")->row_array();
    }
}
