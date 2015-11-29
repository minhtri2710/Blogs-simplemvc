<?php

class Tag extends Model {
    public $table = 'tag';
    public $primary_key = 'id';
    function tag($where='') {
	    $sql = "SELECT t.*,title FROM `{$this->table}` t LEFT JOIN news n ON t.post_id=n.id ".$where;
	    return db_get_all($sql);
	}
	function delete($id){
        return db_delete($this->table,$this->primary_key.'='.esc($id));
    }
    function insert($data){
    	return db_insert($this->table, $data);
    }
    function update($data,$id){
    	return db_update($this->table, $data,$this->primary_key."=".esc($id));
    }
    function get_tag($where='') {
        $sql = "SELECT * FROM `{$this->table}` ".$where;
        return db_get_all($sql);
    }
}
