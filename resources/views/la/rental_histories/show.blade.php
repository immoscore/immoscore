@extends('la.layouts.app')

@section('htmlheader_title')
	Rental History View
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
					<h4 class="name">{{ $rental_history->$view_col }}</h4>
					<p class="desc">&nbsp;</p>
				</div>
			</div>
		</div>
		<div class="col-md-7">
		</div>
		<div class="col-md-1 actions">
			@la_access("Rental_Histories", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/rental_histories/'.$rental_history->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("Rental_Histories", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.rental_histories.destroy', $rental_history->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/rental_histories') }}" data-toggle="tooltip" data-placement="right" title="Back to Rental Histories"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'owner_name')
						@la_display($module, 'email')
						@la_display($module, 'address')
						@la_display($module, 'city')
						@la_display($module, 'country')
						@la_display($module, 'rental_type')
						@la_display($module, 'housing_type')
						@la_display($module, 'area')
						@la_display($module, 'rent')
						@la_display($module, 'start_date')
						@la_display($module, 'end_date')
						@la_display($module, 'user_id')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
