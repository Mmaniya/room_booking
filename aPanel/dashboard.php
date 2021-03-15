<?php function main() { 
    $roomObj = new Rooms;
    ?>
<h3>Booked Rooms</h3>
<div class="row">
  
    <?php 
    $rsdata = Rooms::get_booking_dtls();
    if (count($rsdata) > 0) {
    foreach ($rsdata as $key => $value) { 
        if(!empty ($value->room_id)){ 
            $roomid[] = $value->room_id;
             $roomObj->id = $value->room_id;
             $rsRooms = $roomObj->get_all_rooms(); 
            ?>
            <div class="col-xl-3 col-md-4" data-toggle="modal" data-target="#roomModel<?php echo $value->id ?>" style="cursor:pointer">
                <div class="card bg-c-pink update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-12">
                                <h4 class="text-white"><?php echo $rsRooms[0]->room_number ?></h4>
                                <h6 class="text-white m-b-0">Room Booked</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="roomModel<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">Name :</div>
                        <div class="col-sm-6"><?php echo $value->customer_name ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Mobile :</div>
                        <div class="col-sm-6"><?php echo $value->customer_number ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">E-Mail :</div>
                        <div class="col-sm-6"><?php echo $value->customer_email ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Number of Adults :</div>
                        <div class="col-sm-6"><?php echo $value->adults ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Number of Children:</div>
                        <div class="col-sm-6"><?php echo $value->children ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Check In:</div>
                        <div class="col-sm-6"><?php echo $value->check_In?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Check Out:</div>
                        <div class="col-sm-6"><?php echo $value->check_out ?></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cancelroom(<?php echo $value->id ?>)">Cancel</button>
                </div>
                </div>
            </div>
            </div>


        <?php }   
    }} ?>
</div>
<hr>
<h3>Available Rooms</h3>
<div class="row">
    <?php  
    $room_id = implode(',',$roomid);
    $rsRooms = Rooms::get_available_room($room_id);
      foreach($rsRooms as $k => $v){  ?>
    <div class="col-xl-3 col-md-4">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h4 class="text-white"><?php echo $v->room_number ?></h4>
                        <h6 class="text-white m-b-0">Available Room</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php } include 'admin_template.php';?>