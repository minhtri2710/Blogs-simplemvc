<?php

class News extends Model {
    public $table = 'news';
    public $primary_key = 'id';
    function news()
    {
    	$sql = "SELECT n.*,name FROM `{$this->table}` n JOIN user u ON n.admin=u.id ORDER BY created DESC";
        return db_get_all($sql);
    }
    function news_index($order_by,$limit)
    {
        $sql = "SELECT * FROM `{$this->table}` ORDER BY ".$order_by." DESC LIMIT ".$limit;
        return db_get_all($sql);
    }
    function delete($id){
    	return db_delete($this->table,$this->primary_key."=".$id);
    }
    function insert($data){
    	return db_insert($this->table, $data);
    }
    function update($data,$id){
        return db_update($this->table, $data,$this->primary_key."=".$id);
    }
}
