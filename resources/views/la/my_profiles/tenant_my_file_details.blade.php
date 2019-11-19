@extends('la.layouts.app')

@section('htmlheader_title')
My Profile View
@endsection


@section('main-content')

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families": ["Poppins:300,400,500,600,700"]},
        active: function () {
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
                                <div class="kt-profile__main-info-position"><a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon"><i class="fa fa-check-circle"></i></span> <span class="kt-profile__contact-item-text">Immoscore Verified</span> </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="kt-profile__contact">
                            <a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon kt-profile__contact-item-icon-whatsup"><i class="fa fa-whatsapp"></i></span> <span class="kt-profile__contact-item-text">{{$my_profile ->phone_number}}</span> </a>
                            <a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon"><i class="fa fa-envelope"></i></span> <span class="kt-profile__contact-item-text">{{$user->email}}</span> </a>
                            <a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon"><i class="fa fa-file"></i></span> <span class="kt-profile__contact-item-text">{{$my_profile->id_number}}</span> </a>

                  <!--<a href="#" class="kt-profile__contact-item"> <span class="kt-profile__contact-item-icon kt-profile__contact-item-icon-twitter"><i class="fa fa-twitter"></i></span> <span class="kt-profile__contact-item-text">@brianjohnson</span> </a>-->
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 col-xl-4">
                        <div class="kt-profile__stats">
                            <div class="kt-profile__stats-item">
                                <div class="kt-profile__stats-item-chart">
                                    <a href="{{ url(config('laraadmin.adminRoute') . '/searches') }}" class="btn btn-info btn-sm">Go To Search</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="kt-profile__nav">
                <!--begin::Tabs-->
                <ul class="nav nav-tabs nav-tabs-line">
                    <li class="nav-item"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_1" >Personal</a> </li>
                    <li class="nav-item"> <a class="nav-link"  href="javascript:void(0)" data-id ="kt_tabs_1_2" >Occupation</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_3" >Pay slip</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_4" >Rent history</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_5" >Quittance de loyer</a> </li>

                </ul>
                <!--end::Tabs-->

            </div>
        </div>
        <!--end::Portlet-->

        <!--begin::Tab Content-->
        <div class="tab-content my_profile">

            <!-----tab 1 Starts Here-->
            <div class="" id="kt_tabs_1_1">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Date of birth</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Children</th>
                                            <th>Pets</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>{{$my_profile ->dob}}</td>
                                            <td>{{$my_profile ->gender}}</td>
                                            <td>{{$my_profile ->marital_status}}</td>
                                            <td>{{$my_profile ->no_of_children}}</td>
                                            <td>
                                                <?php
                                                if($my_profile->pets=="Yes") {
                                                $select_pet_name = json_decode($my_profile->select_pet_name);
                                                echo str_replace('"',"",implode(", ",$select_pet_name));
                                                } else {
                                                    echo "No";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>

            <div class="" id="kt_tabs_1_2" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                  <?php  if($my_profile->occupation == "Employed") { ?>
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Name of Employer</th>
                                            <th>Position</th>
                                            <th>Contract type</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Contact person</th>
                                            <th>Email address</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                            <tr>
                                                <td>{{$my_profile->employer_name}}</td>
                                                <td>{{$my_profile->position}}</td>
                                                <td>{{$my_profile->contract_type}}</td>
                                                <td>{{$my_profile->contract_start_date}}</td>
                                                <td>{{$my_profile->contract_end_date}}</td>
                                                <td>{{$my_profile->contact_person_id}}</td>
                                                <td>{{$my_profile->email_address}}</td>
                                            </tr>
                                    </tbody>
                                  <?php } else if($my_profile->occupation == "Student") { ?>
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Name of university</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Contact person</th>
                                            <th>Email address</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                            <tr>
                                                <td>{{$my_profile->univercity_name}}</td>
                                                <td>{{$my_profile->start_date}}</td>
                                                <td>{{$my_profile->end_date}}</td>
                                                <td>{{$my_profile->contact_person_id}}</td>
                                                <td>{{$my_profile->email_address}}</td>
                                            </tr>
                                    </tbody>
                                  <?php } else { ?>
                                    We are working to come up with a product that will suit you.
                                    <?php } ?>
                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>

            <div class="" id="kt_tabs_1_3" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Receipt</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($payment_details as $payment_detail) {
                                            ?>
                                            <tr>
                                                <td><?php
                                        if (isset($payment_detail->pay_date)) {
                                            $pay_date = strtotime($payment_detail->pay_date);
                                            echo date("Y", $pay_date);
                                        }
                                            ?>
                                                </td>
                                                <td><?php
                                                    if (isset($payment_detail->pay_date)) {
                                                        echo date("M", $pay_date);
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <div class="col-md-8 col-sm-6 col-xs-6 fvalue">
                                                        <a class="preview" target="_blank" href="{{ url('') }}/files/{{$payment_detail->hash}}/{{$payment_detail->name}}">
                                                            <?php
                                                            if (isset($extensions[$payment_detail->extension])) {
                                                                ?>
                                                                <img src="{{ url('') }}/storage/icons/{{$extensions[$payment_detail->extension]}}">
                                                            <?php } else { ?>
                                                                <i class="fa fa-file-o"></i>
                                                    <?php } ?>
                                                        </a>
                                                    </div>
<?php } ?>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>


            <div class="" id="kt_tabs_1_4" style="display: none;">
                <!--begin::Row-->
               <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">


                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Owners name</th>
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
                                        foreach ($rental_histories as $rental_history) {
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

            <div class="" id="kt_tabs_1_5" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">
                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Receipt</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($quittances as $quittance) {
                                            ?>
                                            <tr>
                                                <td><?php
                                                    if (isset($quittance->quittance_date)) {
                                                        $quittance_date = strtotime($quittance->quittance_date);
                                                        echo date("Y", $quittance_date);
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                if (isset($quittance->quittance_date)) {
                                                    echo date("M", $quittance_date);
                                                }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="col-md-8 col-sm-6 col-xs-6 fvalue">
                                                        <a class="preview" target="_blank" href="{{ url('') }}/files/{{$quittance->hash}}/{{$quittance->name}}">
                                                            <?php
                                                            if (isset($extensions[$quittance->extension])) {
                                                                ?>
                                                                <img src="{{ url('') }}/storage/icons/{{$extensions[$quittance->extension]}}">
    <?php } else { ?>
                                                                <i class="fa fa-file-o"></i>
                                                <?php } ?>
                                                        </a>
                                                    </div>


                                                </td>
<?php } ?>
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
@endsection
<script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("body").delegate(".nav-link", "click", function () {
            $(".nav-link").removeClass("active");
            $(this).addClass("active");
            let data_id = $(this).attr('data-id');
            $("#kt_tabs_1_1").hide();
            $("#kt_tabs_1_2").hide();
            $("#kt_tabs_1_3").hide();
            $("#kt_tabs_1_4").hide();
            $("#kt_tabs_1_5").hide();
            $("#"+data_id).show();

        });
<?php
if ($step == "rental_histories") {
    ?>
            $(".nav-link").eq("3").trigger("click");
<?php } elseif ($step == "payment_details") {
    ?>
            $(".nav-link").eq("3").trigger("click");
<?php } elseif ($step == "quittances") {
    ?>
            $(".nav-link").eq("4").trigger("click");
<?php } elseif ($step == "document_id") {
    ?>
            $(".nav-link").eq("1").trigger("click");
<?php } ?>
    })

</script>