<?php

class Catalog extends Model {
    public $table = 'catalog';
    public $primary_key = 'id';
    function catalog($where='') {
	    $sql = "SELECT id,name,parent_id,(SELECT name FROM `{$this->table}` WHERE id=t.`parent_id` ) as name_parent FROM `{$this->table}` t ".$where;
	    return db_get_all($sql);
	}
	function catalog_product() {
	    $sql = "SELECT id,name FROM `{$this->table}` WHERE parent_id!=0";
	    return db_get_all($sql);
	}
	function delete($id){
    	if(db_delete($this->table,$this->primary_key."=".esc($id))){
            db_delete('product','catalog_id='.esc($id));
            $data=$this->catalog('WHERE parent_id='.esc($id));
            if(isset($data[0])){
                foreach ($data as $key => $value) {
                    $this->delete($value['id']);
                }
            }
            return mysql_affected_rows();
        }
        else return mysql_affected_rows();
    }
    function insert($data){
    	return db_insert($this->table, $data);
    }
    function update($data,$id){
    	return db_update($this->table, $data,$this->primary_key."=".esc($id));
    }
}
