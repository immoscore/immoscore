@extends('la.layouts.app')

@section('htmlheader_title')
	Employee View
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
                                    <h4 class="name">{{ $employee->$view_col }}</h4>

                                    <p class="desc">&nbsp;</p>
                            </div>
                    </div>
            </div>

            <div class="col-md-7">

<!--			<div class="dats1 pb">
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
                    @la_access("Employees", "edit")
                            <a href="{{ url(config('laraadmin.adminRoute') . '/employees/'.$employee->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
                    @endla_access

                    @la_access("Employees", "delete")
                            {{ Form::open(['route' => [config('laraadmin.adminRoute') . '.employees.destroy', $employee->id], 'method' => 'delete', 'style'=>'display:inline']) }}
                                    <button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
                            {{ Form::close() }}
                    @endla_access
            </div>
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
            <li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/employees') }}" data-toggle="tooltip" data-placement="right" title="Back to Employees"><i class="fa fa-chevron-left"></i></a></li>
            <li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
            <!--<li class=""><a role="tab" data-toggle="tab" href="#tab-timeline" data-target="#tab-timeline"><i class="fa fa-clock-o"></i> Timeline</a></li>-->
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
                                            @la_display($module, 'designation')
                                            @la_display($module, 'gender')
                                            @la_display($module, 'mobile')
                                            @la_display($module, 'email')
                                            @la_display($module, 'dept')
                                            @la_display($module, 'city')
                                            @la_display($module, 'address')
                                            @la_display($module, 'reporting_level_id')
                                            @la_display($module, 'country_id')
                                            @la_display($module, 'region_id')
                                            @la_display($module, 'woreda_id')
                                            @la_display($module, 'kebele_id')
                                    </div>
                            </div>
                    </div>
            </div>

    </div>
</div>
@endsection