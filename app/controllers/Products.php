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

        public function edit($id)
            {
                $brand = $this->db->readAll('brands');
                $model = $this->db->readAll('models');
                $category = $this->db->readAll('categories');
                $store = $this->db->readAll('stores');

                $product = $this->db->getProductById('products', $id);

                $data = [
                    "products" => $product,
                    "brands" => $brand,
                    "models" => $model,
                    "categories" => $category,
                    "stores" => $store,
                    
                ];
                // print_r($data);
                // exit;

                $this->view('products/edit',$data);
            }
            
        public function update(){
        //    echo "Hello";
        //    exit;
        // $body = json_decode(file_get_contents('php://input'));
        // print_r($body);
        // exit;
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $id = $_POST['product_id'];
            
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
                
                $products = new ProductsModel();
                $products -> setProductId($id);
                $products -> setImg($img);
                $products -> setName($name);
                $products -> setPrice( $price);
                $products -> setQty($qty);
                $products -> setdateReceived($date_received);
                $products -> setBrandId($brand_id);
                $products -> setModelId($model_id);
                $products -> setCategoryId($category_id);
                $products -> setStoreId($store_id);
                $products -> setDescription($description);
                $products -> setAvailability($availability);
                $products -> setDateSold($date_sold);
                        
                $productCreated = $this->db->productUpdate('products',$products->getProductId(),$products->toArray());
               
                redirect('products');
            }else{
                echo 'try again';
            }
            
        }

        public function removeProducts($id)
        {
            $isDeleted = $this->db->delete('products', $id);
        
            // setMessage('success',"Your imaginary file has been deleted.");
            // redirect('brands');
        }
        
        
}


