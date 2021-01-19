<?php

class Stores extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->model('StoresModel');
        $this->data['page_title'] = 'Store';
    }
    
    public function index()
    {
        // echo "hello brand";
        $stores = $this->db->readAll('stores');
       
        $data = [
            'stores' => $stores,
        ];
        
        $this->view('stores/index',$data);
        
        
        // $brands = $this->db->readAll('brands');
        // $json = array('data' => $brands);
        // echo json_encode($json);
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['store_name'];
            $active = $_POST['active'];
            
            $stores = new StoresModel();
            $stores->setName($name);
            $stores->setActive($active);
            $expenses = $this->db->create('stores',$stores->toArray());
        }
          redirect('stores');
    }

    public function update(){
 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $id = $_POST['id'];
          
            $name = $_POST['name'];
            $active = $_POST['active'];
      
            $store = new StoresModel();
            $store->setId($id);
            $store->setName($name);
            $store->setActive($active);
                       
            $storeUpdated = $this->db->update('stores',$store->getId(),$store->toArray());
            
            redirect('stores');
        }else{
            echo 'try again';
        }
        
    }

    public function removeStore($id)
    {
        $isDeleted = $this->db->delete('stores', $id);
       
        // setMessage('success',"Your imaginary file has been deleted.");
        // redirect('brands');
    }
    
    

   

   
}