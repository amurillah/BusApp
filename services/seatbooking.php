<?php

class seatBooking extends DataBase {

    function execute($data) {
        if (isset($data['seatnumber']) && $data['seatnumber'] != '' && isset($data['rid']) && $data['rid'] != '' && isset($data['uid']) && $data['uid'] != '' && isset($data['tripdate']) && $data['tripdate'] != "") {
            $seat = explode(',',$data['seatnumber']);
            for ($i = 0; $i < count($seat); $i++) {
                $inserdata = array(
                    "rid" => $data['rid'],
                    "tripdate" => $data['tripdate'],
                    "bookseat" => $seat[$i],
                    "buid" => $data['uid'],
                );
                $insertid = $this->db_insert_query("tbl_booking", $inserdata);
            }
            $get_result = array(
                "status" => "success",
                "msg" => "booking Success",                
            );
        } else {
            $get_result = array(
                "status" => "fail",
                "msg" => "oops insufficient data booking fail"
            );
        }
        return $get_result;
    }

}
