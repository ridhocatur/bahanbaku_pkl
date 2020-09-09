<?php

class Kayu extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Master Kayu Log';
        $data['kayu'] = $this->model('Kayu_model')->getJoinAll();
        $data2['jenis'] = $this->model('JenisKayu_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('kayu/index', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('Kayu_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/kayu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/kayu');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('Kayu_model')->getDataById($_POST['id']));
    }

    public function edit()
    {
        if($this->model('Kayu_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/kayu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/kayu');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('Kayu_model')->hapusData($id) > 0)
        {
            // var_dump($id);
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/kayu');
            exit;
        } else {
            // var_dump($id);
            Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
            header('Location: '.BASEURL.'/kayu');
            exit;
        }
    }
}