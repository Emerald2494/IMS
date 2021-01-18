<?php

class ProductMdl extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->model('ProductMdlModel');
        $this->data['page_title'] = 'Model';
    }
    
    public function index()
    {
        // echo "hello brand";
        $models = $this->db->readAll('models');
        $data = [
            'models' => $models,
        ];
        
        $this->view('productmodels/index',$data);
        
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['model_name'];
            $active = $_POST['active'];
            
            $models = new ProductMdlModel();
            $models->setName($name);
            $models->setActive($active);
            $expenses = $this->db->create('models',$models->toArray());
        }
          redirect('ProductMdl');
    }

   

   
}