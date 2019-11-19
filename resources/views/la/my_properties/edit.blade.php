@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/my_properties') }}">My property</a> :
@endsection
@section("contentheader_description", $my_property->$view_col)
@section("section", "My properties")
@section("section_url", url(config('laraadmin.adminRoute') . '/my_properties'))
@section("sub_section", "Edit")

@section("htmlheader_title", "My properties Edit : ".$my_property->$view_col)

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
				{!! Form::model($my_property, ['route' => [config('laraadmin.adminRoute') . '.my_properties.update', $my_property->id ], 'method'=>'PUT', 'id' => 'my_property-edit-form']) !!}
					{{-- @la_form($module) --}}
     <div class="form-group">
                                        <label for="address">Address* :</label>
                                        <input class="form-control valid" id="searchTextField" placeholder="Enter Address" required="1" data-rule-minlength="0" data-rule-maxlength="256" name="address" type="text" value="{{ $my_property->address}}" aria-required="true" aria-invalid="false">
                                    </div>
     <div class="form-group">
                                        <label for="address">City* :</label>
                                        <input class="form-control valid" id="city" placeholder="Enter City" required="1" data-rule-minlength="0" data-rule-maxlength="256" name="city" type="text" value="{{ $my_property->city}}" aria-required="true" aria-invalid="false">
                                    </div>
			  {{--  		@la_input($module, 'address')  --}}
					@la_input($module, 'city')
					@la_input($module, 'flat_house')
					@la_input($module, 'size_square_meters')
					@la_input($module, 'total_rooms')
					@la_input($module, 'bedrooms')
					@la_input($module, 'current_rent')
					@la_input($module, 'deposit')
					@la_input($module, 'property_type')
					@la_input($module, 'amenities')

                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/my_properties') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
  <script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('searchTextField'), {types: ['geocode'], componentRestrictions: {country: "FR"}});
  autocomplete2 = new google.maps.places.Autocomplete(
      document.getElementById('city'), {types: ['geocode'], componentRestrictions: {country: "FR"}});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
//  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
//  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  var place2 = autocomplete2.getPlace();
//
//  for (var component in componentForm) {
//    document.getElementById(component).value = '';
//    document.getElementById(component).disabled = false;
//  }
//
//  // Get each component of the address from the place details,
//  // and then fill-in the corresponding field on the form.
//  for (var i = 0; i < place.address_components.length; i++) {
//    var addressType = place.address_components[i].types[0];
//    if (componentForm[addressType]) {
//      var val = place.address_components[i][componentForm[addressType]];
//      document.getElementById(addressType).value = val;
//    }
//  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtzs8v7u5EzSTY0x10MwGRx9weXfkJ0hs&libraries=places&callback=initAutocomplete"
        async defer></script>

<script>
$(function () {
	$("#my_property-edit-form").validate({

	});
});
</script>
@endpush
