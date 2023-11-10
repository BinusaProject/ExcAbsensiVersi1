<?php
function organisasi($id_organisasi)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db
        ->where('id_organisasi', $id_organisasi)
        ->get('organisasi');
    foreach ($result->result() as $c) {
        $tmt = $c->nama_organisasi;
        return $tmt;
    }
}

function nama_user($id_user)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_user', $id_user)->get('user');
    foreach ($result->result() as $c) {
        $tmt = $c->username;
        return $tmt;
    }
}

function nama_admin($id_admin)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_admin', $id_admin)->get('admin');
    foreach ($result->result() as $c) {
        $tmt = $c->username;
        return $tmt;
    }
}
?>