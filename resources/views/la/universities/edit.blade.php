@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/universities') }}">University</a> :
@endsection
@section("contentheader_description", $university->$view_col)
@section("section", "Universities")
@section("section_url", url(config('laraadmin.adminRoute') . '/universities'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Universities Edit : ".$university->$view_col)

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
				{!! Form::model($university, ['route' => [config('laraadmin.adminRoute') . '.universities.update', $university->id ], 'method'=>'PUT', 'id' => 'university-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/universities') }}">Cancel</a></button>
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
	$("#university-edit-form").validate({
		
	});
});
</script>
@endpush
