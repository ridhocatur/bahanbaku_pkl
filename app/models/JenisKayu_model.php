<?php

class JenisKayu_model
{
    private $tabel = 'jeniskayu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->tabel);
        return $this->db->ambilSemua();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->tabel .' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function tambahData($data)
    {
        $this->db->kueri("INSERT INTO ".$this->tabel." VALUES ('', :kd_jenis, :nama, :keterangan)");
        $this->db->bind('kd_jenis', $data['kd_jenis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function editData($data)
    {
        // var_dump($data);
        $this->db->kueri("UPDATE ".$this->tabel." SET kd_jenis=:kd_jenis, nama=:nama, keterangan=:keterangan WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('kd_jenis', $data['kd_jenis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->tabel." WHERE id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }

}