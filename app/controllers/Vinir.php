<?php

class Vinir extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Master Vinir';
        $data['bahan'] = $this->model('Vinir_model')->getJoinAll();
        $data2['jenis'] = $this->model('JenisKayu_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('vinir/index', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        // var_dump($_POST);
        if($this->model('Vinir_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/vinir');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/vinir');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('Vinir_model')->getDataById($_POST['id']));
    }

    public function edit()
    {
        if($this->model('Vinir_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/vinir');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/vinir');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('Vinir_model')->hapusData($id) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/vinir');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/vinir');
            exit;
        }
    }
}