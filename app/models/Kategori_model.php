<?php

class Kategori_model
{
    private $tabel = 'kategori';
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
        $this->db->kueri('SELECT * FROM '. $this->tabel .' Where id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getKategoriBahan()
    {
        $this->db->kueri("SELECT * FROM ". $this->tabel ." WHERE NOT nm_kateg LIKE '%kayu%'");
        return $this->db->ambilSemua();
    }

    public function tambahData($data)
    {
        $this->db->kueri("insert into ".$this->tabel." values ('', :nm_kateg, :keterangan)");
        $this->db->bind('nm_kateg', $data['nm_kateg']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function editData($data)
    {
        // var_dump($data);
        $this->db->kueri("update ".$this->tabel." set nm_kateg=:nm_kateg, keterangan=:keterangan where id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nm_kateg', $data['nm_kateg']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function hapusData($id)
    {
        $this->db->kueri("delete from ".$this->tabel." where id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }

}