<?php $user = Auth::user(); ?>
@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/rental_histories') }}">Rental History</a> : <small><?php echo $user->name;?></small>
@endsection
@section("contentheader_description", $rental_history->$view_col)
@section("section", "Rental Histories")
@section("section_url", url(config('laraadmin.adminRoute') . '/rental_histories'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Rental Histories Edit : ".$rental_history->$view_col)

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
                {!! Form::model($rental_history, ['route' => [config('laraadmin.adminRoute') . '.rental_histories.update', $rental_history->id ], 'method'=>'PUT', 'id' => 'rental_history-edit-form']) !!}
                {{--	@la_form($module) --}}

                <div class="form-group">
                    <label for="field_type">Owner Name* :</label>
                    {{ Form::select("owner_name", $landlords,$rental_history->owner_name, ['class'=>'form-control', 'required' => 'required','id'=>'owner_name']) }}
                </div>
                {{--   @la_input($module, 'owner_name') --}}
                @la_input($module, 'email')
                <div class="form-group">
                    <label for="field_type">Address* :</label>
                    {{ Form::select("address", $properties,$rental_history->address, ['class'=>'form-control', 'required' => 'required','id'=>'address']) }}
                </div>

                {{--  @la_input($module, 'address') --}}
                @la_input($module, 'city')
                @la_input($module, 'country')
                @la_input($module, 'rental_type')
                @la_input($module, 'housing_type')
                @la_input($module, 'area')
                @la_input($module, 'rent')
                @la_input($module, 'start_date')
                @la_input($module, 'end_date')
                {{--	@la_input($module, 'user_id')
					--}}

                {{--	@la_input($module, 'owner_name')
					@la_input($module, 'email')
					@la_input($module, 'address')
					@la_input($module, 'city')
					@la_input($module, 'country')
					@la_input($module, 'rental_type')
					@la_input($module, 'housing_type')
					@la_input($module, 'area')
					@la_input($module, 'rent')
					@la_input($module, 'start_date')
					@la_input($module, 'end_date')
					@la_input($module, 'user_id')
					--}}
                <br>
                <div class="form-group">
                    {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/rental_histories') }}">Cancel</a></button>
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
    $("#address").select2();
    $("body").delegate("#owner_name", "change", function () {
    let owner_id = $(this).val();
    $.ajax({
    url: "{{ url(config('laraadmin.adminRoute') . '/get_owner_address') }}",
            method: 'GET',
            dataType: 'json',
            data: {
            user_id : owner_id
            },
            success: function(data) {
            let select_data = "";
            $.each(data.property_lists, function (index, value){
            select_data += "<option value=" + index + ">" + value + "</option>"
            });
            $("input[name=email]").val(data.user_email);
            $("#address").html(select_data);
            }
    });
    });
    $("#rental_history-edit-form").validate({
    });
    });
</script>
@endpush
