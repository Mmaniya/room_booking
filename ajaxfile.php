<?php require "includes.php"; 

$action = $_POST['act'];

if ($action == 'get_room_dtls') {
    ob_clean();

    $type = $_POST['room_type'];
    $resultData  = Rooms::get_avail_room($type);
    echo $resultData->id;
    exit();
}

if ($action == 'booking_room') {
    ob_clean();
    $param['room_id'] = $_POST['room_id'];
    $param['check_In'] = $_POST['check_In'];
    $param['check_out'] = $_POST['check_out'];
    $param['adults'] = $_POST['adults'];
    $param['children'] = $_POST['children'];
    $param['customer_name'] = $_POST['customer_name'];
    $param['customer_number'] = $_POST['customer_number'];
    $param['customer_email'] = $_POST['customer_email'];
    echo $result = Rooms::book_Room($param);
    exit();
}
?>