<?php

class VinirMasuk extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Stok Masuk Vinir';
        $data['vinir_masuk'] = $this->model('VinirMasuk_model')->getJoin();
        $data2['kayu'] = $this->model('Kayu_model')->getAll();
        $data2['vinir'] = $this->model('Vinir_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('vinirmasuk/index', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('VinirMasuk_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/vinirmasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/vinirmasuk');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('VinirMasuk_model')->getJoinById($_POST['id']));
    }

    public function edit()
    {
        if($this->model('VinirMasuk_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/vinirmasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/vinirmasuk');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('VinirMasuk_model')->hapusData($id) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/vinirmasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/vinirmasuk');
            exit;
        }
    }
}