<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Ohmysel <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">

            <li class="g_heading">Project</li>
            <li class="{{request()->routeIs('delivery.dash') ? 'active':''}}"><a href="{{route('delivery.dash')}}"><i class="fa fa-dashboard"></i><span>{{__('adminNav.admin.dash')}}</span></a></li>
            <li class="{{request()->routeIs('delivery.commands') ? 'active':''}}"><a href="{{route('delivery.commands')}}"><i class="fa fa-list-alt"></i><span>{{__('adminNav.admin.commands')}}</span></a></li>

            <li class="g_heading">App</li>

            <li class="g_heading">Support</li>
            <li><a href="javascript:void(0)"><i class="fa fa-support"></i><span>Need Help?</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-tag"></i><span>ContactUs</span></a></li>
        </ul>
    </nav>
</div>
<!----powered by Elmarzougui Abdelghafour at HaymacProduction----->
