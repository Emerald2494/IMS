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
        $this->view('dashboard/index');
    }

     public function product()
    {
        $this->view('products/create');
    }

   
}