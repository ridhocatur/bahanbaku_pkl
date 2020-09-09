<?php

class About extends Controller
{
    public function __construct()
    {
        // check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'About';
        $data['nama'] = 'Catur Ridho Arianto Prabowo';
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
        $this->view('templates/script');
    }
}