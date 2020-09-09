<?php

class Gluemix_model
{
    private $gluemix = 'gluemix';
    private $bantu = 'bahan_bantu';
    private $dtl_gluemix = 'dtl_gluemix';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->gluemix);
        return $this->db->ambilSemua();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->gluemix .' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getDataforReport($tgl_awal, $tgl_akhir, $shift)
    {
        $kondisi ="";
        $sql = "SELECT ".$this->gluemix.".* FROM ".$this->gluemix;
        if ($tgl_awal != "" && $tgl_akhir==""){
            $kondisi .= " WHERE tgl = '$tgl_awal'";
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl = '$tgl_akhir'";
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($shift != "") {
            if($kondisi != ""){
                $kondisi .=" AND ".$this->gluemix.".shift = '$shift' ORDER BY tgl ASC";
            } else {
                $kondisi .=" WHERE ".$this->gluemix.".shift = '$shift' ORDER BY tgl ASC";
            }
        }
        $this->db->kueri($sql . $kondisi);

        return $this->db->ambilSemua();
    }

    public function getDataforReportSheet($tgl_awal, $tgl_akhir, $shift)
    {
        $kondisi ="";
        $sql = "SELECT ".$this->gluemix.".* FROM ".$this->gluemix;
        if ($tgl_awal != "" && $tgl_akhir==""){
            $kondisi .= " WHERE tgl = '$tgl_awal'";
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl = '$tgl_akhir'";
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($shift != "") {
            if($kondisi != ""){
                $kondisi .=" AND ".$this->gluemix.".shift = '$shift' ORDER BY tgl ASC";
            } else {
                $kondisi .=" WHERE ".$this->gluemix.".shift = '$shift' ORDER BY tgl ASC";
            }
        }
        $this->db->kueri($sql . $kondisi);

        return $this->db->ambilSemua();
    }

    public function getDetail($id)
    {
        $sql="SELECT ".$this->dtl_gluemix.".*, ".$this->bantu.".kd_bahan, ".$this->bantu.".merk, ".$this->gluemix.".total, ".$this->gluemix.".shift, ".$this->gluemix.".gluemix FROM ".$this->dtl_gluemix."
        LEFT JOIN ".$this->bantu." ON ".$this->dtl_gluemix.".id_bahan=".$this->bantu.".id
        LEFT JOIN ".$this->gluemix." ON ".$this->dtl_gluemix.".id_gluemix=".$this->gluemix.".id
        WHERE ".$this->gluemix.".id='$id'";
        $this->db->kueri($sql);
        return $this->db->ambilSemua();
    }

    public function tambahData()
    {
        $id = $_POST['id'];
        $tgl = $_POST['tgl'];
        $gluemix = $_POST['gluemix'];
        $shift = $_POST['shift'];
        $total = $_POST['total'];
        $keterangan = $_POST['keterangan'];
        $id_bahan = $_POST['id_bahan'];
        $stok_keluar = $_POST['stok_keluar'];

        $glue = $this->db->kueri("INSERT INTO ".$this->gluemix." VALUES ('', :tgl, :gluemix, :shift, :total, :keterangan)");
        $this->db->bind('tgl', $tgl);
        $this->db->bind('gluemix', $gluemix);
        $this->db->bind('shift', $shift);
        $this->db->bind('total', $total);
        $this->db->bind('keterangan', $keterangan);
        $this->db->execute($glue);
        $ambil_id = $this->db->lastInsertId($id);

        $out = count($id_bahan);
        for($i=0 ; $i < $out ; $i++){
            $this->db->kueri("INSERT INTO ".$this->dtl_gluemix." VALUES ('','".$id_bahan[$i]."','".$ambil_id."','".$stok_keluar[$i]."')");
            $this->db->execute();
        }

        return $this->db->rowCount();

    }
    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->gluemix." WHERE id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();

    }

}