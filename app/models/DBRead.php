<?php
/**
 * 
 */
require_once 'DBConn.php';
class DBRead extends DBConn
{
	
	function __construct()
	{
		parent::__construct();
	}
	function escape($elem){
		$elem = mysqli_real_escape_string($this->connection, $elem);
		return $elem;
	}
	function emailExists($email){
		$query = "SELECT email from competition where email = '{$email}' ";
		if($result = mysqli_query($this->connection, $query)){
			$num = mysqli_num_rows($result);
			if($num==1){
				return array('status' => 'failed', 'colour'=> 'red', 'log'=>'Email already exists');
			}else{
				return array('status' => 'success');
			}
		}
	}
	function userEmailExists($email){
		$query = "SELECT email from users where email = '{$email}' ";
		if($result = mysqli_query($this->connection, $query)){
			$num = mysqli_num_rows($result);
			if($num==1){
				return 1;
			}else{
				return 0;
			}
		}
	}
	function login($data){
		$email = mysqli_real_escape_string($this->connection, $data['email']);
		$password = mysqli_real_escape_string($this->connection, $data['password']);
		$query = "select * from users where email = '{$email}'";
		if($result = mysqli_query($this->connection, $query)){
			if(mysqli_num_rows($result) > 0){
				$arr = mysqli_fetch_assoc($result);
				$status = $arr['status'];
		    	if(password_verify($password, $arr['password'])){
					if($status == 'active'){
					$_SESSION['u_id'] = $arr['user_id'];    		
					return array('status' => 'success', 'log' =>'');
					}
					else return array('status' => 'failed', 'log' => 'Account not activated. Kindly activate your account from your email.');
		    		
		    	}else{

		    		return array('status' => 'failed', 'log' => 'Incorrect password!');
		    		
		    	}
		    }else{
		    	return array('status' => 'failed', 'log' => 'Invalid email!');
		    }
		}
		
		return array('status' => 'failed', 'log' => mysqli_error($this->connection));
	}
	function getStates(){
		$query = mysqli_query($this->connection, "SELECT * FROM states");
		return $this->getStructureData($query);
	}
	function getCities($state_id){
		$query = mysqli_query($this->connection, "SELECT * FROM cities left join states on state_no = states.state_id where state_no = '$state_id'");
		return $this->getStructureData($query);
	}
	function getProfile($id){
		$query = mysqli_query($this->connection, "select * from customer where id = '$id'");
		return mysqli_fetch_assoc($query);
	}
	function getSlider(){
		$query = mysqli_query($this->connection, "SELECT * from slider ");
		return $this->getStructureData($query);
	}
	function getGallery(){
		$query = mysqli_query($this->connection, "SELECT * from gallery ORDER BY RAND() LIMIT 20");
		return $this->getStructureData($query);
	}

}
?>