<?php

class Order extends Model {
    public $table = 'order';
    public $primary_key = 'id';
    function getorder_byIdtran($id){
        $sql = "SELECT o.*,p.name as name_product FROM `{$this->table}` o JOIN product p ON o.product_id=p.id WHERE transaction_id=".$id;
    	return db_get_all($sql);
    }
    function insert($data){
    	return db_insert($this->table, $data);
    }
}
