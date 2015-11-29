<?php

function tag_index() {
    $data = array();
    $data['template_file'] = 'admin/tag.php';
    $data['title']='Quản Lý Thẻ';
    $data['data']=model('tag')->tag();
    $data['data_catalog']=model('news')->news_catalog();
    $data['data_news']=model('news')->news('WHERE catalog_id='.$data['data_catalog'][0]['id_catalog']);
    render('layout_admin.php', $data);
}
function tag_delete(){
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		if(model('tag')->delete($id)!=0);
			get_json_ajax();
	}
}
function tag_insert(){
	if(isset($_POST['submit']))
	{
		$insert_data = array(
	                'name' => $_POST['txtName'],
	                'post_id' => $_POST['news_id']?:0,
	            );
		//FASLE nếu lỗi
		if(model('tag')->insert($insert_data)!=0);
			get_json_ajax();
	}
}
function tag_select_level(){
	if(isset($_POST['id']))
	{
		$data=array();
		$data['data_news']=model('news')->news('WHERE catalog_id='.$_POST['id']);
	    ob_start();
		render('admin/tag_select.php', $data);
		$string = ob_get_clean();
		echo json_encode(array('data'=>$string));
		die();
	}
}
function tag_select(){
	if(isset($_POST['id']))
	{
		//FASLE nếu lỗi
		$data=model('tag')->getOneBy($_POST['id']);
		if($data){
			$news=array();
			$new=model('news')->getOneBy($data['post_id']);
			$news['data_news']=model('news')->news('WHERE catalog_id='.$new['catalog_id']);
			$news['id']=$new['id'];
			ob_start();
			render('admin/tag_select.php', $news);
			$string = ob_get_clean();
			echo json_encode(array('data'=>$data,'data_tag'=>$string,'selected'=>$new['catalog_id']));
			die();
		}
	}
}
function tag_update(){
	if(isset($_POST['news_id']))
	{
		$update_data = array(
	                'name' => $_POST['txtName'],
	                'post_id' => $_POST['news_id']?:0,
	            );
		//FASLE nếu lỗi
		if(model('tag')->update($update_data,$_POST['id'])!=0)
			get_json_ajax();
	}
}
function get_json_ajax(){
	$data=array();
	$data['data']=model('tag')->tag();
	$data['data_catalog']=model('news')->news_catalog();
    $data['data_news']=model('news')->news('WHERE catalog_id='.$data['data_catalog'][0]['id_catalog']);
	ob_start();
	render('admin/tag.php', $data);
	$string = ob_get_clean();
	echo json_encode(array('data'=>$string));
	die();
}