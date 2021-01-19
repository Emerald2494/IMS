<?php

class Products extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
       
        $this->data['page_title'] = 'Product';
    }
    

    public function index()
    {
        $this->view('products/index');
    }
    public function create()
    {
        $brands = $this->db->readAll('brands');
        $models = $this->db->readAll('models');
        $categories = $this->db->readAll('categories');
        $stores = $this->db->readAll('stores');
        $data = [
            "brands" => $brands,
            "models" => $models,
            "categories" => $categories,
            "stores" => $stores,
        ];

        $this->view('products/create',$data);
    }
}


