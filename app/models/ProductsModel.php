<?php

class ProductsModel
{
    private $product_id;
    private $img;
    private $name;
    private $price;
    private $qty;
    private $date_received;
    private $brand_id;
    private $model_id;
    private $category_id;
    private $store_id;
    private $description;
    private $availability;
    private $date_sold;
    private $customer_id;
    private $discount;
    
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }
    public function getProductId()
    {
        return $this->product_id;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }
    public function getImg()
    {
        return $this->img;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
    public function getQty()
    {
        return $this->qty;
    }
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDateReceived($date_received)
    {
        $this->date_received = $date_received;
    }
    public function getdateReceived()
    {
        return $this->date_received;
    }

    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
    }
    public function getBrandId()
    {
        return $this->brand_id;
    }

    public function setModelId($model_id)
    {
        $this->model_id = $model_id;
    }
    public function getModelId()
    {
        return $this->model_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setStoreId($store_id)
    {
        $this->store_id = $store_id;
    }
    public function getStoreId()
    {
        return $this->store_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }
    public function getAvailability()
    {
        return $this->availability;
    }

    public function setDateSold($date_sold)
    {
        $this->date_sold = $date_sold;
    }
    public function getDateSold()
    {
        return $this->date_sold;
    }

    // public function setCustomerId($customer_id)
    // {
    //     $this->customer_id = $customer_id;
    // }
    // public function getCustomerId()
    // {
    //     return $this->customer_id;
    // }

    public function toArray()
    {
        return [
            "product_id" => $this->getProductId(),
            "img" => $this->getImg(),
            "name" => $this->getName(),
            "price" => $this->getPrice(),
            "qty" => $this->getQty(),
            "discount" => $this->getDiscount(),
            "date_received" => $this->getdateReceived(),
            "brand_id" => $this->getBrandId(),
            "model_id" => $this->getModelId(),
            "category_id" => $this->getCategoryId(),
            "store_id" => $this->getStoreId(),
            "description" => $this->getDescription(),
            "availability" => $this->getAvailability(),
            "date_sold" => $this->getDateSold(),
            
        ];
    }
}