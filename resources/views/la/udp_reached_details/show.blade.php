@extends('la.layouts.app')

@section('htmlheader_title')
	UDP Reached Detail View
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
					<h4 class="name">{{ $udp_reached_detail->$view_col }}</h4>
					<p class="desc">&nbsp;</p>
				</div>
			</div>
		</div>
		<div class="col-md-7">
		</div>
		<div class="col-md-1 actions">
			@la_access("UDP_Reached_Details", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/udp_reached_details/'.$udp_reached_detail->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("UDP_Reached_Details", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.udp_reached_details.destroy', $udp_reached_detail->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/udp_reached_details') }}" data-toggle="tooltip" data-placement="right" title="Back to UDP Reached Details"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'age')
						@la_display($module, 'total_count')
						@la_display($module, 'Gender')
						@la_display($module, 'udp_detail_id')
						@la_display($module, 'udp_disaggregation_id')
						@la_display($module, 'uploadudp_id')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
