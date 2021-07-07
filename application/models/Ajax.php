<?php

class Ajax extends CI_Model
{
    function getWhere($where, $table)
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
    function addKategori($data)
    {
        $qry = $this->db->insert('kategori', ['nama' => $data['nama']]);
        $out = $qry->affected_rows;
        return $out;
    }
}
