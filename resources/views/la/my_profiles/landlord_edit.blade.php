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





                                    <!--begin: Form Wizard Form-->

                                    {!! Form::model($my_profile, ['route' => [config('laraadmin.adminRoute') . '.my_profiles.update', $my_profile->id ], 'method'=>'PUT', 'id' => 'my_profile-edit-form','class'=>'kt-form']) !!}

                                    <!--begin: Form Wizard Step 1-->
                                    <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                        <div class="kt-separator kt-separator--height-xs"></div>
                                        <div class="kt-form__section kt-form__section--first">

                                            @la_input($module, 'phone_number')
                                        </div>
                                    </div>
                                    <!--end: Form Wizard Step 1-->




                                    <!--begin: Form Actions -->
                                    <div class="kt-form__actions">
                                            <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/users') }}">Cancel</a></button>
                                             {!! Form::submit( 'Save', ['class'=>'btn btn-success  pull-right']) !!}
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
