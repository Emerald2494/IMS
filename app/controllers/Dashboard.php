<?php

class Dashboard extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->data['page_title'] = 'Dashboard';
    }
    
    public function index()
    {
        $this->view('dashboard/login');
    }
    public function home()
    {
        $this->view('dashboard/index');
    }

    public function register()
    {
        $this->view('dashboard/register');
    }

    public function login()
    {
        $this->view('dashboard/login');
    }
   
}