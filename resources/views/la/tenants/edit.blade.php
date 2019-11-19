@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/tenants') }}">Tenant</a> :
@endsection
@section("contentheader_description", $tenant->$view_col)
@section("section", "Tenants")
@section("section_url", url(config('laraadmin.adminRoute') . '/tenants'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Tenants Edit : ".$tenant->$view_col)

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
				{!! Form::model($tenant, ['route' => [config('laraadmin.adminRoute') . '.tenants.update', $tenant->id ], 'method'=>'PUT', 'id' => 'tenant-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'tenant_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/tenants') }}">Cancel</a></button>
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
	$("#tenant-edit-form").validate({
		
	});
});
</script>
@endpush
