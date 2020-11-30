<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Ohmysel <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">

            <li class="g_heading">Project</li>
            <li class="{{request()->routeIs('admin.dash') ? 'active':''}}"><a href="{{route('admin.dash')}}"><i class="fa fa-dashboard"></i><span>{{__('adminNav.admin.dash')}}</span></a></li>
            <li class="{{request()->routeIs('admin.admins') ? 'active':''}}"><a href="{{route('admin.admins')}}"><i class="fa fa-user"></i><span>{{__('adminNav.admin.admins')}}</span></a></li>
            <li class="{{request()->routeIs('admin.roles') ? 'active':''}}"><a href="{{route('admin.roles')}}"><i class="fa fa-lock"></i><span>{{__('adminNav.admin.roles')}}</span></a></li>
            <li class="{{request()->routeIs('admin.cities') ? 'active':''}}"><a href="{{route('admin.cities')}}"><i class="fa fa-list-ul"></i><span>{{__('adminNav.admin.cities')}}</span></a></li>
            <li class="{{request()->routeIs('admin.groups') ? 'active':''}}"><a href="{{route('admin.groups')}}"><i class="fa fa-folder"></i><span>{{__('adminNav.admin.groups')}}</span></a></li>
            <li class="{{request()->routeIs('admin.leads') ? 'active':''}}"><a href="{{route('admin.leads')}}"><i class="fa fa-folder"></i><span>{{__('adminNav.admin.leads')}}</span></a></li>
            <li class="{{request()->routeIs('admin.products') ? 'active':''}}"><a href="{{route('admin.products')}}"><i class="fa fa-shopping-bag"></i><span>{{__('adminNav.admin.products')}}</span></a></li>
            <li class="{{request()->routeIs('admin.commands') ? 'active':''}}"><a href="{{route('admin.commands')}}"><i class="fa fa-list-ul"></i><span>{{__('adminNav.admin.commands')}}</span></a></li>

            <li class="{{request()->routeIs('admin.moderators') ? 'active':''}}"><a href="{{route('admin.moderators')}}"><i class="fa fa-user"></i><span>{{__('adminNav.admin.moderators')}}</span></a></li>
            <li class="{{request()->routeIs('admin.deliveries') ? 'active':''}}"><a href="{{route('admin.deliveries')}}"><i class="fa fa-ship"></i><span>{{__('adminNav.admin.deliveries')}}</span></a></li>

            <li class="{{request()->routeIs('admin.todos') ? 'active':''}}"><a href="{{route('admin.todos')}}"><i class="fa fa-check-square-o"></i><span>{{__('adminNav.admin.todos')}}</span></a></li>
            <li class="{{request()->routeIs('admin.settings') ? 'active':''}}"><a href="{{route('admin.settings')}}"><i class="fa fa-gear"></i><span>{{__('adminNav.admin.settings')}}</span></a></li>

            <li class="g_heading">App</li>


            <li class="g_heading">Support</li>
            <li><a href="javascript:void(0)"><i class="fa fa-support"></i><span>Need Help?</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-tag"></i><span>ContactUs</span></a></li>
        </ul>
    </nav>
</div>
<!----powered by Elmarzougui Abdelghafour at HaymacProduction----->
