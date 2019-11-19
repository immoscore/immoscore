@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/apply_applications') }}">Apply Application</a> :
@endsection
@section("contentheader_description", $apply_application->$view_col)
@section("section", "Apply Applications")
@section("section_url", url(config('laraadmin.adminRoute') . '/apply_applications'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Apply Applications Edit : ".$apply_application->$view_col)

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
				{!! Form::model($apply_application, ['route' => [config('laraadmin.adminRoute') . '.apply_applications.update', $apply_application->id ], 'method'=>'PUT', 'id' => 'apply_application-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'user_id')
					@la_input($module, 'address_id')
					@la_input($module, 'status')
					@la_input($module, 'date_time')
					@la_input($module, 'apply_type')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/apply_applications') }}">Cancel</a></button>
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
	$("#apply_application-edit-form").validate({
		
	});
});
</script>
@endpush
