<?php

function home_index() {
    $data = array();
    $data['template_file'] = 'index/index.php';
    $data['title']='Trang chủ';
    render('layout_home.php', $data);
}
