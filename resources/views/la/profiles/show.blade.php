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
                    <div class="profile-icon text-primary"><i class="fa {{ $module->fa_icon }}"></i></div>
                </div>
                <div class="col-md-9">
                    <h4 class="name">{{ $user->$view_col }}</h4>

                    <p class="desc">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            &nbsp;
        </div>
        
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
        <li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/users') }}" data-toggle="tooltip" data-placement="right" title="Back to Users"><i class="fa fa-chevron-left"></i></a></li>
        @if($user->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
        <li class="active"><a role="tab" data-toggle="tab" href="#tab-info" data-target="#tab-info"><i class="fa fa-key"></i>Change Password</a></li>
        @endif
    </ul>

    <div class="tab-content">
        
        @if($user->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
        <div role="tabpanel" class="tab-pane active fade in" id="tab-info">
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
