<?php

class Categories extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->model('CategoriesModel');
        $this->data['page_title'] = 'Categories';
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
            $name = $_POST['category_name'];
            $active = $_POST['active'];
            
            $categories = new categoriesModel();
            $categories->setName($name);
            $categories->setActive($active);
            $allcategories = $this->db->create('categories',$categories->toArray());
        }
          redirect('categories');
    }

    public function update(){
      
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $active = $_POST['active'];
           
            $categories = new CategoriesModel();
            $categories->setId($id);
            $categories->setName($name);
            $categories->setActive($active);
                       
            $categoriesUpdated = $this->db->update('categories',$categories->getId(),$categories->toArray());
            
            redirect('categories');
        }else{
            echo 'try again';
        }
        
    }

    public function removeCategory($id)
    {
        $isDeleted = $this->db->delete('categories', $id);
       
        // setMessage('success',"Your imaginary file has been deleted.");
        // redirect('brands');
    }
    

   

   
}