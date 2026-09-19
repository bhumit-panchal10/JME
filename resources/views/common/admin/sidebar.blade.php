<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">

                @auth
                    @if (Auth::user()->role_id == 1)
                        <li class="menu-title"><span data-key="t-menu"></span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link @if (request()->routeIs('home')) {{ 'active' }} @endif"
                                href="{{ route('home') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarMore" data-bs-toggle="collapse" role="button"
                                aria-expanded="true" aria-controls="sidebarMore">
                                <i class="ri-database-2-line"></i> Master Entry </a>
                            <div class="menu-dropdown collapse show" id="sidebarMore" style="">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">

                                        <a href="{{ route('admin.categories.index') }}"
                                            class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">

                                            <i class="nav-icon fas fa-list"></i>

                                            Categories

                                        </a>

                                    </li>
                                    <li class="nav-item">

                                        <a href="{{ route('admin.services.index') }}"
                                            class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">

                                            <i class="nav-icon fas fa-concierge-bell"></i>

                                            Services

                                        </a>

                                    </li>
                                    <li class="nav-item">

                                        <a href="{{ route('admin.photo-gallery.index') }}"
                                            class="nav-link {{ request()->is('admin/photo-gallery*') ? 'active' : '' }}">

                                            <i class="nav-icon fas fa-images"></i>

                                            Photo Gallery

                                        </a>

                                    </li>
                                    <li class="nav-item">

                                        <a href="{{ route('admin.video-gallery.index') }}"
                                            class="nav-link {{ request()->is('admin/video-gallery*') ? 'active' : '' }}">

                                            <i class="nav-icon fas fa-video"></i>


                                            Video Gallery


                                        </a>

                                    </li>
                                    <li class="nav-item">

                                        <a href="{{ route('admin.blogs.index') }}"
                                            class="nav-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">

                                            <i class="nav-icon fas fa-blog"></i>

                                            Blogs

                                        </a>

                                    </li>

                                    {{-- <li class="nav-item">
                                        <a class="nav-link menu-link @if (request()->routeIs('testimonial.index')) {{ 'active' }} @endif"
                                            href="{{ route('metaData.index') }}">
                                            <i class="fa-solid fa-clipboard-list"></i>
                                            <span data-key="t-dashboards">Meta Data</span>
                                        </a>
                                    </li> --}}

                                    <li class="nav-item">

                                        <a href="{{ route('admin.faqs.index') }}"
                                            class="nav-link {{ request()->is('admin/faqs*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-question-circle"></i>
                                            FAQs
                                        </a>

                                    </li>
                                    <li class="nav-item">

                                        <a href="{{ route('admin.our-clients.index') }}"
                                            class="nav-link {{ request()->is('admin/our-clients*') ? 'active' : '' }}">

                                            <i class="nav-icon fas fa-users"></i>


                                            Our Clients


                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="" data-bs-toggle="collapse" role="button" aria-expanded="true"
                                aria-controls="sidebarMore">
                                <i class="fa-solid fa-circle-question"></i> Inquiry </a>
                            <div class="menu-dropdown collapse show" id="sidebarMore" style="">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link menu-link @if (request()->routeIs('inquiry.pending_inquirylist')) {{ 'active' }} @endif"
                                            href="{{ route('inquiry.pending_inquirylist') }}">
                                            <i class="fa-regular fa-clock"></i>
                                            <span data-key="t-dashboards">Pending Inquiry</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-link @if (request()->routeIs('inquiry.schedule_reschedule_inquirylist')) {{ 'active' }} @endif"
                                            href="{{ route('inquiry.schedule_reschedule_inquirylist') }}">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            <span data-key="t-dashboards">Schedule Inquiry</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-link @if (request()->routeIs('inquiry.cancel_list')) {{ 'active' }} @endif"
                                            href="{{ route('inquiry.cancel_list') }}">
                                            <i class="fa-solid fa-xmark"></i> <span data-key="t-dashboards">Cancel
                                                Inquiry</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-link @if (request()->routeIs('inquiry.cancel_list')) {{ 'active' }} @endif"
                                            href="{{ route('inquiry.dealdone_list') }}">
                                            <i class="fa-solid fa-circle-check"></i> <span data-key="t-dashboards">Deal Done
                                                Inquiry</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}


                        <li class="nav-item">
                            <a class="nav-link menu-link @if (request()->routeIs('metaData.index')) {{ 'active' }} @endif"
                                href="{{ route('metaData.index') }}">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <span data-key="t-dashboards">Seo</span>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link @if (request()->routeIs('cms.index')) {{ 'active' }} @endif"
                                href="{{ route('cms.index') }}">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <span data-key="t-dashboards">Cms</span>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link menu-link @if (request()->routeIs('Inquiry')) {{ 'active' }} @endif"
                                href="{{ route('Inquiry') }}">
                                <i class="fa-solid fa-circle-question"></i>
                                <span data-key="t-dashboards">Contac Us Inquiry</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link menu-link @if (request()->routeIs('order.userpending')) {{ 'active' }} @endif"
                                href="{{ route('order.userpending') }}">
                                <i class="ri-briefcase-2-line"></i>
                                <span data-key="t-dashboards">Order</span>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
