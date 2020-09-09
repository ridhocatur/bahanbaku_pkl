<?php

class BahanMasuk extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Pemasukan Bahan Bantu';
        $data['masuk'] = $this->model('BahanMasuk_model')->getJoin();
        $data2['suppbahan'] = $this->model('Supplier_model')->SuppBahan();
        $data2['bantu'] = $this->model('BahanBantu_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('bahanmasuk/index', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('BahanMasuk_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/bahanmasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/bahanmasuk');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('BahanMasuk_model')->getJoinById($_POST['id']));
    }

    public function edit()
    {
        if($this->model('BahanMasuk_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/bahanmasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/bahanmasuk');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('BahanMasuk_model')->hapusData($id) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/bahanmasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/bahanmasuk');
            exit;
        }
    }
}