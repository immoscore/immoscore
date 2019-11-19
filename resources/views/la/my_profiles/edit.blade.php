<?php $user = Auth::user(); ?>
@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/my_profiles') }}">My Profile</a> : <small><?php echo $user->name;?></small>
@endsection
@section("contentheader_description", $my_profile->$view_col)
@section("section", "My Profiles")
@section("section_url", url(config('laraadmin.adminRoute') . '/my_profiles'))
@section("sub_section", "Edit")

@section("htmlheader_title", "My Profiles Edit : ".$my_profile->$view_col)

@section("main-content")

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<link href="{{ asset('immoscore/assets/css/demo2/wizard-v3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('immoscore/assets/css/demo2/style.bundle.css') }}" rel="stylesheet" type="text/css" />

<div style="overflow-y:scroll;">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" >
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-wizard-v3" id="kt_wizard_v3" data-ktwizard-state="first">


                    <!--begin: Form Wizard Nav -->
                    <div class="kt-wizard-v3__nav">
                        <div class="kt-wizard-v3__nav-line"></div>
                        <div class="kt-wizard-v3__nav-items">
                            <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                            <?php
                            $current_step_array = array();
                            $current_step_data_array = array();

                            if ($step == "1") {
                                $current_step_array[] = "current";
                                $current_step_array[] = "pending";
                                $current_step_array[] = "pending";
                                $current_step_array[] = "pending";
                                $current_step_array[] = "pending";
                                $current_step_data_array[] = "current";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                            } elseif ($step == "2") {
                                $current_step_array[] = "done";
                                $current_step_array[] = "current";
                                $current_step_array[] = "pending";
                                $current_step_array[] = "pending";
                                $current_step_array[] = "pending";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "current";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                            } elseif ($step == "3") {
                                $current_step_array[] = "done";
                                $current_step_array[] = "done";
                                $current_step_array[] = "current";
                                $current_step_array[] = "";
                                $current_step_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "current";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                            } elseif ($step == "4") {
                                $current_step_array[] = "done";
                                $current_step_array[] = "done";
                                $current_step_array[] = "done";
                                $current_step_array[] = "current";
                                $current_step_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "current";
                                $current_step_data_array[] = "";
                            } elseif ($step == "5") {
                                $current_step_array[] = "done";
                                $current_step_array[] = "done";
                                $current_step_array[] = "done";
                                $current_step_array[] = "done";
                                $current_step_array[] = "current";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "";
                                $current_step_data_array[] = "current";
                            }
                            $cstep = $step;
                            if ($step <= 4) {
                                $step = ++$step;
                            }
                            ?>
                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[0]; ?>">
                                <span>1</span>
                                <i class="fa fa-check"></i>
                                <div class="kt-wizard-v3__nav-label">Contact Information </div>
                            </a>
                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[1]; ?>">
                                <span>2</span>
                                <i class="fa fa-check"></i>
                                <div class="kt-wizard-v3__nav-label">Personal Information</div>
                            </a>
                            <?php if(!($my_profile->currently_renting_or_looking == "renting" && $my_profile->property_type == "residential")) { ?>
                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[2]; ?>">
                                <span>3</span>
                                <i class="fa fa-check"></i>
                                <div class="kt-wizard-v3__nav-label">Occupation</div>
                            </a>
                            <?php } ?>
                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[3]; ?>">
                                <span><?php if(!($my_profile->currently_renting_or_looking == "renting" && $my_profile->property_type == "residential")) { echo "4"; } else { echo "3";} ?></span>
                                <i class="fa fa-check"></i>
                                <div class="kt-wizard-v3__nav-label">Current/Last Address</div>
                            </a>
                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[4]; ?>">
                                <span><?php if(!($my_profile->currently_renting_or_looking == "renting" && $my_profile->property_type == "residential")) { echo "5"; } else { echo "4";} ?></span>
                                <i class="fa fa-check"></i>
                                <div class="kt-wizard-v3__nav-label">Guarantor</div>
                            </a>

                        </div>
                    </div>
                    <!--end: Form Wizard Nav -->


                    <!--begin: Form Wizard Form-->

                    {!! Form::model($my_profile, ['route' => [config('laraadmin.adminRoute') . '.my_profiles.update', $my_profile->id ], 'method'=>'PUT', 'id' => 'my_profile-edit-form','class'=>'kt-form']) !!}

                    <!--begin: Form Wizard Step 1-->
                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[0] ?>">
                        <div class="kt-separator kt-separator--height-xs"></div>
                        <div class="kt-form__section kt-form__section--first">
                            <input type='hidden' name='step' value='<?php echo $step ?>' >
                            <input type='hidden' name='cstep' value='<?php echo $cstep ?>' >
                            @la_input($module, 'phone_number')
                            @la_input($module, 'id_number')
                            @la_input($module, 'document_type')

                        </div>
                    </div>
                    <!--end: Form Wizard Step 1-->

                    <!--begin: Form Wizard Step 2-->
                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[1] ?>">
                        <div class="kt-separator kt-separator--height-xs"></div>
                        <div class="kt-form__section kt-form__section--first">
                            @la_input($module, 'dob')
                            @la_input($module, 'gender')
                            @la_input($module, 'marital_status')
                            @la_input($module, 'no_of_children')
                            @la_input($module, 'pets')
                            <div id="display_pet" style="{{$my_profile->pets == "No"?"display:none":""}}">
                                @la_input($module, 'select_pet_name')
                            </div>


                        </div>
                    </div>

                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[2] ?>">
                        <div class="kt-separator kt-separator--height-xs"></div>
                        <div class="kt-form__section kt-form__section--first">
                            @la_input($module, 'occupation')

                            <div id="employee" style="display:none">
                                @la_input($module, 'name_of_employer')
                                @la_input($module, 'position')
                                @la_input($module, 'contract_type')
                                @la_input($module, 'contract_start_date')
                                @la_input($module, 'contract_end_date')
                                {{--   @la_input($module, 'contact_person_id')

                                            @la_input($module, 'designation')
                                            @la_input($module, 'phone_number')

                                @la_input($module, 'email_address')   --}}
                            </div>
                            <div id="student" style="display:none">
                                @la_input($module, 'name_of_university')
                                @la_input($module, 'start_date')
                                @la_input($module, 'end_date')

                            </div>
                            @la_input($module, 'contact_person_id')
                                @la_input($module, 'email_address')




                        </div>
                    </div>

                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[3] ?>">
                        <div class="kt-separator kt-separator--height-xs"></div>
                        <div class="kt-form__section kt-form__section--first">
                            @la_input($module, 'address')
                            <div class="form-group">
                                <label for="landlord_name">Landlord Name* :</label>
                                <input class="form-control valid" value="<?php echo isset($my_profile->landlord_name)?$my_profile->landlord_name:''; ?>" placeholder="Landlord Name" required="1" name="landlord_name" type="text" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="landlord_email">Landlord Email* :</label>
                                <input class="form-control valid" placeholder="Landlord Email" value="<?php echo isset($my_profile->landlord_email)?$my_profile->landlord_email:''; ?>" required="1" name="landlord_email" type="email" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="lease_start_date">Lease Start Date* :</label>
                                <input class="form-control valid lease_start_date" placeholder="Lease Start Date" required="1" value="<?php echo isset($my_profile->lease_start_date)?date("m/d/Y",strtotime($my_profile->lease_start_date)):''; ?>" name="lease_start_date" type="text" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="lease_end_date">Lease End Date* :</label>
                                <input class="form-control valid lease_end_date" placeholder="Lease End Date" required="1" value="<?php echo isset($my_profile->lease_end_date)?date("m/d/Y",strtotime($my_profile->lease_end_date)):''; ?>" name="lease_end_date" type="text" aria-required="true">
                            </div>
                            @la_input($module, 'area')
                            @la_input($module, 'monthly_rent')
                            @la_input($module, 'rental_type')
                        </div>
                    </div>
                    <!--end: Form Wizard Step 2-->


                    <!--begin: Form Wizard Step 3-->
                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[4] ?>">

                        <div class="kt-separator kt-separator--height-xs"></div>
                        <div class="kt-form__section kt-form__section--first">
                            <!--@la_input($module, 'immoscore_guarantee')-->
                            <div class="form-group" id="display_guaranter">
                                <label for="immoscore_guarantee">Who is your guarantor : </label>
                                <br><div class="radio"><label>
                                        <input checked="checked" name="immoscore_guaranter" type="radio" value="person"> Person </label><label>
                                            <input name="immoscore_guaranter" type="radio" value="insurance"> Insurance </label>
                                </div></div>
                        </div>
                    </div>


                    <!--begin: Form Actions -->
                    <div class="kt-form__actions">
                        <?php
                        $url = url(config('laraadmin.adminRoute') . '/users');
                        if($cstep == 1) {
                            $url = url(config('laraadmin.adminRoute') . '/my_profiles');
                        } elseif ($cstep == 2 || $cstep == 3 || $cstep == 4 || $cstep == 5) {
                            $prestep = $cstep-1;
                            if(($my_profile->currently_renting_or_looking == "renting" && $my_profile->property_type == "residential")) {
                                if($prestep == "3") {
                                    $url = url(config('laraadmin.adminRoute') . '/my_profiles/'.$my_profile->id.'/edit?step=2');
                                } else {
                                    $url = url(config('laraadmin.adminRoute') . '/my_profiles/'.$my_profile->id.'/edit?step='.$prestep);
                                }
                            } else {
                                $url = url(config('laraadmin.adminRoute') . '/my_profiles/'.$my_profile->id.'/edit?step='.$prestep);
                            }


                        } ?>
                        <a href="{{$url}}"  class="btn btn-default pull-right">Cancel/Back</a>
                        <?php if ($cstep == 5) { ?>
                            {!! Form::submit( 'Finish', ['class'=>'btn btn-success  pull-right']) !!}
                        <?php } else { ?>
                            {!! Form::submit( 'Next', ['class'=>'btn btn-success  pull-right']) !!}
                        <?php } ?>
                    </div>
                    <!--end: Form Actions -->
                    {!! Form::close() !!}
                    <!--end: Form Wizard Form-->

                </div>
            </div>
        </div>	</div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datepicker/jquery-ui-1.9.2.custom.css') }}">
