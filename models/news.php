<?php

class News extends Model {
    public $table = 'news';
    public $primary_key = 'id';
    function news($where='')
    {
    	$sql = "SELECT n.*,u.name,c.name as catalog_name FROM `{$this->table}` n JOIN user u ON n.admin=u.id LEFT JOIN catalog_news c ON c.id=n.catalog_id ".$where." ORDER BY created DESC";
        return db_get_all($sql);
    }
    function news_catalog()
    {
        $sql = "SELECT DISTINCT n.catalog_id as id_catalog,c.name as name_catalog FROM `{$this->table}` n JOIN catalog_news c ON n.catalog_id=c.id";
        return db_get_all($sql);
    }
    function news_index($order_by,$limit)
    {
        $sql = "SELECT * FROM `{$this->table}` ORDER BY ".$order_by." DESC LIMIT ".$limit;
        return db_get_all($sql);
    }
    function delete($id){
        if(db_delete($this->table,$this->primary_key."=".esc($id))){
            return db_delete('tag','post_id='.esc($id));
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
