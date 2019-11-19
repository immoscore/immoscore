@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/udp_reached_details') }}">UDP Reached Detail</a> :
@endsection
@section("contentheader_description", $udp_reached_detail->$view_col)
@section("section", "UDP Reached Details")
@section("section_url", url(config('laraadmin.adminRoute') . '/udp_reached_details'))
@section("sub_section", "Edit")

@section("htmlheader_title", "UDP Reached Details Edit : ".$udp_reached_detail->$view_col)

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
				{!! Form::model($udp_reached_detail, ['route' => [config('laraadmin.adminRoute') . '.udp_reached_details.update', $udp_reached_detail->id ], 'method'=>'PUT', 'id' => 'udp_reached_detail-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'age')
					@la_input($module, 'total_count')
					@la_input($module, 'Gender')
					@la_input($module, 'udp_detail_id')
					@la_input($module, 'udp_disaggregation_id')
					@la_input($module, 'uploadudp_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/udp_reached_details') }}">Cancel</a></button>
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
	$("#udp_reached_detail-edit-form").validate({
		
	});
});
</script>
@endpush
