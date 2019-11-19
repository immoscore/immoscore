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
                    <li class="nav-item"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_6" >Search</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_10" >Matches</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_11" >Favorites</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_7" >Upcoming visit</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_8" >Post visit</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_9" >Offers</a> </li>
                </ul>
                <!--end::Tabs-->

            </div>
        </div>
        <!--end::Portlet-->

        <!--begin::Tab Content-->
        <div class="tab-content my_profile">



            <div class="" id="kt_tabs_1_6">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                {!! Form::open(['action' => 'LA\SearchesController@store', 'id' => 'search-edit-form']) !!}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="move_date">When do you want to move in?</label>
                                        <input class="form-control valid move_date" placeholder="Enter Date" data-rule-minlength="0" data-rule-maxlength="256" name="move_date" type="text" value="{{$request->input("move_date")}}" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="want_to_live">Where do you want to live?</label>
                                        <input class="form-control valid" placeholder="Enter code or city name" data-rule-minlength="0" data-rule-maxlength="256" name="want_to_live" id="want_to_live" type="text" value="{{$request->input("want_to_live")}}" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="looking_for">What are you looking for?</label>
                                        <select class="form-control select2" id="looking_for" name="looking_for"  tabindex="-1" aria-hidden="true">
                                            <option value=''>Select</option>
                                            <option value="Apartment" <?php echo $request->input("looking_for") == "Apartment" ? 'selected' : ''; ?>>Apartment</option>
                                            <option value="House"   <?php echo $request->input("looking_for") == "House" ? 'selected' : ''; ?>>House</option>
                                            <option value="Flatmates"   <?php echo $request->input("looking_for") == "Flatmates" ? 'selected' : ''; ?>>Flatmates</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amenities">Amenities</label>
                                        <select class="form-control select2" id="amenities" name="amenities" aria-required="true" tabindex="-1" aria-hidden="true">
                                            <option value=''>Select</option>
                                            <option value="Lift" <?php echo $request->input("amenities") == "Lift" ? 'selected' : ''; ?>>Lift</option>
                                            <option value="Pool" <?php echo $request->input("amenities") == "Pool" ? 'selected' : ''; ?>>Pool</option>
                                            <option value="Garden" <?php echo $request->input("amenities") == "Garden" ? 'selected' : ''; ?>>Garden</option>
                                            <option value="Terrace" <?php echo $request->input("amenities") == "Terrace" ? 'selected' : ''; ?>>Terrace</option>
                                            <option value="Balcony" <?php echo $request->input("amenities") == "Balcony" ? 'selected' : ''; ?>>Balcony</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Size :</label>
                                        <input class="form-control valid" placeholder="Size" data-rule-minlength="0" data-rule-maxlength="256" name="size" type="number" value="<?php echo $request->input("size") ?>" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="budget">Budget :</label>
                                        <input class="form-control valid" placeholder="Budget" data-rule-minlength="0" data-rule-maxlength="256" name="budget" type="number" value="<?php echo $request->input("budget") ?>" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pieces">Pieces :</label>
                                        <input class="form-control valid" placeholder="Pieces" data-rule-minlength="0" data-rule-maxlength="256" name="pieces" type="number" value="<?php echo $request->input("pieces") ?>" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bedrooms">Bedrooms :</label>
                                        <input class="form-control valid" placeholder="Bedrooms" data-rule-minlength="0" data-rule-maxlength="256" name="bedrooms" type="number" value="<?php echo $request->input("bedrooms") ?>" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="clearfix"></div>


                                <br>
                                <div class="col-md-12">
                                    <div class="form-group" style="text-align: center">
                                        {!! Form::submit( 'Search', ['class'=>'btn btn-success center']) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}


                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>

            <div class="" id="kt_tabs_1_10" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">



                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Address</th>
                                            <th>Flat/House</th>
                                            <th>Size in square meters </th>
                                            <th>Pieces</th>
                                            <th>Current rent </th>
                                            <th>Deposit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (isset($matches)) {
                                            foreach ($matches as $property) {
                                                $favori = DB::table('favorites')
                                                        ->where("address_id", "=", $property->id)
                                                        ->where("user_id", "=", $user->id)
                                                        ->first();
                                                ?>
                                                <tr>
                                                    <td>{{$property->address}}</td>
                                                    <td>{{$property->flat_house}}</td>
                                                    <td>{{$property->size_square_meters}}</td>
                                                    <td>{{$property->total_rooms}}</td>
                                                    <td>{{$property->current_rent}}</td>
                                                    <td>{{$property->deposit}}</td>
                                                    <td>

                                                        <?php if ((!isset($favori->user_id)) || ((isset($favori->user_id) && ($favori->user_id != $user->id)))) { ?>
                                                            {!! Form::open(['action' => 'LA\FavoritesController@store', 'id' => 'apply_application-add-form2']) !!}
                                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                                            <input type="hidden" name="address_id" value="{{$property->id}}">
                                                            {!! Form::submit( 'Add to Favorite', ['class'=>'btn btn-success','style'=>'height: 25px;width: 70%;padding-top: 2px;']) !!}
                                                            {!! Form::close() !!}
        <?php } else { ?>
                                                            <div class="text-green">Added To Favorite</div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

    <?php
    }
}
?>

                                    </tbody>

                                </table>







                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>

            <div class="" id="kt_tabs_1_11" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Address</th>
                                            <th>Flat/House</th>
                                            <th>Size in square meters </th>
                                            <th>Pieces</th>
                                            <th>Current rent </th>
                                            <th>Deposit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
<?php
if (isset($favorites)) {

    foreach ($favorites as $property) {
        $favori = DB::table('apply_applications')
                ->where("address_id", "=", $property->id)
                ->where("user_id", "=", $user->id)
                ->first();
        ?>
                                                <tr>
                                                    <td>{{$property->address}}</td>
                                                    <td>{{$property->flat_house}}</td>
                                                    <td>{{$property->size_square_meters}}</td>
                                                    <td>{{$property->total_rooms}}</td>
                                                    <td>{{$property->current_rent}}</td>
                                                    <td>{{$property->deposit}}</td>
                                                    <td>
        <?php if ((!isset($favori->user_id)) || ((isset($favori->user_id) && ($favori->user_id != $user->id)))) { ?>

                                                            {!! Form::open(['action' => 'LA\Apply_ApplicationsController@store', 'id' => 'apply_application-add-form']) !!}
                                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                                            <input type="hidden" name="address_id" value="{{$property->id}}">
                                                            <input type="hidden" name="status" value="Under Review">
                                                            <input type="hidden" name="apply_type" value="Under Review">
                                                            {!! Form::submit( 'Apply', ['class'=>'btn btn-success','style'=>'height: 25px;width: 75px;padding-top: 2px;']) !!}
                                                            {!! Form::close() !!}
        <?php } else { ?>
                                                            <div class="text-green">Applied</div>
        <?php } ?>
                                                    </td>
                                                </tr>

                                                    <?php
                                                    }
                                                }
                                                ?>

                                    </tbody>

                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>

            <div class="" id="kt_tabs_1_7" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Address</th>
                                            <th>Agency/Owner name</th>
                                            <th>Area(SQM)</th>
                                            <th>Rent</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
<?php foreach ($upcoming_visit as $upcoming) { ?>
                                            <tr>
                                                <td>{{$upcoming->address}}</td>
                                                <td>{{$upcoming->owner_name}}</td>
                                                <td>{{$upcoming ->size_square_meters}}</td>
                                                <td>{{$upcoming ->current_rent}}</td>

                                                <td>{{$upcoming ->status}}</td>
                                                <td>
    <?php echo $upcoming->status == "Pending" ? "<a href='javascript:void(0)' class='btn btn-success btn-sm open-model'  data-id='" . $upcoming->visit_id . "'>Update</a>" : ""; ?>

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


            <div class="" id="kt_tabs_1_8" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Address</th>
                                            <th>Agency/Owner name</th>
                                            <th>Area(SQM)</th>
                                            <th>Rent</th>

                                            <th>Tenant Status</th>
                                            <th>Status</th>
                                            <th>Comments</th>
                                            <th>Action</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>

                                    <tbody>
<?php
foreach ($post_visit as $post) {
//    print_r($post_visit);die;
    ?>
                                            <tr>
                                                <td>{{$post->address}}</td>
                                                <td>{{$post->owner_name}}</td>
                                                <td>{{$post ->size_square_meters}}</td>
                                                <td>{{$post ->current_rent}}</td>

                                                <td>{{$post ->status}}</td>
                                                <td>{{$post ->avaibale_status}}</td>
                                                <td>{{$post ->comment}}</td>
                                                <td><?php echo $post->avaibale_status == "Under Review" ? "<a href='javascript:void(0)' class='btn btn-success btn-sm open-model'  data-id='" . $post->visit_id . "'>Update</a>" : ""; ?></td>
                                                <td>
    <?php
    $all_rating_count = DB::table('ratings')->where("rating_for", "Property")
            ->where("property_id", $post->address_id)
            ->where("tenant_id", $user->id)
            ->where("post_visit_id", $post->visit_id)
            ->first();
    if(isset($all_rating_count->id)) { ?>
                                                            <a href="javascript:void(0);" class="btn btn-info btn-sm openAllAddRateModal"
                                                               data-cleanliness="{{$all_rating_count->cleanliness}}"
                                                               data-accuracy="{{$all_rating_count->accuracy}}"
                                                               data-communication="{{$all_rating_count->communication}}"
                                                               data-location="{{$all_rating_count->location}}"
                                                               data-value="{{$all_rating_count->value}}"
                                                               data-comment="{{$all_rating_count->comment}}"
                                                               data-rent-id="{{$post->visit_id}}" data-user-id="{{$post->owner_id}}" data-address="{{$post->address_id}}" data-rated="true">Rating</a>
    <?php } else { ?>
              <a href="javascript:void(0);" class="btn btn-info btn-sm openAllAddRateModal"
                                                               data-rent-id="{{$post->visit_id}}" data-user-id="{{$post->owner_id}}" data-address="{{$post->address_id}}"  data-rated="false">Rating</a>
    <?php } ?>

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

            <div class="" id="kt_tabs_1_9" style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>Address</th>
                                            <th>Agency/Owner name</th>
                                            <th>Area(SQM)</th>
                                            <th>Rent</th>


                                            <th>Comments</th>


                                        </tr>
                                    </thead>

                                    <tbody>
<?php foreach ($offer_visit as $offer) { ?>
                                            <tr>
                                                <td>{{$offer->address}}</td>
                                                <td>{{$offer->owner_name}}</td>
                                                <td>{{$offer ->size_square_meters}}</td>
                                                <td>{{$offer ->current_rent}}</td>


                                                <td>{{$offer ->comment}}</td>

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





















        </div>
        <!--end::Tab Content--> </div>






    <!--------Custom Html Ends here ----->
</div>
<div class="modal fade" id="rateAllModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Rating</h4>
            </div>

            {!! Form::open(['action' => 'LA\RatingsController@store', 'id' => 'activity-add-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    <input type="hidden" name="post_visit_id" id="post_visit_id" value="">
                    <!--<h2>Rating</h2>-->
                    <table class="table table-bordered table-hover addrating" style="display:none;">
                        <tr><td style="width:125px">Cleanliness</td><td style="text-align:right;width:125px;">
                                <span id="input-21b" data-stars="1"></span>
                                <input type="hidden" name="cleanliness" id="cleanliness" value="">
                            </td><td rowspan='5'>
                                {{ Form::textarea('comment', null, array('class' =>'form-control input', 'cols' => 20, 'rows' =>10, 'required' => '', 'maxlength' => "400"))}}</td></tr>
                        <tr><td >Accuracy</td><td style="text-align:right">
                                <span id="input-22b" data-stars="1"></span>
                                <input type="hidden" name="accuracy" id="accuracy" value="">
                            </td></tr>
                        <tr><td >Communication</td><td style="text-align:right">
                                <span id="input-23b" data-stars="1"></span>
                                <input type="hidden" name="communication" id="communication" value="">
                            </td></tr>
                        <tr><td >Location</td><td style="text-align:right">
                                <span id="input-24b" data-stars="1"></span>
                                <input type="hidden" name="location" id="location" value="">
                            </td></tr>
                        <tr><td >Value</td><td style="text-align:right">
                                <span id="input-25b" data-stars="1"></span>
                                <input type="hidden" name="value" id="value" value="">
                            </td></tr>

                    </table>

                    <table class="table table-bordered table-hover viewrating" style="display:none;">
                        <tr><td style="width:125px">Cleanliness</td><td style="text-align:right;width:125px;">
                                <span id="input-a" data-stars="1"></span>

                            </td><td rowspan='5'>
                                {{ Form::textarea('comment', null, array('class' =>'form-control input', 'cols' => 20, 'rows' =>10, 'required' => '', 'maxlength' => "400","readonly","id"=>"display_comment"))}}</td></tr>
                        <tr><td >Accuracy</td><td style="text-align:right">
                                <span id="input-b" data-stars="1"></span>

                            </td></tr>
                        <tr><td >Communication</td><td style="text-align:right">
                                <span id="input-c" data-stars="1"></span>

                            </td></tr>
                        <tr><td >Location</td><td style="text-align:right">
                                <span id="input-d" data-stars="1"></span>

                            </td></tr>
                        <tr><td >Value</td><td style="text-align:right">
                                <span id="input-e" data-stars="1"></span>

                            </td></tr>

                    </table>

<!--                        <input id="input-21b" value="0" type="text" name="rating_star" class="rating" data-min=0 data-max=5 data-step=1 data-size="xs"
                               data-showclear="false"
                               required title="">-->
                    <div id="rating" class="clearfix">

                    </div>
                    <br>
                    <div>

                        <input type="hidden" name="rent_id" id="rent_id" value='1'>
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

                    {!! Form::submit( 'Submit', ['class'=>'btn btn-success pull-right']) !!}
                </div>
            </div>

            {!! Form::close() !!}
            <div class="modal-body">
                <div class="box-body">
                    <!--<h2>Rating</h2>-->
                    <table style="margin-top: -50px !important;" class="table table-bordered table-hover">
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
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upcoming Visit Status</h4>
            </div>

            {!! Form::open(['action' => 'LA\VisitsController@store', 'id' => 'visit-add-form']) !!}
            <div class="modal-body">
                <div class="box-body">

                    <table class="table table-bordered no-footer">
                        <tbody>
                            <tr>
                                <td>
                                    Status
                                </td>
                                <td>
                                    <input type="hidden" name="visit_id" id="visit_id">
                                    <select class="form-control" name="status" id="status">
                                        <option value="" selected>Select Status</option>
                                        <option value="Interested">Interested</option>
                                        <option value="No longer interested">No longer interested</option>
                                    </select>
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
@push('styles')
<link href="{{ asset('immoscore/assets/css/demo2/style.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

<script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datepicker/jquery-ui-1.9.2.custom.css') }}">
@endpush
@push('scripts')

<script src="{{ asset('la-assets/plugins/datepicker/jquery-ui.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtzs8v7u5EzSTY0x10MwGRx9weXfkJ0hs&libraries=places"></script>
<script>
    $(".move_date").datepicker();
    function initialize() {

    new google.maps.places.Autocomplete(
            (document.getElementById('want_to_live')), {
    types: ['geocode'], componentRestrictions: {country: "FR"}
    });
    }
    initialize();</script>
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
    $("body").delegate(".open-model", "click", function(){
    let visit_id = $(this).attr('data-id');
    $("#visit_id").val(visit_id);
    $('#AddModal').removeClass('fade');
    $('#AddModal').show();
    $('#AddModal').modal('show');
//            $('#AddModal').addClass('out');
    });
    $("body").delegate(".close_modal,.close", "click", function(){
    $('#AddModal').addClass('fade');
    $('#AddModal').hide();
    $('#AddModal').modal('hide');
//            $('#AddModal').addClass('out');
    });
    $("body").delegate(".nav-link", "click", function () {
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
    let data_id = $(this).attr('data-id');
    $("#kt_tabs_1_6").hide();
    $("#kt_tabs_1_7").hide();
    $("#kt_tabs_1_8").hide();
    $("#kt_tabs_1_9").hide();
    $("#kt_tabs_1_10").hide();
    $("#kt_tabs_1_11").hide();
    $("#" + data_id).show();
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
<?php } elseif ($step == "apply") {
    ?>
        $(".nav-link").eq("0").trigger("click");
<?php } ?>
<?php if (isset($matches)) { ?>
        $(".nav-link").eq("1").trigger("click");
<?php } ?>
    $("body").delegate(".openAllAddRateModal", "click", function () {
    let rated = $(this).attr('data-rated');
    if(rated=="true") {
        let cleanliness = $(this).attr("data-cleanliness");
        let accuracy = $(this).attr("data-accuracy");
        let communication = $(this).attr("data-communication");
        let location = $(this).attr("data-location");
        let value = $(this).attr("data-value");
        let comment = $(this).attr("data-comment");
        $("#input-a").html('');
        $("#input-b").html('');
        $("#input-c").html('');
        $("#input-d").html('');
        $("#input-e").html('');
        $("#display_comment").val(comment);
        for(i=1;i<=cleanliness;i++) {
            $("#input-a").append('<i class="fa fa-star" style="color: rgb(255, 207, 16);"></i>');
        }
        while(i<=5) {
            $("#input-a").append('<i class="fa fa-star" style="color: #ecf0f1;"></i>');
            i++;
            }
        for(i=1;i<=accuracy;i++) {
            $("#input-b").append('<i class="fa fa-star" style="color: rgb(255, 207, 16);"></i>');
        }
        while(i<=5) {
            $("#input-b").append('<i class="fa fa-star" style="color: #ecf0f1;"></i>');
            i++;
            }
        for(i=1;i<=communication;i++) {
            $("#input-c").append('<i class="fa fa-star" style="color: rgb(255, 207, 16);"></i>');
        }
        while(i<=5) {
            $("#input-c").append('<i class="fa fa-star" style="color: #ecf0f1;"></i>');
            i++;
            }
        for(i=1;i<=location;i++) {
            $("#input-d").append('<i class="fa fa-star" style="color: rgb(255, 207, 16);"></i>');
        }
        while(i<=5) {
            $("#input-d").append('<i class="fa fa-star" style="color: #ecf0f1;"></i>');
            i++;
            }
        for(i=1;i<=value;i++) {
            $("#input-e").append('<i class="fa fa-star" style="color: rgb(255, 207, 16);"></i>');
        }
        while(i<=5) {
            $("#input-e").append('<i class="fa fa-star" style="color: #ecf0f1;"></i>');
            i++;
            }
            $(".viewrating").show();
            $(".addrating").hide();
    } else {
    $(".viewrating").hide();
            $(".addrating").show();
    }
    $("#address").val($(this).attr("data-address"));
        $("#post_visit_id").val($(this).attr("data-rent-id"));
    $("#owner_id").val($(this).attr("data-user-id"));
//        alert($(this).attr("data-address"));
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
    })

</script>
@push('scripts')
<script src="{{ asset('la-assets/plugins/rate-picker/js/jquery-rate-picker.js') }}"  type="text/javascript"></script>
<script>
    $(function () {

    });
</script>
@endpush