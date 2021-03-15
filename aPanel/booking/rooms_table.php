<?php define('ABSPATH', dirname(__DIR__, 2));
require ABSPATH . "/includes.php";
$action = $_POST['act']; 
$roomObj = new Rooms;
?>
<?php if ($action == 'rooms_table') {  ?>
    <div class="card-header bg-c-lite-green;">
        <h5>Room List</h5>
       
    </div>
    <div class="card-block">
        <div class="card-block table-border-style">
                <div class="table-responsive">
                <form action="javascript:void(0);" id="room_position" style="width:100%">
                    <input type="hidden" name="act" value="room_position">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Room Number</th>
                                <th >Room Type</th>
                                <th >Booking Status</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="draggableProducts" class="draggable">
                            <?php  $statusArr = array('A' => 'checked', 'I' => '');  

                            $roomObj->status = $_POST['status'];   
                            $rsProduct = $roomObj->get_all_rooms();
                            if (count($rsProduct) > 0) {
                                foreach ($rsProduct as $key => $value) { ?>

                            <tr class="row_id_<?php echo $value->id; ?>" id="<?php echo $value->id; ?>">
                                <input type="hidden" name="room_id[]" value="<?php echo $value->id ?>">
                                <th><?php echo $key + 1 ?></th>
                                <td><?php echo $value->room_number ?></td>
                                <td><?php  $rsdata = Rooms::get_room_type_by_id($value->room_type); echo $rsdata->room_type; ?></td>
                                <td><?php echo $value->booking_id ?></td>
                                <!-- 
                                <td>
                                    <a href="javascript:void(0);" class="label label-info" onclick="add_edit_product(<?php echo $value->id; ?>)"><i class="fa fa-edit"  aria-hidden="true"></i>Edit</a>
                                    <a href="javascript:void(0);" class="label label-danger" onclick="delete_product(<?php echo $value->id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                </td> -->
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="status_update_<?php echo $value->id; ?>" onchange="statusroom(<?php echo $value->id; ?>)" <?php echo $statusArr[$value->status]; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <?php }} else {?>
                            <tr>
                                <td colspan="8" class="text-center"> No Records Found </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            Sortable.create(draggableProducts, {
                group: 'draggableProducts',
                animation: 150,
                accept: '.sortable-moves',
                onUpdate: function(ui) {
                    var param = $('form#room_position').serialize();
                    $('.preloader').show();
                    ajax({
                        a: "room_ajax",
                        b: param,
                        c: function() {},
                        d: function(data) {
                            var records = JSON.parse(data);
                            $('.preloader').hide();
                            room_main_table();
                            if (records.result == 'Success') {
                                notify('top', 'right', 'fa fa-check', 'success','animated fadeInLeft', 'animated fadeOutLeft', records.data);
                            } else {
                                notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                            }
                        }
                    });
                },
            });
        });
    </script>
<?php } ?>
