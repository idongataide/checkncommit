<?php
/**
 * 
 */
class Registration extends Controller
{
	function __construct()
	{
	$this->read = new DBRead();
	}
	function index(){
		$data = null;
		 $reg_data = null;
		 //unset($_SESSION['u_id']);
		/*  if(isset($_SESSION['u_id'])){
			header('Location: login');
			die();
		}
		if(isset($_POST['register'])){
			$write = new DBWrite();
			//var_dump($_POST);die();
			$reg_data = "";//$write->registerUser($_POST);
		//	var_dump($reg_data);die();
		$data = array(
			'reg_data' =>  $reg_data
		);
		} */

		$data['title'] = 'User Registration';
		//$data['states'] = $this->read->getStates();
		//var_dump($data['states'][9]['state_id']);die();		
		$this->view('registeration', $data);
	}	
	
	
}
?>