@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/visits') }}">Visit</a> :
@endsection
@section("contentheader_description", $visit->$view_col)
@section("section", "Visits")
@section("section_url", url(config('laraadmin.adminRoute') . '/visits'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Visits Edit : ".$visit->$view_col)

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
				{!! Form::model($visit, ['route' => [config('laraadmin.adminRoute') . '.visits.update', $visit->id ], 'method'=>'PUT', 'id' => 'visit-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'address')
					@la_input($module, 'application_id')
					@la_input($module, 'upcoming_date')
					@la_input($module, 'post_date')
					@la_input($module, 'visit_type')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/visits') }}">Cancel</a></button>
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
	$("#visit-edit-form").validate({
		
	});
});
</script>
@endpush
