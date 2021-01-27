<?php

class OrderLinesModel
{
    private $id;
    private $product_id;
  

    public function serId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
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
            "id" => $this->getId(),
            "product_id" => $this->getProductId(),
            
        ];
    }
}