<?php

class BahanMasuk_model
{
    private $bahan_masuk = 'bahan_masuk';
    private $bahan = 'bahan_bantu';
    private $supplier = 'supplier';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->bahan_masuk);
        return $this->db->ambilSemua();
    }

    public function getJoin()
    {
        $this->db->kueri('SELECT '.$this->bahan_masuk.'.*, '.$this->supplier.'.nm_sup, '.$this->bahan.'.kd_bahan, '.$this->bahan.'.merk
        FROM '.$this->bahan_masuk.'
        JOIN '.$this->supplier.' ON '.$this->bahan_masuk.'.id_supplier = '.$this->supplier.'.id
        JOIN '.$this->bahan.' ON '.$this->bahan_masuk.'.id_bahan = '.$this->bahan.'.id
        ORDER BY tgl ASC');

        return $this->db->ambilSemua();
    }

    public function getJoinById($id)
    {
        $this->db->kueri('SELECT '.$this->bahan_masuk.'.*, '.$this->bahan.'.kd_bahan, '.$this->supplier.'.nm_sup FROM '.$this->bahan_masuk.' JOIN '.$this->supplier.' ON '.$this->bahan_masuk.'.id_supplier='.$this->supplier.'.id JOIN '.$this->bahan.' ON '.$this->bahan_masuk.'.id_bahan='.$this->bahan.'.id WHERE '.$this->bahan_masuk.'.id=:id'
        );

        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->bahan_masuk .' Where id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getByDate($tgl_awal, $tgl_akhir, $id_supplier)
    {
        $kondisi = "";
        $sql = "SELECT ".$this->bahan_masuk.".*, ".$this->supplier.".nm_sup, ".$this->bahan.".kd_bahan, ".$this->bahan.".merk
        FROM ".$this->bahan_masuk."
        JOIN ".$this->supplier." ON ".$this->bahan_masuk.".id_supplier = ".$this->supplier.".id
        JOIN ".$this->bahan." ON ".$this->bahan_masuk.".id_bahan = ".$this->bahan.".id";
        if ($tgl_awal != "" && $tgl_akhir==""){
            $kondisi .= " WHERE tgl = '$tgl_awal'";
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl = '$tgl_akhir'";
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($id_supplier != "") {
            if($kondisi != ""){
                $kondisi .=" AND ".$this->bahan_masuk.".id_supplier = '$id_supplier' ORDER BY tgl ASC";
            } else {
                $kondisi .=" WHERE ".$this->bahan_masuk.".id_supplier = '$id_supplier' ORDER BY tgl ASC";
            }
        }
        $this->db->kueri($sql . $kondisi);
        return $this->db->ambilSemua();
    }

    public function tambahData($data)
    {
        $this->db->kueri("INSERT INTO ".$this->bahan_masuk." VALUES ('', :invoice, :tgl, :id_bahan, :nama, :stok_masuk, :keterangan, :id_supplier);");
        $this->db->bind('tgl', date($data['tgl']));
        $this->db->bind('invoice', $data['invoice']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_bahan', $data['id_bahan']);
        $this->db->bind('stok_masuk', $data['stok_masuk']);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();


        return $this->db->rowCount();

    }

    public function editData($data)
    {
        $this->db->kueri("UPDATE ".$this->bahan_masuk." SET invoice=:invoice, tgl=:tgl, nama=:nama, id_bahan=:id_bahan, id_supplier=:id_supplier, keterangan=:keterangan where id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('invoice', $data['invoice']);
        $this->db->bind('tgl', date($data['tgl']));
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_bahan', $data['id_bahan']);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->bahan_masuk." where id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();

    }

}