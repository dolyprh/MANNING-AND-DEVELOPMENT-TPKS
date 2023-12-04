<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text text-white mx-3">Pelindo</div>
    </a>

    <hr class="sidebar-divider my-0">

    @if (auth()->user()->role == 'admin')
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
                    <a class="collapse-item" href="{{$submenu->url_submenu}}">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        {{$submenu->nama_submenu}}
                    </a>
                @endforeach
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">
    @endforeach
    @endif

    @if (auth()->user()->role == 'superintendent')
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <li
        class="nav-item {{ request()->is('perencanaan') | request()->is('surat-perintah-kerja') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuperadmin"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Approval</span>
        </a>
        <div id="collapseSuperadmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('perencanaan') ? 'active' : '' }}"
                    href="/perencanaan">
                    <i class="fas fa-fw fa-square fa-xs"></i>
                    <span>Perencanaan</span>
                </a>
                <a class="collapse-item {{ request()->is('surat-perintah-kerja') ? 'active' : '' }}"
                    href="/surat-perintah-kerja">
                    <i class="fas fa-fw fa-square fa-xs"></i>
                    <span>Surat Perintah Kerja</span>
                </a>
            </div>
        </div>
    </li>
    @endif

    <div class="text-center mt-4 d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>