@endpush
@push('scripts')

<script src="{{ asset('la-assets/plugins/datepicker/jquery-ui.js') }}"></script>
<script>
    $(function () {
        $("#my_profile-edit-form").validate({
        });
        $(".null_date").hide();
        $(".lease_start_date").datepicker();
        $(".lease_end_date").datepicker();
        $("select[name = 'occupation']").change(function () {
            if ($(this).val() == "Employed") {
                $("#employee").show();
                $("#student").hide();
            } else if ($(this).val() == "Student") {
                $("#student").show();
                $("#employee").hide();
            } else {
                $("#student").hide();
                $("#employee").hide();
                alert("We are working to come up with a product that will suit you.");
            }
        });

        $("input[name = 'pets']").change(function () {
            if ($(this).val() == "Yes") {
                $("#display_pet").show();
            } else {
                $("#display_pet").hide();
            }
        });
        <?php if ($cstep == 3) { ?>
            $("select[name = 'occupation']").trigger('change');
<?php } ?>
    <?php if ($cstep == 2) { ?>
//            $("input[name = 'pets']").trigger('change');
<?php } ?>
    $("input[name = 'immoscore_guarantee']").change(function () {
            if ($(this).val() == "Yes") {
                $("#display_guaranter").show();
            } else {
                $("#display_guaranter").hide();
            }
        });
        $("input[name = 'immoscore_guarantee']").trigger("change");
    });
</script>
@endpush
