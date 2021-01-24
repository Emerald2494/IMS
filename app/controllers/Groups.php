<?php

class Groups extends Controller
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        $this->data['page_title'] = 'Groups';
    }
    
    public function index()
    {
        $this->view('groups/index');
    }
    public function create()
    {
        $this->view('groups/create');
    }

    public function edit()
    {
        $this->view('groups/edit');
    }


   
}