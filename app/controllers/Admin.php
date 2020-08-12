<?php
class Admin extends Controller
{
    private $dir_name = 'admin/';
	function __construct()
	{
		$this->write = new DBWrite();
		$this->read = new DBRead();
		$this->adminRead = new AdminDBRead();
	}
	function index(){
		if(!(isset($_SESSION['admin_id']))){
			header('location: admin/login');
			die();
		}
		
		$data = array(
			'profile' => $this->adminRead->getProfile($_SESSION['admin_id']),
			'user_count' => $this->adminRead->getUserCount(),
			'business_count' => $this->adminRead->getBusinessCount()
			
		);
		//var_dump($data); die();
		$this->view($this->dir_name.'index', $data);
	}
	function users(){
		$data = array();
		if(!(isset($_SESSION['admin_id']))){
			header('location: login');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['users'] = $this->adminRead->getUsers();

		$this->view($this->dir_name.'registered-users', $data);
	}
	function businesses(){
		$data = array();
		if(!(isset($_SESSION['admin_id']))){
			header('location: login');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['businesses'] =  $this->adminRead->getBusinesses();
		//var_dump($data);die();
		$this->view($this->dir_name.'businesses', $data);
	}
	function businessdetails($id){
		$data = array();
		if(!(isset($_SESSION['admin_id']))){
			header('location: login');
			die();
		}
		if($id == ""){
			header('location: businesses');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['business'] =  $this->adminRead->getBusiness($id);
		//var_dump($data);die();
		$this->view($this->dir_name.'businessdetails', $data);
	}
	function userdetails($id){
		$data = array();
		if(!(isset($_SESSION['admin_id']))){
			header('location: login');
			die();
		}
		if($id == ""){
			header('location: users');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['user'] = $this->adminRead->getUser($id);

		$this->view($this->dir_name.'users-details', $data);
	}
	function editProduct($id){
		$data = array();
			if(!(isset($_SESSION['admin_id'])) || $_SESSION['role'] == 'sales rep'){
				header('location: /login');
				die();
			}
			
			if(isset($_POST['editBook'])){
				//var_dump($_FILES['book']);die();
				$data = $this->write->editBook($_POST, $id);
				$_SESSION['message'] = $data['log']; $_SESSION['colour'] = $data['colour'];
			}
	
		$data['profile'] = $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['product'] =  $this->adminRead->getProduct($id);
		//var_dump($data); die();

		$this->view($this->dir_name.'edit_product', $data);
	}
	function sale(){
		$data = array();
			if(!(isset($_SESSION['admin_id']))){
				header('location: /login');
				die();
			}
			if(isset($_POST['updateCart'])){
				//var_dump($_POST); die();
				$data = $this->write->updateCart($_POST);
				if($data['status'] == 'failed'){
					$_SESSION['message'] = $data['log'];
				}
			}
			
		
			if(isset($_POST['sell'])){
				$data = $this->write->sell($_POST);
				if($data['status'] == 'success'){
					$invoice = $data['invoice'];
					header('location: invoice/'.$invoice);die();
				}
				$_SESSION['message'] = $data['log']; 
			}
	
		$data['profile'] = $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['cart'] = $this->adminRead->getCart();

		$this->view($this->dir_name.'sale', $data);
	}
	function viewSales(){
		$data = array();
			if(!(isset($_SESSION['admin_id']))){
				header('location: /login');
				die();
			}
	
		$data['profile'] = $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['sales'] = $this->adminRead->getSales();
		$data['total'] = $this->adminRead->getTotal();
		//var_dump($data['invoice']);die();

		$this->view($this->dir_name.'view-sales', $data);
	}
	function addToCart($id){
		$data = $this->write->addToCart($id);
		$msg = $data['log'];
		echo $msg;
	}
	function orders(){
		$data = array();
			if(!(isset($_SESSION['admin_id']))){
				header('location: login');
				die();
			}
		$data['profile'] = $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['orders'] = $this->adminRead->getOrders();

		$this->view($this->dir_name.'orders', $data);
	}
    function invoice($id){
		if($id == ""){
		header("location: sales");
		}
		$data = array();
		$data['profile'] = $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['invoice'] = $this->adminRead->getInvoice($id); 
		//var_dump($data); die();
		$this->view($this->dir_name.'invoice', $data);
	}
	function login(){
		//die(password_hash('checkncommit@11', PASSWORD_BCRYPT));
		$data = array();
		$data['title'] = 'Admin Login';
		if(isset($_POST['login'])){
			//var_dump($_FILES['book']);die();
			$data['login'] = $this->adminRead->adminlogin($_POST);
			if($data['login']['status'] == 'success' ){
				header('Location: ../admin/index');
				die();				
			}
		}
		$this->view('admin-login', $data);
	}
	function logout(){
		session_destroy();
		header('Location: admin/login');
		die();
	}

}

?>
