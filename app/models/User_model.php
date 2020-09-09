<?php

class User_model
{
    private $tabel = 'users';
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

    public function loginUser($username, $password)
    {
        $this->db->kueri('SELECT * FROM '.$this->tabel.' WHERE username=:username and password=:password');
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);

        return $this->db->ambilSatu();
    }

    public function checkAdmin($id)
    {
        $this->db->kueri('SELECT level FROM '.$this->tabel.' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function tambahData($data)
    {
        $this->db->kueri("INSERT INTO ".$this->tabel." VALUES ('', :nik, :username, :password, :nama, :telp, :level)");
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('level', $data['level']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function editData()
    {
        if(empty($_POST['password'])) {
            $this->db->kueri("UPDATE ".$this->tabel." SET nik=:nik, username=:username, nama=:nama, telp=:telp, level=:level WHERE id=:id");
            $this->db->bind('id', $_POST['id']);
            $this->db->bind('nik', $_POST['nik']);
            $this->db->bind('username', $_POST['username']);
            $this->db->bind('nama', $_POST['nama']);
            $this->db->bind('telp', $_POST['telp']);
            $this->db->bind('level', $_POST['level']);

            $this->db->execute();
        }
        if(!empty($_POST['password'])) {
            $this->db->kueri("UPDATE ".$this->tabel." SET nik=:nik, username=:username, password=:password, nama=:nama, telp=:telp, level=:level WHERE id=:id");
            $this->db->bind('id', $_POST['id']);
            $this->db->bind('nik', $_POST['nik']);
            $this->db->bind('username', $_POST['username']);
            $this->db->bind('password', md5($_POST['password']));
            $this->db->bind('nama', $_POST['nama']);
            $this->db->bind('telp', $_POST['telp']);
            $this->db->bind('level', $_POST['level']);

            $this->db->execute();
        }


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