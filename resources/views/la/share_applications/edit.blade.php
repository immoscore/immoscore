@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/share_applications') }}">Share Application</a> :
@endsection
@section("contentheader_description", $share_application->$view_col)
@section("section", "Share Applications")
@section("section_url", url(config('laraadmin.adminRoute') . '/share_applications'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Share Applications Edit : ".$share_application->$view_col)

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
				{!! Form::model($share_application, ['route' => [config('laraadmin.adminRoute') . '.share_applications.update', $share_application->id ], 'method'=>'PUT', 'id' => 'share_application-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'url')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/share_applications') }}">Cancel</a></button>
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
	$("#share_application-edit-form").validate({
		
	});
});
</script>
@endpush
