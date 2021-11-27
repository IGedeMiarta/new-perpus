<?php

class TransaksiModel extends CI_Model
{
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

    function getAllPeminjaman()
    {
        $qry = $this->db->query(
            "SELECT 
                    peminjaman.id_peminjaman,
                    peminjaman.tgl_pinjam,
                    anggota.nis,
                    anggota.nama,
                    buku.kd_buku,
                    buku.judul,
                    detail_buku.kd_detail,
                    peminjaman.batas_pinjam,
                    peminjaman.tgl_perpanjang,
                    detail_peminjaman.status_pinjam
            FROM 
                peminjaman 
            LEFT JOIN 
                anggota 
                    ON peminjaman.id_anggota=anggota.id_anggota
            LEFT JOIN
                detail_peminjaman 
                    ON peminjaman.detail=detail_peminjaman.id_detail_peminjaman
            LEFT JOIN
                detail_buku 
                    ON peminjaman.id_buku=detail_buku.id_detail 
            LEFT JOIN
                buku 
                    ON detail_buku.kd_buku=buku.kd_buku
            ORDER BY 
                peminjaman.id_peminjaman
            DESC
            "
        )->result();
        return $qry;
    }
    function getPeminjamanActive()
    {
        $qry = $this->db->query(
            "SELECT 
                    peminjaman.id_peminjaman,
                    peminjaman.tgl_pinjam,
                    anggota.nis,
                    anggota.nama,
                    buku.kd_buku,
                    buku.judul,
                    detail_buku.kd_detail,
                    peminjaman.batas_pinjam,
                    detail_peminjaman.status_pinjam
            FROM 
                peminjaman 
            LEFT JOIN 
                anggota 
                    ON peminjaman.id_anggota=anggota.id_anggota
            LEFT JOIN
                detail_peminjaman 
                    ON peminjaman.detail=detail_peminjaman.id_detail_peminjaman
            LEFT JOIN
                detail_buku 
                    ON peminjaman.id_buku=detail_buku.id_detail 
            LEFT JOIN
                buku 
                    ON detail_buku.kd_buku=buku.kd_buku
            WHERE 
                peminjaman.detail=1
            ORDER BY 
                peminjaman.id_peminjaman
            DESC
            "
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
    function getAllPengembalian()
    {
        return $this->db->query(
            "SELECT 
            		pengembalian.id_pengembalian,
            		pengembalian.tgl_kembali,
                    anggota.nis,
                    anggota.nama,
                    buku.kd_buku,
                    buku.judul,
                    detail_buku.kd_detail,
                    detail_pengembalian.status_kembali
            FROM
            	pengembalian
            LEFT JOIN 
            	detail_pengembalian ON pengembalian.detail=detail_pengembalian.id_detail_pengembalian
            LEFT JOIN
                peminjaman ON pengembalian.id_pinjam=peminjaman.id_peminjaman
            LEFT JOIN 
                anggota 
                    ON peminjaman.id_anggota=anggota.id_anggota
            LEFT JOIN
                detail_peminjaman 
                    ON peminjaman.detail=detail_peminjaman.id_detail_peminjaman
            LEFT JOIN
                detail_buku 
                    ON peminjaman.id_buku=detail_buku.id_detail 
            LEFT JOIN
                buku 
                    ON detail_buku.kd_buku=buku.kd_buku
            ORDER BY 
                peminjaman.id_peminjaman
            DESC"
        )->result();
    }
    function getAllPerpanjangan()
    {
        $qry = $this->db->query(
            "SELECT 
                    peminjaman.id_peminjaman,
                    peminjaman.tgl_pinjam,
                    anggota.nis,
                    anggota.nama,
                    buku.kd_buku,
                    buku.judul,
                    detail_buku.kd_detail,
                    peminjaman.batas_pinjam,
                    peminjaman.tgl_perpanjang,
                    detail_peminjaman.status_pinjam
            FROM 
                peminjaman 
            LEFT JOIN 
                anggota 
                    ON peminjaman.id_anggota=anggota.id_anggota
            LEFT JOIN
                detail_peminjaman 
                    ON peminjaman.detail=detail_peminjaman.id_detail_peminjaman
            LEFT JOIN
                detail_buku 
                    ON peminjaman.id_buku=detail_buku.id_detail 
            LEFT JOIN
                buku 
                    ON detail_buku.kd_buku=buku.kd_buku
            WHERE 
            	peminjaman.detail=4
            ORDER BY 
                peminjaman.id_peminjaman
            DESC
            "
        )->result();
        return $qry;
    }
    function countPeminjaman($id_anggota){
        return $this->db->query(
            "SELECT  
                *,
                count(*) AS total_pinjam 
            FROM 
                peminjaman 
            WHERE 
                id_anggota= $id_anggota 
            AND 
                detail = 1 #status dipinjam
            AND 
                detail = 4 #status diperpanjang
        ")->row_array();
    }
}
