<?php

class Transaction extends Model {
    public $table = 'transaction';
    public $primary_key = 'id';
    function delete($id){
        if(db_delete($this->table,$this->primary_key."=".esc($id))){
            return db_delete('order','transaction_id='.esc($id));
        }
        else return mysql_affected_rows();
    }
    function update($data,$id){
    	return db_update($this->table, $data,$this->primary_key."=".esc($id));
    }
    function insert($data){
        return db_insert($this->table, $data);
    }
}
