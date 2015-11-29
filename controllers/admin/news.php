<?php

function news_index() {
    $data = array();
    $data['template_file'] = 'admin/news.php';
    $data['title']='Quản Lý Tin Tức';
    $data['data']=model('news')->news();
    $data['catalog']=model('blog_catalog')->catalog_news();
    render('layout_admin.php', $data);
}
function news_select(){
	if(isset($_POST['id']))
	{
		$data=model('news')->getOneBy($_POST['id']);
		if($data){
			echo json_encode(array('data'=>$data));
			die();
		}
	}
}
function news_delete(){
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		if(model('news')->delete($id)!=0){
			get_json_ajax();
		}
	}
}

function news_insert(){
	if(isset($_POST['submit']))
	{
		if (isset($_FILES['fLink']))
        {
        	$flink='';
            if ($_FILES['fLink']['error'] <= 0)
            {
                 move_uploaded_file($_FILES['fLink']['tmp_name'], './images/'.$_FILES['fLink']['name']);
                 $flink=$_FILES['fLink']['name'];
            }
        }
		$insert_data = array(
	                'title' => $_POST['txtName'],
	                'description' => $_POST['editor-des'],
	                'content' => $_POST['editor'],
	                'catalog_id'=>$_POST['selCatalog'],
	                'created'=>date('Y-m-d'),
	                'url_image'=>$flink!=''?$flink:'none.jpg',
	                'admin'=>isset($_SESSION['id'])?$_SESSION['id']:0,
	            );
		if(model('news')->insert($insert_data)!=0)
			get_json_ajax();
	}
}
function news_update(){
	if(isset($_POST['id']))
	{
		if (isset($_FILES['fLink'])){
        	$flink='';
            if ($_FILES['fLink']['error'] <= 0)
            {
                 move_uploaded_file($_FILES['fLink']['tmp_name'], './images/'.$_FILES['fLink']['name']);
                 $flink=$_FILES['fLink']['name'];
            }
        }
		$update_data = array(
                'title' => $_POST['txtName'],
                'description' => $_POST['editor-des'],
                'content' => $_POST['editor'],
                'created'=>date('Y-m-d'),
                'catalog_id'=>$_POST['selCatalog'],
                'admin'=>isset($_SESSION['id'])?$_SESSION['id']:0,
            );
		if($flink!='')
			$update_data['url_image']=$flink;
		if(model('news')->update($update_data,$_POST['id'])!=0)
			get_json_ajax();
	}
}
function get_json_ajax(){
	$data=array();
	$data['data']=model('news')->news();
	$data['catalog']=model('blog_catalog')->catalog_news();
	ob_start();
	render('admin/news.php', $data);
	$string = ob_get_clean();
	echo json_encode(array('data'=>$string));
	die();
}