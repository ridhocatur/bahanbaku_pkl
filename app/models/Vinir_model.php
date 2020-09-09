<?php

class Vinir_model
{
    private $vinir = 'vinir';
    private $jenis = 'jeniskayu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->vinir);
        return $this->db->ambilSemua();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->vinir .' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getJoinAll()
    {
        $this->db->kueri('SELECT '.$this->vinir.'.*, '.$this->jenis.'.nama
        FROM '.$this->vinir.' JOIN '.$this->jenis.' ON '.$this->vinir.'.kd_jenis = '.$this->jenis.'.kd_jenis');

        return $this->db->ambilSemua();
    }

    public function tambahData($data)
    {
        $this->db->kueri("INSERT INTO ".$this->vinir." VALUES ('', :kd_jenis, :ukuran, :stok, :kubikasi, :keterangan)");
        $this->db->bind('kd_jenis', $data['kd_jenis']);
        $this->db->bind('ukuran', $data['ukuran']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('kubikasi', $data['kubikasi']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editData($data)
    {
        $this->db->kueri('UPDATE '.$this->vinir.' SET kd_jenis=:kd_jenis, ukuran=:ukuran, stok=:stok, kubikasi=:kubikasi, keterangan=:keterangan WHERE id=:id');
        $this->db->bind('id', $data['id']);
        $this->db->bind('kd_jenis', $data['kd_jenis']);
        $this->db->bind('ukuran', $data['ukuran']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('kubikasi', $data['kubikasi']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->vinir." WHERE id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

}