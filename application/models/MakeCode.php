<?php

class MakeCode extends CI_Model
{
    function kd_buku()
    {
        $query = $this->db->query("SELECT MAX(kd_buku) as id_buku from buku"); //
        $data = $query->row();
        $id_buku = $data->id_buku;
        $nourut = substr($id_buku, 2, 4);
        $buku = $nourut + 1;
        return $buku;
    }
    function kd_pengarang()
    {
        $qry = $this->db->query("SELECT MAX(kd_pengarang) as id from pengarang");
        $data = $qry->row();
        $id = $data->id;
        $no = substr($id, 2, 4);
        $pengarang = $no + 1;
        $kd = 'PG' . sprintf("%04s", $pengarang);
        return $kd;
    }
    function kd_penerbit()
    {
        $qry = $this->db->query("SELECT MAX(kd_penerbit) as id from penerbit");
        $data = $qry->row();
        $id = $data->id;
        $no = substr($id, 2, 4);
        $penerbit = $no + 1;
        $kd = 'PN' . sprintf("%04s", $penerbit);
        return $kd;
    }
    function kd_kategori()
    {
        $qry = $this->db->query("SELECT MAX(kd_kategori) as id from kategori");
        $data = $qry->row();
        $id = $data->id;
        $no = substr($id, 2, 4);
        $kategori = $no + 1;
        $kd = 'KT' . sprintf("%04s", $kategori);
        return $kd;
    }
    function kd_detail($id)
    {
        $detail_buku = $this->db->query("SELECT buku.id, buku.kd_buku, MAX(detail_buku.kd_detail) AS detail_buku FROM buku, detail_buku WHERE buku.kd_buku=detail_buku.kd_buku AND buku.id=$id")->row_array();
        $dariDB = $detail_buku['detail_buku'];
        $nourut = substr($dariDB, 9, 1);
        $id_detail = substr($dariDB, 0, 9);
        $_nourut = intval($nourut);
        $kdBukuNow = $_nourut + 1;
        $id_buku = $detail_buku['kd_buku'];
        if ($id_detail == '') {
            $_idDetail = $id_buku . "DTL1";
        } else {
            $_idDetail = $id_buku . "DTL" . $kdBukuNow;
        }
        return $_idDetail;
    }
}
