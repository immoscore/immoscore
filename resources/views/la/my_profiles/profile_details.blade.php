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
                  <a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon"><i class="fa fa-envelope"></i></span> <span class="kt-profile__contact-item-text">{{$my_profile ->email_address}}</span> </a>
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
                <li class="nav-item"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_1" >Employment</a> </li>
                <li class="nav-item"> <a class="nav-link"  href="javascript:void(0)" data-id ="kt_tabs_1_2" >ID</a> </li>
                <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_3" >Rental History</a> </li>
                <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_4" >Pay slip</a> </li>
                <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_5" >Quittance</a> </li>
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
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Employment</h3>
                      </div>

                    </div>
                    <div class="kt-portlet__body">

                    <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Company name</th>
                        <th>Contract type</th>
                        <th>Position</th>
                        <th>Start Date</th>
                        <th>End date</th>
                        <th>Immoscore Verified</th>
                       </tr>
                      </thead>

                      <tbody>
                        <tr>
                         <td>{{$my_profile ->employer_name}}</td>
                         <td>{{$my_profile ->contract_type}}</td>
                         <td>{{$my_profile ->designation}}</td>
                         <td>{{date("d-m-Y", strtotime($my_profile ->start_date))}} </td>
                         <td>{{date("d-m-Y", strtotime($my_profile ->end_date))}} </td>
                         <td style="text-align:center;"><a href="#" style="font-size:22px;"><i class="fa fa-check-circle"></i></a></td>
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
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">ID</h3>
                      </div>
                        <div style="padding:15px 0 0 0;">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/document_ids') }}" class="btn btn-info btn-sm">Update Id</a>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

					<table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Document Type</th>
                        <th>Date of Birth</th>
                        <th>ID Number</th>
                        <th>Uploaded Id</th>
                       </tr>
                      </thead>

                      <tbody>
                          <?php foreach($document_ids as $document_id) { ?>
                          <tr>
                         <td>{{$document_id->document_type}}</td>
                         <td>{{$document_id->dob}}</td>
                         <td>{{$document_id->id_number}}</td>
                         <td>
                             <div class="col-md-8 col-sm-6 col-xs-6 fvalue">
                                 <a class="preview" target="_blank" href="{{ url('') }}/files/{{$document_id->hash}}/{{$document_id->name}}">
                                     <?php
                                     if(isset($extensions[$document_id->extension])) {
                                     ?>
                                     <img src="{{ url('') }}/storage/icons/{{$extensions[$document_id->extension]}}">
                                   <?php  } else { ?>
                                     <i class="fa fa-file-o"></i>
                                   <?php } ?>
                                 </a>
                             </div>
                        </td>
                        </tr>
                          <?php } ?>

                      </tbody>

                    </table>



                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>
              <!--end::Row-->
            </div>



          <!-----tab 3 Starts Here-->
            <div class="" id="kt_tabs_1_3"  style='display:none' >
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Rental History</h3>
                      </div>
                         <div style="padding:15px 0 0 0;">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/rental_histories') }}" class="btn btn-info btn-sm">Manage History</a>
                        </div>
                    </div>

                    <div class="kt-portlet__body">

					<table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Owners name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Rental type</th>
                        <th>Area</th>
                        <th>Rent</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Verified</th>
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
                         <td>{{$rental_history->area}}</td>
                         <td>{{$rental_history->rent}}</td>
                         <td>{{$rental_history->start_date}}</td>
                         <td>{{$rental_history->end_date}}</td>
                         <td>{{$rental_history->verified}}</td>

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
          <!-----tab 3 Starts Here-->



          <!-----tab 4 Starts Here-->
            <div class="" id="kt_tabs_1_4"  style='display:none'>
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Pay slip</h3>
                      </div>

                        <div style="padding:15px 0 0 0;">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/payment_details') }}" class="btn btn-info btn-sm">Manage Pay Slips</a>
                        </div>

                    </div>
                    <div class="kt-portlet__body">

