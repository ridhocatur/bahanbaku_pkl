<?php

class Supplier_model
{
    private $tabel = 'supplier';
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

    public function SuppKayu()
    {
        $this->db->kueri("SELECT * FROM ". $this->tabel ." WHERE sup LIKE '%kayu%'");

        return $this->db->ambilSemua();
    }

    public function SuppBahan()
    {
        $this->db->kueri("SELECT * FROM ". $this->tabel ." WHERE sup LIKE '%bahan%'");

        return $this->db->ambilSemua();
    }

    public function tambahData($data)
    {
        $this->db->kueri("INSERT INTO ".$this->tabel." VALUES ('', :nm_sup, :sup, :alamat, :email, :telp, :keterangan)");
        $this->db->bind('nm_sup', $data['nm_sup']);
        $this->db->bind('sup', $data['sup']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function editData($data)
    {
        $this->db->kueri("UPDATE ".$this->tabel." SET nm_sup=:nm_sup, sup=:sup, alamat=:alamat, email=:email, telp=:telp, keterangan=:keterangan where id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nm_sup', $data['nm_sup']);
        $this->db->bind('sup', $data['sup']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->tabel." WHERE id=:id");
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }
}