@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/payment_details') }}">Payment Detail</a> :
@endsection
@section("contentheader_description", $payment_detail->$view_col)
@section("section", "Payment Details")
@section("section_url", url(config('laraadmin.adminRoute') . '/payment_details'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Payment Details Edit : ".$payment_detail->$view_col)

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
				{!! Form::model($payment_detail, ['route' => [config('laraadmin.adminRoute') . '.payment_details.update', $payment_detail->id ], 'method'=>'PUT', 'id' => 'payment_detail-edit-form']) !!}
				{{--	@la_form($module)--}}


					@la_input($module, 'pay_date')
					@la_input($module, 'payment_receipt_upload')
				{{--	@la_input($module, 'user_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/payment_details') }}">Cancel</a></button>
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
	$("#payment_detail-edit-form").validate({

	});
});
</script>
@endpush
