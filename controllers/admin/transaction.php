<?php

function transaction_index() {
    $data = array();
    $data['template_file'] = 'admin/transaction.php';
    $data['title']='Quản Lý Đơn Hàng';
    $data['data']=model('transaction')->all();
    render('layout_admin.php', $data);
}
function transaction_delete(){
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		$bool=model('transaction')->delete($id);
		get_json_ajax();
	}
}
function transaction_select(){
	if(isset($_POST['id']))
	{
		$data=array();
		$data['data_order']=model('order')->getorder_byIdtran($_POST['id']);
	    ob_start();
		render('admin/transaction_detail.php', $data);
		$string = ob_get_clean();
		echo json_encode(array('data'=>$string));
		die();
	}
}
function transaction_update(){
	if(isset($_POST['id']))
	{
		$update_data = array(
                'status' => 1,
            );
		$update=model('transaction')->update($update_data,$_POST['id']);
		get_json_ajax();
	}
}
function get_json_ajax(){
	$data=array();
	$data['data']=model('transaction')->all();
    ob_start();
	render('admin/transaction.php', $data);
	$string = ob_get_clean();
	echo json_encode(array('data'=>$string));
	die();
}