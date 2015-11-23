<?php

function login_index() {
    $data = array();
    $data['template_file'] = 'index/login.php';
    $data['title']='Login';
    $data['error']='';
    render('layout_home.php', $data);
}
function login_login(){
	if(isset($_POST['submit'])){
		$error='';
		$user=model('user')->getOneBy($_POST['user'],'username');
		if($user){
			if($user['password']!=$_POST['pass'])
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
			header('Location: http://simplemvc.vn:3030/admin.php');
		}
		else{
			$data['template_file'] = 'index/login.php';
		    $data['title']='Login';
		    $data['error']=$error;
		    render('layout_home.php', $data);
		}
	}
}