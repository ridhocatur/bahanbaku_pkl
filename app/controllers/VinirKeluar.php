<?php

class VinirKeluar extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Pemakaian Vinir';
        $data['vinirkeluar'] = $this->model('VinirKeluar_model')->getAll();
        $data2['vinir'] = $this->model('Vinir_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('vinirkeluar/index', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail';
        $data['dtl_vinir'] = $this->model('VinirKeluar_model')->getDetail($id);
        $data2['vinir'] = $this->model('VinirKeluar_model')->getDataById($id);
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('vinirkeluar/detail', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('VinirKeluar_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/vinirkeluar');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/vinirkeluar');
            exit;
        }
    }

    public function getdata()
    {
        echo json_encode($this->model('VinirKeluar_model')->getDetail($_POST['id']));
    }

    public function edit()
    {
        if($this->model('VinirKeluar_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/vinirkeluar');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/vinirkeluar');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('VinirKeluar_model')->hapusData($id) > 0)
        {
            // var_dump($id);
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/vinirkeluar');
            exit;
        } else {
            // var_dump($id);
            Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
            header('Location: '.BASEURL.'/vinirkeluar');
            exit;
        }
    }
}