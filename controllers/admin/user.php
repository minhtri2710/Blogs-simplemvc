<?php

function user_index() {
    $data = array();
    $data['template_file'] = 'admin/user.php';
    $data['title']='Quản Lý Tài Khoản';
    $data['data']=model('user')->all();
    render('layout_admin.php', $data);
}
function user_delete(){
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		if(count(model('user')->all())>1){
			if(model('user')->delete($id)!=0)
				get_json_ajax();
		}
	}
}
function user_insert(){
	if(isset($_POST['submit']))
	{
		$insert_data = array(
	                'name' => $_POST['txtName'],
	                'username' => $_POST['txtUser'],
	                'password' => md5(md5($_POST['txtPass'].'tri').'minh'),
	            );
		if(model('user')->insert($insert_data)!=0)
			get_json_ajax();
	}
}
function user_select(){
	if(isset($_POST['id']))
	{
		$data=model('user')->getOneBy($_POST['id']);
		if($data){
			echo json_encode(array('data'=>$data));
			die();
		}
	}
}
function user_update(){
	if(isset($_POST['id']))
	{
		$update_data = array(
                'name' => $_POST['txtName'],
	            'username' => $_POST['txtUser'],
	            'password' => $_POST['txtPass'],
            );
		if(model('user')->update($update_data,$_POST['id'])!=0)
			get_json_ajax();
	}
}
function get_json_ajax(){
	$data=array();
	$data['data']=model('user')->all();
    ob_start();
	render('admin/user.php', $data);
	$string = ob_get_clean();
	echo json_encode(array('data'=>$string));
	die();
}