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
    function index(){
        $data = null;
       /*  if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
		} */
        $data = array(
			//'profile' => $this->vRead->getProfile($_SESSION['store_id'])
        );
        $data['title'] = 'Home';
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
    function followers(){
		$data = array();
		$data['title'] = 'Followers';
		$this->view($this->dir_name.'business-follow', $data); 
    }
    function profile(){
		/* if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        } */
		$data = array(
			/* 'profile' => $this->vRead->getProfile($_SESSION['store_id']),
			'product' => $this->vRead->getProducts($_SESSION['store_id']) */
		);
        $data['title'] = 'Profile';
		$this->view($this->dir_name.'profile', $data);
	}
	function chat(){
		/* if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
		} */
		$data['title'] = 'Chat';
		$this->view($this->dir_name.'chat', $data);
	}
	function subscription(){
		/* if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
		} */
		$data['title'] = 'Subscription Page';
		$this->view($this->dir_name.'subscription', $data);
	}
	function userreviews(){
		/* if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        } */
		$data['title'] = 'User Reviews';
		//var_dump($data['invoice']); die();
		$this->view($this->dir_name.'users-reviews', $data);
	}
    function logout(){
		session_destroy();
		header('Location: /goshop');
		die();
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
	