<?php

class Auth extends Controller
{
    private $db;
    private $auth;
    public function __construct()
    {
        $this->model('UserModel');

        $this->db = new Database;

    }
    

    public function login_success()
    {
        // echo "Login Success!";
        if($_SERVER['REQUEST_METHOD'] == 'POST') { //check request method is POST
            $email = $_POST['email'];
            $password = $_POST['password'];       
            $isEmailExist = $this->db->loginCheck('users', 'email', $email,'password',$password);
    
             if ($isEmailExist){

                // setMessage('id',base64_encode($isEmailExist['id']));
               $id = $isEmailExist['id'];
               redirect('dashboard/home');
        
            }else {
                echo "Invalid Email and try again!";
                //   setMessage('error','Login fail!');
                  redirect('dashboard');
            }
            
        }
    }
}