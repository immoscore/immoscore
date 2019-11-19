@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/post_visits') }}">Post visit</a> :
@endsection
@section("contentheader_description", $post_visit->$view_col)
@section("section", "Post visits")
@section("section_url", url(config('laraadmin.adminRoute') . '/post_visits'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Post visits Edit : ".$post_visit->$view_col)

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
				{!! Form::model($post_visit, ['route' => [config('laraadmin.adminRoute') . '.post_visits.update', $post_visit->id ], 'method'=>'PUT', 'id' => 'post_visit-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'employment_status')
					@la_input($module, 'contract_type')
					@la_input($module, 'salary')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/post_visits') }}">Cancel</a></button>
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
	$("#post_visit-edit-form").validate({
		
	});
});
</script>
@endpush
