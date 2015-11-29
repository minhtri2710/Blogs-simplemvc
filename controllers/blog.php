<?php
require ROOT . DS . 'library' . DS . 'pagination.php';

function blog_index() {
    $data = array();
    $data['template_file'] = 'blog/blog.php';
    $data['title']='Bài Viết';
    $data['news_most']=model('news')->news_index('view',4);
    if(!empty($_GET['id'])){
    	$id=$_GET['id'];
    	$subquery='(SELECT id FROM catalog_news WHERE parent_id='.$id.')';
        $page=!empty($_GET['page']) ? $_GET['page'] : 1;
        $config = array(
            'current_page'  => $page,
            'total_record'  => count(model('news')->news('WHERE catalog_id='.$id.' OR catalog_id in '.$subquery.' ORDER BY created DESC')),
            'limit'         => 9,
            'link_full'     => 'index.php?c=blog&id='.$id.'&page={page}',
            'link_first'    => 'index.php?c=blog&id='.$id,
        );
        $paging = new Pagination();
        $paging->init($config);
        $data['page']= $paging->html();
        $data['data']=model('news')->paginate($page,9,'WHERE catalog_id='.$id.' OR catalog_id in '.$subquery.' ORDER BY created DESC');
    	$catalog=model('blog_catalog')->catalog('WHERE id='.$id);
    	$data['title']=$catalog[0]['name']?:'Bài Viết';
    }
    else
    {
        $page=!empty($_GET['page']) ? $_GET['page'] : 1;
        $config = array(
            'current_page'  => $page,
            'total_record'  => count(model('news')->all()),
            'limit'         => 9,
            'link_full'     => 'index.php?c=blog&page={page}',
            'link_first'    => 'index.php?c=blog',
        );
        $paging = new Pagination();
        $paging->init($config);
        $data['page']= $paging->html();
    	$data['data']=model('news')->paginate($page,9,'ORDER BY created DESC');
    }
    render('layout_home.php', $data);
}
function blog_detail(){
	$data = array();
	if(!empty($_GET['id'])){
		$detail=model('news')->getOneBy($_GET['id']);
		if($detail){
			$data['title']=$detail['title'];
			$data['template_file'] = 'blog/blog_detail.php';
			$data['data']=$detail;
            $data['tag']=model('tag')->get_tag('WHERE MATCH(name) AGAINST("'.$data['title'].'" IN BOOLEAN MODE)');
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