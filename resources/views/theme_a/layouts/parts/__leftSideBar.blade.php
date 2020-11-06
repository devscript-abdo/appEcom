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
            <li class="{{request()->routeIs('admin.moderators') ? 'active':''}}"><a href="{{route('admin.moderators')}}"><i class="fa fa-user"></i><span>{{__('adminNav.admin.moderators')}}</span></a></li>                      
            <li class="{{request()->routeIs('admin.todos') ? 'active':''}}"><a href="{{route('admin.todos')}}"><i class="fa fa-check-square-o"></i><span>{{__('adminNav.admin.todos')}}</span></a></li>

            <li><a href="project-list.html"><i class="fa fa-list-ol"></i><span>Project list</span></a></li>
            <li><a href="project-taskboard.html"><i class="fa fa-calendar-check-o"></i><span>Taskboard</span></a></li>
            <li><a href="project-ticket.html"><i class="fa fa-list-ul"></i><span>Ticket List</span></a></li>
            <li><a href="project-ticket-details.html"><i class="icon-tag"></i><span>Ticket Details</span></a></li>

            <li class="g_heading">App</li>
            <li><a href="app-calendar.html"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
            <li><a href="app-chat.html"><i class="fa fa-comments"></i><span>Chat</span></a></li>
            <li><a href="app-contact.html"><i class="fa fa-address-book"></i><span>Contact</span></a></li>
            <li><a href="app-filemanager.html"><i class="fa fa-folder"></i><span>FileManager</span></a></li>
            <li><a href="app-setting.html"><i class="fa fa-gear"></i><span>Setting</span></a></li>
            <li><a href="page-gallery.html"><i class="fa fa-photo"></i><span>Gallery</span></a></li>
            <li>
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-lock"></i><span>Authentication</span></a>
                <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="forgot-password.html">Forgot password</a></li>
                    <li><a href="404.html">404 error</a></li>
                    <li><a href="500.html">500 error</a></li>   
                </ul>
            </li>
            <li class="g_heading">Support</li>
            <li><a href="javascript:void(0)"><i class="fa fa-support"></i><span>Need Help?</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-tag"></i><span>ContactUs</span></a></li>
        </ul>
    </nav>        
</div>
<!----powered by Elmarzougui Abdelghafour at HaymacProduction----->