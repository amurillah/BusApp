<?php
abstract class DataBase{
     var $db_obj;     
     var $_result;
     function DataBase(){
         // for local use
         $this->db_obj = $this->db_connect('localhost','hkinfowa_busapp','hkinfowa_busapp','busapp@123');
		 $this->_result = array();	
     }
     
     function db_connect($server, $dbname, $user, $pass) {
        try {
            $dbconn = new PDO('mysql:host=' . $server . ';dbname=' . $dbname, $user, $pass);
        } catch (PDOException $e) {
            $dbconn = $e->getMessage();
            echo $dbconn;
        }
        //$this->_conn = $dbconn;
        return $dbconn;
    }
    
    function db_select_query($table_name,$where = "1=1", $query = "*", $order_by = "") {
        $sql = "select " . $query . " from " . $table_name;
        if (is_array($where)) {
            $sql .= (" where 1=1");
            while (list($columns, $value) = each($where)) {
                $sql .= (" and `" . $columns . "`='" . $value . "'");
            }
        }else{
            $sql .= (" where $where");
        }
        if ($order_by != '') {
            $sql .= " order by " . $order_by;
        }						
        //echo $sql;
        $query_obj = $this->db_query($sql);
		
        if ($query_obj != "") {
            return $this->db_fetchAll_data($query_obj);
        } else {			
            return array();
        }
    }
           
    function db_insert_query($table_name, $columns) {
        $columnString = implode(',',  array_keys($columns));
        $valueString = ":".implode(',:',  array_keys($columns));
        $query="insert into $table_name (".$columnString.") values (".$valueString.")";
        $obj_query = $this->db_obj->prepare($query);
        foreach ($columns as $key=>$val){
            $obj_query->bindValue(":".$key,$val);
        }
        $obj_query->execute();
        return $this->db_obj->lastInsertId();
    }
    
    function db_update_query($table_name, $data, $parameters = '') {
        $query = 'update ' . $table_name . ' set ';
        while (list($columns, $value) = each($data)) {
            switch ((string) $value) {
                case 'now()':
                    $query .= '`' . $columns . '` = now(), ';
                    break;
                case 'null':
                    $query .= '`' . $columns .= '` = NULL, ';
                    break;
                default:
                    $query .= '`' . $columns . '` = \'' . $value . '\', ';
                    break;
            }
        }
        $query = substr($query, 0, -2) . ' where ' . $parameters;
        $affectedRows = $this->db_exec($query);
        return $affectedRows;
    }
    
    function db_delete_query($table_name, $where = "1=1") {
        $sql = "delete from " . $table_name;
        if (is_array($where)) {
            $sql .= (" where 1=1");
            while (list($columns, $value) = each($where)) {
                $sql .= (" and `" . $columns . "`='" . tep_db_input($value) . "'");
            }
        } else {
            $sql .= (" where " . $where);
        }
        $affectedRows = $this->db_exec($sql);
        return $affectedRows;
    }
    
    function db_query($query) {
        return $this->db_obj->query($query);
    }
    
    function db_fetchAll_data($query) {	
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function db_exec($query) {
        return $this->db_obj->exec($query);
    }    
    
    function get_result() {
        return json_encode($this->_result);
    }
    
    function printArray($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}
?>