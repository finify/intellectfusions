<div class="mdk-drawer  js-mdk-drawer"
    id="default-drawer"
    data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left sidebar-p-t"
            data-perfect-scrollbar>
            <div class="sidebar-heading text-white">Menu</div>
            <div class="sidebar-block p-0 mb-0">
                <ul class="sidebar-menu"
                    id="components_menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                        href="/expert/dashboard">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pie_chart_outlined</i>
                            <span class="sidebar-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                        href="/expert/project">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">aspect_ratio</i>
                            <span class="sidebar-menu-text">Projects</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                            href="/expert/notification">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">notifications</i>
                            <span class="sidebar-menu-text">Notification</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                            href="/expert/payout">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dns</i>
                            <span class="sidebar-menu-text">Pay out</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                            href="{{ url('expert/logout')}}">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">power</i>
                            <span class="sidebar-menu-text">Logout</span>
                        </a>
                    </li>
                    <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                        <a href="#"
                            class="flex d-flex align-items-center text-underline-0 text-body">
                            <span class="avatar avatar-sm mr-2">
                                <img src="@if($expertdetail['profileimage'] == '') /dashassets/images/avatar/profileavatar.jpeg @else {{ asset('storage/profilepicture/' . $expertdetail['profileimage']) }} @endif"
                                        alt="avatar"
                                        class="avatar-img rounded-circle">
                            </span>
                            <span class="flex d-flex flex-column">
                                <strong>{{ $user['name'] }}</strong>
                                <small class="text-muted text-capitalize">{{ $user['email'] }}</small>
                            </span>
                        </a>
                        <div class="dropdown ml-auto">
                            <a href="#"
                                data-toggle="dropdown"
                                data-caret="false"
                                class="text-muted"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active"
                                    href="/expert/dashboard">Dashboard</a>
                                <a class="dropdown-item"
                                    href="/expert/settings/details">Edit account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="{{ url('expert/logout')}}">Logout</a>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>