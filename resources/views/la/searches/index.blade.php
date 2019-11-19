@extends("la.layouts.app")

@section("contentheader_title", "Searches")
@section("contentheader_description", "Searches listing")
@section("section", "Searches")
@section("sub_section", "Listing")
@section("htmlheader_title", "Searches Listing")

@section("headerElems")
@la_access("Searches", "create")

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
		<table class="table table-bordered table-hover" width="100%" cellpadding="0" cellspacing="0">
                      <thead>
                       <tr bgcolor="#dff0d8">
                        <th>Address</th>
                        <th>Flat/House</th>
                        <th>Size in square meters </th>
                        <th>Pieces</th>
                        <th>Current rent </th>
                        <th>Deposit</th>
                        <th>Action</th>
                       </tr>
                      </thead>

                      <tbody>
                          <?php
                          foreach($properties as $property) {
                              $applied = DB::table('apply_applications')->select('apply_applications.user_id as applied_user')
                                    ->where('apply_applications.address_id',$property->id)->first();
                          ?>
                        <tr>
                         <td>{{$property->address}}</td>
                         <td>{{$property->flat_house}}</td>
                         <td>{{$property->size_square_meters}}</td>
                         <td>{{$property->total_rooms}}</td>
                         <td>{{$property->current_rent}}</td>
                         <td>{{$property->deposit}}</td>
                         <td>
                             <?php if($applied->applied_user == $user->id) { ?>
                             <div class="text-green">Applied</div>
                             <?php } else { ?>
                             {!! Form::open(['action' => 'LA\Apply_ApplicationsController@store', 'id' => 'apply_application-add-form']) !!}
                             <input type="hidden" name="user_id" value="{{$user->id}}">
                             <input type="hidden" name="address_id" value="{{$property->id}}">
                             <input type="hidden" name="status" value="Under Review">
                             <input type="hidden" name="apply_type" value="Under Review">
                             {!! Form::submit( 'Apply', ['class'=>'btn btn-success']) !!}
                             {!! Form::close() !!}
                             <?php } ?>
                         </td>


                          <?php } ?>
                        </tr>
                      </tbody>

                    </table>
	</div>
</div>

@la_access("Searches", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Search</h4>
			</div>
			{!! Form::open(['action' => 'LA\SearchesController@store', 'id' => 'search-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)

					{{--
					@la_input($module, 'title')
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

	$("#search-add-form").validate({

	});
});
</script>
@endpush
