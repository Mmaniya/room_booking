<?php 
define('ABSPATH', dirname(__DIR__, 2));
require ABSPATH . "/includes.php";
$action = $_POST['act'];

// 1. Add room
// if ($action == 'add_edit_room') {
//     ob_clean();

//     $param['room_number']     = $_POST['room_number'];
//     $param['room_type']     = $_POST['room_type'];

//     exit();
// }

// 2.room remove
// if($action == 'remove_room'){
//     ob_clean();

//     $where = array('id' => $_POST['id']);
//     $result = Table::deleteData(array('tableName' => TBL_ROOM, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
//     $response = array("result" => 'Success', "data" => 'Successfully Removed');
//     echo json_encode($response);

//     exit();
// }

// 3.Room position

if($action =='room_position'){
    ob_clean();
    if (count($_POST['room_id']) > 0) {
        foreach ($_POST['room_id'] as $key => $val) {
            $param['position'] = $key + 1;
            $where = array('id' => $val);
            $result = Table::updateData(array('tableName' => TBL_ROOM, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
          
        }
        if($result){
            $response = array("result" => 'Success', "data" => 'Updated Successfully');
            echo json_encode($response);
        }
    }
    exit();
}

// 4.role status chnage

if ($action == 'room_status_change') {
    $param['status'] = $_POST['status'];
    $where = array('id' => $_POST['id']);
    $result = Table::updateData(array('tableName' => TBL_ROOM, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
    $response = array("result" => 'Success', "data" => 'Updated Successfully');
    echo json_encode($response);
}

if($action == 'cancel_room'){
    ob_clean();

    $where = array('id' => $_POST['id']);
    $result = Table::deleteData(array('tableName' => TBL_ROOM_BOOKING, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
    $param['booking_id'] = '0';
    $where = array('booking_id' => $_POST['id']);
    $result = Table::updateData(array('tableName' => TBL_ROOM, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
    $response = array("result" => 'Success', "data" => 'Successfully Canceled');
    echo json_encode($response);

    exit();
}


