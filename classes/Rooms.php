<?php 
class Rooms {

    function get_room_type(){
        $query = "SELECT *  from ".TBL_ROOM_TYPE." ORDER BY id ASC";  
        return dB::mExecuteSql($query);       
    }

    function get_room_type_by_id($id){
        $query = "SELECT *  from ".TBL_ROOM_TYPE." WHERE id =$id"; 
        return dB::sExecuteSql($query);       
    }

    public function get_all_rooms(){  
        if(!empty($this->id)){
            $query = "SELECT *  from ".TBL_ROOM." WHERE id =".$this->id.""; 
        } else { 
            $query = "SELECT *  from ".TBL_ROOM." ORDER BY position ASC";         
        }
        return dB::mExecuteSql($query);   
    }

    function get_avail_room($type){
        $query = "SELECT *  from ".TBL_ROOM." WHERE room_type = $type AND booking_id = 0"; 
        return dB::sExecuteSql($query);   
    }

    function book_Room($param){
        $query = Table::insertData(array('tableName' => TBL_ROOM_BOOKING, 'fields' => $param, 'showSql' => 'N')); 
        $rsData = explode('::',$query);
        // return  $rsData[0];

        // if(!empty($param['room_id'])){
            $params ['booking_id'] = $rsData[2];
            $where= array('id'=>trim($param['room_id']));	
            $result = Table::updateData(array('tableName' => TBL_ROOM, 'fields' => $params, 'where' => $where, 'showSql' => 'Y'));
        // }

    }

    function get_booking_dtls(){
        $query = "SELECT *  from ".TBL_ROOM_BOOKING." ORDER BY id ASC";         
        return dB::mExecuteSql($query);   
    }

    function get_booked_rooms($room_id){
        $query = "SELECT *  from ".TBL_ROOM." WHERE id IN ($room_id)";         
        return dB::mExecuteSql($query);   
    }

    function get_available_room($room_id){
        if(!empty($room_id)){
            $query = "SELECT *  from ".TBL_ROOM." WHERE id NOT IN ($room_id)";         
        }else{
            $query = "SELECT *  from ".TBL_ROOM."";         
        }
        return dB::mExecuteSql($query);   
    }

}