@extends("la.layouts.app")

@section("contentheader_title", "My properties")
@section("contentheader_description", "My properties listing")
@section("section", "My properties")
@section("sub_section", "Listing")
@section("htmlheader_title", "My properties Listing")

@section("headerElems")
@la_access("My_properties", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add My property</button>&nbsp;&nbsp;
        <button class="btn btn-default btn-sm pull-right" style="margin-right:5px" onclick='location="{{ url(config('laraadmin.adminRoute') . '/my_profiles?step=my_properties') }}"'>Go To Profile</button>&nbsp;&nbsp;&nbsp;
@endla_access
@endsection

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

<div class="box box-success">

	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>

		</tbody>
		</table>
	</div>
</div>

@la_access("My_properties", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add My property</h4>
			</div>
			{!! Form::open(['action' => 'LA\My_propertiesController@store', 'id' => 'my_property-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                 {{--   @la_form($module) --}}

                                    <div class="form-group">
                                        <label for="address">Address* :</label>
                                        <input class="form-control valid" id="searchTextField" placeholder="Enter Address" required="1" data-rule-minlength="0" data-rule-maxlength="256" name="address" type="text" value="" aria-required="true" aria-invalid="false">
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
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
<style>

    .pac-container {
    background-color: #FFF;
    z-index: 20;
    position: fixed;
    display: inline-block;
    float: left;
}
.modal{
    z-index: 20;
}
.modal-backdrop{
    z-index: 10;
}​
</style>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
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
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/my_property_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#my_property-add-form").validate({

	});
        $("body").delegate("#searchTextField","click",function(){

            autocomplete = new google.maps.places.Autocomplete(
                                                /** @type {!HTMLInputElement} */(document.getElementById("searchTextField")),
                                                {types: ['geocode'], componentRestrictions: {country:"FR"}});
                                                autocomplete.addListener('place_changed', fillInAddress);
        })
});
</script>
@endpush
