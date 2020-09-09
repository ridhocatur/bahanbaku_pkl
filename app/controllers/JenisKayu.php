<?php

class JenisKayu extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Jenis Kayu';
        $data['jenis'] = $this->model('JenisKayu_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar');
        $this->view('jeniskayu/index', $data);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('JenisKayu_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/jeniskayu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/jeniskayu');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('JenisKayu_model')->getDataById($_POST['id']));
    }

    public function edit()
    {
        if($this->model('JenisKayu_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'success');
            header('Location: '.BASEURL.'/jeniskayu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/jeniskayu');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('JenisKayu_model')->hapusData($id) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/jeniskayu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/jeniskayu');
            exit;
        }
    }

}