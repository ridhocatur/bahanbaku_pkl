<?php

class KayuMasuk extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Pemasukan Kayu Log';
        $data['kayumasuk'] = $this->model('KayuMasuk_model')->getJoin();
        $data2['supplier'] = $this->model('Supplier_model')->SuppKayu();
        $data3['kayu'] = $this->model('Kayu_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('kayumasuk/index', $data, $data2, $data3);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail';
        $data['detail'] = $this->model('KayuMasuk_model')->getDetail($id);
        $data2['invo'] = $this->model('KayuMasuk_model')->getDataById($id);
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('kayumasuk/detail', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('KayuMasuk_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/kayumasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/kayumasuk');
            exit;
        }
    }

    public function getdata()
    {
        echo json_encode($this->model('KayuMasuk_model')->getDetail($_POST['id']));
    }

    public function edit()
    {
        if($this->model('KayuMasuk_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/kayumasuk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/kayumasuk');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('KayuMasuk_model')->hapusData($id) > 0)
        {
            // var_dump($id);
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/kayumasuk');
            exit;
        } else {
            // var_dump($id);
            Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
            header('Location: '.BASEURL.'/kayumasuk');
            exit;
        }
    }
}