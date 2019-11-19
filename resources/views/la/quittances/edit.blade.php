@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/quittances') }}">Quittance de loyer</a> :
@endsection
@section("contentheader_description", $quittance->$view_col)
@section("section", "Quittances")
@section("section_url", url(config('laraadmin.adminRoute') . '/quittances'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Quittances Edit : ".$quittance->$view_col)

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
				{!! Form::model($quittance, ['route' => [config('laraadmin.adminRoute') . '.quittances.update', $quittance->id ], 'method'=>'PUT', 'id' => 'quittance-edit-form']) !!}
					{{-- @la_form($module) --}}


					@la_input($module, 'quittance_date')
					@la_input($module, 'uploaded_file')
				{{--	@la_input($module, 'user_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/quittances') }}">Cancel</a></button>
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
	$("#quittance-edit-form").validate({

	});
});
</script>
@endpush
