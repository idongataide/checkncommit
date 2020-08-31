<?php
/**
 *  
 */
class Home extends Controller
{
	function __construct()
	{
		$this->read = new DBRead();
		$this->adminRead = new AdminDBRead();
		$this->vendRead = new VendorDBRead();
		$this->write = new DBWrite();
	}
	
	function index(){
		$data = array();
		if(isset($_POST['submitContact'])){
			$data['contact'] = $this->write->submitContact($_POST);
			$_SESSION['message'] = $data['contact']['log'];
		}
		$data['title'] = 'Home';
		//var_dump($_SESSION); die();
		$this->view('index', $data);
	}
	function about(){ 
		$data = array();
		
		$data['title'] = 'About Us';
		$this->view('about', $data);
	}
	function activate($id = ""){
		$data = null; 
		if($id == ""){
			$_SESSION['failed'] = 'Invalid Token';
			header('location: ../failed'); die();
			
		}
		$data = $this->write->activateUser($id);
		if($data['status'] == 'success'){
			header('location: ../success'); die();
		}
		else {
			$_SESSION['failed'] = $data['log'];
			header('location: ../failed'); die();
		}
	}
	function activatestore($id = ""){
		$data = null;
		if($id == ""){
			$_SESSION['failed'] = 'Invalid Token';
			header('location: ../vendor/failed'); die();
			
		}
		$data = $this->write->activateStore($id);
		if($data['status'] == 'success'){
			header('location: ../vendor/success'); die();
		}
		else {
			header('location: ../vendor/failed'); die();
			$_SESSION['failed'] = $data['log'];
		}
	}
	function business(){ 
		$data = array();
		
		$data['title'] = 'Business Page';
		$this->view('business', $data);
	}
	function cities($state_id){
		$data = $this->read->getCities($state_id);
		header('Content-Type: application/json');
		print ( json_encode($data) );
	}
	function faq(){ 
		$data = array();
		if(isset($_POST['submitFaq'])){
			$data['faq'] = $this->write->submitFaq($_POST);
			$_SESSION['message'] = $data['faq']['log'];
		}
		$data['title'] = 'FAQ';
		$this->view('faq', $data);
	}
	function forgotpassword(){ 
		$data = array();
		$data['title'] = 'Forgot Password';
		$this->view('forgot-password', $data);
	}
	function logout(){
		session_destroy();
		header('Location: ../checkncommit');
		die();
	}
	function login(){
		$data = array();
		if(isset($_POST['login'])){
			$data['login'] = $this->read->login($_POST);
			$_SESSION['message'] = $data['login']['log'];
			if($data['login']['status'] == 'success' ){
				header('Location: index');
				die();				
			}
		}

		$data['title'] = 'User Login'; 
		$this->view('user-login', $data);
	}
	function register(){
		$data = array();
		if(isset($_POST['register'])){
			//var_dump($_POST); die();
			$data['reg_data'] = $this->write->registerUser($_POST);
		}

		$data['title'] = 'Registration'; 
		$data['states'] = $this->read->getStates();
		$this->view('register-users', $data);
	}
	function vendorlogin(){
		$data = array();
		if(isset($_POST['login'])){
			$data['login'] = $this->vendRead->login($_POST);
			if($data['login']['status'] == 'success' ){
					header('Location: vendor/index');
					die();				
			}
		}
		if(isset($_POST['order'])){
			//var_dump($_POST); die();
			$data = $this->write->order($_POST);
			$_SESSION['order'] = $data['log'];
		}

		$data['title'] = 'Vendor Login';
		$this->view('vendor-login', $data);
	}
	

}
?>