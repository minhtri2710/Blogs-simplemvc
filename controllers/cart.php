<?php
	function cart_index() {
	    $data = array();
	    $data['template_file'] = 'index/cart.php';
	    $data['title']='Giỏ Hàng';
	    $data['data']=model('product')->get_product_index('rand()',4);
	    render('layout_home.php', $data);
	}
	function cart_add() {
		if(empty($_SESSION['total']))
			$_SESSION['total']=0;
		if(empty($_SESSION['total_qty']))
			$_SESSION['total_qty']=0;
	    if(isset($_POST['id'])){
	    	$id=$_POST['id'];
	    	$qty=isset($_POST['qty'])?$_POST['qty']:1;
	    	if(empty($_SESSION['cart'][$id])){
	    		$product=model('product')->getOneBy($id);
		    	$_SESSION['cart'][$id]['name']=$product['name'];
		    	$_SESSION['cart'][$id]['image_link']=$product['image_link'];
		    	$_SESSION['cart'][$id]['price']=$product['price'] -$product['discount'];
		    	$_SESSION['cart'][$id]['qty']=$qty;
		    	$_SESSION['cart'][$id]['subtotal']=$_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['qty'];
		    	$_SESSION['total_qty']+=$qty;
		    	$_SESSION['total']+=$_SESSION['cart'][$id]['price']*$qty;
	    	}
	    	else{
	    		$_SESSION['total_qty']+=$qty;
	    		$_SESSION['cart'][$id]['qty']+=$qty;
	    		$_SESSION['cart'][$id]['subtotal']=$_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['qty'];
	    		$_SESSION['total']+=$_SESSION['cart'][$id]['price']*$qty;
	    	}
	    	get_json_ajax();
	    }
	}
	function cart_update(){
		$data = array();
	    $data['template_file'] = 'index/cart.php';
	    $data['title']='Giỏ Hàng';
	    $_SESSION['total_qty']=0;
	    $_SESSION['total']=0;
	    foreach ($_POST['txtQty'] as $key => $value) {
	    	$_SESSION['cart'][$key]['qty']=$value;
	    	$_SESSION['cart'][$key]['subtotal']=$_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['qty'];
	    	$_SESSION['total_qty']+=$value;
	    	$_SESSION['total']+=$_SESSION['cart'][$key]['subtotal'];
	    }
	    get_json_ajax();
	}
	function cart_delete(){
		$data = array();
	    $data['template_file'] = 'index/cart.php';
	    $data['title']='Giỏ Hàng';
	    if(isset($_POST['id'])){
	    	$_SESSION['total_qty']-=$_SESSION['cart'][$_POST['id']]['qty'];
	    	$_SESSION['total']-=$_SESSION['cart'][$_POST['id']]['subtotal'];
	    	unset($_SESSION['cart'][$_POST['id']]);
	    	get_json_ajax();
	    }
	}
	function cart_delete_all(){
		$data = array();
	    $data['template_file'] = 'index/cart.php';
	    $data['title']='Giỏ Hàng';
    	unset($_SESSION['total_qty']);
    	unset($_SESSION['total']);
    	unset($_SESSION['cart']);
    	get_json_ajax();
	}
	function cart_add_order(){
		if(isset($_POST['submit'])){
			$trans_data = array(
	                'user_name' => $_POST['txtName'],
	                'user_email' => $_POST['txtEmail'],
	                'user_phone' => $_POST['txtPhone'],
	                'address' => $_POST['txtAddress'],
	                'amount'=>$_SESSION['total'],
	                'created'=>date('Y-m-d'),
	            );
			$id_trans=model('transaction')->insert($trans_data);
			foreach ($_SESSION['cart'] as $key => $value) {
				$order_data = array(
	                'transaction_id' => $id_trans,
	                'product_id' => $key,
	                'qty' => $value['qty'],
	                'amount' => $value['subtotal'],
	            );
				$id_order=model('order')->insert($order_data);
			}
			unset($_SESSION['total_qty']);
	    	unset($_SESSION['total']);
	    	unset($_SESSION['cart']);
		}
	}
	function get_json_ajax(){
		$data=array();
	    ob_start();
		render('index/cart_mini.php', $data);
		$cart_mini = ob_get_clean();
		$data['data']=model('product')->get_product_index('rand()',4);
		ob_start();
		render('index/cart.php', $data);
		$cart = ob_get_clean();
		echo json_encode(array('data_mini'=>$cart_mini,'data'=>$cart));
		die();
	}