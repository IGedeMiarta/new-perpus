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
        return $this->db->query("SELECT * FROM donasi, donatur, detail_donasi WHERE donasi.donatur=donatur.id_donatur AND donasi.detail=detail_donasi.id_detail_donasi ORDER BY id_donasi DESC")->result();
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
