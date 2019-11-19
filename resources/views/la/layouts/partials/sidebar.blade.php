<!-- Left side column. contains the logo and sidebar -->
<?php $user = Auth::user(); ?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="javascript:void(0);">(<?php if($user->role_id==10) echo "Tenant";elseif($user->role_id==11) echo "Landlord"; else echo "Admin";?>)</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        @if(LAConfigs::getByKey('sidebar_search'))
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
	                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        @endif
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MODULES</li>
            <!-- Optionally, you can add icons to the links -->
            <?php if($user->role_id == "1") { ?>
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}"><i class='fa fa-home'></i> <span>Dashboard</span></a></li>
            <?php } ?>
            <?php
            $menuItems = Dwij\Laraadmin\Models\Menu::where("parent", 0)->orderBy('hierarchy', 'asc')->get();
            ?>
            @foreach ($menuItems as $menu)
                @if($menu->type == "module")
                    <?php
                    $temp_module_obj = Module::get($menu->name);
                    ?>
                    @la_access($temp_module_obj->id)
                        @if(isset($module->id) && $module->name == $menu->name)
                        	<?php echo LAHelper::print_menu($menu ,true); ?>
                        @else
                                <?php echo LAHelper::print_menu($menu); ?>
                        @endif
                    @endla_access
                @else
                    <?php // echo LAHelper::print_menu($menu);
                    $childrens = \Dwij\Laraadmin\Models\Menu::where("parent", $menu->id)->orderBy('hierarchy', 'asc')->get();

                    $treeview = "";
                    $subviewSign = "";
                    if(count($childrens)) {
                            $treeview = " class=\"treeview\"";
                            $subviewSign = '<i class="fa fa-angle-left pull-right"></i>';
                    }
                    $active_str = '';

                    $str = '<li'.$treeview.' '.$active_str.'><a href="'.url(config("laraadmin.adminRoute") . '/' . $menu->url ) .'"><i class="fa '.$menu->icon.'"></i> <span>'.LAHelper::real_module_name($menu->name).'</span> '.$subviewSign.'</a>';
                    $str_final = '';
                    $has_menu = 0;

                    if(count($childrens)) {
                        $str .= '<ul class="treeview-menu">';
                        foreach($childrens as $children) {
                            $temp_module_obj = Module::get($children->name);
//                            $url = $children->url;
//                            $temp_module_obj = DB::table('modules')->where('name_db', $children->url)->first();

                            if(isset($temp_module_obj->id)){
                                 ?>
                                    @la_access($temp_module_obj->id)
                                        @if(isset($module->id) && $module->name == $children->name)
                                                <?php $has_menu++; $str .= LAHelper::print_menu($children, true); ?>
                                        @else
                                                <?php $has_menu++; $str .= LAHelper::print_menu($children); ?>
                                        @endif
                                    @endla_access
                                <?php
                            }
                        }
                        $str .= '</ul>';
                    }else{
                        $has_menu = 1;
                    }
                    $str .= '</li>';

                    if($has_menu){
                        $str_final = $str;
                    }

                    echo $str_final;

                    ?>
                @endif
            @endforeach
            <!-- LAMenus -->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
