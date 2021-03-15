<?php require "includes.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>MOBI HOTEL BOOKING</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<!-- <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/css/style.css" />


</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
								ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
								Perspiciatis.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form id="romm_bookin_form" method="post" action="javascript:void(0);">
								<span id="ajaxresponce"></span>
								<input type="hidden" value="" name="room_id" id="roomID">
								<input type="hidden" name="act" value="booking_room">
								<div class="form-group">
									<span class="form-label">Room type</span>
									<select class="form-control" required onchange="selectrooms(this.value)">
									<option value="" disabled selected>Select Room</option>
										<?php  
											 $resultData = Rooms::get_room_type();
											foreach($resultData as $key => $value){
												?> <option value="<?php echo $value->id ?>"><?php echo $value->room_type ?></option> <?php
											}
										?>
									</select>
								</div>							
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Check In</span>
											<input class="form-control" type="datetime-local" name="check_In" required>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Check out</span>
											<input class="form-control" type="datetime-local" name="check_out" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Adults</span>
											<select class="form-control" name="adults" >
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Children</span>
											<select class="form-control" name="children">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Your Name</span>
											<input class="form-control" type="text" name="customer_name" placeholder="Your Name" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Mobile</span>
											<input class="form-control" type="number" name="customer_number" placeholder="Your Number" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">E-Mail</span>
											<input class="form-control" type="email" name="customer_email" placeholder="Your E-mail" required>
										</div>
									</div>
								</div>

								<div class="form-btn">
									<button class="submit-btn" id="btnDisabled">Book Room</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript" src="<?php echo ADMIN_JS ?>/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS ?>/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS ?>/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS ?>/bootstrap/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?php echo ADMIN_JS ?>/default.js"></script>

	<script>
			function selectrooms(val){
				$('#ajaxresponce').html('');
				$('.preloader').show();
				param = { 'act': 'get_room_dtls','room_type':val };
				ajax({
					a: 'ajaxfile',
					b: $.param(param),
					c: function() {},
					d: function(data) {
						$('.preloader').hide();
						if(data){
							$('#roomID').val(data);
							$('#btnDisabled').prop('disabled', false);
						}else{
							$('#ajaxresponce').html('<span style="color:red">Rooms Not Available</span>');
							$('#btnDisabled').prop('disabled', true);

						}
					}
				});
			}

			$("form#romm_bookin_form").submit(function(){
            $('.preloader').show();
                var param = $('form#romm_bookin_form').serialize();
                ajax({
                    a:"ajaxfile",
                    b:param,
                    c:function(){},
                    d:function(data){
                        $('.preloader').hide();
						if(data){
                        	 $('#ajaxresponce').html('<span style="color:green">Rooms Booked Suucessfully.</span>');
						}else{
							$('#ajaxresponce').html('<span style="color:red">Rooms Not Booked Try Again</span>')
						}                                       
                    }
                });
            });


	</script>

</body>

</html>