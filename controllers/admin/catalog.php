<?php

function catalog_index() {
    $data = array();
    $data['template_file'] = 'admin/catalog.php';
    $data['title']='Quản Lý Danh Mục';
    $data['data']=model('catalog')->catalog();
    render('layout_admin.php', $data);
}
function catalog_delete(){
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		if(model('catalog')->delete($id)!=0);
			get_json_ajax();
	}
}
function catalog_insert(){
	if(isset($_POST['submit']))
	{
		$insert_data = array(
	                'name' => $_POST['txtName'],
	                'parent_id' => $_POST['selCatalog'],
	                'level' => $_POST['selLevel'],
	            );
		//FASLE nếu lỗi
		if(model('catalog')->insert($insert_data)!=0);
			get_json_ajax();
	}
}
function catalog_select(){
	if(isset($_POST['id']))
	{
		//FASLE nếu lỗi
		$data=model('catalog')->getOneBy($_POST['id']);
		if($data){
			$catalog=array();
			if(($data['level']-1)==-1)
			{
				$catalog['data_sub']=array(array('id'=>0,'name'=>'Danh Mục Cha'));
			}
			else $catalog['data_sub']=model('catalog')->catalog('WHERE level='.($data['level']-1));
			ob_start();
			render('admin/catalog_level.php', $catalog);
			$string = ob_get_clean();
			echo json_encode(array('data'=>$data,'data_catalog'=>$string));
			die();
		}
	}
}
function catalog_select_level(){
	if(isset($_POST['id']))
	{
		if(($_POST['id']-1)==-1)
		{
			$data_sub=array(array('id'=>0,'name'=>'Danh Mục Cha'));
		}
		else $data_sub=model('catalog')->catalog('WHERE level='.($_POST['id']-1));
		if(isset($data_sub[0]))
		{
			$catalog=array();
			$catalog['data_sub']=$data_sub;
		    ob_start();
			render('admin/catalog_level.php', $catalog);
			$string = ob_get_clean();
			echo json_encode(array('data'=>$string));
			die();
		}
	}
}
function catalog_update(){
	if(isset($_POST['id']))
	{
		$update_data = array(
                'name' => $_POST['txtName'],
                'parent_id' => $_POST['selCatalog'],
                'level' => $_POST['selLevel'],
            );
		//FASLE nếu lỗi
		if(model('catalog')->update($update_data,$_POST['id'])!=0)
			get_json_ajax();
	}
}
function get_json_ajax(){
	$data=array();
	$data['data']=model('catalog')->catalog();
	ob_start();
	render('admin/catalog.php', $data);
	$string = ob_get_clean();
	echo json_encode(array('data'=>$string));
	die();
}