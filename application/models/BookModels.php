<?php

class BookModels extends CI_Model
{

    function getAllBook()
    {
        return $this->db->query(
            "SELECT 
                buku.isbn,
                buku.kd_buku,
                buku.judul,
                pengarang.nama_pengarang,
                penerbit.nama_penerbit,
                buku.th_terbit,
                kategori.nama_kategori,
                buku.status
                FROM buku,pengarang,penerbit,kategori 
                WHERE buku.pengarang=pengarang.kd_pengarang
                AND buku.penerbit=penerbit.kd_penerbit
                AND buku.kategori=kategori.kd_kategori
                ORDER BY buku.isbn DESC"

        )->result();
    }
    function getBukuId($id)
    {
        return $this->db->query("SELECT * FROM buku,pengarang,penerbit,kategori WHERE buku.pengarang=pengarang.kd_pengarang AND buku.penerbit=penerbit.kd_penerbit AND buku.kategori=kategori.kd_kategori AND buku.isbn=$id")->row_array();
    }
    function getAllDetailBuku($kd)
    {
        return $this->db->query("SELECT *,detail_buku.status as status_buku FROM buku JOIN detail_buku JOIN rak ON buku.kd_buku=detail_buku.kd_buku AND detail_buku.rak=rak.id_rak WHERE detail_buku.kd_buku='$kd' ORDER BY detail_buku.kd_detail")->result();
    }

    function getAllRak()
    {
        return $this->db->query("SELECT * FROM `rak` ORDER BY nama_rak")->result();
    }

    function getAllFromTable($table)
    {
        return $this->db->get($table)->result();
    }
    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function addKategori($data)
    {
        $qry = $this->db->insert('kategori', ['nama' => $data['nama']]);
        $out = $qry->affected_rows;
        return $out;
    }
    function edit($where, $table)
    {
        return $this->db->get_where($table, $where)->row_array();
    }
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete($where, $table)
    {
        $this->db->delete($table, $where);
        return;
    }
}
