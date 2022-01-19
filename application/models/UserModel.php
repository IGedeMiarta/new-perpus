<?php

class UserModel extends CI_Model
{
    function read($table)
    {
        return $this->db->get($table)->result();
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
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
    }
    function updatePetugas($data)
    {
        $id = $data['id'];
        $update = [
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'jenkel' => $data['jenkel'],
            'no_hp' => $data['hp'],
            'alamat' => $data['alamat']
        ];
        return $this->update(['id_petugas' => $id], $update, 'petugas');
    }
    function gelAllAnggota()
    {
        $db =  $this->db->query("SELECT
                                    anggota.id_anggota,
                                    anggota.nis,
                                    anggota.nama,
                                    anggota.jenis_kel,
                                    anggota.alamat,
                                    anggota.no_hp,
                                    status_anggota.status
                                FROM 
                                    anggota 
                                LEFT JOIN 
                                    status_anggota 
                                ON anggota.status=status_anggota.id_status_anggota")->result();
        return $db;
    }
    function getAllDonasi()
    {
        return $this->db->query("SELECT donasi.*,donatur.nama_donatur,donatur.no_hp,detail_donasi.keterangan,detail_donasi.status AS status_donasi,buku.judul FROM donasi JOIN donatur ON donasi.donatur=donatur.id_donatur JOIN detail_donasi ON donasi.detail=detail_donasi.id_detail_donasi LEFT JOIN buku ON buku.kd_buku=donasi.buku ORDER BY id_donasi DESC")->result();
    }
    function getAllDonasiOnTanggal($mulai,$sampai){
        return $this->db->query(
            "SELECT 
                donasi.*,
                donatur.nama_donatur,
                donatur.no_hp,
                detail_donasi.keterangan,
                detail_donasi.status AS status_donasi,
                buku.judul 
            FROM 
                donasi 
            JOIN 
                donatur ON donasi.donatur=donatur.id_donatur 
            JOIN 
                detail_donasi ON donasi.detail=detail_donasi.id_detail_donasi 
            LEFT JOIN 
                buku ON buku.kd_buku=donasi.buku 
            WHERE
                donasi.tgl_donasi>= '$mulai'
            AND 
                donasi.tgl_donasi<= '$sampai'
            ORDER BY 
            id_donasi DESC")->result();
         
    }
    function getDonasiWhereId($id)
    {
        return $this->db->query("SELECT donasi.*,donatur.nama_donatur,donatur.no_hp,detail_donasi.keterangan,detail_donasi.status AS status_donasi,buku.*,detail_buku.* FROM donasi JOIN donatur ON donasi.donatur=donatur.id_donatur JOIN detail_donasi ON donasi.detail=detail_donasi.id_detail_donasi LEFT JOIN buku ON buku.kd_buku=donasi.buku LEFT JOIN detail_buku ON buku.kd_buku=detail_buku.kd_buku WHERE donasi.id_donasi=$id")->row_array();
    }

     function account()
    {
        return $this->db->query("SELECT *, COALESCE(username,'null') AS user, petugas.id_petugas FROM petugas LEFT JOIN user ON petugas.id_petugas = user.user_id ORDER BY petugas.id_petugas ASC")->result();
    }
    function accountAnggota()
    {
        return $this->db->query("SELECT *, COALESCE(username,'null') AS user, petugas.id_petugas FROM petugas LEFT JOIN user ON petugas.id_petugas = user.user_id ORDER BY petugas.id_petugas ASC")->result();
    }
}
