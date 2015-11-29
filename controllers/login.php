<?php

function login_index() {
    $data = array();
    $data['template_file'] = 'index/login.php';
    $data['title']='Đăng Nhập';
    $data['error']='';
    render('layout_home.php', $data);
}
function login_login(){
	if(isset($_POST['submit'])){
		$error='';
		$user=model('user')->getOneBy($_POST['user'],'username');
		if($user){
			if($user['password']!=md5(md5($_POST['pass'].'tri').'minh'))
			{
				$error='<p class="required">*Sai Password</p>';
			}
		}
		else {
			$error='<p class="required">*Sai Username</p>';
		}
		if($error==''){
			$_SESSION['name']=$user['name'];
			$_SESSION['id']=$user['id'];
			$_SESSION['username']=$user['username'];
			header('Location:/admin.php');
		}
		else{
			$data['template_file'] = 'index/login.php';
		    $data['title']='Đăng Nhập';
		    $data['error']=$error;
		    render('layout_home.php', $data);
		}
	}
}