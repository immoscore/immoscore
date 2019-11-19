<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        @if(LAConfigs::getByKey('show_messages'))
        <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                        <li><!-- start message -->
                            <a href="#">
                                <div class="pull-left">
                                    <!-- User Image -->
                                    <img src="@if(isset(Auth::user()->email)) {{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email) }} @else asset('/img/user2-160x160.jpg' @endif" class="img-circle" alt="User Image"/>
                                </div>
                                <!-- Message title and timestamp -->
                                <h4>
                                    Support Team
                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                </h4>
                                <!-- The message -->
                                <p>Why not buy a new awesome theme?</p>
                            </a>
                        </li><!-- end message -->
                    </ul><!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
        </li><!-- /.messages-menu -->
        @endif

        @if(LAConfigs::getByKey('show_notifications'))
        <?php
        $userInfo = DB::table('users')->where("id", Auth::id())->first(); //Employee::find(Auth::id())->first();
        $reporting_level = $userInfo->reporting_level_id + 1;
        $location_approve = '';
        $location_reject = '';
        if ($userInfo->reporting_level_id == "1") {
            $location_approve = "select id from regions where country_id=$userInfo->country_id && deleted_at IS NULL";
            $location_reject = "select id from countries where id=$userInfo->country_id && deleted_at IS NULL";
        } else if ($userInfo->reporting_level_id == "2") {
            $location_approve = "select id from woredas where region_id=$userInfo->region_id && deleted_at IS NULL";
            $location_reject = "select id from regions where id=$userInfo->region_id && deleted_at IS NULL";
        } else if ($userInfo->reporting_level_id == "3") {
            $location_approve = "select id from kebeles where woreda_id=$userInfo->woreda_id && deleted_at IS NULL";
            $location_reject = "select id from woredas where id=$userInfo->woreda_id && deleted_at IS NULL";
        } else if ($userInfo->reporting_level_id == "4") {
            $location_reject = "select id from kebeles where id=$userInfo->kebele_id && deleted_at IS NULL";
        }

//        $indicators = DB::select("SELECT * FROM `indicators` as i1 join ind_disaggre_comb_values as ival ON i1.id=ival.indicator_id WHERE ((reporting_level_id=$reporting_level && rollupAggregate='Manual') || (reporting_level_id=$reporting_level && rollupAggregate='Automatic')) && entry_type_id='1' && status='pending' && deleted_at IS NULL");
        $waiting_for_approve = array();
        $waiting_for_approve_tasks = array();
        $rejected_indicator = array();
        $total_notification = 0;
        if ($location_approve != '') {
//            echo "select sum(total) as waiting_for_approve from (SELECT ival.indicator_id,ival.location_id,count(distinct(concat(ival.indicator_id,ival.location_id))) as total FROM `indicators` as i1 join ind_disaggre_comb_values as ival ON i1.id=ival.indicator_id where i1.deleted_at IS NULL && ival.status='draft' && entry_type_id!='2' && ival.reporting_level_type=$reporting_level && ival.location_id IN($location_approve)  group by ival.indicator_id,ival.location_id) as new_tab";
            $waiting_for_approve = DB::select("select sum(total) as waiting_for_approve "
                    . " from (SELECT ival.indicator_id,ival.location_id,count(distinct(concat(ival.indicator_id,ival.location_id))) as total "
                    . " FROM `indicators` as i1 "
                    . " join ind_disaggre_comb_values as ival ON i1.id=ival.indicator_id "
                    . " where i1.deleted_at IS NULL && ival.status='draft' && entry_type_id!='2' "
                    . " && ival.reporting_level_type=$reporting_level && ival.location_id IN($location_approve) "
                    . " group by ival.indicator_id,ival.location_id,ival.period_id) as new_tab");
            
            
            $waiting_for_approve_tasks = DB::select("select sum(total) as tasks_waiting_for_approve "
                    . " from (SELECT te1.task_schedule_id,te1.location_id,count(distinct(concat(te1.reporting_level_id,te1.location_id,t1.id))) as total "
                    . " FROM `tasks` as t1 "
                    . " join task_schedules as ts1 ON t1.id=ts1.task_id "
                    . " join task_entries as te1 ON ts1.id=te1.task_schedule_id "
                    . " where (te1.reporting_level_id=$reporting_level && te1.location_id IN($location_approve)) "
                    . " && t1.deleted_at IS NULL  && te1.approved_status='draft'"
                    . " group by te1.reporting_level_id,te1.location_id,t1.id) as new_tab");
           
            
        }
        if ($location_reject != '') {
            $rejected_indicator = DB::select("SELECT count(distinct(i1.id)) as rejected FROM `indicators` as i1 "
                    . " join ind_disaggre_comb_values as ival ON i1.id=ival.indicator_id "
                    . " where i1.deleted_at IS NULL && ival.status='reject'  && entry_type_id!='2' "
                    . " && ival.reporting_level_type=$userInfo->reporting_level_id "
                    . " && ival.location_id IN($location_reject)");
            
            $rejected_tasks = DB::select("select sum(total) as tasks_rejected "
                    . " from (SELECT te1.task_schedule_id,te1.location_id,count(distinct(concat(te1.task_schedule_id,te1.location_id))) as total "
                    . " FROM `tasks` as t1 "
                    . " join task_schedules as ts1 ON t1.id=ts1.task_id "
                    . " join task_entries as te1 ON ts1.id=te1.task_schedule_id "
                    . " where (te1.reporting_level_id=$userInfo->reporting_level_id && te1.location_id IN($location_reject)) "
                    . " && t1.deleted_at IS NULL  && te1.approved_status='reject'"
                    . " group by te1.reporting_level_id,te1.location_id) as new_tab");
//            $rejected_calc_from_data = DB::select("SELECT count(distinct(i1.id)) as rejected FROM `indicators` as i1 join ind_disaggre_comb_values as ival ON i1.id=ival.indicator_id where i1.deleted_at IS NULL && entry_type_id='3' && ival.status='reject' && ival.reporting_level_type=$userInfo->reporting_level_id && ival.location_id IN($location_reject)");
        }
        
        if (isset($waiting_for_approve[0]->waiting_for_approve))
            $total_notification += $waiting_for_approve[0]->waiting_for_approve;
        if (isset($waiting_for_approve_tasks[0]->tasks_waiting_for_approve))
            $total_notification += $waiting_for_approve_tasks[0]->tasks_waiting_for_approve;
        if (isset($rejected_indicator[0]->rejected))
            $total_notification += $rejected_indicator[0]->rejected;
        if (isset($rejected_tasks[0]->tasks_rejected))
            $total_notification += $rejected_tasks[0]->tasks_rejected;
