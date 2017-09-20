<?php
class GetCity extends DataBase {

    function execute($data) {
        $getdata = $this->db_select_query("tbl_city","1=1","cid,cname");
        if ($getdata) {
            $get_result = array(
                    "status" => "success",
                    "msg" => "get city Successful.",
                    "data" => $getdata
                );
        } else {
            $get_result = array(
                "status" => "fail",
                "msg" => "oops city data not found"
            );
        }
        return $get_result;
    }
}