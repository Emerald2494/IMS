<?php 

class UserModel
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $address;
    private $contact_number;
    
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

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getAddress()
    {
        return $this->address;
    }

    public function setContactNumber($contact_number)
    {
        $this->contact_number = $contact_number;
    }
    public function getContactNumber()
    {
        return $this->contact_number;
    }

    public function toArray()
    {
        return[
            "name"  => $this->getName(),
            "email" => $this->getEmail(),
            "password"  => $this->getPassword(),
            "address" => $this->getAddress(),
            "contact_number"  => $this->getContactNumber(),
            ];
    }

}