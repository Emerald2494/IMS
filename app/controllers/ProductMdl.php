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

        // $models = $this->db->readAll('models');
        // $json = array('data' => $models);
        // echo json_encode($json);
        
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

    
    public function update(){
      
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $id = $_POST['id'];
              
                $name = $_POST['name'];
                $active = $_POST['active'];
             
                $model = new ProductMdlModel();
                $model->setId($id);
                $model->setName($name);
                $model->setActive($active);
                           
                $modelCreated = $this->db->update('models',$model->getId(),$model->toArray());
                
                redirect('ProductMdl');
            }else{
                echo 'try again';
            }
            
        }
    
        public function removeModel($id)
        {
            $isDeleted = $this->db->delete('models', $id);
           
            // setMessage('success',"Your imaginary file has been deleted.");
            // redirect('brands');
        }
   

   
}