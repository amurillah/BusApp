<?php
include '../database.php';
class BusApp extends DataBase {
    
    function getCityList(){
        $return=  $this->db_select_query('tbl_city');
        return $return;
    }
    
    function getBusesList(){
        $field="r.*,"
                    . "(select cname from tbl_city where cid=r.rto) as routeto,"
                    . "(select cname from tbl_city where cid=r.rfrom) as routefrom,"
                    . "(select group_concat(`btname`) FROM tbl_bustype WHERE FIND_IN_SET(btid,r.rbtype)) as type";
        $return = $this->db_select_query("tbl_routes r", "1=1",$field);        
        return $return;
    }    
    
    function getBusTypes(){
       $return=  $this->db_select_query('tbl_bustype');
       return $return;
    }
    
    function getCityData($id){
       $return=  $this->db_select_query('tbl_city',"cid=$id");
       return $return;
    }
    
    function getRoutsData($id){
       $return=$this->db_select_query('tbl_routes',"rid=$id");
       return $return;
    }
    
    function getCityPickup($id=''){
        $where=" 1=1 ";
        if($id!=''){
            $where="cid={$id}";
        }
        $field="tpa.*,(select cname from tbl_city where cid=tpa.cid) as city";
        $return=$this->db_select_query('tbl_pickupaddress tpa',$where,$field);
        return $return;
    }
    
    function getCityPickData($id){
        $return=$this->db_select_query('tbl_pickupaddress tpa',"paid={$id}");
        return $return;
    }
}
?>