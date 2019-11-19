@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/verifies') }}">Verify</a> :
@endsection
@section("contentheader_description", $verify->$view_col)
@section("section", "Verifies")
@section("section_url", url(config('laraadmin.adminRoute') . '/verifies'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Verifies Edit : ".$verify->$view_col)

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

<div class="box">
	<div class="box-header">

	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($verify, ['route' => [config('laraadmin.adminRoute') . '.verifies.update', $verify->id ], 'method'=>'PUT', 'id' => 'verify-edit-form']) !!}
                                <?php if($user->user_type=="employer") { ?>
                                <div class="kt-form__section kt-form__section--first">
                            <div class="form-group"><label for="occupation">Occupation* :</label>
                                <select class="form-control select2-hidden-accessible" required="1" data-placeholder="Enter Occupation" rel="select2" name="occupation" tabindex="-1" aria-hidden="true" aria-required="true">

                                    <option value="Employed" selected="selected">Employed</option>

                                </select>
                                </div>
                            <div id="employee" style="">
                                <div class="form-group"><label for="name_of_employer">Name of employer* :</label>
                                    <select class="form-control select2-hidden-accessible" required="1" data-placeholder="Enter Name of employer" rel="select2" name="name_of_employer" tabindex="-1" aria-hidden="true" aria-required="true">
                                        <option value="1" selected="selected">ABS Infotech</option></select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position :</label>
                                        <input class="form-control" placeholder="Enter Position" data-rule-minlength="0" data-rule-maxlength="256" name="position" type="text" value="{{ $verify->position }}">
                                    </div>
                                        <div class="form-group">
                                            <label for="contract_type">Contract type :</label>
                                            <select class="form-control select2-hidden-accessible" data-placeholder="Enter Contract type" rel="select2" name="contract_type" tabindex="-1" aria-hidden="true">
                                                <option value="0">None</option>
                                                <option value="Contrat à Durée Indéterminée (CDI)" {{ $verify->contract_type=="Contrat à Durée Indéterminée (CDI)"?"selected":"" }}>Contrat à Durée Indéterminée (CDI)</option>
                                                <option value="Contrat à Durée Déterminée (CDD)"  {{ $verify->contract_type=="Contrat à Durée Déterminée (CDD)"?"selected":"" }}>Contrat à Durée Déterminée (CDD)</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                <label for="lease_start_date">Start Date* :</label>
                                <input class="form-control valid lease_start_date" placeholder="Lease Start Date" required="1" value="<?php echo isset($verify->contract_start_date)?date("m/d/Y",strtotime($verify->contract_start_date)):''; ?>" name="contract_start_date" type="text" aria-required="true" id="dp1572705388391">
                            </div>
                            <div class="form-group">
                                <label for="lease_end_date">End Date* :</label>
                                <input class="form-control valid lease_end_date" placeholder="Lease End Date" required="1" value="<?php echo isset($verify->contract_end_date)?date("m/d/Y",strtotime($verify->contract_end_date)):''; ?>" name="contract_end_date" type="text" aria-required="true" id="dp1572705388392">
                            </div>
                        </div>
                                <?php } else { ?>
                                <div class="kt-form__section kt-form__section--first">
                            <div class="form-group"><label for="address">Address* :</label>
                                <textarea class="form-control valid" placeholder="Enter Address" required="1" cols="30" rows="3" name="address" aria-required="true" aria-invalid="false">{{ $verify->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="lease_start_date">Lease Start Date* :</label>
                                <input class="form-control valid lease_start_date" placeholder="Lease Start Date" required="1" value="<?php echo isset($verify->lease_start_date)?date("m/d/Y",strtotime($verify->lease_start_date)):''; ?>" name="lease_start_date" type="text" aria-required="true" id="dp1572705388391">
                            </div>
                            <div class="form-group">
                                <label for="lease_end_date">Lease End Date* :</label>
                                <input class="form-control valid lease_end_date" placeholder="Lease End Date" required="1" value="<?php echo isset($verify->lease_end_date)?date("m/d/Y",strtotime($verify->lease_end_date)):''; ?>" name="lease_end_date" type="text" aria-required="true" id="dp1572705388392">
                            </div>
                            <div class="form-group">
                                <label for="area">Area(SQM)* :</label>
                                <input class="form-control" placeholder="Enter Area(SQM)" required="1" name="area" type="number" value="{{ $verify->area }}" aria-required="true"></div>
                                <div class="form-group">
                                    <label for="monthly_rent">Monthly Rent* :</label>
                                            <input class="form-control" placeholder="Enter Monthly Rent" required="1" name="monthly_rent" type="number" value="{{ $verify->monthly_rent }}" aria-required="true"></div>
                                            <div class="form-group">
                                                <label for="rental_type">Rental type :</label>
                                                <select class="form-control" data-placeholder="Enter Rental type" rel="select2" name="rental_type" tabindex="-1" aria-hidden="true">
                                                    <option value="0">None</option>
                                                    <option value="Flatshare" {{ $verify->rental_type=="Flatshare"?"selected":"" }}>Flatshare</option>
                                                    <option value="Lease holder" {{ $verify->rental_type=="Lease holder"?"selected":"" }}>Lease holder</option>
                                                    <option value="At home" {{ $verify->rental_type=="At home"?"selected":"" }}>At home</option>
                                                </select>

                                    </div>
                                </div>

                                <?php } ?>
                                <div class="form-group">
                                            <label for="contract_type">Verify</label>
                                            <select class="form-control select2-hidden-accessible" data-placeholder="Enter Contract type" rel="select2" name="is_verified" tabindex="-1" aria-hidden="true">
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                    </div>
                                 <div class="form-group"><label for="address">Description :</label>
                                <textarea class="form-control valid" placeholder="Description" cols="30" rows="3" name="verify_description" aria-required="true" aria-invalid="false"></textarea>
                            </div>
					{{-- @la_form($module)


					@la_input($module, 'is_verified')
					@la_input($module, 'tenant_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/verifies') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datepicker/jquery-ui-1.9.2.custom.css') }}">
@endpush
@push('scripts')

<script src="{{ asset('la-assets/plugins/datepicker/jquery-ui.js') }}"></script>
<script>
$(function () {
     $(".lease_start_date").datepicker();
        $(".lease_end_date").datepicker();
	$("#verify-edit-form").validate({

	});
});
</script>
@endpush
