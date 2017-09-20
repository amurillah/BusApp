<?php

class Register extends DataBase {

    function execute($data) {        
        if (isset($data['usermobile']) && $data['usermobile'] != '' && isset($data['username']) && $data['username'] != '' && isset($data['useremail']) && $data['useremail'] != '') {
            $inserdata = array(
                "uname" => $data['username'],
                "uphone" => $data['usermobile'],
                "uemail" => $data['useremail'],
                "uverify" => $this->randomgerator(6),
            );
            $insertid = $this->db_insert_query("tbl_user", $inserdata);            
            if ($insertid) {
                $getdata=$this->db_select_query("tbl_user","uid={$insertid}","uverify");
                                
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $message = "<p>Hi {$data['username']},</p>";
                $message .="<p>Welcome To BusApp</p>";
                $message.="<p>Before you booking, we need to confirm your email address</p>";
                $message.="<p>Your verify code is : {$getdata[0]['uverify']}</p>";                
                mail($data['useremail'], "Confirm your Account at BusApp", $message, $headers);                
                
                $get_result = array(
                    "status" => "success",
                    "msg" => "register Success",
                    "verifycode" => $getdata[0]['uverify']
                );
            } else {
                $get_result = array(
                    "status" => "fail",
                    "msg" => "oops insufficient data"
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

    function randomgerator($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMONOPQRSTUVWXYZ0123456789';
        $license = '';
        for ($i = 0; $i < $length; $i++) {
            $license .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $license;
    }

}
