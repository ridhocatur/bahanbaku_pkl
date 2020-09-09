<?php

class BahanBantu_model
{
    private $tabel = 'bahan_bantu';
    private $kategori = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getJoinAll()
    {
        $this->db->kueri('SELECT '.$this->tabel.'.*, '.$this->kategori.'.nm_kateg
        FROM '.$this->tabel.' JOIN '.$this->kategori.' ON '.$this->tabel.'.id_kategori ='.$this->kategori.'.id');

        return $this->db->ambilSemua();
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->tabel);
        return $this->db->ambilSemua();
    }

    public function getJoinById($id)
    {
        $this->db->kueri('SELECT '.$this->tabel.'.*, '.$this->kategori.'.nm_kateg FROM '.$this->tabel.'
        INNER JOIN '.$this->kategori.' ON '.$this->tabel.'.id_kategori = '.$this->kategori.'.id
        WHERE '.$this->tabel.'.id=:id'
        );

        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->tabel .' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function tambahData($data)
    {
        $this->db->kueri("INSERT INTO ".$this->tabel." VALUES ('', :kd_bahan, :nama, :merk, :stok, :id_kategori, :keterangan)");
        $this->db->bind('kd_bahan', $data['kd_bahan']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('merk', $data['merk']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editData($data)
    {
        $this->db->kueri("UPDATE ".$this->tabel." SET kd_bahan=:kd_bahan, nama=:nama, merk=:merk, stok=:stok, id_kategori=:id_kategori, keterangan=:keterangan where id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('kd_bahan', $data['kd_bahan']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('merk', $data['merk']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id_kategori', $data['id_kategori']);
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