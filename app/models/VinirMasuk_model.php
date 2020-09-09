<?php

class VinirMasuk_model
{
    private $vinir = 'vinir';
    private $vinir_masuk = 'vinir_masuk';
    private $kayu = 'kayu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->vinir_masuk);
        return $this->db->ambilSemua();
    }

    public function getJoin()
    {
        $this->db->kueri('SELECT '.$this->vinir_masuk.'.*, '.$this->kayu.'.kd_kayu, '.$this->vinir.'.kd_jenis, '.$this->vinir.'.ukuran
        FROM '.$this->vinir_masuk.'
        INNER JOIN '.$this->kayu.' ON '.$this->vinir_masuk.'.id_kayu = '.$this->kayu.'.id
        INNER JOIN '.$this->vinir.' ON '.$this->vinir_masuk.'.id_vinir = '.$this->vinir.'.id'
        );

        return $this->db->ambilSemua();
    }

    public function getJoinById($id)
    {
        $this->db->kueri('SELECT '.$this->vinir_masuk.'.*, '
        .$this->kayu.'.kd_kayu
        FROM '.$this->vinir_masuk.'
        INNER JOIN '.$this->kayu.' ON '.$this->vinir_masuk.'.id_kayu = '.$this->kayu.'.id
        WHERE '.$this->vinir_masuk.'.id=:id'
        );

        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->vinir_masuk .' Where id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getDataforReport($tgl_awal, $tgl_akhir, $id_kayu)
    {
        $kondisi ="";
        $sql = "SELECT ".$this->vinir_masuk.".*, ".$this->kayu.".kd_kayu, ".$this->vinir.".kd_jenis, ".$this->vinir.".ukuran
        FROM ".$this->vinir_masuk."
        INNER JOIN ".$this->kayu." ON ".$this->vinir_masuk.".id_kayu = ".$this->kayu.".id
        INNER JOIN ".$this->vinir." ON ".$this->vinir_masuk.".id_vinir = ".$this->vinir.".id";
        if ($tgl_awal != "" && $tgl_akhir==""){
            $kondisi .= " WHERE tgl = '$tgl_awal'";
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl = '$tgl_akhir'";
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($id_kayu != "") {
            if($kondisi != ""){
                $kondisi .=" AND ".$this->vinir_masuk.".id_kayu = '$id_kayu' ORDER BY tgl ASC";
            } else {
                $kondisi .=" WHERE ".$this->vinir_masuk.".id_kayu = '$id_kayu' ORDER BY tgl ASC";
            }
        }
        // var_dump($sql.$kondisi);
        $this->db->kueri($sql . $kondisi);
        return $this->db->ambilSemua();
    }

    public function tambahData($data)
    {
        $this->db->kueri("
        INSERT INTO ".$this->vinir_masuk." VALUES ('', :id_kayu, :id_vinir, :tgl, :stok, :kubikasi, :kayu_log, :keterangan)");
        $this->db->bind('tgl', date($data['tgl']));
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id_kayu', $data['id_kayu']);
        $this->db->bind('id_vinir', $data['id_vinir']);
        $this->db->bind('kubikasi', $data['kubikasi']);
        $this->db->bind('kayu_log', $data['kayu_log']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function editData($data)
    {
        $this->db->kueri("UPDATE ".$this->vinir_masuk." set tgl=:tgl, stok_masuk=:stok, kubik_masuk=:kubikasi, kayu_log=:kayu_log, keterangan=:keterangan where id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('tgl', date($data['tgl']));
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('kubikasi', $data['kubikasi']);
        $this->db->bind('kayu_log', $data['kayu_log']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->kueri("delete FROM ".$this->vinir_masuk." where id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();

    }

}