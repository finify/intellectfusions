<!-- Header -->

<div id="header"
    class="mdk-header js-mdk-header m-0"
    data-fixed>
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-dark  bg-darker pr-0"
            id="navbar"
            data-primary>
            <div class="container-fluid p-0">

                <!-- Navbar toggler -->

                <button class="navbar-toggler navbar-toggler-right d-block d-lg-none"
                        type="button"
                        data-toggle="sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Brand -->
                <a href="/user/dashboard"
                class="navbar-brand ">

                    <img src="{{ env('APP_LOGO_WHITE') }}" width="150px" alt=""/>
                </a>

                <!-- <form class="search-form d-none d-sm-flex flex"
                    action="index.html">
                    <button class="btn"
                            type="submit"><i class="material-icons">search</i></button>
                    <input type="text"
                        class="form-control"
                        placeholder="Search">
                </form> -->

                <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a href="#notifications_menu"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                        data-caret="false">
                            <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                        </a>
                        <div id="notifications_menu"
                            class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                            <div class="dropdown-item d-flex align-items-center py-2">
                                <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                <a href="javascript:void(0)"
                                class="text-muted"><small>Clear all</small></a>
                            </div>
                            <div class="navbar-notifications-menu__content"
                                data-perfect-scrollbar>
                                <div class="py-2">

                                    @forelse ($notifications as $notification)
                                        <div class="dropdown-item d-flex">
                                            <div class="mr-3">
                                                <a href="#">
                                                    <div class="avatar avatar-xs"
                                                        style="width: 32px; height: 32px;">
                                                        <span class="avatar-title rounded-circle"> <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="flex">
                                                <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                <div>{{ $notification['text']}}</div>
                                                <small class="text-muted">{{ $notification['created_at']}}</small>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="alert alert-danger" role="alert"> No notifications yet</div>
                                    @endforelse


                                </div>
                            </div>
                            <a href="/user/notification"
                            class="dropdown-item text-center navbar-notifications-menu__footer">View All</a>
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                    <li class="nav-item dropdown">
                        <a href="#account_menu"
                        class="nav-link dropdown-toggle"
                        data-toggle="dropdown"
                        data-caret="false">
                            <span class="mr-1 d-flex-inline">
                                <span class="text-light">{{ $user['name'] }}</span>
                            </span>
                            <img src="/dashassets/images/avatar/profileavatar.jpeg "
                                class="rounded-circle"
                                width="32"
                                alt="Frontted">
                        </a>
                        <div id="account_menu"
                            class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item-text dropdown-item-text--lh">
                                <div><strong>Adrian Demian</strong></div>
                                <div class="text-muted">@adriandemian</div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item active"
                            href="/user/dashboard"><i class="material-icons">dvr</i> Dashboard</a>
                            
                            <a class="dropdown-item"
                            href="/user/settings"><i class="material-icons">edit</i> Edit account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                            href="{{ url('user/logout')}}"><i class="material-icons">exit_to_app</i> Logout</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>

<!-- // END Header -->