@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/document_ids') }}">Document Id</a> :
@endsection
@section("contentheader_description", $document_id->$view_col)
@section("section", "Document Ids")
@section("section_url", url(config('laraadmin.adminRoute') . '/document_ids'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Document Ids Edit : ".$document_id->$view_col)

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
				{!! Form::model($document_id, ['route' => [config('laraadmin.adminRoute') . '.document_ids.update', $document_id->id ], 'method'=>'PUT', 'id' => 'document_id-edit-form']) !!}
				{{--	@la_form($module)	--}}


					@la_input($module, 'document_type')
					@la_input($module, 'dob')
					@la_input($module, 'id_number')
					@la_input($module, 'uploaded_id')
				{{--	@la_input($module, 'user_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/document_ids') }}">Cancel</a></button>
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
	$("#document_id-edit-form").validate({

	});
});
</script>
@endpush
