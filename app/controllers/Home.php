<?php

class Home extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar');
        $this->view('home/index', );
        $this->view('templates/footer');
        $this->view('templates/script');
        // $this->view('auth/login');
    }
}
