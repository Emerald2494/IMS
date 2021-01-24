<?php

class OrdersModel
{
    private $order_id;
    private $customer_id;
    private $emp_id;
    private $invoice_number;
    private $total_price;
    private $date_order;
    private $qty;
    private $or_number;
    private $product_id;
    
    public function serOrderId($id)
    {
        $this->order_id = $order_id;
    }
    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function setEmpId($emp_id)
    {
        $this->emp_id = $emp_id;
    }
    public function getEmpId()
    {
        return $this->emp_id;
    }

    public function setInvoiceNo($invoice_number)
    {
        $this->invoice_number = $invoice_number;
    }
    public function getInvoiceNo()
    {
        return $this->invoice_number;
    }

    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function setDateOrder($date_order)
    {
        $this->date_order = $date_order;
    }
    public function getDateOrder()
    {
        return $this->date_order;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
    public function getQty()
    {
        return $this->qty;
    }

    public function setOrNumber($or_number)
    {
        $this->or_number = $or_number;
    }
    public function getOrNumber()
    {
        return $this->or_number;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }
    public function getProductId()
    {
        return $this->product_id;
    }

    public function toArray()
    {
        return [
            "order_id" => $this->getOrderId(),
            "customer_id" => $this->getCustomerId(),
            "emp_id" => $this->getEmpId(),
            "invoice_number" => $this->getInvoiceNo(),
            "total_price" => $this->getTotalPrice(),
            "date_order" => $this->getDateOrder(),
            "qty" => $this->getQty(),
            "or_number" => $this->getOrNumber(),
            "product_id" => $this->getProductId(),
        ];
    }
}