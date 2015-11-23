<?php

class User extends Model {
    public $table = 'user';
    public $primary_key = 'id';
    function delete($id){
        if(db_delete($this->table,$this->primary_key."=".$id)){
            return db_delete('news','admin='.$id);
        }
        else return mysql_affected_rows();
    }
    function insert($data){
    	return db_insert($this->table, $data);
    }
    function update($data,$id){
    	return db_update($this->table, $data,$this->primary_key."=".$id);
    }
}
