<?php 
	/**
	 * 
	 */
	require_once 'DBConn.php';
	class AdminDBRead extends DBConn
	{
		
		function __construct(){
			parent::__construct();
		}

		function adminlogin($data){
			$username = mysqli_real_escape_string($this->connection, $data['username']);
			$password = mysqli_real_escape_string($this->connection, $data['pass']);
			$query = "select * from admin where username = '{$username}'";
			if($result = mysqli_query($this->connection, $query)){
				if(mysqli_num_rows($result) > 0){
					$arr = mysqli_fetch_assoc($result);
					if(password_verify($password, $arr['password'])){
						$_SESSION['admin_id'] = $arr['admin_id']; 
						$_SESSION['username'] = $arr['username']; 
						return array('status' => 'success');
						
					}else{

						return array('status' => 'failed', 'log' => 'Incorrect password');
						
					}
				}else{
					return array('status' => 'failed', 'log' => 'Invalid username');
				}
			}
			
			return array('status' => 'failed', 'log' => mysqli_error($this->connection));
		}
		function getUsers(){
			$query = mysqli_query($this->connection, "select * from users ");
			return $this->getStructureData($query);
		}
		function getUserCount(){
			$query = mysqli_query($this->connection, "select count(user_id) as users from users ");
			return $this->getStructureData($query);
		}
		function getProductCount(){
			$query = mysqli_query($this->connection, "select count(prod_id) as product from products ");
			return $this->getStructureData($query);
		}
		function getOrderCount(){
			$query = mysqli_query($this->connection, "select count(order_id) as orders from orders ");
			return $this->getStructureData($query);
		}
		function getProducts(){
			$query = mysqli_query($this->connection, "select * from products ");
			return $this->getStructureData($query);
		}
		function getProduct($id){
			$query = mysqli_query($this->connection, "select * from products where prod_id = '$id'");
			return $this->getStructureData($query);
		}
		function getProfile($id){
			$query = mysqli_query($this->connection, "select * from users where user_id = '$id'");
			return mysqli_fetch_assoc($query);
		}
		function getSales(){
			$query = mysqli_query($this->connection, "SELECT * from sales left join products on prod_no = products.prod_id left join
			users on seller_id = users.user_id ORDER BY date DESC");
			return $this->getStructureData($query);
		}
		function getInvoice($id){
			$query = mysqli_query($this->connection, "SELECT * from sales left join products on prod_no = products.prod_id left join
			users on seller_id = users.user_id where invoice_id = '$id'");
			return $this->getStructureData($query);
		}
		function getTotal(){
			$query = mysqli_query($this->connection, "SELECT * from sales left join products on prod_no = products.prod_id left join
			users on seller_id = users.user_id");
			$total = 0;
			while($row = mysqli_fetch_assoc($query) ){
				$total += $row['prod_price'] * $row['qty'];
			}
			return $total;
		}
		function getCart(){
			$query = mysqli_query($this->connection, "SELECT * from cart left join products on prod_no = products.prod_id");
			return $this->getStructureData($query);
		}
		function getOrders(){
			$query = mysqli_query($this->connection, "SELECT * from orders");
			return $this->getStructureData($query);
		}
		function search($id){
			$query = mysqli_query($this->connection, "SELECT * from products where prod_name like '%$id%' and prod_qty > 0 Limit 5");
			return $this->getStructureData($query);
		}
		
	}
?>
