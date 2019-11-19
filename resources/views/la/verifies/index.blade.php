@extends("la.layouts.app")

@section("contentheader_title", "Verifies")
@section("contentheader_description", "Verifies listing")
@section("section", "Verifies")
@section("sub_section", "Listing")
@section("htmlheader_title", "Verifies Listing")

@section("headerElems")
@la_access("Verifies", "create")

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
                    <td>#</td>
                    <?php
                    if ($user->user_type == "employer") { ?>
                        <td>Employee Name</td>
                        <td>Employee Email</td>
                        <td>Verify</td>
                    <?php } else { ?>
                        <td>Tenant Name</td>
                        <td>Tenant Email</td>
                        <td>Verify</td>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($user_profile as $user_p) {
                    $user = DB::table('users')->where("id", $user_p->user_id)->first();
                    ?>
                <td><?php echo $i++; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td>
                    <?php if($user_p->is_verified == "0") { ?>
                    <a href="{{ url(config('laraadmin.adminRoute') . '/verifies/' . $user_p->id . '/edit')}}" class="btn btn-info btn-sm">Verify</a>
                    <?php } ?>
                </td>

            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

@la_access("Verifies", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Verify</h4>
            </div>
            {!! Form::open(['action' => 'LA\VerifiesController@store', 'id' => 'verify-add-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    @la_form($module)

                    {{--
					@la_input($module, 'is_verified')
					@la_input($module, 'tenant_id')
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

});
</script>
@endpush