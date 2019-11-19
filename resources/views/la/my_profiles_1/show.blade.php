@extends('la.layouts.app')

@section('htmlheader_title')
	My Profile View
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
					<h4 class="name">{{ $my_profile->$view_col }}</h4>
					<p class="desc">&nbsp;</p>
				</div>
			</div>
		</div>
		<div class="col-md-7">
		</div>
		<div class="col-md-1 actions">
			@la_access("My_Profiles", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/my_profiles/'.$my_profile->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("My_Profiles", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.my_profiles.destroy', $my_profile->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/my_profiles') }}" data-toggle="tooltip" data-placement="right" title="Back to My Profiles"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">
					<div class="panel-default panel-heading">
						<h4>General Info</h4>
					</div>
					<div class="panel-body">
						@la_display($module, 'use_immoscore_guarantee')
						@la_display($module, 'name_of_employer')
						@la_display($module, 'business')
						@la_display($module, 'phone_number')
						@la_display($module, 'contact_person_id')
						@la_display($module, 'email_address')
						@la_display($module, 'contract_type')
						@la_display($module, 'salary')
						@la_display($module, 'start_date')
						@la_display($module, 'end_date')
						@la_display($module, 'current_address')
						@la_display($module, 'area')
						@la_display($module, 'monthly_rent')
						@la_display($module, 'guarantor')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
