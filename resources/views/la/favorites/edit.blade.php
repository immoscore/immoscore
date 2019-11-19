@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/favorites') }}">Favorite</a> :
@endsection
@section("contentheader_description", $favorite->$view_col)
@section("section", "Favorites")
@section("section_url", url(config('laraadmin.adminRoute') . '/favorites'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Favorites Edit : ".$favorite->$view_col)

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
				{!! Form::model($favorite, ['route' => [config('laraadmin.adminRoute') . '.favorites.update', $favorite->id ], 'method'=>'PUT', 'id' => 'favorite-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'user_id')
					@la_input($module, 'address_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/favorites') }}">Cancel</a></button>
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
	$("#favorite-edit-form").validate({
		
	});
});
</script>
@endpush
