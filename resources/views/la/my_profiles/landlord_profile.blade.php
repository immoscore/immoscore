@extends('la.layouts.app')

@section('htmlheader_title')
	My Profile View
@endsection


@section('main-content')

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
</script>
<link href="{{ asset('immoscore/assets/css/demo2/style.bundle.css') }}" rel="stylesheet" type="text/css" />

<div id="page-content" class="profile2">
<!--------Custom Html Starts here ----->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
          <!--begin::Portlet-->
          <div class="kt-portlet kt-profile">
            <div class="kt-profile__content">

              <div class="row">

                <div class="col-md-12 col-lg-5 col-xl-4">

                  <div class="kt-profile__main">
                    <div class="kt-profile__main-pic"> <img src="{{ asset('immoscore/assets/images/default.jpg') }}" alt=""/>
                      <label class="kt-profile__main-pic-upload" > <i class="fa fa-camera"></i> </label>
                    </div>
                    <div class="kt-profile__main-info">
                      <div class="kt-profile__main-info-name">{{$my_profile ->user_name}}</div>
                      <div class="kt-profile__main-info-position">{{$my_profile ->designation}}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                  <div class="kt-profile__contact">
                  <a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon kt-profile__contact-item-icon-whatsup"><i class="fa fa-whatsapp"></i></span> <span class="kt-profile__contact-item-text">{{$my_profile ->phone_number}}</span> </a>
                  <a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon"><i class="fa fa-envelope"></i></span> <span class="kt-profile__contact-item-text">{{$user->email}}</span> </a>
                  <a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon"><i class="fa fa-check-circle"></i></span> <span class="kt-profile__contact-item-text">Immoscore Verified</span> </a>
                  <!--<a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon kt-profile__contact-item-icon-twitter"><i class="fa fa-twitter"></i></span> <span class="kt-profile__contact-item-text">@brianjohnson</span> </a>-->
                  </div>
                </div>
                <div class="col-md-12 col-lg-3 col-xl-4">
                  <div class="kt-profile__stats">
                    <div class="kt-profile__stats-item">
                      <div class="kt-profile__stats-item-chart">
                      <a href="{{ url(config('laraadmin.adminRoute') . '/my_profiles/'.$my_profile->id.'/edit?step=1') }}" class="btn btn-info btn-sm">Update Profile</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="kt-profile__nav">
              <!--begin::Tabs-->
              <ul class="nav nav-tabs nav-tabs-line">
                   <li class="nav-item"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_1">My Property</a> </li>
                   <li class="nav-item"> <a class="nav-link"  href="javascript:void(0)" data-id ="kt_tabs_1_2">Rent History</a> </li>
                   <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_3">Advertise </a> </li>

                <!--<li class="nav-item"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_1" >ID</a> </li>-->



                <!--<li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_5" >Payments</a> </li>-->
              </ul>
              <!--end::Tabs-->

            </div>
          </div>
          <!--end::Portlet-->

          <!--begin::Tab Content-->
          <div class="tab-content">

          <!-----tab 1 Starts Here-->
            <div class="" id="kt_tabs_1_1">
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">

                         <div style="padding:10px 0 0 0; width:100%">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/my_properties') }}" class="btn btn-info btn-sm pull-right">Manage Properties</a>
                        </div>
                    </div>

                    <div class="kt-portlet__body">

	<table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Address</th>
                        <th>Flat/House</th>
                        <th>Size in square meters </th>
                        <th>Pieces</th>
                        <th>Current rent </th>
                        <th>Deposit</th>
                       </tr>
                      </thead>

                      <tbody>
                          <?php
                          foreach($my_properties as $my_property) {
                          ?>
                        <tr>
                         <td>{{$my_property->address}}</td>
                         <td>{{$my_property->flat_house}}</td>
                         <td>{{$my_property->size_square_meters}}</td>
                         <td>{{$my_property->total_rooms}}</td>
                         <td>{{$my_property->current_rent}}</td>
                         <td>{{$my_property->deposit}}</td>


                          <?php } ?>
                        </tr>
                      </tbody>

                    </table>


                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>

              <!--end::Row-->
            </div>


          <!-----tab 2 Starts Here-->
            <div class="" id="kt_tabs_1_2" style='display:none'>
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">

                         <div style="padding:10px 0 0 0; width:100%">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/rental_histories') }}" class="btn btn-info btn-sm pull-right">Manage History</a>
                        </div>
                    </div>

                    <div class="kt-portlet__body">

					<table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Tenant name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Rental type</th>
                        <th>Housing type</th>
                        <th>Area</th>
                        <th>Rent</th>
                        <th>Start Date</th>
                        <th>End Date</th>

                       </tr>
                      </thead>

                      <tbody>
                          <?php
                          foreach($rental_histories as $rental_history) {
                          ?>
                        <tr>
                         <td>{{$rental_history->owner_name}}</td>
                         <td>{{$rental_history->email}}</td>
                         <td>{{$rental_history->address}}</td>
                         <td>{{$rental_history->city}}</td>
                         <td>{{$rental_history->country}}</td>
                         <td>{{$rental_history->rental_type}}</td>
                         <td>{{$rental_history->housing_type}}</td>
                         <td>{{$rental_history->area}}</td>
                         <td>{{$rental_history->rent}}</td>
                         <td>{{$rental_history->start_date}}</td>
                         <td>{{$rental_history->end_date}}</td>


                          <?php } ?>
                        </tr>
                      </tbody>

                    </table>


                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>
              <!--end::Row-->
            </div>







          <!-----tab 5 Starts Here-->
            <div class="" id="kt_tabs_1_3"  style='display:none'>
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">

                         <div style="padding:10px 0 0 0;width:100%">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/advertises') }}" class="btn btn-info btn-sm pull-right">Manage Advertise</a>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Address</th>
                        <th>Flat/House</th>
                        <th>Size in square meters </th>
                        <th>Pieces</th>
                        <th>Current rent </th>
                        <th>Deposit</th>
                       </tr>
                      </thead>

                      <tbody>
                          <?php
                          foreach($my_advertise as $my_advertis) {
                          ?>
                        <tr>
                         <td>{{$my_advertis->address}}</td>
                         <td>{{$my_advertis->flat_house}}</td>
                         <td>{{$my_advertis->size_square_meters}}</td>
                         <td>{{$my_advertis->total_rooms}}</td>
                         <td>{{$my_advertis->current_rent}}</td>
                         <td>{{$my_advertis->deposit}}</td>


                          <?php } ?>
                        </tr>
                      </tbody>

                    </table>
                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>
              <!--end::Row-->
            </div>





          </div>
          <!--end::Tab Content--> </div>






