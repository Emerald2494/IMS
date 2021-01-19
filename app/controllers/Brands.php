<?php

class Brands extends Controller
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
        
        
        // $brands = $this->db->readAll('brands');
        // $json = array('data' => $brands);
        // echo json_encode($json);
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
    //    echo "Hello";
    //    exit;
    // $body = json_decode(file_get_contents('php://input'));
    // print_r($body);
    // exit;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $id = $_POST['id'];
          
            $name = $_POST['name'];
            $active = $_POST['active'];
        //    print_r($id);
        //    print_r($name);
        //    print_r($active);
        //    exit;
            $brand = new BrandsModel();
            $brand->setId($id);
            $brand->setName($name);
            $brand->setActive($active);
                       
            $brandCreated = $this->db->update('brands',$brand->getId(),$brand->toArray());
         
            redirect('brands');
        }else{
            echo 'try again';
        }
        
    }

    public function removeBrand($id)
    {
        $isDeleted = $this->db->delete('brands', $id);
       
        // setMessage('success',"Your imaginary file has been deleted.");
        // redirect('brands');
    }
    
    

   

   
}