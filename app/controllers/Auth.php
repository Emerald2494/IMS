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

    public function formRegister(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_check']) && $_POST['email_check'] == 1) {

			
            $email = $_POST['email'];
            $isUserExist = $this->db->columnFilter('users','email',$email);
            if($isUserExist) {
				echo "Sorry! email has already taken. Please try another.";
			}
		}
    }
    
    public function register()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            
            // Check user exist 
            $email = $_POST['email'];
            $isUserExist = $this->db->columnFilter('users','email',$email);
            if($isUserExist)
            {
                setMessage("error","This email is already registered !");
                redirect('/auth/register');
            }
            else
            {
            
            // Validate entries
            $validation = new UserValidator($_POST);
            $data       = $validation->validateForm();
            if (count($data) > 0) {
                $this->view('dashboard/register', $data);
            }
            else{
                $name = ($_POST['name']);
                $email = ($_POST['email']);
                $password = ($_POST['password']);

                $address = $_POST['address'];
                $contact_number = $_POST['contact_number'];
                
                //Hash Password before saving
                $password = base64_encode(($password));

                $user = new UserModel();
                $user->setName($name);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setAddress($address);
                $user->setContactNumber($contact_number);
               
                $userCreated = $this->db->create('users', $user->toArray());
                //$userCreated="true";
        
                 redirect('dashboard/login');

                }  // end of validation check

            }  // end of user-exist

            }
            
        }
    

    public function login_success()
    {
        // echo "Login Success!";
        if($_SERVER['REQUEST_METHOD'] == 'POST') { //check request method is POST
            $email = $_POST['email'];
            $password = base64_encode($_POST['password']);       
            $isEmailExist = $this->db->loginCheck('users', 'email', $email,'password',$password);
    
             if ($isEmailExist){

               setMessage('id',base64_encode($isEmailExist['id']));

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