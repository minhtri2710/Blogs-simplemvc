<?php

function index_index() {
    $data = array();
    $data['template_file'] = 'index/index.php';
    $data['title']='Trang chủ';
    $data['data_featured']=model('product')->get_product_index('rand()',8);
    $data['data_best']=model('product')->get_product_index('view',8);
    $data['data_new']=model('product')->get_product_index('created',8);
    $data['data_news']=model('news')->news_index('created',4);
    render('layout_home.php', $data);
}
