@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/payments') }}">Payment </a> :
@endsection
@section("contentheader_description", $payment->$view_col)
@section("section", "Payments")
@section("section_url", url(config('laraadmin.adminRoute') . '/payments'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Payments Edit : ".$payment->$view_col)

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
				{!! Form::model($payment, ['route' => [config('laraadmin.adminRoute') . '.payments.update', $payment->id ], 'method'=>'PUT', 'id' => 'payment-edit-form']) !!}
					     <div class="form-group">
						<label for="field_type">Owner Name* :</label>
						{{ Form::select("owner_name", $owners, $payment->owner_name, ['class'=>'form-control', 'required' => 'required','id'=>'owner_name']) }}
					</div>

					@la_input($module, 'iban_number')
                                        <div class="form-group">
						<label for="field_type">Month* :</label>
						{{ Form::select("month", $months, $payment->month, ['class'=>'form-control', 'required' => 'required','id'=>'month']) }}
					</div>

					@la_input($module, 'address_id')
					@la_input($module, 'amount')
					@la_input($module, 'payment_date')
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/payments') }}">Cancel</a></button>
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
    $("#owner_name").select2();
        $("#month").select2();
	$("#payment-edit-form").validate({

	});
});
</script>
@endpush
