@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/upcoming_visits') }}">Upcoming Visit</a> :
@endsection
@section("contentheader_description", $upcoming_visit->$view_col)
@section("section", "Upcoming Visits")
@section("section_url", url(config('laraadmin.adminRoute') . '/upcoming_visits'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Upcoming Visits Edit : ".$upcoming_visit->$view_col)

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
				{!! Form::model($upcoming_visit, ['route' => [config('laraadmin.adminRoute') . '.upcoming_visits.update', $upcoming_visit->id ], 'method'=>'PUT', 'id' => 'upcoming_visit-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'address')
					@la_input($module, 'rent')
					@la_input($module, 'area_sqm')
					@la_input($module, 'visit_date')
					@la_input($module, 'market_comparison')
					@la_input($module, 'appointment_time')
					@la_input($module, 'change_of_time')
					@la_input($module, 'update_status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/upcoming_visits') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#upcoming_visit-edit-form").validate({
		
	});
});
</script>
@endpush
