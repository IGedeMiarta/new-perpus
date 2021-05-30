<?php

class BookModels extends CI_Model
{

    function getAllBook()
    {
        return $this->db->query(
            "SELECT 
                buku.kd_buku,
                buku.judul,
                pengarang.nama_pengarang,
                penerbit.nama_penerbit,
                buku.th_terbit,
                kategori.nama_kategori
                FROM buku,pengarang,penerbit,kategori 
                WHERE buku.pengarang=pengarang.kd_pengarang
                AND buku.penerbit=penerbit.kd_penerbit
                AND buku.kategori=kategori.kd_kategori"
        )->result();
    }

    function getAllFromTable($table)
    {
        return $this->db->get($table)->result();
    }
    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
