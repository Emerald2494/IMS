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
        
        $products = $this->db->ProductCount();
        $orders = $this->db->OrderCount();
        $data = [
            "products" => $products,
            "orders" => $orders,
        ];
        $this->view('dashboard/index',$data);
    }

    public function register()
    {
        $this->view('dashboard/register');
    }

    public function login()
    {
        $this->view('dashboard/login');
    }
    public function ProductCount()
    {
        $products=$this->db->readAll('vw_products');
        $data = [
            "products" => $products,
        ];
        $this->view('dashboard/ProductCount',$data);
    }
   
}