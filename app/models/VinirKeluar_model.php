<?php

class VinirKeluar_model
{
    private $vinir = 'vinir';
    private $vinir_keluar = 'vinir_keluar';
    private $dtl_vinir_keluar = 'dtl_vinir_keluar';
    private $jeniskayu = 'jeniskayu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->vinir_keluar);
        return $this->db->ambilSemua();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '.$this->vinir_keluar.' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getDataforReport($tgl_awal, $tgl_akhir, $shift)
    {
        $kondisi = "";
        $sql = "SELECT * FROM ". $this->vinir_keluar;
        if ($tgl_awal != "" && $tgl_akhir==""){
            $kondisi .= " WHERE tgl = '$tgl_awal'";
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl = '$tgl_akhir'";
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($shift != "") {
            if($kondisi != ""){
                $kondisi .=" AND ".$this->vinir_keluar.".shift = '$shift' ORDER BY tgl ASC";
            } else {
                $kondisi .=" WHERE ".$this->vinir_keluar.".shift = '$shift' ORDER BY tgl ASC";
            }
        }
        $this->db->kueri($sql . $kondisi);

        return $this->db->ambilSemua();
    }

    public function getDetail($id)
    {
        $this->db->kueri("SELECT ".$this->vinir_keluar.".tgl, ".$this->vinir_keluar.".shift, ".$this->vinir_keluar.".tipe_glue, ".$this->dtl_vinir_keluar.".*, ".$this->vinir.".kd_jenis, ".$this->vinir.".ukuran FROM ".$this->dtl_vinir_keluar."
        LEFT JOIN ".$this->vinir_keluar." ON ".$this->dtl_vinir_keluar.".id_keluar=".$this->vinir_keluar.".id
        LEFT JOIN ".$this->vinir." ON ".$this->dtl_vinir_keluar.".id_vinir = ".$this->vinir.".id
        WHERE ".$this->vinir_keluar.".id='$id'");

        return $this->db->ambilSemua();
    }

    public function tambahData()
    {
        $id = $_POST['id'];
        $tgl = $_POST['tgl'];
        $shift = $_POST['shift'];
        $tipe_glue = $_POST['tipe_glue'];
        $jml_stok = $_POST['total_stok'];
        $jml_kubikasi = $_POST['total_kubik'];
        $keterangan = $_POST['keterangan'];
        $id_vinir = $_POST['id_vinir'];
        $stok_keluar = $_POST['vinir_stok_keluar'];
        $kubik_keluar = $_POST['kubik_keluar'];

        $vinir_keluar = $this->db->kueri("INSERT INTO ".$this->vinir_keluar." VALUES ('', :tgl, :shift, :tipe_glue, :jml_stok, :jml_kubikasi, :keterangan)");
        $this->db->bind('tgl', $tgl);
        $this->db->bind('shift', $shift);
        $this->db->bind('tipe_glue', $tipe_glue);
        $this->db->bind('jml_stok', $jml_stok);
        $this->db->bind('jml_kubikasi', $jml_kubikasi);
        $this->db->bind('keterangan', $keterangan);
        $this->db->execute($vinir_keluar);
        $ambil_id = $this->db->lastInsertId($id);

        $out = count($id_vinir);
        for($i=0 ; $i < $out ; $i++){
            $this->db->kueri("INSERT INTO ".$this->dtl_vinir_keluar." VALUES ('','".$id_vinir[$i]."','".$ambil_id."','".$stok_keluar[$i]."','".$kubik_keluar[$i]."')");
            $this->db->execute();
        }

        return $this->db->rowCount();

    }
    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->vinir_keluar." WHERE id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();

    }
}