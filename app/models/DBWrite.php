<?php
/**
 * 
 */
require_once 'DBRead.php';
require_once 'DBConn.php';
require 'PHPMailer/PHPMailerAutoload.php';
class DBWrite extends DBConn
{
	private $write = null;
	function __construct(){
		parent::__construct();
		$this->read = new DBRead();
	}
	function registerUser($data){
		$name = $this->read->escape($data['fname']);
		$lname = $this->read->escape($data['lname']);
		$email = $this->read->escape($data['email']);
		$password = $this->read->escape($data['pass']);
		$c_password = $this->read->escape($data['cPass']);
		if($password != $c_password){
			return array('status' => 'failed', 'colour'=> 'red', 'log'=>'Passwords are not same!');
		}
		$password = password_hash($password, PASSWORD_BCRYPT);
		$token = bin2hex(random_bytes(60));

		$email_exist = $this->read->userEmailExists($email);
		if($email_exist !=0 ){
			return array('status' => 'failed', 'colour'=> 'red', 'log'=>'Email exists');
		}

		$query = "INSERT into users
		( `fname`,  `lname`, `user_email`, `password`, `token`, `status`) VALUES 
		('{$name}', '{$lname}','{$email}', '{$password}', '{$token}',
		'Not active')";

		if($run_query = mysqli_query($this->connection, $query)){
			$mail = new PHPMailer;
			// $mail->SMTPDebug = 3;
			$mail->isSMTP();          // Set mailer to use SMTP
			$mail->Host = 'mail.joyzgas.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;          // Enable SMTP authentication
			$mail->Username = 'official@joyzgas.com';                
			$mail->Password = 'joyzgas@11';                          
			$mail->SMTPSecure = 'tls';       // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 26;          // TCP port to connect to
			$mail->setFrom('official@joyzgas.com', 'ChecknCommit');
			$mail->addAddress($email, $name.' '.$lname);
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			  );
			  $url = 'http://localhost:8080/checkncommit/activate/'.$token;
			$mail->isHTML(true);
			$mail->Subject  = 'Welcome to ChecknCommit';
			$mail->Body     = '<body>
		
		<h4>Dear '.$name.',</h4>
	
		<p>Welcome to ChecknCommit and thank you for joining our 
		platform. 
		
		
		<br>Activate Your Account <br>
		<a  href="'.$url.'">Here</a>
		<br>Kind Regards,
		<br>
		<br>ChecknCommit Team
	    </p>
		</body>';
			if(!$mail->send()) {
				return array('status' => 'failed', 'colour'=> 'red','log' =>'Message was not sent. Mailer error: ' . $mail->ErrorInfo);
			}
			else{ 
				return array('status' => 'success', 'colour'=> 'green',
				'log' => 'Account created succesfully, please kindly check your email to activate your account.');}

		}else{
			return array('status' => 'failed', 'colour'=> 'red','log' => mysqli_error($this->connection));
		}
	}
	function registerBusiness($data){
		$name = $this->read->escape($data['business_fname']);
		$lname = $this->read->escape($data['business_lname']);
		$email = $this->read->escape($data['business_email']);
		$address = $this->read->escape( $data['business_address']);
		$state = $this->read->escape( $data['business_state']);
		$city = $this->read->escape( $data['business_city']);
		$phone = $this->read->escape( $data['business_phone']);
		$store = $this->read->escape( $data['business_name']);
		$password = $this->read->escape($data['pass']);
		$c_password = $this->read->escape($data['cPass']);
		if($password != $c_password){
			return array('status' => 'failed', 'colour'=> 'red', 'log'=>'Passwords are not same!');
		}
		$password = password_hash($password, PASSWORD_BCRYPT);
		$token = bin2hex(random_bytes(60));

		$email_exist = $this->read->emailExists($email);
		if($email_exist !=0 ){
			return array('status' => 'failed', 'colour'=> 'red', 'log'=>'Email exists');
		}

		$query = "INSERT into business
		( `business_fname`,  `business_lname`, `store_name`,  `business_email`, `password`, `business_phone`, `business_address`, `business_state`, business_city , `token`, `status`, `verified`) VALUES 
		('{$name}', '{$lname}', '{$store}', '{$email}', '{$password}','{$phone}','{$address}','{$state}', {$city}, '{$token}','Not active', 'false')";

		if($run_query = mysqli_query($this->connection, $query)){
			$mail = new PHPMailer;
			// $mail->SMTPDebug = 3;
			$mail->isSMTP();          // Set mailer to use SMTP
			$mail->Host = 'mail.joyzgas.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;          // Enable SMTP authentication
			$mail->Username = 'official@joyzgas.com';                
			$mail->Password = 'joyzgas@11';                          
			$mail->SMTPSecure = 'tls';       // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 26;          // TCP port to connect to
			$mail->setFrom('official@joyzgas.com', 'ChecknCommit');
			$mail->addAddress($email, $name.' '.$lname);
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			  );
			  $url = 'http://localhost:8080/checkncommit/activatestore/'.$token;
			$mail->isHTML(true);
			$mail->Subject  = 'Welcome to ChecknCommit';
			$mail->Body     = '<body>
		
		<h4>Dear '.$name.',</h4>
	
		<p>Welcome to ChecknCommit and thank you for joining our 
		platform. 
		
		
		<br>Activate Your Account <br>
		<a  href="'.$url.'">Here</a>
		<br>Kind Regards,
		<br>
		<br>ChecknCommit Team
	    </p>
		</body>';
			if(!$mail->send()) {
				return array('status' => 'failed', 'colour'=> 'red','log' =>'Message was not sent. Mailer error: ' . $mail->ErrorInfo);
			}
			else{ 
				return array('status' => 'success', 'colour'=> 'green',
				'log' => 'Account created succesfully, please kindly check your email to activate your account.');}

		}else{
			return array('status' => 'failed', 'colour'=> 'red','log' => mysqli_error($this->connection));
		}
	}
	function activateUser($token){
		$query = mysqli_query($this->connection, "SELECT * FROM users where token = '$token'");
		if($token == "0"){
			return array('status' => 'failed', 'log' => 'Invalid Token');
		}
		if($query){
			if(mysqli_num_rows($query) ==1){
				$row = mysqli_fetch_assoc($query);
				$id = $row['user_id'];
				$check = mysqli_query($this->connection, "UPDATE `users` set `status` = 'active',`token` = 0 where user_id = '$id'");
				if($check){
					//echo $token; die();
					return array('status' => 'success');
				}else return array('status' => 'failed', 'log' => mysqli_error($this->connection));
			}
		}
		else return array('status' => 'failed', 'log' => 'Invalid Token');
	}
	function activateStore($token){
		$query = mysqli_query($this->connection, "SELECT * FROM business where token = '$token'");
		if($query){
			if($token == "0"){
				return array('status' => 'failed', 'log' => 'Invalid Token');
			}
			if(mysqli_num_rows($query) ==1){
				$row = mysqli_fetch_assoc($query);
				$id = $row['vendor_id'];
				$check = mysqli_query($this->connection, "UPDATE `business` set `status` = 'active',`token` = 0 where business_id = '$id'");
				if($check){
					return array('status' => 'success');
				}else return array('status' => 'failed', 'log' => mysqli_error($this->connection));
			}
		}
		else return array('status' => 'failed', 'log' => 'Token not found');
	}
	function insertFile($file, $prodId){
		
		$dir = "public/_productFiles";
		if(!is_dir($dir)){
			mkdir($dir);
		}
		
		$count = count($file['name']);
		for ($i=0; $i < $count; $i++) { 
			$file_name = $this->genFileName($file['type'][$i]);
			$tmp = $file['tmp_name'][$i];
			$query = mysqli_query($this->connection, "INSERT INTO `product_img`( `prod_no`, `prod_img`) 
			VALUES ('$prodId', '$file_name')");
			if($query){
				if(move_uploaded_file($tmp, $dir.'/'.$file_name)){
				}
				else{
					return array('status' => 'failed', 'log' => mysqli_error($this->connection));
				}
				
			}
			
			else return  array('status' => 'failed', 'log' =>mysqli_error($this->connection));
			
		}return 1;

	}
	function genFileName($file_type){
		$ext = explode("/", $file_type);
		$_name = rand().'.' .$ext[1];
		return $_name;
	}
	function setNotif($id){
		$query = mysqli_query($this->connection, "UPDATE notification set notif_status= 'read' 
		where notif_status = 'unread' and not_id = '$id'");
		if($query){
			return array('status' => 'success', 'log' => 'Status changed');
		}else return  array('status' => 'failed', 'log' =>mysqli_error($this->connection));
		
	}
	function updateProfile($data){
		$password = $this->read->escape($data['pass']);
		$c_password = $this->read->escape($data['cpass']);
		if($password != $c_password){
			return array('status' => 'failed',  'log'=>'Passwords are not same!');
		}
		$password = password_hash($password, PASSWORD_BCRYPT);
		$query = mysqli_query($this->connection, "UPDATE `admin` SET `password` = '$password' where `admin_id` = 1");
		if($query){
			return  array('status' => 'success', 'log' => 'Profile updated successfully.');
	   }
	   else return  array('status' => 'failed',  'log' =>mysqli_error($this->connection));


	}
	function resetPassword($data, $email, $token){
		$password = $this->read->escape($data['pass']);
		$c_password = $this->read->escape($data['cpass']);
		if($password != $c_password){
			return array('status' => 'failed', 'colour'=> 'red', 'log'=>'Passwords are not same!');
		}
		$password = password_hash($password, PASSWORD_BCRYPT);
		$query = mysqli_query($this->connection, "UPDATE users set `password` = '$password', `token` = 0 WHERE `email` =  '$email' and `token` = '$token'");
		if($query){
			if(mysqli_affected_rows($this->connection) > 0){
			return array('status' => 'success', 'colour'=> 'green','log' => 'Password has been changed sucessfully.');
		}
		else{ 
			return array('status' => 'faıled', 'colour'=> 'red','log' => 'Invalid Token!');
		}
		}
		else{ 
			return array('status' => 'faıled', 'colour'=> 'red','log' => 'Password not changed!. '.mysqli_error($this->connection));
		}
	}
	function addBook($data){
		$name = $this->read->escape($data['book_name']);
		$price = $this->read->escape($data['price']);
		$qty = $this->read->escape($data['qty']);
		$desc = $this->read->escape($data['description']);
		
		$file = $_FILES['book'];
		//var_dump($file); die();
		$query = mysqli_query($this->connection, "INSERT INTO `products`( `prod_name`, `prod_price`, `prod_qty`, `prod_desc`) VALUES 
		('$name', '$price', '$qty', '$desc')");
		if($query){
			$Id = mysqli_insert_id($this->connection);
			$dir = 'public/books/';
			if(!is_dir($dir)){
				mkdir($dir);
			}
			if (!empty($file['name'])) {
				$file_name = $this->genFileName($file['type']);
				//die($file_name);
				$tmp = $file['tmp_name'];
				$q = mysqli_query($this->connection, "UPDATE  `products` SET `prod_img` = '$file_name' WHERE prod_id = '$Id'");
				if($q){
					if(move_uploaded_file($tmp, $dir.'/'.$file_name)){
						return array('status' => 'success', 'colour'=> 'green','log' => 'Book has been added.');
					}
					else{
						return array('status' => 'failed', 'colour'=> 'red','log' => 'Book not added.');
					}
				}
				else{
					return array('status' => 'failed', 'colour'=> 'red', 'log' =>mysqli_error($this->connection));
				}
			}
		}
		else{
				return array('status' => 'failed', 'colour'=> 'red', 'log' =>mysqli_error($this->connection));
			}
	}
	function editBook($data, $id){
		$name = $this->read->escape($data['book_name']);
		$price = $this->read->escape($data['price']);
		$qty = $this->read->escape($data['qty']);
		$desc = $this->read->escape($data['description']);
		$file = $_FILES['book'];
		//var_dump($file);die();
		$query = mysqli_query($this->connection, "UPDATE `products` SET 
		`prod_name`='$name',`prod_price`='$price',`prod_qty`='$qty',`prod_desc`='$desc' WHERE prod_id = '$id'");
		if($query){
			$dir = 'public/books/';
			if(!is_dir($dir)){
				mkdir($dir);
			}
			if (!empty($file['name'])) {
				$file_name = $this->genFileName($file['type']);
				//die($file_name);
				$tmp = $file['tmp_name'];
				$q = mysqli_query($this->connection, "UPDATE  `products` SET `prod_img` = '$file_name' WHERE prod_id = '$id'");
				if($q){
					if(move_uploaded_file($tmp, $dir.'/'.$file_name)){

						return array('status' => 'success', 'colour'=> 'green','log' => 'Book has been edited.');
					}
					else{
						return array('status' => 'failed', 'colour'=> 'red','log' => 'Book not edited.');
					}
				}
				else{
					return array('status' => 'failed', 'colour'=> 'red', 'log' =>mysqli_error($this->connection));
				}
			}
		}
		else{
				return array('status' => 'failed', 'colour'=> 'red', 'log' =>mysqli_error($this->connection));
			}
	}
	function deleteBook($id){
		$q = mysqli_query($this->connection, "SELECT * FROM `products` WHERE `prod_id` = '$id'");
		if($q){
			$row = mysqli_fetch_assoc($q);
			$img = $row['prod_img'];
			$dir = "public/books/".$img;
			$image = $dir;
			unlink($image);
			$query = mysqli_query($this->connection, "DELETE FROM `products` WHERE `prod_id` = '$id'");
			if($query){
				return array('status' => 'success', 'colour'=> 'green','log' => 'Product has been deleted.');
			}
			else{
				return array('status' => 'failed', 'log' =>mysqli_error($this->connection));
			}
		}
		else{
			return array('status' => 'failed', 'log' =>mysqli_error($this->connection));
		}
		
	}
	function deleteUser($id){
		$query = mysqli_query($this->connection, "DELETE FROM `users` WHERE `user_id` = '$id");
		if($query){
			
				return array('status' => 'success', 'colour'=> 'green','log' => 'User has been deleted.');
			}
			else{
				return array('status' => 'failed', 'log' =>mysqli_error($this->connection));
			}
		
	}
	function deleteCart($id){
		$query = mysqli_query($this->connection, "DELETE FROM `cart` WHERE `cart_id` = '$id'");
		if($query){
			
				return array('status' => 'success', 'colour'=> 'green','log' => 'Book has been deleted.');
			}
			else{
				return array('status' => 'failed', 'log' =>mysqli_error($this->connection));
			}
		
	}
	function addToCart($id){
		$query = mysqli_query($this->connection, "INSERT INTO `cart`( `prod_no`, `cart_qty`) VALUES ('$id', 1)");
		if($query){
			return array('status' => 'success', 'colour'=> 'green','log' => ' Added succesfully');
		}
		else{
			return array('status' => 'failed', 'log' =>mysqli_error($this->connection));
		}
	}
	function updateCart($data){
		$cart = $data['cart_id'];
		for ($i=0; $i < count($cart); $i++) { 
			$cart_no = $cart[$i];
			$qty = $data['qty'][$i];
			$query = mysqli_query($this->connection, "UPDATE cart set cart_qty = '$qty' where cart_id = '$cart_no'");
			if(!$query){
				return  array('status' => 'failed', 'log' =>mysqli_error($this->connection));
			}
		} return array('status' => 'success');
	}
	function sell($data){
		$query_id = mysqli_query($this->connection, "SELECT max(sales_id) AS max_no FROM sales");
		if($query_id){
			$result = mysqli_fetch_array($query_id);
			if($result['max_no'] == NULL){
				$order_id = 1;
			}else $order_id = $result['max_no'];
		}
		else return  array('status' => 'failed', 'log' =>mysqli_error($this->connection));
		$invoice = str_pad($order_id, 8,'0',STR_PAD_LEFT);
		//die($invoice);
		foreach ($data['cart_id'] as $key => $id) {
			$query = mysqli_query($this->connection, "SELECT * FROM cart where cart_id= '$id'");
			if($query){
				while ($row = mysqli_fetch_assoc($query)) {
					$prod_id = $row['prod_no'];
					$payment = $data['payment'];
					$qty = $data['qty'][0];
					$u_id = $_SESSION['admin_id'];
					$action = mysqli_query($this->connection, "INSERT INTO `sales`(`invoice_id`,  `prod_no`, `qty`, `seller_id`,`payment`) 
					VALUES('$invoice', '$prod_id', '$qty', '$u_id', '$payment')");
					if($action){
						$delete = mysqli_query($this->connection, "DELETE FROM cart WHERE cart_id = '$id'");
						if(!$delete){
							return  array('status' => 'failed', 'log' =>mysqli_error($this->connection));
						}
						else{
							$update= mysqli_query($this->connection, "UPDATE products set prod_qty = (prod_qty - '$qty') where prod_id = '$prod_id'");
							if(!$update){
								return  array('status' => 'failed', 'log' =>mysqli_error($this->connection));
							}
						}
						
					}
					else{
						return  array('status' => 'failed', 'log' =>mysqli_error($this->connection));
					}
				}
			}
		}
		return  array('status' => 'success', 'log' =>'Product sold', 'invoice' => $invoice);
	}
	function order($data){
		$name = $this->read->escape($data['name']);
		$phone= $this->read->escape($data['phone']);
		$qty = $this->read->escape($data['qty']);
		$book = $this->read->escape($data['books']);
		$query = mysqli_query($this->connection, "INSERT INTO `orders`(`name`, `phone_number`, `book_titles`, `book_qty`) VALUES 
		('$name', '$phone', '$book', '$qty')");
		if($query){
			return array('status' => 'success', 'colour'=> 'green','log' => ' Order Added succesfully');
		}
		else{
			return array('status' => 'failed', 'log' =>mysqli_error($this->connection));
		}
	}
	function submitContact($data){
		$fname = $this->read->escape($data['fname']);
		$lname = $this->read->escape($data['lname']);
		$email = $this->read->escape($data['email']);
		$subject = $this->read->escape($data['subject']);
		$message = $this->read->escape($data['message']);
		$mail = new PHPMailer;
		// $mail->SMTPDebug = 3;
		$mail->isSMTP();          // Set mailer to use SMTP
		$mail->Host = 'mail.mfmfrenchpublications.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;          // Enable SMTP authentication
		$mail->Username = 'contactus@mfmfrenchpublications.com'; 
		$mail->Password = 'default@11';                          
		$mail->SMTPSecure = 'tls';       // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 26;          // TCP port to connect to
		$mail->setFrom($email, $fname.' '.$lname);
		$mail->addAddress('contactus@mfmfrenchpublications.com', 'MFM French Publications');
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
			);
		$mail->isHTML(true);
		$mail->Subject  = $subject;
		$mail->Body     = '<body>'.$message.'</body>';
		if(!$mail->send()) {
			return array('status' => 'failed', 'colour'=> 'red','log' =>'Message was not sent. Mailer error: ' . $mail->ErrorInfo);
		}
		else{ 
			return array('status' => 'success', 'colour'=> 'green','log' => 'Message sent succesfully.');
		}
	}
	function submitFaq($data){
		$name = $this->read->escape($data['name']);
		$email = $this->read->escape($data['email']);
		$message = $this->read->escape($data['message']);
		$mail = new PHPMailer;
		// $mail->SMTPDebug = 3;
		$mail->isSMTP();          // Set mailer to use SMTP
		$mail->Host = 'mail.mfmfrenchpublications.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;          // Enable SMTP authentication
		$mail->Username = 'contactus@mfmfrenchpublications.com'; 
		$mail->Password = 'default@11';                          
		$mail->SMTPSecure = 'tls';       // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 26;          // TCP port to connect to
		$mail->setFrom($email, $name);
		$mail->addAddress('contactus@mfmfrenchpublications.com', 'MFM French Publications');
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
			);
		$mail->isHTML(true);
		$mail->Subject  = 'FAQ message from '.$name;
		$mail->Body     = '<body>'.$message.'</body>';
		if(!$mail->send()) {
			return array('status' => 'failed', 'colour'=> 'red','log' =>'Message was not sent. Mailer error: ' . $mail->ErrorInfo);
		}
		else{ 
			return array('status' => 'success', 'colour'=> 'green','log' => 'Message sent succesfully.');
		}
	}
		
}
?>