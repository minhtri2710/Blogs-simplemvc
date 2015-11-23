<?php
require ROOT . DS . 'library' . DS . 'pagination.php';

function blog_index() {
    $data = array();
    $data['template_file'] = 'blog/blog.php';
    $data['title']='Bài Viết';
    $page=isset($_GET['page']) ? $_GET['page'] : 1;
    $config = array(
	    'current_page'  => $page,
	    'total_record'  => count(model('news')->all()),
	    'limit'         => 10,
	    'link_full'     => 'index.php?c=blog&page={page}',
	    'link_first'    => 'index.php?c=blog',
	);
	$paging = new Pagination();
	$paging->init($config);
	$data['page']= $paging->html();
    $data['data']=model('news')->paginate($page,10,'ORDER BY created DESC');
    $data['news_most']=model('news')->news_index('view',4);
    render('layout_home.php', $data);
}
function blog_detail(){
	$data = array();
	if(isset($_GET['id'])){
		$detail=model('news')->getOneBy($_GET['id']);
		if($detail){
			$data['title']=$detail['title'];
			$data['template_file'] = 'blog/blog_detail.php';
			$data['data']=$detail;
			$data['news_most']=model('news')->news_index('view',4);
		}
		else
		{
			$data['title']='Bài Viết';
			$data['template_file'] = 'index/404error.php';
		}
	}
	else{
		$data['title']='Bài Viết';
		$data['template_file'] = 'index/404error.php';
	}
	render('layout_home.php', $data);
}