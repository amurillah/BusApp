<?php
$service = null;
define('ROOT', 'http://ldswedsource.com/');
include 'database.php';
$data = $_REQUEST;
$action=  isset($_REQUEST['action'])?$_REQUEST['action']:"";
//calculate the number of days before the wedding and store in a variable
if ($action == 'register') {
    require('services/register.php');
    $register = new Register();
    $service = $register->execute($data);
}

//get user task list using tempid or memberid
if ($action == 'verifyregister') {
    require('services/verifyregister.php');
    $verifyregister = new VerifyRegister();
    $service = $verifyregister->execute($data);
}

if($action=='getcity'){
    require('services/getcity.php');
    $getcity = new GetCity();
    $service = $getcity->execute($data);
}

if($action=='getroutes'){
    require('services/getroutes.php');
    $getroutes = new GetRoutes();
    $service = $getroutes->execute($data);
}

if($action=='getrouteinfo'){
    require('services/getrouteinfo.php');
    $getroutes = new GetRouteInfo();
    $service = $getroutes->execute($data);
}

if($action=='seatbooking'){
    require('services/seatbooking.php');
    $getroutes = new seatBooking();
    $service = $getroutes->execute($data);
}

// return
if ($service == null) {
    echo json_encode(array("status" => "error", "msg" => "No such action."));
} else {
    echo json_encode($service);
}
?>