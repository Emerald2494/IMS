<?php

class Models extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->model('BrandsModel');
        $this->data['page_title'] = 'Brand';
    }
    
    public function index()
    {
        // echo "hello brand";
        $brands = $this->db->readAll('brands');
        $data = [
            'brands' => $brands,
        ];
        
        $this->view('brands/index',$data);
        
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['brand_name'];
            $active = $_POST['active'];
            
            $brands = new BrandsModel();
            $brands->setName($name);
            $brands->setActive($active);
            $expenses = $this->db->create('brands',$brands->toArray());
        }
          redirect('brands');
    }

   

   
}