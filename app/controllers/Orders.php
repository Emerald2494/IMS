<?php

class Orders extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->model('OrdersModel');
        $this->data['page_title'] = 'Order';
    }
    
    public function index()
    {
        
        $this->view('orders/index');   

    }

    public function create()
    {
        $orders = $this->db->readAll('vw_orders');
        $products = $this->db->readAll('products');
        
        $data = [
            "orders" => $orders,
            "products" => $products,
        ];

        $this->view('orders/create', $data);
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //for order store
            $or_no = $_POST['or_number'];
            $customer_id = $_POST['customer_name'];
            $inv_no = $_POST['inv_no'];
            $total_price = $_POST['total_price'];
            $date_order = $_POST['date_order'];
            $product_id = $_POST['product'];
            $discount = $_POST['discount'];
            
            $orders = new ordersModel();
            $orders->setOrNumber($or_no);
            $orders->setCustomerId($customer_id);
            $orders->setInvoiceNo($inv_no);
            $orders->setTotalPrice($total_price);
            $orders->setDateOrder($date_order);
            $orders->setProductId($product_id);
            $expenses = $this->db->create('orders',$orders->toArray());

            
        }
          redirect('brands');
    }


    public function removeOrders($id)
    {
        $isDeleted = $this->db->delete('orders', $id);
       
        // setMessage('success',"Your imaginary file has been deleted.");
        // redirect('brands');
    }
    
    
    public function getProductValueById()
	{
            $id = $_POST['product_id'];
			$product_data = $this->db->getProductById('products',$id);
			echo json_encode($product_data);
		
    }
    
    public function getTableProductRow()
	{
        $products = $this->db->getActiveProductData();
		echo json_encode($products);
	}

  
}