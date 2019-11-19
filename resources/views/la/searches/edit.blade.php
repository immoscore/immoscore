@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/searches') }}">Search</a> :
@endsection
@section("contentheader_description", "")
@section("section", "Searches")
@section("section_url", url(config('laraadmin.adminRoute') . '/searches'))
@section("sub_section", "Edit")

@section("htmlheader_title", "")

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
			<div class="col-md-10 col-md-offset-1">
                            {!! Form::open(['action' => 'LA\SearchesController@store', 'id' => 'search-edit-form']) !!}
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


                    <br>
                    <div class="col-md-12">
					<div class="form-group" style="text-align: center">
						{!! Form::submit( 'Search', ['class'=>'btn btn-success']) !!}
					</div>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtzs8v7u5EzSTY0x10MwGRx9weXfkJ0hs&libraries=places"></script>

<script>
$(function () {
     $(".move_date").datepicker();

	$("#search-edit-form").validate({

	});
        function initialize() {

        new google.maps.places.Autocomplete(
        (document.getElementById('want_to_live')), {
            types: ['geocode'], componentRestrictions: {country: "FR"}
        });

    }
initialize();

});
</script>
@endpush
