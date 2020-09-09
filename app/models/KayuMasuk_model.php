<?php

class KayuMasuk_model
{
    private $kayu_masuk = 'kayu_masuk';
    private $supplier = 'supplier';
    private $dtl_kayu_masuk = 'dtl_kayu_masuk';
    private $kayu = 'kayu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->kueri('SELECT * FROM '. $this->kayu_masuk);
        return $this->db->ambilSemua();
    }

    public function getDataById($id)
    {
        $this->db->kueri('SELECT * FROM '. $this->kayu_masuk .' Where id=:id');
        $this->db->bind('id', $id);

        return $this->db->ambilSatu();
    }

    public function getJoin()
    {
        $this->db->kueri('SELECT '.$this->kayu_masuk.'.*, '
        .$this->supplier.'.nm_sup
        FROM '.$this->kayu_masuk.'
        INNER JOIN '.$this->supplier.' ON '.$this->kayu_masuk.'.id_supplier = '.$this->supplier.'.id');

        return $this->db->ambilSemua();
    }

    public function getDetail($id)
    {
        $this->db->kueri('SELECT '.$this->dtl_kayu_masuk.'.*, '.$this->kayu.'.kd_kayu FROM '.$this->dtl_kayu_masuk.'
        LEFT JOIN '.$this->kayu_masuk.' ON '.$this->kayu_masuk.'.invoice = '.$this->dtl_kayu_masuk.'.invoice
        LEFT JOIN '.$this->kayu.' ON '.$this->kayu.'.id = '.$this->dtl_kayu_masuk.'.kd_kayu
        WHERE '.$this->kayu_masuk.'.id=:id');

        $this->db->bind('id', $id);

        return $this->db->ambilSemua();
    }

    public function getDataByDate($tgl_awal, $tgl_akhir, $id_supplier)
    {
        $kondisi = "";
        $sql = "SELECT ".$this->kayu_masuk.".*, ".$this->supplier.".nm_sup FROM ".$this->kayu_masuk."
        INNER JOIN ".$this->supplier." ON ".$this->kayu_masuk.".id_supplier = ".$this->supplier.".id";
        if ($tgl_awal != "" && $tgl_akhir==""){
            $kondisi .= " WHERE tgl = '$tgl_awal'";
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl = '$tgl_akhir'";
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $kondisi .= " WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($id_supplier != "") {
            if($kondisi != ""){
                $kondisi .=" AND ".$this->kayu_masuk.".id_supplier = '$id_supplier' ORDER BY tgl ASC";
            } else {
                $kondisi .=" WHERE ".$this->kayu_masuk.".id_supplier = '$id_supplier' ORDER BY tgl ASC";
            }
        }
        $this->db->kueri($sql . $kondisi);
        return $this->db->ambilSemua();
    }
    public function getDetailbyInvoice($invoice)
    {
        $this->db->kueri("SELECT ".$this->dtl_kayu_masuk.".*, ".$this->kayu.".kd_kayu FROM ".$this->dtl_kayu_masuk."
        LEFT JOIN ".$this->kayu_masuk." ON ".$this->kayu_masuk.".invoice = ".$this->dtl_kayu_masuk.".invoice
        LEFT JOIN ".$this->kayu." ON ".$this->kayu.".id = ".$this->dtl_kayu_masuk.".kd_kayu
        WHERE ".$this->kayu_masuk.".invoice='$invoice'");

        return $this->db->ambilSemua();
    }

    public function tambahData()
    {
        $id_supplier = $_POST['id_supplier'];
        $invoice = $_POST['invoice'];
        $tgl = $_POST['tgl'];
        $id_kayu = $_POST['id_kayu'];
        $stok_masuk = $_POST['jml_stok_kayu'];
        $kubik_masuk = $_POST['jml_kubik_kayu'];
        $total_stok = $_POST['total_stok'];
        $total_kubik = $_POST['total_kubik'];
        $keterangan = $_POST['keterangan'];

        $this->db->kueri("INSERT INTO ".$this->kayu_masuk." VALUES ('', :id_supplier, :invoice, :tgl, :total_stok, :total_kubik, :keterangan)");
        $this->db->bind('id_supplier', $id_supplier);
        $this->db->bind('invoice', $invoice);
        $this->db->bind('tgl', $tgl);
        $this->db->bind('total_stok', $total_stok);
        $this->db->bind('total_kubik', $total_kubik);
        $this->db->bind('keterangan', $keterangan);
        $this->db->execute();

        $in = count($id_kayu);
        for($i=0 ; $i < $in ; $i++){
            $this->db->kueri("INSERT INTO ".$this->dtl_kayu_masuk." VALUES ('','".$invoice."','".$id_kayu[$i]."','".$stok_masuk[$i]."','".$kubik_masuk[$i]."')");
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->kueri("DELETE FROM ".$this->kayu_masuk." WHERE id=:id");
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAll_report()
    {
        $this->db->kueri('SELECT '.$this->kayu_masuk.'.*, '.$this->dtl_kayu_masuk.'.*, '.$this->kayu.'.kd_kayu FROM '.$this->kayu_masuk.' LEFT JOIN '.$this->dtl_kayu_masuk.' ON '.$this->kayu_masuk.'.invoice = '.$this->dtl_kayu_masuk.'.invoice LEFT JOIN '.$this->kayu.' ON kayu.id = '.$this->dtl_kayu_masuk.'.kd_kayu LEFT JOIN supplier ON '.$this->kayu_masuk.'.id_supplier = supplier.id');

        return $this->db->ambilSemua();
    }
    public function getAllInvoice_report()
    {
        $this->db->kueri('SELECT '.$this->kayu_masuk.'.invoice, '.$this->kayu_masuk.'.id_supplier, '.$this->dtl_kayu_masuk.'.invoice, '.$this->supplier.'.nm_sup FROM '.$this->kayu_masuk.' LEFT JOIN '.$this->dtl_kayu_masuk.' ON '.$this->kayu_masuk.'.invoice = '.$this->dtl_kayu_masuk.'.invoice LEFT JOIN '.$this->supplier.' ON '.$this->kayu_masuk.'.id_supplier = '.$this->supplier.'.id');

        return $this->db->ambilSatu();
    }

    public function getDetail_report()
    {
        $invoice = $_POST['invoice'];
        $this->db->kueri('SELECT '.$this->kayu_masuk.'.*, '.$this->dtl_kayu_masuk.'.*, '.$this->kayu.'.* FROM '.$this->kayu_masuk.' LEFT JOIN '.$this->dtl_kayu_masuk.' ON '.$this->kayu_masuk.'.invoice = '.$this->dtl_kayu_masuk.'.invoice LEFT JOIN '.$this->kayu.' ON kayu.id = '.$this->dtl_kayu_masuk.'.kd_kayu LEFT JOIN supplier ON '.$this->kayu_masuk.'.id_supplier = supplier.id WHERE '.$this->kayu_masuk.'.invoice=:invoice');

        $this->db->bind('invoice', $invoice);

        return $this->db->ambilSemua();
    }
    public function getInvoice_report()
    {
        $invoice = $_POST['invoice'];
        $this->db->kueri('SELECT '.$this->kayu_masuk.'.invoice, '.$this->kayu_masuk.'.id_supplier, '.$this->kayu_masuk.'.tgl, '.$this->supplier.'.nm_sup FROM '.$this->kayu_masuk.' LEFT JOIN '.$this->dtl_kayu_masuk.' ON '.$this->kayu_masuk.'.invoice = '.$this->dtl_kayu_masuk.'.invoice LEFT JOIN '.$this->supplier.' ON '.$this->kayu_masuk.'.id_supplier = '.$this->supplier.'.id WHERE '.$this->kayu_masuk.'.invoice=:invoice');

        $this->db->bind('invoice', $invoice);

        return $this->db->ambilSatu();
    }
}