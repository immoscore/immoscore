@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/advertises') }}">Advertise</a> :
@endsection
@section("contentheader_description", $advertise->$view_col)
@section("section", "Advertises")
@section("section_url", url(config('laraadmin.adminRoute') . '/advertises'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Advertises Edit : ".$advertise->$view_col)

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
				{!! Form::model($advertise, ['route' => [config('laraadmin.adminRoute') . '.advertises.update', $advertise->id ], 'method'=>'PUT', 'id' => 'advertise-edit-form']) !!}
				{{--	@la_form($module) --}}

                                <div class="form-group">
						<label for="field_type">Address* :</label>
						{{ Form::select("property_id", $properties, $advertise->property_id, ['class'=>'form-control', 'required' => 'required','id'=>'property_id']) }}
					</div>

				{{--	@la_input($module, 'property_id') --}}

                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/advertises') }}">Cancel</a></button>
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
	$("#advertise-edit-form").validate({

	});
});
</script>
@endpush
