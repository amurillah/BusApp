<?php

class VerifyRegister extends DataBase {

    function execute($data) {
        if(isset($data['vcode']) && $data['vcode']!="") {
            $where = array("uverify" => "{$data['vcode']}","verifyStatus" => "0");
            $getdata = $this->db_select_query("tbl_user", $where, "uid,uname,uphone,uemail");
            if ($getdata) {
                $whereupdate=array("verifyStatus" => "1");
                $update = $this->db_update_query("tbl_user",$whereupdate,"uid={$getdata[0]['uid']}");
                $get_result = array(
                    "status" => "success",
                    "msg" => "Verify Successful.",
                    "data" => $getdata
                );
            } else {
                $get_result = array(
                    "status" => "fail",
                    "msg" => "Verify Not Successful."
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
