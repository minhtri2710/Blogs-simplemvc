<?php

session_start();

require ROOT . DS . 'includes' . DS .'db.php';
require ROOT . DS . 'models' . DS .'model.php';

function model($model) {
    static $models = array();
    $model = strtolower($model);
    if (!isset($models[$model])) {
        include ROOT . DS . 'models' . DS . $model . '.php';
        
        $model_name = ucfirst($model);
        $models[$model] = new $model_name();
    }
    
    return $models[$model];
}

function isLogged() {
    if (empty($_SESSION['logged'])) {
        return false;
    }
    
    return $_SESSION['logged'];
}

function render($file, $data) {
    extract($data);
    ob_start();
    
    include ROOT . DS . 'views' . DS . $file;
    
    ob_end_flush();
}
