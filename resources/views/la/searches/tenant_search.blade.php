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
                    {!! Form::open(['action' => 'LA\SearchesController@store', 'id' => 'search-edit-form']) !!}
                    <div class="col-md-10 col-lg-10 col-xl-10">

                        <div class="kt-profile__main">
                            <div class="col-md-6">
					<div class="form-group">
                                            <label for="move_date">When do you want to move in?</label>
                                            <input class="form-control valid move_date" placeholder="Enter Date" data-rule-minlength="0" data-rule-maxlength="256" name="move_date" type="text" value="" aria-invalid="false">
                                        </div>
                                        </div>
                            <div class="col-md-6">
					<div class="form-group">
                                            <label for="want_to_live">Where do you want to live?</label>
                                            <input class="form-control valid" placeholder="Enter code or city name" data-rule-minlength="0" data-rule-maxlength="256" name="want_to_live" id="want_to_live" type="text" value="" aria-invalid="false">
                                        </div>
                                        </div>
                                <div class="clearfix"></div>
                                 <div class="clearfix"></div>
                                <div class="col-md-6">
					<div class="form-group">
                                            <label for="looking_for">What are you looking for?</label>
                                            <select class="form-control select2" required="required" id="looking_for" name="looking_for" aria-required="true" tabindex="-1" aria-hidden="true">
                                                <option value="Apartment">Apartment</option><option value="House">House</option><option value="Flatmates">Flatmates
                                                </option>
                                            </select>
                                        </div>
                                        </div>
                                <div class="col-md-6">
					<div class="form-group">
                                            <label for="amenities">Amenities</label>
                                            <select class="form-control select2" required="required" id="amenities" name="amenities" aria-required="true" tabindex="-1" aria-hidden="true">
                                                <option value="Lift">Lift</option>
                                                <option value="Pool">Pool</option>
                                                <option value="Garden">Garden</option>
                                                <option value="Terrace">Terrace</option>
                                                <option value="Balcony">Balcony</option>
                                            </select>
                                        </div>
                                        </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
					<div class="form-group">
                                            <label for="size">Size :</label>
                                            <input class="form-control valid" placeholder="Size" data-rule-minlength="0" data-rule-maxlength="256" name="size" type="number" value="" aria-invalid="false">
                                        </div>
                                        </div>
                                <div class="col-md-6">
					<div class="form-group">
                                            <label for="budget">Budget :</label>
                                            <input class="form-control valid" placeholder="Budget" data-rule-minlength="0" data-rule-maxlength="256" name="budget" type="number" value="" aria-invalid="false">
                                        </div>
                                        </div>
                                <div class="clearfix"></div>

                                <div class="col-md-6">
					<div class="form-group">
                                            <label for="pieces">Pieces :</label>
                                            <input class="form-control valid" placeholder="Pieces" data-rule-minlength="0" data-rule-maxlength="256" name="pieces" type="number" value="" aria-invalid="false">
                                        </div>
                                        </div>
                                 <div class="col-md-6">
					<div class="form-group">
                                            <label for="bedrooms">Bedrooms :</label>
                                            <input class="form-control valid" placeholder="Bedrooms" data-rule-minlength="0" data-rule-maxlength="256" name="bedrooms" type="number" value="" aria-invalid="false">
                                        </div>
                                        </div>
                    <div class="clearfix"></div>
                        </div>
                    </div>


                    <div class="col-md-2 col-lg-2 col-xl-2">
                        <div class="kt-profile__stats">
                            <div class="kt-profile__stats-item">
                                <div class="kt-profile__stats-item-chart">
                                   {!! Form::submit( 'Search', ['class'=>'btn btn-success','style'=>'margin-top:150px;']) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                     {!! Form::close() !!}
                </div>
            </div>
            <div class="kt-profile__nav">
                <!--begin::Tabs-->
                <ul class="nav nav-tabs nav-tabs-line">
                    <li class="nav-item"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_1" >Search</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_2" >Matches</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_3" >Favorite</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_4" >Upcoming</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_5" >Post Visit</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_6" >Offer</a> </li>

                </ul>
                <!--end::Tabs-->

            </div>

            <div class="tab-content my_profile">

            <!-----tab 1 Starts Here-->
            <div class="" id="kt_tabs_1_1">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-12  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>1</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                        </tr>
                                    </tbody>

                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>

            <div class="" id="kt_tabs_1_2"  style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-12  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>2</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>2</td>
                                        </tr>
                                    </tbody>

                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>
            <div class="" id="kt_tabs_1_3"  style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-12  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>3</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>3</td>
                                        </tr>
                                    </tbody>

                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>
            <div class="" id="kt_tabs_1_4"  style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-12  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>4</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>4</td>
                                        </tr>
                                    </tbody>

                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>
            <div class="" id="kt_tabs_1_5"  style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-12  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>5</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>5</td>
                                        </tr>
                                    </tbody>

                                </table>




                            </div>
                        </div>
                        <!--end::Portlet--> </div>
                </div>
                <!--end::Row-->
            </div>
            <div class="" id="kt_tabs_1_6"  style="display: none;">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xl-12  order-lg-1 order-xl-1">
                        <!--begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">

                            <div class="kt-portlet__body">

                                <table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr bgcolor="#dff0d8">
                                            <th>6</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>6</td>
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
        </div>
        <!--end::Portlet-->

        <!--begin::Tab Content-->

        <!--end::Tab Content--> </div>






    <!--------Custom Html Ends here ----->
</div>


<div class="modal" id="tenantModal2" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">We are working to come up with a product that will suit you.</h4>
            </div>
           <a href="{{ url('/logout') }}" class="btn btn-success">Log Out&nbsp;</a>


        </div>
    </div>
</div>
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
            $("#" + data_id).show();

        });


    })

</script>