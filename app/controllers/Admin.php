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
		/* if(!(isset($_SESSION['admin_id']))){
			header('location: admin/login');
			die();
		} */
		
		$data = array(
			//'profile' => $this->adminRead->getProfile($_SESSION['admin_id']),
			'user_count' => $this->adminRead->getUserCount(),
			'business_count' => $this->adminRead->getBusinessCount()
			
		);
		//var_dump($data); die();
		$this->view($this->dir_name.'index', $data);
	}
	function users(){
		$data = array();
		/* if(!(isset($_SESSION['admin_id']))){
			header('location: login');
			die();
		} */
		//$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']);
		$data['users'] = $this->adminRead->getUsers();

		$this->view($this->dir_name.'users', $data);
	}
	function businesses(){
		$data = array();
		/* if(!(isset($_SESSION['admin_id']))){
			header('location: login');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']); */
		$data['businesses'] =  $this->adminRead->getBusinesses();
		//var_dump($data);die();
		$this->view($this->dir_name.'businesses', $data);
	}
	function followers(){
		$data = array();
		/* if(!(isset($_SESSION['admin_id']))){
			header('location: login');
			die();
		}
		$data['profile'] =  $this->adminRead->getProfile($_SESSION['admin_id']); */
		$data['businesses'] =  $this->adminRead->getBusinesses();
		//var_dump($data);die();
		$this->view($this->dir_name.'users-follow', $data);
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
	function reviews(){
		$data = array();
			/* if(!(isset($_SESSION['admin_id']))){
				header('location: /login');
				die();
			} */
	

		$this->view($this->dir_name.'business-reviews', $data);
	}
	function userreviews(){
		/* if(!(isset($_SESSION['store_id']))){
            header('location: register');
            die();
        } */
		$data['title'] = 'User Review';
		//var_dump($data['invoice']); die();
		$this->view($this->dir_name.'reviews', $data);
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
		header('Location: ../admin/login');
		die();
	}

}

?>
