<?php
session_start();
include 'bussapp.class.php';
$objba = new BusApp();
extract($_REQUEST);
//print_r($_POST);
if ($type == 'adminlogin') {
    if ($username != '' and $password != '') {
        $pass = md5($password);
        $getrow = $objba->db_select_query('tbl_admin', "username='$username' and password='$pass'");
        if (count($getrow) > 0) {
            $_SESSION['adminId'] = $getrow[0]['aid'];
            header('location:index.php');
        } else {
            $_SESSION['msg'] = 'Invalid Username And Password';
            header('location:addcity.php');
        }
    }
}
if ($type == 'logout') {
    session_unset($_SESSION['adminId']);
    header('location:login.php');
}
if ($type == 'addnewbus') {
    $datainsert = array(
        "rfrom" => $fromcity,
        "rto" => $tocity,
        "rbtype" => $bustype,
        "rfare" => $fare,
        "rtype" => $busroute,
        "rpickuptime" => $pickuptime,
        "rdroptime" => $droptime,
        "rseat" => $totalseat
    );
    $insertid = $objba->db_insert_query("tbl_routes", $datainsert);
    if ($insertid) {
        $_SESSION['msg'] = 'Bus Added success';
        header('location:buslist.php');
    } else {
        $_SESSION['msg'] = 'Buss Added Fail';
        header('location:addNewBus.php');
    }
}
if($type=='addcitypa'){    
    $datainsert = array(
        "cid" => $cityid,
        "text" => $address
    );
    $insertid = $objba->db_insert_query("tbl_pickupaddress", $datainsert);
    if ($insertid) {
        $_SESSION['msg'] = 'City Pickup Added success';
        header('location:citypickup.php');
    } else {
        $_SESSION['msg'] = 'City Pickup Added Fail';
        header('location:addpickup.php');
    }
}
if ($type == 'editcitypa') {
    $dataupdate = array(
        "cid" => $cityid,
        "text" => $address
    );
    $objba->db_update_query("tbl_pickupaddress", $dataupdate, "paid=$id");
    $_SESSION['msg'] = 'City Pickup Updated success';
    header("location:citypickup.php");
}
if($type=='deleteaddress'){
    if ($id != '') {
        $objba->db_delete_query('tbl_pickupaddress', "paid=$id");
        $_SESSION['msg'] = 'City Pickup Delete success';
        echo 'success';
    } else {
        echo 'fail';
    }
}
if ($type == 'deletebus') {
    if ($rid != '') {
        $objba->db_delete_query('tbl_routes', "rid=$rid");
        $_SESSION['msg'] = 'Bus Delete success';
        echo 'success';
    } else {
        echo 'fail';
    }
}
if ($type == 'editbus') {
    $dataupdate = array(
        "rfrom" => $fromcity,
        "rto" => $tocity,
        "rbtype" => $bustype,
        "rfare" => $fare,
        "rtype" => $busroute,
        "rpickuptime" => $pickuptime,
        "rdroptime" => $droptime,
        "rseat" => $totalseat
    );
    $objba->db_update_query("tbl_routes", $dataupdate, "rid=$id");
    $_SESSION['msg'] = 'bus Updated success';
    header("location:buslist.php");
}
if ($type == 'addcity') {
    if ($newcity != '') {
        $getrow = $objba->db_select_query('tbl_city', "cname='$newcity'");
        if (count($getrow) > 0) {
            $_SESSION['msg'] = 'City Name Already Exits';
            header('location:addcity.php');
        } else {
            $datainsert = array("cname" => $newcity);
            $insertid = $objba->db_insert_query("tbl_city", $datainsert);
            if ($insertid) {
                $_SESSION['msg'] = 'City Added success';
                header('location:citylist.php');
            }
        }
    } else {
        $_SESSION['msg'] = 'City Name Required';
        header('location:addcity.php');
    }
}
if ($type == 'editcity') {
    if ($newcity != '') {
        $getrow = $objba->db_select_query('tbl_city', "cname='$newcity' and cid!='$id'");
        if (count($getrow) > 0) {
            $_SESSION['msg'] = 'City Name Already Exits';
            header("location:addcity.php?id=$id");
        } else {
            $dataupdate = array("cname" => $newcity);
            $objba->db_update_query("tbl_city", $dataupdate, "cid=$id");
            $_SESSION['msg'] = 'City Update success';
            header("location:citylist.php");
        }
    } else {
        $_SESSION['msg'] = 'City Name Required';
        header("location:addcity.php");
    }
}
if ($type == 'deletecity') {
    if ($cid != '') {
        $objba->db_delete_query('tbl_city', "cid=$cid");
        $_SESSION['msg'] = 'City Delete success';
        echo 'success';
    } else {
        echo 'fail';
    }
}
?>