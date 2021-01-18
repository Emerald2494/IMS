<?php

class Categories extends Controller
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
        $categories = $this->db->readAll('categories');
       
        $data = [
            'categories' => $categories,
        ];
        
        $this->view('categories/index',$data);
        
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

    public function update(){
       echo "Hello";
       exit;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $id = $_POST['id'];
           print_r($id);
           exit;
            $name = $_POST['edit_brand_name'];
            $active = $_POST['edit_active'];
           
            $brand = new BrandsModel();
            $brand->setId($id);
            $brand->setName($name);
            $brand->setActive($active);
                       
            $brandCreated = $this->db->update('brands',$id,$brand->toArray());
            
            redirect('categories/');
        }else{
            echo 'try again';
        }
        
    }

    public function editBrand($id)
	{
        $brandbyid = $this->db->getById('brands',$id);
        $json = array('data' => $brandbyid);
        echo json_encode($json);
	}

   

   
}