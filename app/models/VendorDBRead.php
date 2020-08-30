<?php 
	/**
	 * 
	 */
	require_once 'DBConn.php';
	class VendorDBRead extends DBConn
	{
		
		function __construct(){
			parent::__construct();
        }
        function login($data){
            $email = mysqli_real_escape_string($this->connection, $data['email']);
			$password = mysqli_real_escape_string($this->connection, $data['password']);
			$query = "select * from business where business_email = '{$email}'";
			if($result = mysqli_query($this->connection, $query)){
				if(mysqli_num_rows($result) > 0){
					$arr = mysqli_fetch_assoc($result);
					$status = $arr['status'];
					if(password_verify($password, $arr['password'])){
						if($status == 'active'){
						$_SESSION['business_id'] = $arr['business_id'];
						return array('status' => 'success');
						}
						else return array('status' => 'failed', 'log' => 'Account not activated. Kindly activate your account from your email.', 'colour' => 'red');
						
					}else{

						return array('status' => 'failed', 'log' => 'Incorrect password', 'colour' => 'red');
						
					}
				}else{
					return array('status' => 'failed', 'log' => 'Invalid email', 'colour' => 'red');
				}
			}
			
			return array('status' => 'failed', 'log' => mysqli_error($this->connection), 'colour' => 'red');
		}
		function getProfile($id){
			$query = mysqli_query($this->connection, "SELECT * from business LEFT JOIN states on business.store_state = states.state_id
			LEFT JOIN cities on business.store_city = cities.city_id where business_id = '$id'");
			return mysqli_fetch_assoc($query);
		}
		function getCategories(){
			$query = mysqli_query($this->connection, "select * from categories");
			return $this->getStructureData($query);
		}
		function getProducts($id){
			$query = mysqli_query($this->connection, "SELECT * FROM `products` LEFT JOIN categories
			ON products.prod_cat = categories.cat_id LEFT JOIN product_business 
			ON products.prod_id = product_business.p_no WHERE v_no = $id");
			return $this->getStructureData($query);
		}
		function getProduct($id){
			$query = mysqli_query($this->connection, "SELECT * FROM `products` LEFT JOIN categories
			ON products.prod_cat = categories.cat_id WHERE products.prod_id = $id ");
			return mysqli_fetch_assoc($query);
		}
		function getOrders($id){
			$query = mysqli_query($this->connection, "SELECT * FROM `order_details` LEFT JOIN products 
			on order_details.prod_no = products.prod_id LEFT JOIN customer on order_details.user_no = customer.id 
			left join product_business on order_details.prod_no = product_business.p_no left join business on 
			product_business.v_no = business.business_id WHERE v_no = '$id' ORDER BY order_details.date DESC");
			return $this->getStructureData($query);
		}
		function getInvoice($id, $vend){
			$query = mysqli_query($this->connection, "SELECT * FROM `order_details` LEFT JOIN products 
            ON order_details.prod_no = products.prod_id LEFT JOIN customer ON order_details.user_no = customer.id  
            LEFT JOIN product_business on products.prod_id = product_business.p_no LEFT JOIN business on product_business.v_no = business.business_id
            LEFT JOIN states on business.store_state = states.state_id 
			WHERE invoice_id = '$id'AND business.business_id = '$vend' ");
			return $this->getStructureData($query);
		}
		function getInvoiceState($id, $vend){
			$query = mysqli_query($this->connection, "SELECT * FROM `order_details` LEFT JOIN products 
            ON order_details.prod_no = products.prod_id  LEFT JOIN product_business on products.prod_id = product_business.p_no
			LEFT JOIN business on product_business.v_no = business.business_id LEFT JOIN states
			on order_details.state = states.state_id LEFT JOIN cities on order_details.order_city = cities.city_id
			WHERE invoice_id = '$id'AND business.business_id = '$vend'");
			return $this->getStructureData($query);
		}
		function getDeliveryFee($id){
			$query = mysqli_query($this->connection, "SELECT * FROM  order_details left join states on order_details.state = states.state_id Left join zones
			on states.zone = zones.zone_id where order_details.invoice_id = '$id'");
			return mysqli_fetch_assoc($query);
		} 
		function gasNotif($id){
			$output = '';
			$count_query =  mysqli_query($this->connection, "SELECT * FROM  notification left join gas_order on gas_order.g_o_id = notification.g_o_no 
			where v_no = '$id' and notif_status = 'unread'");
			$count = mysqli_num_rows($count_query);
			$query =  mysqli_query($this->connection, "SELECT * FROM  notification left join gas_order on gas_order.g_o_id = notification.g_o_no 
			where v_no = '$id' order by notification.notif_date DESC LIMIT 5");
			if(mysqli_num_rows($query) > 0)
			{
			while($row = mysqli_fetch_array($query))
			{
				$not_id = $row['not_id'];
			$url = 'business/gasorders/'.$row['invoice_id'];
			$date = $row['notif_date'];
			  $output .= '
			  <li>
			  <a onclick="set_status('.$not_id.')" href="'.$url.'">';
	 	       if($row['notif_status'] == 'unread'){
				  $output .='<strong>New Order - '.$date.'</strong><br />
				  <small><em>You have received an order click to view</em></small>
				  </a>
				  </li>
				  ';
			  }
			  else{
				$output .='<em>New Order - '.$date.'</em><br />
				  <small><em>You have received an order click to view</em></small>
				  </a>
				  </li>
				  ';
			  } 
			   
			  
			}
			}
			else{
				$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
			}
			
			return array('notification' => $output, 'unseen_notification' => $count);
		}
		function getGasInvoice($id){
			$query = mysqli_query($this->connection, "SELECT * FROM `gas_order` LEFT JOIN  customer 
			ON gas_order.user_no = customer.id LEFT JOIN states on gas_order.gas_state = states.state_id
			LEFT JOIN cities on gas_order.gas_city = cities.city_id WHERE invoice_id = '$id'");
			return $this->getStructureData($query);
		}
		function getGasOrders($id, $gasId){
			$query = mysqli_query($this->connection, "SELECT * FROM `gas_order` LEFT JOIN customer
			on gas_order.user_no = customer.id LEFT JOIN notification on gas_order.g_o_id = g_o_no WHERE v_no = '$id'
			and invoice_id = '$gasId' ORDER BY gas_order.date DESC");
			return $this->getStructureData($query);
		}  
	  }
?>