<?php

class Product extends Model {
    public $table = 'product';
    public $primary_key = 'id';
    function delete($id){
    	return db_delete($this->table,$this->primary_key."=".esc($id));
    }
    function get_product($where=''){
        $sql = "SELECT p.*,c.name as catalog FROM `{$this->table}` p LEFT JOIN catalog c ON p.catalog_id=c.id ".$where;
        return db_get_all($sql);
    }
    function get_product_index($order_by,$limit,$where=''){
        $sql = "SELECT * FROM `{$this->table}`".$where." ORDER BY ".$order_by." DESC LIMIT ".$limit;
        return db_get_all($sql);
    }
    function insert($data){
    	return db_insert($this->table, $data);
    }
    function update($data,$id){
    	return db_update($this->table, $data,$this->primary_key."=".esc($id));
    }
}
