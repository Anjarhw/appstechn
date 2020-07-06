<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard"><i class="lnr lnr-home"></i> <span>DASHBOARD</span></a></li>
                @if(auth()->user()->role == 'admin')
                <li><a href="/employees" class=""><i class="lnr lnr-user"></i> <span>PEGAWAI</span></a></li>
                <li><a href="/tasks" class=""><i class="lnr lnr-pencil"></i> <span>TUGAS</span></a></li>
                <!-- <li><a href="/setuser" class=""><i class="lnr lnr-pencil"></i> <span>Setting</span></a></li> -->
                @else
                <li><a href="/mytasks" class=""><i class="lnr lnr-pencil"></i> <span>TUGAS SAYA</span></a></li>
                @endif
                <li><a href="/logout" class=""><i class="fa fa-sign-out"></i> <span>LOGOUT</span></a></li>
                <!-- <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                                <ul class="nav">
                                    <li><a href="page-profile.html" class="">Profile</a></li>
                                    <li><a href="page-login.html" class="">Login</a></li>
                                    <li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
                                </ul>
                            </div>
                        </li> -->
            </ul>
        </nav>
    </div>
</div>