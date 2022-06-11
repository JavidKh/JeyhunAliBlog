<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/images/ASI-whitelogo.png" alt="Jeyhun Ali" class="brand-image"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Jeyhun Ali</span>
        <br/>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("home") }}">
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("slider")}}"
                       class="nav-link {{ request()->is("admin/slider") || request()->is("admin/slider/*") ? "active" : "" }}">
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("about_me")}}"
                       class="nav-link {{ request()->is("admin/about-me") || request()->is("admin/about-me/*") ? "active" : "" }}">
                        <p>
                            About Me
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("work_history")}}"
                       class="nav-link {{ request()->is("admin/work-history") || request()->is("admin/work-history/*") ? "active" : "" }}">
                        <p>
                            Work History
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("events")}}"
                       class="nav-link {{ request()->is("admin/events") || request()->is("admin/events/*") ? "active" : "" }}">
                        <p>
                            Events
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("offers")}}"
                       class="nav-link {{ request()->is("admin/offers") || request()->is("admin/offers/*") ? "active" : "" }}">
                        <p>
                            Offers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("gallery")}}"
                       class="nav-link {{ request()->is("admin/gallery") || request()->is("admin/gallery/*") ? "active" : "" }}">
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("youtube")}}"
                       class="nav-link {{ request()->is("admin/youtube") || request()->is("admin/youtube/*") ? "active" : "" }}">
                        <p>
                            Youtube
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("instagram")}}"
                       class="nav-link {{ request()->is("admin/instagram") || request()->is("admin/instagram/*") ? "active" : "" }}">
                        <p>
                            Instagram posts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("contact")}}"
                       class="nav-link {{ request()->is("admin/contact") || request()->is("admin/contact/*") ? "active" : "" }}">
                        <p>
                            Contact
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("links")}}"
                       class="nav-link {{ request()->is("admin/links") || request()->is("admin/links/*") ? "active" : "" }}">
                        <p>
                            Links
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                        <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
