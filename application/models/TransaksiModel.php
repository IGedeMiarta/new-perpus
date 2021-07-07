<?php

class TransaksiModel extends CI_Model
{
    function getAllPeminjaman()
    {
        $qry = $this->db->query(
            "SELECT 
                peminjaman.id_peminjaman,
                peminjaman.tgl_pinjam,
                anggota.nama,
                buku.judul,
                peminjaman.batas_pinjam,
                detail_peminjaman.status_pinjam
            FROM 
                peminjaman,detail_buku,buku,anggota,detail_peminjaman 
            WHERE 
                peminjaman.id_anggota=anggota.id_anggota
            AND
                peminjaman.id_buku=detail_buku.id_detail
            AND
                detail_buku.kd_buku=buku.kd_buku
            AND 
                peminjaman.detail=detail_peminjaman.id_detail_peminjaman"
        )->result();
        return $qry;
    }
    function gelAllAvailableBook()
    {
        return $this->db->query(
            "SELECT 
                detail_buku.id_detail,
                buku.kd_buku,
                buku.judul,
                rak.nama_rak,
                detail_buku.status
            FROM 
                detail_buku,buku,rak
            WHERE 
                buku.kd_buku=detail_buku.kd_buku
            AND
                detail_buku.rak=rak.id_rak
            AND
            detail_buku.status=1 GROUP BY detail_buku.kd_buku"
        )->result();
    }
    function gelAllBook()
    {
        return $this->db->query(
            "SELECT 
                detail_buku.id_detail,
                buku.kd_buku,
                buku.judul,
                rak.nama_rak,
                detail_buku.status
            FROM 
                detail_buku,buku,rak
            WHERE 
                buku.kd_buku=detail_buku.kd_buku
            AND
                detail_buku.rak=rak.id_rak
           GROUP BY detail_buku.kd_buku"
        )->result();
    }
    function read($table)
    {
        return $this->db->get($table)->result();
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function get($where, $table)
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
    }
}