//        if (isset($rejected_direct_entry[0]->rejected))
//            $total_notification += $rejected_direct_entry[0]->rejected;
//        if (isset($rejected_calc_from_data[0]->rejected))
//            $total_notification += $rejected_calc_from_data[0]->rejected;
//        SELECT * FROM `indicators` as i1 join ind_disaggre_comb_values as ival ON i1.id=ival.indicator_id where i1.deleted_at IS NULL group by ival.indicator_id having count(1) = (select count(1) from indicators_groups join indicators on indicators.id=indicators_groups.indicator_id)
//        dd($indicators);
//                                if($userInfo->reporting_level_id=="4") {
//                                    
//                                }
//                                dd($userInfo);
        ?>
        <!-- Notifications Menu -->
        <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">{{$total_notification}}</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have {{$total_notification}} notifications</li>
                <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                        <?php if (isset($waiting_for_approve[0]->waiting_for_approve) && $waiting_for_approve[0]->waiting_for_approve > 0) { ?>
                            <li><!-- start notification -->
                                <a href="{{ url(config('laraadmin.adminRoute') . '/indicator_approves') }}" >
                                    <i class="fa fa-users text-aqua"></i> {{ $waiting_for_approve[0]->waiting_for_approve }} Indicator(s) waiting for approval
                                </a>
                            </li><!-- end notification -->
                        <?php } if (isset($rejected_indicator[0]->rejected) && $rejected_indicator[0]->rejected > 0) { ?>
                            <li><!-- start notification -->
                                <?php
                                $rejected_indicator_first = DB::select("SELECT i1.entry_type_id FROM `indicators` as i1 join ind_disaggre_comb_values as ival ON i1.id=ival.indicator_id where i1.deleted_at IS NULL && ival.status='reject'  && entry_type_id!='2' && ival.reporting_level_type=$userInfo->reporting_level_id && ival.location_id IN($location_reject) limit 1");

                                if (isset($rejected_indicator_first[0]->entry_type_id) && $rejected_indicator_first[0]->entry_type_id == "3") {
                                    ?>
                                    <a href="{{ url(config('laraadmin.adminRoute') . '/indicator_entries') }}" >
                                        <i class="fa fa-users text-aqua"></i> {{$rejected_indicator[0]->rejected}} Indicator(s) rejected
                                    </a>
                                <?php } else if (isset($rejected_indicator_first[0]->entry_type_id) && $rejected_indicator_first[0]->entry_type_id == "1") { ?>
                                    <a href="{{ url(config('laraadmin.adminRoute') . '/calculate_from_datas') }}" >
                                        <i class="fa fa-users text-aqua"></i> {{$rejected_indicator[0]->rejected}} Indicator(s) rejected
                                    </a>
                                <?php }
                                ?>
                            </li><!-- end notification -->
                            <?php
                        } if (isset($waiting_for_approve_tasks[0]->tasks_waiting_for_approve) && $waiting_for_approve_tasks[0]->tasks_waiting_for_approve > 0) { ?>
                            <li><!-- start notification -->
                                <a href="{{ url(config('laraadmin.adminRoute') . '/task_approves') }}" >
                                    <i class="fa fa-users text-aqua"></i> {{ $waiting_for_approve_tasks[0]->tasks_waiting_for_approve }} Task(s) waiting for approval
                                </a>
                            </li><!-- end notification -->
                            <?php
                        } if (isset($rejected_tasks[0]->tasks_rejected) && $rejected_tasks[0]->tasks_rejected > 0) { ?>
                            <li><!-- start notification -->
                                <a href="{{ url(config('laraadmin.adminRoute') . '/task_entries') }}" >
                                    <i class="fa fa-users text-aqua"></i> {{ $rejected_tasks[0]->tasks_rejected }} Task(s) rejected
                                </a>
                            </li><!-- end notification -->
                        <?php }
                        /* if (isset($rejected_direct_entry[0]->rejected) && $rejected_direct_entry[0]->rejected>0) { ?>
                          <li><!-- start notification -->
                          <a href="#" >
                          <i class="fa fa-users text-aqua"></i> ({{$rejected_direct_entry[0]->rejected}}) Direct Entry Indicator Rejected
                          </a>
                          </li><!-- end notification -->
                          <?php } if (isset($rejected_calc_from_data[0]->rejected) && $rejected_calc_from_data[0]->rejected>0) { ?>
                          <li><!-- start notification -->
                          <a href="#" >
                          <i class="fa fa-users text-aqua"></i> ({{$rejected_calc_from_data[0]->rejected}}) Calculate from Data Rejected
                          </a>
                          </li><!-- end notification -->
                          <?php } */
                        ?>
                    </ul>
                </li>
                <!--<li class="footer"><a href="#">View all</a></li>-->
            </ul>
        </li>
        @endif
        @if(LAConfigs::getByKey('show_tasks'))
        <!-- Tasks Menu -->
        <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                        <li><!-- Task item -->
                            <a href="#">
                                <!-- Task title and progress text -->
                                <h3>
                                    Design some buttons
                                    <small class="pull-right">20%</small>
                                </h3>
                                <!-- The progress bar -->
                                <div class="progress xs">
                                    <!-- Change the css width attribute to simulate progress -->
                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li><!-- end task item -->
                    </ul>
                </li>
                <li class="footer">
                    <a href="#">View all tasks</a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
        @else
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email) }}" class="user-image" alt="User Image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="{{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                    <p>
                        {{ Auth::user()->name }}
                        <?php
                        $datec = Auth::user()['created_at'];
                        ?>
                        <small>Member since <?php echo date("M. Y", strtotime($datec)); ?></small>
                    </p>
                </li>
                <!-- Menu Body -->
                @role("SUPER_ADMIN")
                <li class="user-body">
                    <div class="col-xs-6 text-center mb10">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/lacodeeditor') }}"><i class="fa fa-code"></i> <span>Editor</span></a>
                    </div>
                    <div class="col-xs-6 text-center mb10">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/modules') }}"><i class="fa fa-cubes"></i> <span>Modules</span></a>
                    </div>
                    <div class="col-xs-6 text-center mb10">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/la_menus') }}"><i class="fa fa-bars"></i> <span>Menus</span></a>
                    </div>
                    <div class="col-xs-6 text-center mb10">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/la_configs') }}"><i class="fa fa-cogs"></i> <span>Configure</span></a>
                    </div>
                    <div class="col-xs-6 text-center">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/backups') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a>
                    </div>
                </li>
                @endrole
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/profiles/') .'/'. Auth::user()->id }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li>
        @endif
        @if(LAConfigs::getByKey('show_rightsidebar'))
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-comments-o"></i> <span class="label label-warning">10</span></a>

        </li>
        @endif
    </ul>
</div>