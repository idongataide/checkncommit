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
		$data['title'] = 'Home';
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
	function adminlogin(){
		$data = array();
		if(isset($_POST['login'])){
			$data = $this->adminRead->adminlogin($_POST);
			$_SESSION['message'] = $data['log'];
			if($data['status'] == 'success' ){
					header('Location: admin/index');
					die();				
			}
		}
		if(isset($_POST['order'])){
			//var_dump($_POST); die();
			$data = $this->write->order($_POST);
			$_SESSION['order'] = $data['log'];
		}

		$data['title'] = 'Admin Login'; 
		$this->view('admin-login', $data);
	}
	function businessRegistration(){
		$data = array();
		if(isset($_POST['login'])){
			$data = $this->vendRead->login($_POST);
			$_SESSION['message'] = $data['log'];
		}
		if(isset($_POST['register'])){
			//var_dump($_POST); die();
			$data['reg_data'] = $this->write->registerBusiness($_POST);
		}

		$data['title'] = 'Vendor Registration'; 
		$data['states'] = $this->read->getStates();
		$this->view('businessregisteration', $data);
	}
	function cities($state_id){
		$data = $this->read->getCities($state_id);
		header('Content-Type: application/json');
		print ( json_encode($data) );
	}
	function contact(){ 
		$data = array();
		if(isset($_POST['submitContact'])){
			$data['contact'] = $this->write->submitContact($_POST);
			$_SESSION['message'] = $data['contact']['log'];
		}
		$data['title'] = 'Contact Us';
		$this->view('contact', $data);
	}
	function faq(){ 
		$data = array();
		
		$data['title'] = 'FAQ';
		$this->view('faq', $data);
	}
	
	function userlogin(){
		$data = array();
		if(isset($_POST['login'])){
			$data['login'] = $this->read->login($_POST);
			if($data['login']['status'] == 'success' ){
					header('Location: index');
					die();				
			}
		}

		$data['title'] = 'User Login'; 
		$this->view('user-login', $data);
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