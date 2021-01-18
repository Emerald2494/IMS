<?php

class ProductMdlModel
{
    private $id;
    private $name;
    private $active;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }
    public function getActive()
    {
        return $this->active;
    }

    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "active" => $this->getActive(),
            
        ];
    }
}