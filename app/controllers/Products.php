<?php

class Products extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->model('ProductsModel');
        $this->data['page_title'] = 'Product';
    }
    

    public function index()
    {
        $products = $this->db->readAll('vw_products');
       
        $data = [
            'products' => $products,
        ];

        $this->view('products/index',$data);
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

        public function store()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $img = $_POST['product_image'];
                $name = $_POST['product_name'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $date_received = $_POST['date_received'];
                $brand_id = $_POST['brand'];
                $model_id = $_POST['model'];
                $category_id = $_POST['category'];
                $store_id = $_POST['store'];
                $description = $_POST['description'];
                $availability = $_POST['availability'];
                $date_sold = $_POST['date_sold'];
                $customer_id = $_POST['customer'];
                
                $products = new ProductsModel();
                
                $products -> setImg($img);
                $products -> setName($name);
                $products -> setPrice( $price);
                $products -> setQty($qty);
                $products -> setdateReceived($date_received );
                $products -> setBrandId($brand_id);
                $products -> setModelId($model_id);
                $products -> setCategoryId($category_id );
                $products -> setStoreId($store_id);
                $products -> setDescription($description);
                $products -> setAvailability($availability);
                $products -> setDateSold($date_sold);
                $products -> setCustomerId($customer_id);
                $productCreated = $this->db->create('products',$products->toArray());
            }
            redirect('products');
        }

        public function edit()
            {
                $products = $this->db->readAll('vw_products');
                $brands = $this->db->readAll('brands');
                $models = $this->db->readAll('models');
                $categories = $this->db->readAll('categories');
                $stores = $this->db->readAll('stores');
                
                $data = [
                    "products" => $products,
                    "brands" => $brands,
                    "models" => $models,
                    "categories" => $categories,
                    "stores" => $stores,
                    
                ];

                $this->view('products/create',$data);
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

        public function removeProducts($id)
        {
            $isDeleted = $this->db->delete('brands', $id);
        
            // setMessage('success',"Your imaginary file has been deleted.");
            // redirect('brands');
        }
        
        
}


