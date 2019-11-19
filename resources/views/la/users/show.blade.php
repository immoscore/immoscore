@extends('la.layouts.app')

@section('htmlheader_title')
User View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
    <div class="bg-primary clearfix">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-3">
                        <!--<img class="profile-image" src="{{ asset('la-assets/img/avatar5.png') }}" alt="">-->
                    <div class="profile-icon text-primary"><i class="fa {{ $module->fa_icon }}"></i></div>
                </div>
                <div class="col-md-9">
                    <h4 class="name">{{ $user->$view_col }}</h4>

                    <p class="desc">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <!--			
                                    <div class="dats1 pb">
                                            <div class="clearfix">
                                                    <span class="pull-left">Task #1</span>
                                                    <small class="pull-right">20%</small>
                                            </div>
                                            <div class="progress progress-xs active">
                                                    <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="dats1 pb">
                                            <div class="clearfix">
                                                    <span class="pull-left">Task #2</span>
                                                    <small class="pull-right">90%</small>
                                            </div>
                                            <div class="progress progress-xs active">
                                                    <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 90%" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">90% Complete</span>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="dats1 pb">
                                            <div class="clearfix">
                                                    <span class="pull-left">Task #3</span>
                                                    <small class="pull-right">60%</small>
                                            </div>
                                            <div class="progress progress-xs active">
                                                    <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 60%" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">60% Complete</span>
                                                    </div>
                                            </div>
                                    </div>-->
        </div>
        <div class="col-md-1 actions">
            @la_access("Users", "edit")
            <a href="{{ url(config('laraadmin.adminRoute') . '/users/'.$user->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
            @endla_access

            @la_access("Users", "delete")
            {{ Form::open(['route' => [config('laraadmin.adminRoute') . '.users.destroy', $user->id], 'method' => 'delete', 'style'=>'display:inline']) }}
            <button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
            {{ Form::close() }}
            @endla_access
        </div>
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
        <li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/users') }}" data-toggle="tooltip" data-placement="right" title="Back to Users"><i class="fa fa-chevron-left"></i></a></li>
        <li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
        @if($user->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
        <li class=""><a role="tab" data-toggle="tab" href="#tab-account-settings" data-target="#tab-account-settings"><i class="fa fa-key"></i> Account settings</a></li>
        @endif
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="tab-info">
            <div class="tab-content">
                <div class="panel infolist">
                    <div class="panel-default panel-heading">
                        <h4>General Info</h4>
                    </div>
                    <div class="panel-body">
                        @la_display($module, 'name')
                        @la_display($module, 'context_id')
                        @la_display($module, 'email')
                        @la_display($module, 'password')
                        @la_display($module, 'type')
                        @la_display($module, 'designation')
                        @la_display($module, 'gender')
                        @la_display($module, 'mobile')
                        @la_display($module, 'dept')
                        @la_display($module, 'city')
                        @la_display($module, 'address')
                        @la_display($module, 'role_id')
                    </div>
                </div>
            </div>
        </div>
        @if($user->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
        <div role="tabpanel" class="tab-pane fade" id="tab-account-settings">
            <div class="tab-content">
                <form action="{{ url(config('laraadmin.adminRoute') . '/change_password/'.$user->id) }}" id="password-reset-form" class="general-form dashed-row white" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <div class="panel">
                        <div class="panel-default panel-heading">
                            <h4>Account settings</h4>
                        </div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(Session::has('success_message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success_message') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="password" class=" col-md-2">Password</label>
                                <div class=" col-md-10">
                                    <input type="password" name="password" value="" id="password" class="form-control" placeholder="Password" autocomplete="off" required="required" data-rule-minlength="6" data-msg-minlength="Please enter at least 6 characters.">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class=" col-md-2">Retype password</label>
                                <div class=" col-md-10">
                                    <input type="password" name="password_confirmation" value="" id="password_confirmation" class="form-control" placeholder="Retype password" autocomplete="off" required="required" data-rule-equalto="#password" data-msg-equalto="Please enter the same value again.">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
	@if($user->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
	$('#password-reset-form').validate({
		
	});
	@endif
});
</script>
@endpush
