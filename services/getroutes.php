<?php

class GetRoutes extends DataBase {

    function execute($data) {
        $weekarray=array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
        if (isset($data['to']) && $data['to'] != "" && isset($data['from']) && $data['from'] != "" && isset($data['bookdate']) && $data['bookdate']!="") {
            $bdate=date('w',  strtotime($data['bookdate']));
            $field="r.*,"
                    . "(select cname from tbl_city where cid=r.rto) as routeto,"
                    . "(select cname from tbl_city where cid=r.rfrom) as routefrom,"
                    . "(select group_concat(`btname`) FROM tbl_bustype WHERE FIND_IN_SET(btid,r.rbtype)) as type";
            $where="rto={$data['to']} and rfrom={$data['from']} and (rtype='daily' OR rtype='{$weekarray[$bdate]}')";
            $getdata = $this->db_select_query("tbl_routes r",$where,$field);
            if ($getdata) {
                $get_result = array(
                    "status" => "success",
                    "msg" => "Verify Successful.",
                    "data" => $getdata
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