<!--------Custom Html Ends here ----->
</div>
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add My Profile</h4>
			</div>

 {!! Form::open(['action' => 'LA\VisitsController@store', 'id' => 'visit-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">

                                    <table class="table table-bordered no-footer">
                                        <thead>
                                            <tr>
                                        <th>Address</th>
                                        <th class="display_address"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Status
                                                </td>
                                                <td>
                                                    <input type="hidden" name="address_id" id="address_id">
                                                    <input type="hidden" name="application_id" id="application_id">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="" selected>Select Status</option>
                                                        <option value="Available">Available</option>
                                                        <option value="Not Available">Not Available</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr style="display:none" id="date_row">
                                                <td>
                                                    Date
                                                </td>
                                                <td>
                                                    <input type="text" name="appointment_date" id="appointment_date" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Discription
                                                </td>
                                                <td>
                                                    <textarea name="comment" id="comment" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close_modal" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datepicker/jquery-ui-1.9.2.custom.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/datepicker/jquery-ui.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#appointment_date").datepicker();
        $("body").delegate(".set_appointment","click",function(){
            let address = $(this).attr('data-address');
            let address_id = $(this).attr('data-address_id');
            let application_id = $(this).attr('data-application_id');
            $(".display_address").html(address);
            $("#application_id").val(application_id);
            $("#address_id").val(address_id);

            $('#AddModal').removeClass('fade');
             $('#AddModal').show();
             $('#AddModal').modal('show');
//            $('#AddModal').addClass('out');
        });
        $("body").delegate(".close_modal,.close","click",function(){
            $('#AddModal').addClass('fade');
             $('#AddModal').hide();
             $('#AddModal').modal('hide');
//            $('#AddModal').addClass('out');
        });
        $("body").delegate("#status","change",function(){
            if($(this).val()=="Available")
                $("#date_row").show();
            else
                $("#date_row").hide();
        });
       $("body").delegate(".nav-link", "click", function () {
            $(".nav-link").removeClass("active");
            $(this).addClass("active");
            let data_id = $(this).attr('data-id');

            $("#kt_tabs_1_1").hide();
            $("#kt_tabs_1_2").hide();
            $("#kt_tabs_1_3").hide();


            $("#"+data_id).show();

        });
                    <?php
                    if($step=="rental_histories") {
                    ?>
                            $(".nav-link").eq("1").trigger("click");
                    <?php } elseif($step=="my_properties") {
                    ?>
                            $(".nav-link").eq("2").trigger("click");
                    <?php } elseif($step=="payment_details") {
                    ?>
                            $(".nav-link").eq("4").trigger("click");
                    <?php } elseif($step=="document_id") {
                    ?>
                            $(".nav-link").eq("0").trigger("click");
                    <?php } ?>
    })

                    </script>
                    @endpush