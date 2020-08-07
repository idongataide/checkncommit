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
			header('location: /login');
			die();
		}
		
		$data = array(
			'profile' => $this->adminRead->getProfile($_SESSION['admin_id'])
			
		);
		$data['order_count'] = $this->adminRead->getOrderCount();
		$data['user_count'] = $this->adminRead->getUserCount();
		$data['product_count'] = $this->adminRead->getProductCount();
		$this->view($this->dir_name.'index', $data);
	}
	function users(){
		$data = array();
		if(!(isset($_SESSION['admin_id'])) || $_SESSION['role'] == 'sales rep'){
			header('location: login');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['users'] = $this->adminRead->getUsers();
		$data['user_count'] = $this->adminRead->getUserCount();

		$this->view($this->dir_name.'all_users', $data);
	}
	function products(){
		$data = array();
		if(!(isset($_SESSION['admin_id'])) || $_SESSION['role'] == 'sales rep'){
			header('location: login');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['products'] =  $this->adminRead->getProducts();
		//var_dump($data);die();
		$this->view($this->dir_name.'all_product', $data);
	}
	function addUser(){
		$data =array();
		if(!(isset($_SESSION['admin_id'])) || $_SESSION['role'] == 'sales rep'){
			header('location: login');
			die();
		}
		if(isset($_POST['addUser'])){
			$data['reg_user'] = $this->write->addUser($_POST);
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		//var_dump($data);die();
		
		$this->view($this->dir_name.'add_user', $data);
	}
	function addProduct(){
		$data = array();
			if(!(isset($_SESSION['admin_id'])) || $_SESSION['role'] == 'sales rep'){
				header('location: /mfmbook/login');
				die();
			}
			
			if(isset($_POST['addBook'])){
				$data = $this->write->addBook($_POST);
				$_SESSION['message'] = $data['log']; $_SESSION['colour'] = $data['colour'];
			}
	
		$data['profile'] = $this->adminRead->getProfile($_SESSION['admin_id']);

		$this->view($this->dir_name.'new_product', $data);
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
	function deleteUser($id){
		$data = $this->write->deleteUser($id);
		$msg = $data['log'];
		echo $msg;
	}
	function deleteBook($id){
		$data = $this->write->deleteBook($id);
		$msg = $data['log'];
		echo $msg;
	}
	function deleteCart($id){
		$data = $this->write->deleteCart($id);
		$msg = $data['log'];
		echo $msg;
	}
	function search($id){
		$data = $this->adminRead->search($id);
		header('Content-Type: application/json');
		print ( json_encode($data) );
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
	function logout(){
		session_destroy();
		header('Location: /login');
		die();
	}

}

?>
