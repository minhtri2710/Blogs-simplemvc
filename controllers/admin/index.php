<?php

function index_index() {
    $data = array();
    $data['template_file'] = 'admin/index.php';
    $data['title']='Trang Admin';
    render('layout_admin.php', $data);
}
