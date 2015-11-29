<?php

function product_index() {
    $data = array();
    $data['template_file'] = 'admin/product.php';
    $data['title']='Quản Lý Sản Phẩm';
    $data['data']=model('product')->get_product();
    $data['catalog']=model('catalog')->catalog_product();
    render('layout_admin.php', $data);
}
function product_delete(){
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		if(model('product')->delete($id)!=0)
			get_json_ajax();
	}
}
function product_insert(){
	if(isset($_POST['submit']))
	{
		if (isset($_FILES['fLink']))
        {
        	$flink='';
            if ($_FILES['fLink']['error'] <= 0)
            {
                 move_uploaded_file($_FILES['fLink']['tmp_name'], './products-images/'.$_FILES['fLink']['name']);
                 $flink=$_FILES['fLink']['name'];
            }
        }
        if (isset($_FILES['fList']))
        {
        	$flist='';
        	$count=count($_FILES['fList']['name']);
        	for($i=0;$i<$count;$i++){
        		if ($_FILES['fList']['error'][$i] <= 0)
	            {
	                move_uploaded_file($_FILES['fList']['tmp_name'][$i], './products-images/'.$_FILES['fList']['name'][$i]);
	                $flist.=$_FILES['fList']['name'][$i].',';
	            }
        	}
        	$flist=trim($flist,',');
        }
		$insert_data = array(
	                'name' => $_POST['txtName'],
	                'price' => $_POST['txtPrice'],
	                'discount' => $_POST['txtDiscount'],
	                'content' => $_POST['editor'],
	                'catalog_id'=>$_POST['selCatalog'],
	                'created'=>date('Y-m-d'),
	                'image_link'=>$flink!=''?$flink:'none.jpg',
                	'image_list'=>$flist,
	            );
		if(model('product')->insert($insert_data)!=0)
			get_json_ajax();
	}
}
function product_select(){
	if(isset($_POST['id']))
	{
		$data=model('product')->getOneBy($_POST['id']);
		if($data){
			echo json_encode(array('data'=>$data));
			die();
		}
	}
}
function product_update(){
	if(isset($_POST['id']))
	{
		if (isset($_FILES['fLink'])){
        	$flink='';
            if ($_FILES['fLink']['error'] <= 0)
            {
                 move_uploaded_file($_FILES['fLink']['tmp_name'], './products-images/'.$_FILES['fLink']['name']);
                 $flink=$_FILES['fLink']['name'];
            }
        }
        if (isset($_FILES['fList'])){
        	$flist='';
        	$count=count($_FILES['fList']['name']);
        	for($i=0;$i<$count;$i++){
        		if ($_FILES['fList']['error'][$i] <= 0)
	            {
	                move_uploaded_file($_FILES['fList']['tmp_name'][$i], './products-images/'.$_FILES['fList']['name'][$i]);
	                $flist.=$_FILES['fList']['name'][$i].',';
	            }
        	}
        	$flist=trim($flist,',');
        }
		$update_data = array(
                'name' => $_POST['txtName'],
                'price' => $_POST['txtPrice'],
                'discount' => $_POST['txtDiscount'],
                'content' => $_POST['editor'],
                'catalog_id'=>$_POST['selCatalog'],
                'created'=>date('Y-m-d'),
            );
		if($flink!='')
			$update_data['image_link']=$flink;
		if($flist!='')
			$update_data['image_list']=$flist;
		if(model('product')->update($update_data,$_POST['id'])!=0)
			get_json_ajax();
	}
}
function get_json_ajax(){
	$data=array();
	$data['data']=model('product')->get_product();
    $data['catalog']=model('catalog')->catalog_product();
    ob_start();
	render('admin/product.php', $data);
	$string = ob_get_clean();
	echo json_encode(array('data'=>$string));
	die();
}