<?php

class Kayu_model
{
    private $kayu = 'kayu';
    private $jenis = 'jeniskayu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->kayu);
        return $this->db->ambilSemua();
    }

    public function getJoinAll()
    {
        $this->db->kueri('SELECT '.$this->kayu.'.*, '.$this->jenis.'.nama
        FROM '.$this->kayu.' JOIN '.$this->jenis.' ON '.$this->kayu.'.kd_jenis = '.$this->jenis.'.kd_jenis');

        return $this->db->ambilSemua();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->kayu .' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function tambahData($data)
    {
        $this->db->kueri("INSERT INTO ".$this->kayu." VALUES ('', :kd_kayu, :kd_jenis, :stok, :kubikasi, :keterangan)");
        $this->db->bind('kd_kayu', $data['kd_kayu']);
        $this->db->bind('kd_jenis', $data['kd_jenis']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('kubikasi', $data['kubikasi']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function editData($data)
    {
        $this->db->kueri("UPDATE ".$this->kayu." SET kd_kayu=:kd_kayu, kd_jenis=:kd_jenis, stok=:stok, kubikasi=:kubikasi, keterangan=:keterangan WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('kd_kayu', $data['kd_kayu']);
        $this->db->bind('kd_jenis', $data['kd_jenis']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('kubikasi', $data['kubikasi']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->kayu." WHERE id=:id");
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }
}