<table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Year</th>
                        <th>Month</th>
                        <th>Receipt</th>
                       </tr>
                      </thead>

                      <tbody>
                          <?php

                          foreach($payment_details as $payment_detail) {

                          ?>
                        <tr>
                         <td><?php if(isset($payment_detail->pay_date)) {
                             $pay_date = strtotime($payment_detail->pay_date);
                             echo date("Y",$pay_date);
                         } ?>
    </td>
                         <td><?php if(isset($payment_detail->pay_date)) {
                             echo date("M",$pay_date);
                         } ?>
    </td>

                          <td>
                               <div class="col-md-8 col-sm-6 col-xs-6 fvalue">
                                 <a class="preview" target="_blank" href="{{ url('') }}/files/{{$payment_detail->hash}}/{{$payment_detail->name}}">
                                     <?php
                                     if(isset($extensions[$payment_detail->extension])) {
                                     ?>
                                     <img src="{{ url('') }}/storage/icons/{{$extensions[$payment_detail->extension]}}">
                                   <?php  } else { ?>
                                     <i class="fa fa-file-o"></i>
                                   <?php } ?>
                                 </a>
                             </div>
                          <?php }  ?>
                      </tbody>

                    </table>

                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>
              <!--end::Row-->
            </div>



          <!-----tab 5 Starts Here-->
            <div class="" id="kt_tabs_1_5"  style='display:none'>
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Quittance</h3>
                      </div>
                         <div style="padding:15px 0 0 0;">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/quittances') }}" class="btn btn-info btn-sm">Manage Quittance</a>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                  <thead>
                       <tr bgcolor="#ecf0f5">
                        <th>Year</th>
                        <th>Month</th>
                        <th>Receipt</th>
                       </tr>
                      </thead>

                                  <tbody>
                                     <?php
                        foreach($quittances as $quittance) {
                          ?>
                        <tr>
                            <td><?php if(isset($quittance->quittance_date)) {
                             $quittance_date = strtotime($quittance->quittance_date);
                             echo date("Y",$quittance_date);
                         } ?>
    </td>
                         <td><?php if(isset($quittance->quittance_date)) {
                             echo date("M",$quittance_date);
                         } ?>
    </td>
                         <td>
                             <div class="col-md-8 col-sm-6 col-xs-6 fvalue">
                                 <a class="preview" target="_blank" href="{{ url('') }}/files/{{$quittance->hash}}/{{$quittance->name}}">
                                     <?php
                                     if(isset($extensions[$quittance->extension])) {
                                     ?>
                                     <img src="{{ url('') }}/storage/icons/{{$extensions[$quittance->extension]}}">
                                   <?php  } else { ?>
                                     <i class="fa fa-file-o"></i>
                                   <?php } ?>
                                 </a>
                             </div>


                         </td>
                          <?php } ?>
                                  </tbody>
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
@endsection
<script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("body").delegate(".nav-link","click",function(){
                        $(".nav-link").removeClass("active");
                        $(this).addClass("active");
			let data_id = $(this).attr('data-id');
                        if(data_id == "kt_tabs_1_1") {
                            $("#kt_tabs_1_1").show();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").hide();
                        } else if(data_id == "kt_tabs_1_2") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").show();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").hide();
                        } else if(data_id == "kt_tabs_1_3") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").show();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").hide();

                        }else if(data_id == "kt_tabs_1_4") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").show();
                            $("#kt_tabs_1_5").hide();
                        }
						else if(data_id == "kt_tabs_1_5") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").show();
                        }
		    });
                    <?php
                    if($step=="rental_histories") {
                    ?>
                            $(".nav-link").eq("2").trigger("click");
                    <?php } elseif($step=="payment_details") {
                    ?>
                            $(".nav-link").eq("3").trigger("click");
                    <?php } elseif($step=="quittances") {
                    ?>
                            $(".nav-link").eq("4").trigger("click");
                    <?php } elseif($step=="document_id") {
                    ?>
                            $(".nav-link").eq("1").trigger("click");
                    <?php } ?>
    })

                    </script>