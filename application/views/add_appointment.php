

<style>
  .visits input:checked~.visit-rsn {
    background-color: #b88609 !important;
    color: #fff;
    border-radius: 4px;
}
.modal-backdrop.show {
    opacity: 0 !important;
    -webkit-transition-duration: 400ms;
    transition-duration: 400ms;
}
.visits span.visit-rsn:before {
    color: #541728;
}
.chosen-container-multi .chosen-choices{
	padding: 10px !important;
	margin-left: 19px !important;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Appointments</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card" style="border-radius: 15px">

            <!-- /.card-header -->
            <div class="card-body">
              <!-- <?php echo validation_errors(); ?>  -->
              <form id="" action="<?= base_url('admin/ServiceCategoryCtl/post_add_appointment') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
										<div class="col-md-12">
										<label for="services" class="col-sm-6 control-label">Services
														<i class="required">*</i>
													</label>
													<select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select form-control ml-2"  name="service[]" id="services" style="width: 98%;">
														<option>Select Services</option>
														<?php foreach ($service as $services) : ?>
															<option value="<?= $services['id'] ?>"><?= $services['service_name'] ?></option>
														<?php endforeach; ?>
													</select>
													
												
									</div>

                  <!--<div class="col-md-4">
                    <div class="form-group ">
                      <label for="services" class="col-sm-6 control-label">Services
                        <i class="required">*</i>
                      </label>
                      <div class="col-sm-12">
                        <select class="form-control multiple-select" name="service[]" id="services" data-placeholder="Select Services" multiple>
                          <option>Select Services</option>
                          <?php foreach ($service as $services) : ?>
                            <option value="<?= $services['id'] ?>"><?= $services['service_name'] ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>
                  </div>-->

                  
                </div>
                <div class="row mt-3">
								<div class="col-md-6">
                    <div class="form-group">
                      <label for="add_on" class="col-sm-6 control-label">Add ons
                      </label>
                      <div class="col-sm-12">
                        <select class="form-control chosen chosen-select-deselect" name="add_on" id="add_on" data-placeholder="Select Add ons">
                          <option placeholder=""></option>
                          <?php foreach ($addon as $addons) : ?>
                            <option value="<?= $addons['id'] ?>"><?= $addons['name'] ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label for="amount" class="col-sm-6 control-label">Total Amount
                        <i class="required">*</i>
                      </label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Total Amount" value="">

                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="therapist" class="col-sm-6 control-label">Therapist
                      </label>
                      <div class="col-sm-12">
                        <select class="form-control chosen chosen-select-deselect" name="therapist" id="therapist" data-placeholder="Select Add ons" required>
                          <option placeholder=""></option>
                          <?php foreach ($therapist as $therapists) : ?>
                            <option value="<?= $therapists['id'] ?>"><?= $therapists['first_name']." ". $therapists['last_name'] ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <label for="duration" class="col-sm-6 control-label">Duration
                        <i class="required">*</i>
                      </label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Duration" value="" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label for="date" class="col-sm-6 control-label">Appointment Date
                        <i class="required">*</i>
                      </label>
                      <div class="col-sm-12">
                        <input type="date" class="form-control" name="date" id="date" placeholder="Appointment Date" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="token-slot mt-2" id="all_slots">

                    </div>
                  </div>
                </div>
              <div class="customer_details">
                
              </div>
                <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>

<div id="myModal" class="modal fade add-Customer" tabindex="-1">
          <div class="modal-dialog">
              <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                      
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="modal-form">
                      <form id="addCustomer">
                <div class="row">
                  <div class="col-md-6">   
                <div class="form-group ">
                    <label for="first_name" class="col-sm-6 control-label">First Name 
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name Max Length : 100." value="">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="last_name" class="col-sm-6 control-label">Last Name
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name Max Length : 100." value="">
                      </div>
                </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">   
                <div class="form-group ">
                    <label for="dob" class="col-sm-6 control-label">Date Of Birth 
                    </label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control newdob" name="dob"  placeholder="Input Date of Birth" value="">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="age" class="col-sm-6 control-label">Age
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="age" id="age"  value="" readonly>
                      </div>
                </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-4">   
                <div class="form-group ">
                    <label for="email" class="col-sm-6 control-label">Email
                    </label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" id="email"  value="">
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group ">
                    <label for="contact" class="col-sm-6 control-label">Contact Number
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact number" value="">
                      </div>
                </div>
                </div>
                
                </div>
               
                 <div class="form-group ">
                      <label for="address" class="col-sm-2 control-label">Address
                      </label>
                        <div class="col-sm-8">
                            <textarea id="address" name="address" rows="5" cols="50" class=""></textarea>
                        </div>
                  </div>  
                            
                      
                      <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
                      </div>
                      
                  </div>

                  <!-- Modal footer -->
                  

              </div>
          </div>
</div> 

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- this link for multiple selection-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<script>
	/*
  $("#services").change(function() {
    //  console.log('1');
   // alert($(this).val());
    $.ajax({
      url: "<?= base_url("getServiceByID") ?>",
      type: "get",
      data: {
        id: $(this).val()
      },
      dataType: "json",
      success: function(data) {
        //console.log(data);
        $("#amount").val(data.totalPrice);
        $("#duration").val(data.totalDuration);
        //timeslot(data.duration);
      }
    })
  })*/
	
  $(".chosen-select").chosen({
		no_results_text: "Oops, nothing found!"
	})
  

  function timeslot(time) {
    // console.log(time);
    
  }
  $('#date').change(function() { 
    //  console.log($(this).val())
    //  console.log($('#therapist').val())
    var therapistId = $('#therapist').val();
    var date = $(this).val();
    var selectedDate = new Date(date);
    var now = new Date();
   if (selectedDate < now) {
    alert("Date must be in the future");
    return false;
   }
    //var serviceId = $('#services').val();
    var duration = $('#duration').val();
    //alert(duration);
    $.ajax({
      url: "<?= base_url("getBookingSlot") ?>",
      type: "get",
      data: {
        therapistId: therapistId,
        date: date,
        //serviceId: serviceId,
        duration: duration,
      },
      dataType: "json",
      success: function(data) {
        //console.log(data);
        $('#all_slots').html('');
        // var availtime = data.availabletimelist;
        //console.log(availtime.len);
        $.each(data.availabletimelist, function(n, currentElem) {
          // var result = data.bookslot[0]['time_slot'].split('-');
          var inputdisable = '';
          $.each(data.bookslot, function(n, currentElem1) {
            var result = currentElem1['time_slot'].split('-');
            if (currentElem['slot_start_time'] == result[0]) {
              inputdisable = 'disabled';
            }
          });

          // console.log(result[0]);

          $("#all_slots").append('<div class="form-check-inline visits mr-0">' +
            '<label class="visit-btns">' +
            '<input type="checkbox" ' + inputdisable + ' id="timeslot" onclick="myFunction()" name="selected_timeslot" class="form-check-input" value="' + currentElem['slot_start_time'] + '-' + currentElem['slot_end_time'] + '">' +
            '<span class="visit-rsn"  data-toggle="tooltip" title="">' + currentElem['slot_start_time'] + '-' + currentElem['slot_end_time'] + '</span>' +
            '</label>' +
            '</div>');

        });


      }
      
    })
    

  });

  function myFunction(){
   //console.log('1');
      $('.customer_details').html('');
      $('.customer_details').append('<div class="row">'+
                  '<div class="col-md-8">'+
                  '<div class="form-group">'+
                  ' <?php echo form_error('customer_number'); ?>'+
                  ' <label for="customer_number" class="col-sm-6 control-label">Customer Number <i class="required">*</i>'+
                  '  </label>'+
                  ' <div class="row">'+
                  ' <div class="col-sm-7">'+
                  '  <input type="text" class="form-control" name="customer_number" id="customer_number"  value="">'+
                  '<div class="customer_data">'+
                  
                  '</div>'+
                  ' </div>'+
                  ' <div class="col-sm-5 new_customer_data">'+
                  '</div>'+
                  '</div>'+
                 
                  '</div>'+
                  ' </div>'+
                  ' </div>');
     $('#customer_number').keyup(function() {
      var customer_contact= $(this).val();
      if(customer_contact.length<10){
        return false;
      }
     //console.log($(this).val())
     $.ajax({
      url: "<?= base_url("getCustomerByID") ?>",
      type: "get",
      data: {
        contact: customer_contact,
      },
      dataType: "json",
      success: function(data) {
        console.log(data.length);
        if(data.length != 0){
          $('.customer_data').html('');
          $('.customer_data').html('<div class=""><input type="hidden" name="customer_id" value="'+data[0].id+'"><div class="form-group"><label for="name" class="col-sm-6 control-label">Customer Name</label> <div class="col-sm-12"><input class="form-control" type="text" name="customer_name" value="'+data[0].first_name+' '+data[0].last_name+'"readonly></div><div class="form-group"><label for="email" class="col-sm-6 control-label">Email</label> <div class="col-sm-12"><input class="form-control" type="email" name="email" value="'+data[0].email+'"readonly></div></div></div>');
          $('.new_customer_data').html('');
           console.log('data found');
        }
        else{
          $('.customer_data').html('');
          $('.customer_data').html('<div class="" style="padding:0px; margin:0px; background-color:none; color:red;">Data Not Found</div>');
          $('.new_customer_data').html('');
          $('.new_customer_data').html('<div class="col-sm-12"><button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#myModal">Add Customer</button> </div>');
          console.log('data not found');
        }
        
      }
    })
     });
     //submit modal form
     $(document).ready(function () {
			$("#addCustomer").submit(function(e) {
				e.preventDefault();
				$.ajax({
						url: "<?= base_url("admin/ServiceCategoryCtl/post_add_customer")?>",
						type:"POST",
						data: $("#addCustomer").serialize(),
						dataType: 'json',
						success: function (response) {
							$("#addCustomer")[0].reset();
							toastr.success("Form Submitted Successfully");
							$(".add-Customer").remove();
							}
						});
			});
		});
     
   }
   $(document).ready(function(){
    $("#dob,.newdob").change(function() {
    var dob = $(this).val();
    //console.log(dob);
    if(dob != ''){
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#age').val(age);
}
    
  })
   })
 
  </script>
  
 