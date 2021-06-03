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
        return $this->db->query("SELECT *,anggota.status as sts,status_anggota.status AS status_anggota FROM anggota JOIN status_anggota ON anggota.status=status_anggota.id_status_anggota")->result();
    }
}
