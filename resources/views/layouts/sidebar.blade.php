<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text text-white mx-3">Pelindo</div>
    </a>

    <hr class="sidebar-divider my-0">
@if(Auth::check())
    @foreach ($menus as $menu)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{$menu->data_target}}"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw {{$menu->icon}}"></i>
            <span>{{$menu->nama_menu}}</span>
        </a>
        <div id="{{$menu->data_parent}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach ($submenus->where('parent_id', $menu->id) as $submenu)
                    <a class="collapse-item" href="{{$submenu->url_submenu}}">{{$submenu->nama_submenu}}</a>
                    @endforeach
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">
    @endforeach
@endif

    <div class="text-center mt-4 d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>