@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/my_profiles') }}">My Profile</a> :
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


<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <div class="row">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper">
                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item " data-ktheader-minimize="on">

                </div>
                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Subheader -->

                    <!-- end:: Subheader -->
                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
                                            if($step=="1") {
                                                $current_step_array[] = "current";
                                                $current_step_array[] = "pending";
                                                $current_step_array[] = "pending";
                                                $current_step_data_array[] = "current";
                                                $current_step_data_array[] = "";
                                                $current_step_data_array[] = "";
                                            } elseif($step=="2") {
                                                $current_step_array[] = "done";
                                                $current_step_array[] = "current";
                                                $current_step_array[] = "pending";
                                                $current_step_data_array[] = "";
                                                $current_step_data_array[] = "current";
                                                $current_step_data_array[] = "";
                                            } elseif($step=="3") {
                                                $current_step_array[] = "done";
                                                $current_step_array[] = "done";
                                                $current_step_array[] = "current";
                                                $current_step_data_array[] = "";
                                                $current_step_data_array[] = "";
                                                $current_step_data_array[] = "current";
                                            }
                                            $cstep = $step;
                                            if($step<=4) {
                                             $step = ++$step;
                                            }

                                            ?>
                                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[0];?>">
                                                <span>1</span>
                                                <i class="fa fa-check"></i>
                                                <div class="kt-wizard-v3__nav-label">Status </div>
                                            </a>
                                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[1];?>">
                                                <span>2</span>
                                                <i class="fa fa-check"></i>
                                                <div class="kt-wizard-v3__nav-label">Employment/Students</div>
                                            </a>
                                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[2];?>">
                                                <span>3</span>
                                                <i class="fa fa-check"></i>
                                                <div class="kt-wizard-v3__nav-label">Contract Information/Source of Support</div>
                                            </a>
                                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[2];?>">
                                                <span>3</span>
                                                <i class="fa fa-check"></i>
                                                <div class="kt-wizard-v3__nav-label">Current/Last Address</div>
                                            </a>
                                            <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="<?php echo $current_step_array[2];?>">
                                                <span>3</span>
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
                                            @la_input($module, 'user_type')

                                        </div>
                                    </div>
                                    <!--end: Form Wizard Step 1-->

                                    <!--begin: Form Wizard Step 2-->
                                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[1] ?>">
                                        <div class="kt-separator kt-separator--height-xs"></div>
                                        <div class="kt-form__section kt-form__section--first">
                                            <?php if($my_profile->user_type=="A student") { ?>
                                            @la_input($module, 'name_of_employer')
                                            @la_input($module, 'phone_number')
                                            @la_input($module, 'contact_person_id')
                                            @la_input($module, 'email_address')
                                            <?php } elseif($my_profile->user_type=="A student") { ?>
                                             @la_input($module, 'name_of_university')
                                            @la_input($module, 'start_date')
                                            @la_input($module, 'end_date')
                                            @la_input($module, 'contact_person_id')
                                            @la_input($module, 'email_address')
                                            <?php } ?>


                                        </div>
                                    </div>

                                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[1] ?>">
                                        <div class="kt-separator kt-separator--height-xs"></div>
                                        <div class="kt-form__section kt-form__section--first">
                                            <?php if($my_profile->user_type=="A student") { ?>
                                            @la_input($module, 'parents')
                                            @la_input($module, 'scholarship')
                                            @la_input($module, 'savings')
                                            <?php } elseif($my_profile->user_type=="A student") { ?>
                                             @la_input($module, 'contract_type')
                                            @la_input($module, 'salary')
                                            @la_input($module, 'start_date')
                                            @la_input($module, 'end_date')
                                            <?php } ?>


                                        </div>
                                    </div>

                                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[1] ?>">
                                        <div class="kt-separator kt-separator--height-xs"></div>
                                        <div class="kt-form__section kt-form__section--first">
                                            @la_input($module, 'address')
                                            @la_input($module, 'area')
                                            @la_input($module, 'monthly_rent')
                                            @la_input($module, 'rental_type')
                                        </div>
                                    </div>
                                    <!--end: Form Wizard Step 2-->

                                     @la_input($module, 'phone_number')
                                            @la_input($module, 'contact_person_id')
                                            @la_input($module, 'email_address')
                                            @la_input($module, 'contract_type')
                                            @la_input($module, 'salary')
                                            @la_input($module, 'start_date')
                                            @la_input($module, 'end_date')
                                            @la_input($module, 'current_address')
                                            @la_input($module, 'area')
                                            @la_input($module, 'monthly_rent')
                                    <!--begin: Form Wizard Step 3-->
                                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"  data-ktwizard-state="<?php echo $current_step_data_array[2] ?>">

                                        <div class="kt-separator kt-separator--height-xs"></div>
                                        <div class="kt-form__section kt-form__section--first">
                                            @la_input($module, 'immoscore_guarantee')
                                        </div>
                                    </div>


                                    <!--begin: Form Actions -->
                                    <div class="kt-form__actions">
                                            <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/users') }}">Cancel</a></button>
                                            <?php if($cstep==5) { ?>
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
                    <!-- end:: Content -->				</div>


                <!-- end:: Footer -->			</div>

        </div>
    </div>
</div>

@endsection

@push('scripts')


<script>
    $(function () {
        $("#my_profile-edit-form").validate({
        });
    });
</script>
@endpush
