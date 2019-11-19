@extends("la.layouts.app")

@section("contentheader_title", "Rental Histories")
@section("contentheader_description", "Rental Histories listing")
@section("section", "Rental Histories")
@section("sub_section", "Listing")
@section("htmlheader_title", "Rental Histories Listing")

@section("headerElems")
@la_access("Rental_Histories", "create")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Rental History</button>
<button class="btn btn-default btn-sm pull-right" style="margin-right:5px" onclick='location="{{ url(config('laraadmin.adminRoute') . '/my_profiles?step=rental_histories') }}"'>Go To Profile</button>&nbsp;&nbsp;&nbsp;
@endla_access
@endsection

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

<div class="box box-success">
    <!--<div class="box-header"></div>-->
    <div class="box-body">
        <table id="example1" class="table table-bordered">
            <thead>
                <tr class="success">
                    @foreach( $listing_cols as $col )
                    <th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
                    @endforeach
                    @if($show_actions)
                    <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@la_access("Rental_Histories", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Rental History</h4>
            </div>
            {!! Form::open(['action' => 'LA\Rental_HistoriesController@store', 'id' => 'rental_history-add-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    {{--  @la_form($module) --}}

                    <div class="form-group">
                        <label for="field_type">Owner Name* :</label>
                        {{ Form::select("owner_name", $landlords,null, ['class'=>'form-control', 'required' => 'required','id'=>'owner_name']) }}
                    </div>
                    {{--   @la_input($module, 'owner_name') --}}
                    @la_input($module, 'email')
                    <div class="form-group">
                        <label for="field_type">Address* :</label>
                        {{ Form::select("address", $properties,null, ['class'=>'form-control', 'required' => 'required','id'=>'address']) }}
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {

$(document).ready(function () {
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
            select_data += "<option value="+index+">"+value+"</option>"
        });
        $("input[name=email]").val(data.user_email);
        $("#address").html(select_data);
        }
});
});
});
$("#example1").DataTable({
processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/rental_history_dt_ajax') }}",
        language: {
        lengthMenu: "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search"
        },
        @if ($show_actions)
        columnDefs: [ { orderable: false, targets: [ - 1] }],
        @endif
        });
$("#rental_history-add-form").validate({

});
});
</script>
@endpush
