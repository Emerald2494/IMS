<?php

class Users extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->data['page_title'] = 'Users';
    }
    
    public function index()
    {
        $this->view('users/index');
    }
    public function create()
    {
        $this->view('users/create');
    }


   
}