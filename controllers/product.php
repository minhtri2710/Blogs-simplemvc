<?php
require ROOT . DS . 'library' . DS . 'pagination.php';

function product_index() {
    $data = array();
    $data['template_file'] = 'product/product.php';
    $data['title']='Sản Phẩm';
    if(!empty($_GET['id'])){
    	$id=$_GET['id'];
    	$subquery='(SELECT id FROM catalog WHERE parent_id='.$id.')';
        $page=!empty($_GET['page']) ? $_GET['page'] : 1;
        $config = array(
            'current_page'  => $page,
            'total_record'  => count(model('product')->get_product('WHERE catalog_id='.$id.' OR catalog_id in '.$subquery.' ORDER BY created DESC')),
            'limit'         => 9,
            'link_full'     => 'index.php?c=product&id='.$id.'&page={page}',
            'link_first'    => 'index.php?c=product&id='.$id,
        );
        $paging = new Pagination();
        $paging->init($config);
        $data['page']= $paging->html();
        $data['data']=model('product')->paginate($page,9,'WHERE catalog_id='.$id.' OR catalog_id in '.$subquery.' ORDER BY created DESC');
    	$catalog=model('catalog')->catalog('WHERE id='.$id);
    	$data['catalog']=$catalog;
    	$data['title']=$catalog[0]['name']?:'Sản Phẩm';
    }
    else
    {
        $page=!empty($_GET['page']) ? $_GET['page'] : 1;
        $config = array(
            'current_page'  => $page,
            'total_record'  => count(model('product')->get_product()),
            'limit'         => 9,
            'link_full'     => 'index.php?c=product&page={page}',
            'link_first'    => 'index.php?c=product',
        );
        $paging = new Pagination();
        $paging->init($config);
        $data['page']= $paging->html();
    	$data['data']=model('product')->paginate($page,9,'ORDER BY created DESC');
    }
    render('layout_home.php', $data);
}
function product_detail() {
    $data = array();
    $data['template_file'] = 'product/detail.php';
    $data['title']='Sản Phẩm';
    if(!empty($_GET['id'])){
    	$id=$_GET['id'];
    	$product=model('product')->get_product('WHERE p.id='.$id);
        if(empty($product)){
            $data['template_file'] = 'product/product.php';
            $data['data']=model('product')->get_product();
        }
    	else{
            $data['data']=$product;
        	$data['data_relation']=model('product')->get_product_index('created',9,'WHERE catalog_id='.$product[0]['catalog_id']);
        	$data['title']=$product[0]['name'];
        }
    }
    else
    {
    	$data['template_file'] = 'product/product.php';
    	$data['data']=model('product')->get_product();
    }
    render('layout_home.php', $data);
}
function product_search() {
    $data = array();
    $data['template_file'] = 'product/product.php';
    $data['title']='Sản Phẩm';
    if(!empty($_GET['sr'])){
        $sr=$_GET['sr'];
        $page=!empty($_GET['page']) ? $_GET['page'] : 1;
        $config = array(
            'current_page'  => $page,
            'total_record'  => count(model('product')->get_product('WHERE MATCH(name) AGAINST("'.$sr.'" IN BOOLEAN MODE) ORDER BY created DESC')),
            'limit'         => 9,
            'link_full'     => 'index.php?c=product&m=search&sr='.$sr.'&page={page}',
            'link_first'    => 'index.php?c=product&m=search&sr='.$sr,
        );
        $paging = new Pagination();
        $paging->init($config);
        $data['page']= $paging->html();
        $data['data']=model('product')->paginate($page,9,'WHERE MATCH(name) AGAINST("'.$sr.'" IN BOOLEAN MODE) ORDER BY created DESC');
    }
    else
        {
        $page=!empty($_GET['page']) ? $_GET['page'] : 1;
        $config = array(
            'current_page'  => $page,
            'total_record'  => count(model('product')->get_product()),
            'limit'         => 9,
            'link_full'     => 'index.php?c=product&page={page}',
            'link_first'    => 'index.php?c=product',
        );
        $paging = new Pagination();
        $paging->init($config);
        $data['page']= $paging->html();
        $data['data']=model('product')->paginate($page,9,'ORDER BY created DESC');
    }
    render('layout_home.php', $data);
}
