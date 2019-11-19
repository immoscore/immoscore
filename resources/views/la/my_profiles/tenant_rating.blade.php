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
    });</script>
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
                    <li class="nav-item active"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_1" >Rating</a> </li>

                </ul>
                <!--end::Tabs-->

            </div>
        </div>
        <!--end::Portlet-->

        <!--begin::Tab Content-->
        <div class="tab-content my_profile">


            <div class="" id="kt_tabs_1_1" style="">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">


                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <?php if ($user->role_id == "11") { ?>
                                                <th>Tenant’s Name</th>
                                            <?php } else { ?>
                                                <th>Owner’s name</th>
                                            <?php } ?>
                                            <th>Property</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($rental_histories as $rental_history) {
//                                            dd($rental_history);
                                            if ($user->role_id == 10) {
                                                $rating = DB::table('ratings')->where("rating_for", "Property")
                                                                ->where("property_id", $rental_history->address)->where("user_id", $user->id)->first();
                                                $data_user_id = $rental_history->owner_name;
                                            } elseif ($user->role_id == 11) {
                                                $rating = DB::table('ratings')->where("rating_for", "Tenant")
                                                                ->where("property_id", $rental_history->address)
                                                                ->where("tenant_id", $rental_history->user_id)
                                                                ->where("user_id", $user->id)->first();
                                                $data_user_id = $rental_history->user_id;
                                            }
//                                            dd($users);
                                            ?>
                                            <tr>
                                                <td>{{$rental_history->name}}</td>
                                                <td>{{$rental_history->address_name}}</td>
                                                <td>{{$rental_history->start_date}}</td>
                                                <td>{{$rental_history->end_date}}</td>
                                                <td>
                                                    <?php if (!isset($rating->id)) { ?>
                                                    <a href="javascript:void(0);" class="btn btn-info btn-sm openRateModal"
                                                       data-rent-id="{{$rental_history->id}}" data-user-id="{{$data_user_id}}" data-address="{{$rental_history->address}}">Rate</a>
                                                       <?php
                                                       }
                                                       if ($user->role_id == 10) {
                                                           $rating_sum = 0;

                                                            $all_rating_count = DB::table('ratings')->where("rating_for", "Property")
                                                           ->where("property_id", $rental_history->address)
                                                           ->count();

                                                            $cleanliness = DB::table('ratings')->where("rating_for", "Property")
                                                           ->where("property_id", $rental_history->address)
                                                           ->sum('cleanliness');



                                                            $accuracy = DB::table('ratings')->where("rating_for", "Property")
                                                           ->where("property_id", $rental_history->address)
                                                           ->sum('accuracy');


                                                            $communication = DB::table('ratings')->where("rating_for", "Property")
                                                           ->where("property_id", $rental_history->address)
                                                           ->sum('communication');

                                                            $location = DB::table('ratings')->where("rating_for", "Property")
                                                           ->where("property_id", $rental_history->address)
                                                           ->sum('location');


                                                            $value = DB::table('ratings')->where("rating_for", "Property")
                                                           ->where("property_id", $rental_history->address)
                                                           ->sum('value');


                                                            $total_count = 0;
                                                           if ($all_rating_count != 0)
                                                               $total_count = (($cleanliness + $accuracy + $communication + $location + $value) / 5) / $all_rating_count;



                                                           if ($total_count > 0) {
                                                               for ($i = 1; $i <= $total_count; $i++)
                                                                   echo "<span class='fa fa-star' style='color:#f2b01e'></span>";
                                                           }
                                                           if ($total_count < 5)
                                                               for ($i = 5; $i > $total_count; $i--)
                                                                   echo "<span class='fa fa-star'></span>";
                                                       }
                                                       if ($user->role_id == 11) {
                                                           $rating_sum = 0;
                                                           $all_rating_sum = DB::table('ratings')->where("rating_for", "Tenant")
                                                                           ->where("property_id", $rental_history->address)
                                                                           ->where("tenant_id", $rental_history->user_id)->sum('rating_star');


                                                           $all_rating_count = DB::table('ratings')->where("rating_for", "Tenant")
                                                                           ->where("property_id", $rental_history->address)
                                                                           ->where("tenant_id", $rental_history->user_id)->count();

                                                           $total_count = 0;
                                                           if ($all_rating_count != 0)
                                                               $total_count = ceil($all_rating_sum / $all_rating_count);
                                                           if ($total_count > 0) {
                                                               for ($i = 1; $i <= $total_count; $i++)
                                                                   echo "<span class='fa fa-star' style='color:#f2b01e'></span>";
                                                           }
                                                           if ($total_count < 5)
                                                               for ($i = 5; $i > $total_count; $i--)
                                                                   echo "<span class='fa fa-star'></span>";
                                                       }
                                                       ?>
                                                                       <a href="javascript:void(0);" class="btn btn-info btn-sm openAllAddRateModal"
                                                       data-rent-id="{{$rental_history->id}}" data-user-id="{{$data_user_id}}" data-address="{{$rental_history->address}}">Rating</a>
                                                </td>

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



    <div class="modal fade" id="rateModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Rating</h4>
                </div>
                {!! Form::open(['action' => 'LA\RatingsController@store', 'id' => 'activity-add-form']) !!}
                <div class="modal-body">
                    <div class="box-body">
                        <!--<h2>Rating</h2>-->
                        <table class="table table-bordered table-hover">
                            <tr><td style="width:200px">Cleanliness</td><td style="text-align:right">
                                    <span id="input-21b" data-stars="1"></span>
                                    <input type="hidden" name="cleanliness" id="cleanliness" value="">
                                </td></tr>
                            <tr><td  style="width:50%">Accuracy</td><td style="text-align:right">
                                    <span id="input-22b" data-stars="1"></span>
                                    <input type="hidden" name="accuracy" id="accuracy" value="">
                                </td></tr>
                            <tr><td  style="width:50%">Communication</td><td style="text-align:right">
                                    <span id="input-23b" data-stars="1"></span>
                                    <input type="hidden" name="communication" id="communication" value="">
                                </td></tr>
                            <tr><td  style="width:50%">Location</td><td style="text-align:right">
                                    <span id="input-24b" data-stars="1"></span>
                                    <input type="hidden" name="location" id="location" value="">
                                </td></tr>
                            <tr><td  style="width:50%">Value</td><td style="text-align:right">
                                    <span id="input-25b" data-stars="1"></span>
                                    <input type="hidden" name="value" id="value" value="">
                                </td></tr>

                        </table>


<!--                        <input id="input-21b" value="0" type="text" name="rating_star" class="rating" data-min=0 data-max=5 data-step=1 data-size="xs"
                               data-showclear="false"
                               required title="">-->
                        <div id="rating" class="clearfix">

                        </div>
                        <br>
                        <div>

                            <input type="hidden" name="rent_id" id="rent_id">
                            <input type="hidden" name="property_id" id="address">
                            <?php if ($user->role_id == 10) { ?>
                                <input type="hidden" name="landlord_id" id="owner_id">
                                <input type="hidden" name="tenant_id" id="tenant_id" value="{{$user->id}}">
                                <input type="hidden" name="rating_for" id="rating_for" value="Property">
                            <?php } else { ?>
                                <input type="hidden" name="landlord_id" id="owner_id"  value="{{$user->id}}">
                                <input type="hidden" name="tenant_id" id="tenant_id">
                                <input type="hidden" name="rating_for" id="rating_for" value="Tenant">
                            <?php } ?>
                        </div>
                        {{ Form::textarea('comment', null, array('class' =>'form-control input', 'cols' => 20, 'rows' =>4, 'required' => '', 'maxlength' => "400"))}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="rateAllModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Add Rating</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <!--<h2>Rating</h2>-->
                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr bgcolor="#dff0d8">
                                    <th>Rating</th>
                                    <th>Name</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="display_ajax_data">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>

                </div>
            </div>
        </div>
        <!--------Custom Html Ends here ----->
    </div>


    @endsection
    <script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

    @push('styles')
    <style>
        @font-face {
            font-family: 'Material Icons';
            font-style: normal;
            font-weight: 400;
            src: local('Material Icons'), local('MaterialIcons-Regular'), url(https://fonts.gstatic.com/s/materialicons/v7/2fcrYFNaTjcS6g4U3t-Y5UEw0lE80llgEseQY3FEmqw.woff2) format('woff2'), url(https://fonts.gstatic.com/s/materialicons/v7/2fcrYFNaTjcS6g4U3t-Y5RV6cRhDpPC5P4GCEJpqGoc.woff) format('woff');
        }
        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            word-wrap: normal;
            -moz-font-feature-settings: 'liga';
            -moz-osx-font-smoothing: grayscale;
        }
        i {
            cursor :  pointer;
        }
    </style>
    @endpush

    <script>
    $(document).ready(function () {

        $.ratePicker("#input-21b", {
            rate: function (stars) {
                $("#cleanliness").val(stars);
            }
        });
        $.ratePicker("#input-22b", {
            rate: function (stars) {
                $("#accuracy").val(stars);
            }
        });
        $.ratePicker("#input-23b", {
            rate: function (stars) {
                $("#communication").val(stars);
            }
        });
        $.ratePicker("#input-24b", {
            rate: function (stars) {
                $("#location").val(stars);
            }
        });
        $.ratePicker("#input-25b", {
            rate: function (stars) {
                $("#value").val(stars);
            }
        });
        $("body").delegate(".nav-link", "click", function () {
            $(".nav-link").removeClass("active");
            $(this).addClass("active");
            let
            data_id = $(this).attr('data-id');
            $("#kt_tabs_1_1").hide();
            $("#kt_tabs_1_2").hide();
            $("#kt_tabs_1_3").hide();
            $("#kt_tabs_1_4").hide();
            $("#kt_tabs_1_5").hide();
            $("#" + data_id).show();
        });
        $("body").delegate(".openRateModal", "click", function () {

            //            let visit_id = $(this).attr('data-id');
            //            $("#visit_id").val(visit_id);
<?php if ($user->role_id == 10) { ?>
                $("#owner_id").val($(this).attr("data-user-id"));
<?php } else { ?>
                $("#tenant_id").val($(this).attr("data-user-id"));
<?php } ?>
            $("#address").val($(this).attr("data-address"));
            $("#rent_id").val($(this).attr("data-rent-id"));
            $("#data-owner-id").val($(this).attr("data-owner-id"));
            $('#rateModal').removeClass('fade');
            $('#rateModal').show();
            $('#rateModal').modal('show');
            //            $('#AddModal').addClass('out');
        });
        $("body").delegate(".openAllAddRateModal", "click", function () {

//        $("#address").val($(this).attr("data-address"));
//        $("#rent_id").val($(this).attr("data-rent-id"));
//        $("#data_owner_id").val($(this).attr("data-owner-id"));
            $('#rateAllModal').removeClass('fade');
            $('#rateAllModal').show();
            $('#rateAllModal').modal('show');

<?php if ($user->role_id == 10) { ?>
                $("#myModalLabel2").html("Owner's Rating");
                //            $("#owner_id").val($(this).attr("data-user-id"));
<?php } else { ?>
                $("#myModalLabel2").html("Tenant's Rating");
                //            $("#tenant_id").val($(this).attr("data-address"));
<?php } ?>
            let user_id = $(this).attr("data-user-id");
                    let
            address = $(this).attr("data-address");
                    let
            rent_id = $(this).attr("data-rent-id");
            $.ajax({
                url: "{{ url(config('laraadmin.adminRoute') . '/get_ratings') }}",
                method: 'GET',
                dataType: 'html',
                data: {
                    user_id: user_id, address: address, rent_id: rent_id
                },
                success: function (data) {
                    $("#display_ajax_data").html(data);
                }
            });
            //            $('#AddModal').addClass('out');
        });
        $("body").delegate(".close_modal,.close", "click", function () {
            $('#rateModal').addClass('fade');
            $('#rateModal').hide();
            $('#rateModal').modal('hide');
            $('#rateAllModal').addClass('fade');
            $('#rateAllModal').hide();
            $('#rateAllModal').modal('hide');
            //            $('#AddModal').addClass('out');
        });
<?php
if ($step == "rental_histories") {
    ?>
            $(".nav-link").eq("2").trigger("click");
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


    @push('scripts')
    <script src="{{ asset('la-assets/plugins/rate-picker/js/jquery-rate-picker.js') }}"  type="text/javascript"></script>
    <script>
    $(function () {

    });
    </script>
    @endpush