<?php

class OrdersModel
{
    private $id;
    private $invoice_number;
    private $gross_amount;
    private $vat_charge_rate;
    private $vat_charge;
    private $net_amount;
    private $date_order;
    private $or_number;


    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

  

    public function setInvoiceNo($invoice_number)
    {
        $this->invoice_number = $invoice_number;
    }
    public function getInvoiceNo()
    {
        return $this->invoice_number;
    }

    public function setGrossAmount($gross_amount)
    {
        $this->gross_amount = $gross_amount;
    }
    public function getGrossAmount()
    {
        return $this->gross_amount;
    }

    
    public function setVatChargeRate($vat_charge_rate)
    {
        $this->vat_charge_rate = $vat_charge_rate;
    }
    public function getVatChargeRate()
    {
        return $this->vat_charge_rate;
    }

    public function setVatCharge($vat_charge)
    {
        $this->vat_charge = $vat_charge;
    }
    public function getVatCharge()
    {
        return $this->vat_charge;
    }

    public function setNetAmount($net_amount)
    {
        $this->net_amount = $net_amount;
    }
    public function getNetAmount()
    {
        return $this->net_amount;
    }
    public function setDateOrder($date_order)
    {
        $this->date_order = $date_order;
    }
    public function getDateOrder()
    {
        return $this->date_order;
    }
    public function setOrNumber($or_number)
    {
        $this->or_number = $or_number;
    }
    public function getOrNumber()
    {
        return $this->or_number;
    }


    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "invoice_number" => $this->getInvoiceNo(),
            "gross_amount" => $this->getGrossAmount(),
            "vat_charge_rate" => $this->getVatChargeRate(),
            "vat_charge" => $this->getVatCharge(),
            "net_amount" => $this->getNetAmount(),
            "date_order" => $this->getDateOrder(),
            "or_number" => $this->getOrNumber(),
         
        ];
    }
}