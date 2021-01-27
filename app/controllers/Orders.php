<?php

class Orders extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->model('OrdersModel');
        $this->model('OrderLinesModel');
        $this->data['page_title'] = 'Order';

        
    }
    
    public function index()
    {
        $orders = $this->db->readAll('vw_orders');
        
        $data = [
            "orders" =>$orders,
        ];
        $this->view('orders/index',$data);   

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
            $or_no = 'OR -'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
            $inv_no = 'INV/'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $gross_amount = $_POST['gross_amount_value'];
            $vat_charge_rate = $_POST['service_charge_rate'];
            $vat_charge = $_POST['vat_charge_value'];
            $net_amount = $_POST['net_amount_value'];
            $date_order = date('Y-m-d');    
           
           
            $orders = new OrdersModel();
            $orders->setOrNumber($or_no);
            $orders->setInvoiceNo($inv_no);
            $orders->setGrossAmount($gross_amount);
            $orders->setVatChargeRate($vat_charge_rate);
            $orders->setVatCharge($vat_charge);
            $orders->setNetAmount($net_amount);
            $orders->setDateOrder($date_order);
            $orders->setUserId($user_id);
            $orderCreated = $this->db->create('orders',$orders->toArray());
           
            $order_id = $orderCreated;
            $products = $_POST['product'];
            $count_product = count($products);
            
            for($x = 0; $x < $count_product; $x++) {
                $items = array(
                    'order_id' => $order_id,
                    'product_id' => $_POST['product'][$x],
                    'qty' => $_POST['qty'][$x],
                    'rate' => $_POST['rate_value'][$x],
                    'discount' => $_POST['discount_value'][$x],
                    'amount' => $_POST['amount_value'][$x],
                );
                // print_r($items);
                
                 $isOrderDetailsCreated = $this->db->create('order_lines',$items);
                redirect('orders');
                
            }
            
            
        }
          
    }


    public function removeOrders($id)
    {
        $isDeleted = $this->db->delete('orders', $id);
       
         setMessage('success',"Successfully deleted.");
         redirect('orders');
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

    public function viewOrderLines($id)
    {
        
        $orders= $this->db->readAll('vw_orderlines');
        $orderlines = $this->db->getOrderById('order_lines',$id);
        $data = [
            "orders" => $orders,
            "orderlines" =>$orderlines,
        ];
        $this->view('orders/viewOrderLines',$data);  
        
    }
  
}