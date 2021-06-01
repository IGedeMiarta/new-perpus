<?php

class BookModels extends CI_Model
{

    function getAllBook()
    {
        return $this->db->query(
            "SELECT 
                buku.id,
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
                AND buku.kategori=kategori.kd_kategori"
        )->result();
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
