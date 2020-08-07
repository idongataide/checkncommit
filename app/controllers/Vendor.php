<?php
/**
 * 
 */
class Vendor extends Controller
{
    private $dir_name = 'vendor/';
	function __construct()
	{
        $this->write = new DBWrite();
		$this->vRead =  new VendorDBRead();
		$this->read = new DBRead();
    }
    function register(){
		$data = null;
		$reg_data = null;
        if (isset($_POST['register'])) {
			//var_dump($_POST);die();
		   $reg_data= $this->write->registerStore($_POST);
		   $data = array(
			'reg_data' =>  $reg_data
		);
        //   var_dump($reg_data); die();
		}
		if(isset($_POST['login'])){
			$login_data = $this->vRead->login($_POST);
			//var_dump($data);die();
			$data = array(
				'reg_data' =>  $login_data
			);
			if($data['reg_data']['status'] == 'success'){
				header('Location: index');
				die();
			} 
		}
		
		$data['category'] = $this->read->getCategories(); 
		$data['states'] = $this->read->getStates();
		$this->view($this->dir_name.'register', $data);
	
	}
	function cities($state_id){
		$data = $this->read->getCities($state_id);
		header('Content-Type: application/json');
		print ( json_encode($data) );
	}
    function index(){
        $data = null;
        if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
		}
		if(isset($_POST['updateProfile'])){
			$data = $this->write->vendUpdate($_POST, $_SESSION['store_id']);
			if($data['status'] == 'failed'){
				die($data['log']);
			}
		}
        $data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id'])
        );
        //var_dump($data['profile']);die();
        $this->view($this->dir_name.'index', $data);
	}
	function changePassword(){
		$data = array();
		if(isset($_POST['sendEmail'])){
			$data['send'] = $this->write->sendVendEmail($_POST['email']);
		}
		//var_dump($data);die();
        $this->view($this->dir_name.'change_password', $data);	
	}
	function resetPassword($email = "", $token=""){
		$data = null;
		if($email == ""){
			$data['change']['log'] = 'INVALID EMAIL ADDRESS!';
			$data['change']['colour'] = 'red';
		}
		if($token == ""){
			$data['change']['log'] = 'INVALID TOKEN!';
			$data['change']['colour'] = 'red';
		}
		if(isset($_POST['reset'])){
			$data['change'] = $this->write->resetVendPassword($_POST, $email, $token);
		}
        //var_dump($data['profile']);die();
        $this->view($this->dir_name.'enter_password', $data);	
	}
    function product(){
		if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        }
		if(isset($_POST['submitProduct'])){
			$prod = $this->write->addStoreProduct($_POST, $_SESSION['store_id']);
			if($prod['status']== 'failed'){
				var_dump($prod['log']);die();
			}
		}
		$data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'category' => $this->vRead->getCategories()
		);
		

		$this->view($this->dir_name.'product', $data); 
    }
    function productList(){
		if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        }
		$data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'product' => $this->vRead->getProducts($_SESSION['store_id'])
		);
        //var_dump($data);die();
		$this->view($this->dir_name.'product-list', $data);
	}
	function editProduct($id){
		if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        }
		$data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'category' => $this->vRead->getCategories(),
			'product' => $this->vRead->getProduct($id)
		);
		if(isset($_POST['editProduct'])){
			$data = $this->write->editProduct($_POST);
			if($data['status'] == 'success'){
				header('location: ../productlist');
				die();
			} 
			else var_dump($data); die();
		}
		$this->view($this->dir_name.'editproduct', $data);
	}
	function orders(){
		if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        }
		$data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'orders' => $this->vRead->getOrders($_SESSION['store_id'])
		);
		$this->view($this->dir_name.'orders', $data);
	}
	function gasorders($gasId){
		if(!(isset($_SESSION['store_id']))){
			header('location: register');
			die();
		}
		$data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'orders' => $this->vRead->getGasOrders($_SESSION['store_id'], $gasId)
		);
		$data['gas_price'] = $this->read->getGasPrice();
		$this->view($this->dir_name.'gasorders', $data);
	}
	function invoice($id){
		if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        }
		$data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'invoice' => $this->vRead->getInvoice($id, $_SESSION['store_id']),
			'invoice_state' => $this->vRead->getInvoiceState($id, $_SESSION['store_id']),
			'delivery' => $this->vRead->getDeliveryFee($id)
		);
		//var_dump($data['invoice']); die();
		$this->view($this->dir_name.'invoice', $data);
	}
	function gasinvoice($id){
		if(!(isset($_SESSION['store_id']))){
			header('location: register');
			die();
		}
		$data = array(
			'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'invoice' => $this->vRead->getGasInvoice($id)
		);
		$data['gas'] = $this->read->getGasPrice();
		//var_dump($data);die();
		$this->view($this->dir_name.'gasinvoice', $data);
	}
    function logout(){
		session_destroy();
		header('Location: /goshop');
		die();
	}
	function gasVendAccept($id){
		$data = $this->write->gasVendAccept($id, $_SESSION['store_id']);
		$msg = $data['log'];
		 echo $msg;
	}
	function gasDeliver($id){
		$data = $this->write->gasVendDeliver($id, $_SESSION['store_id']);
		$msg = $data['log'];
		echo $msg;
	}
	function gasDecline($id){
		$data = $this->write->gasVendDecline($id, $_SESSION['store_id']);
		$msg = $data['log'];
		echo $msg;
	}
	function gasNotif(){
		$data = $this->vRead->gasNotif($_SESSION['store_id']);
		header('Content-Type: application/json');
		print ( json_encode($data) );
	}
	function setNotif($id){
		$data = $this->write->setNotif($id);
		$msg = $data['log'];
		 echo $msg;
	}
	function success(){ 
		$data = array();		
		$this->view($this->dir_name.'success', $data);
	}
	function failed(){ 
		$data = array();
		$data['message'] = $_SESSION['failed'];	
		unset($_SESSION['failed']);	
		$this->view($this->dir_name.'failed', $data);
	}
}
?>
	