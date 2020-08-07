<?php
/**
 * 
 */
class Store extends Controller
{
    private $dir_name = 'store/';
	function __construct()
	{
        $this->write = new DBWrite();
		$this->read =  new DBRead();
		$this->storeread =  new StoreDBRead();
    }
    function index($id = "", $page = ""){
        $data = null;
        $data = array();
        if($id == ""){
            header('location:../');die();
        }
        $id = str_replace("'","\'", $id);
        $_SESSION['store_url'] = $id;
        $id= "goshop.ng/store/".$id;
		//var_dump($id);die();
		if(isset($_SESSION['u_id'])){
			$data['profile'] = $this->read->getProfile($_SESSION['u_id']);
			$data['cart_no'] =  $this->read->getCartNo($_SESSION['u_id']);
		}	
        if($page == ""){
            $data['products'] = $this->storeread->getAllProducts($id, 1);
        }
		else $data['products'] = $this->storeread->getAllProducts($id, $page);
		    
		$data['category'] = $this->read->getCategories();
      //  var_dump($data['products']);die();
        $this->view($this->dir_name.'products', $data);
    }
    function page($page = 1){
		$data = array();
		if(isset($_SESSION['u_id'])){
			$data['profile'] = $this->read->getProfile($_SESSION['u_id']);
			$data['cart_no'] =  $this->read->getCartNo($_SESSION['u_id']);
		}	
		$id = "goshop.ng/store/".$_SESSION['store_url'];
		$data['products'] = $this->storeread->getPagination($page, $id);
		$data['category'] = $this->read->getCategories();
		$this->view($this->dir_name.'products', $data);
	}
    
    function logout(){
		session_destroy();
		header('Location: /goshop');
		die();
	}
}
?>
	