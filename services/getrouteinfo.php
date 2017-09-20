<?php

class GetRouteInfo extends DataBase {

    function execute($data) {
        if (isset($data['rid']) && $data['rid'] != "" && isset($data['tripdate']) && $data['tripdate'] != "") {
            $field = "r.*,"
                    . "(select cname from tbl_city where cid=r.rto) as routeto,"
                    . "(select cname from tbl_city where cid=r.rfrom) as routefrom,"
                    . "(select group_concat(`btname`) FROM tbl_bustype WHERE FIND_IN_SET(btid,r.rbtype)) as type";
            $getdata = $this->db_select_query("tbl_routes r", "rid={$data['rid']}", $field);
            if ($getdata) {
                $field="count(bid) as totalbookseat,group_concat(`bookseat`) as bookedseat";
                $getbookingdata = $this->db_select_query("tbl_booking", "rid={$data['rid']} and tripdate='{$data['tripdate']}'",$field);                                
                if ($getbookingdata[0]['totalbookseat'] > 0) {                    
                    $getdata[0]=array_merge($getdata[0],$getbookingdata[0]);                    
                }else{
                   $getdata[0]['totalbookseat']=0;
                   $getdata[0]['bookedseat']="";
                }
                $padata = $this->db_select_query("tbl_pickupaddress", "cid={$getdata[0]['rfrom']}");                                
                $get_result = array(
                    "status" => "success",
                    "msg" => "list info Successful.",
                    "data" => $getdata,
                    "pickupaddress" => $padata
                );
            } else {
                $get_result = array(
                    "status" => "fail",
                    "msg" => "No routes found"
                );
            }
        } else {
            $get_result = array(
                "status" => "fail",
                "msg" => "oops insufficient data"
            );
        }
        return $get_result;
    }

}
