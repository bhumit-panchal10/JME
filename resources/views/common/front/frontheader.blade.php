<style>
    .jme-menu > li > a.active {
    color: #59b947;
    font-weight: 700;
}

.jme-menu > li > a.active::before {
    opacity: 1;
    visibility: visible;
}


/* Dropdown active item */
.jme-dropdown li a.active {
    color: #59b947;
    background: rgba(89, 185, 71, 0.08);
}


/* Contact active */
.jme-btn.active {
    background: #59b947;
    color: #fff;
}
</style>
<div class="jme-topbar">

    <div class="jme-container">

        <div class="topbar-inner">


            <!-- LEFT -->

            <div class="topbar-left">


                <!-- EMAIL -->

                <a href="mailto:enquiry@jaymahakalenterprisegroup.com" class="topbar-item">

                    <span class="topbar-icon">
                        ✉
                    </span>

                    <span>
                        enquiry@jaymahakalenterprisegroup.com
                    </span>

                </a>


                <!-- PHONE -->

                <a href="tel:+919714123111" class="topbar-item">

                    <span class="topbar-icon">
                        ☎
                    </span>

                    <span>
                        +91 97141 23111
                    </span>

                </a>

            </div>



            <!-- RIGHT -->

            <div class="topbar-right">

                <span>

                    Engineering

                    •

                    <strong>
                        Procurement
                    </strong>

                    •

                    Construction

                </span>

            </div>


        </div>

    </div>

</div>
<header class="jme-header" id="jmeHeader">

    <div class="jme-container">

        <div class="header-inner">
            <a href="{{route('index')}}" class="jme-logo" aria-label="JME Group Home">

                <img src="{{ asset('front/images/logo.png') }}" alt="Jay Mahakal Enterprise Group Logo">

            </a>
            <button type="button" class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation Menu"
                aria-expanded="false">

                <span></span>

                <span></span>

                <span></span>

            </button>

            <nav class="jme-navigation" id="jmeNavigation">

              <ul class="jme-menu">

        {{-- HOME --}}
        <li>
            <a href="{{ route('index') }}"
                class="{{ request()->routeIs('index') ? 'active' : '' }}">
                Home
            </a>
        </li>


        {{-- ABOUT --}}
        <li>
            <a href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'active' : '' }}">
                About
            </a>
        </li>


        {{-- CATEGORY --}}
        <li class="has-dropdown service-menu">
            <a href="#"
                class="dropdown-toggle
                {{ request()->is('service/*') || request()->routeIs('servicedetail') ? 'active' : '' }}">
            
                <span>Category</span>
                <span class="dropdown-arrow"></span>
            
            </a>

            @php
                $categories = \App\Models\Category::orderBy('id', 'asc')->get();
            @endphp

            <ul class="jme-dropdown service-dropdown">

                @foreach ($categories as $category)
                    <li>
                        <a href="{{ url('service/' . $category->slugname) }}"
                            class="{{ request()->is('service/' . $category->slugname) ? 'active' : '' }}">

                            <span class="service-dropdown-name">
                                {{ $category->name }}
                            </span>

                        </a>
                    </li>
                @endforeach

            </ul>

        </li>


        {{-- GALLERY --}}
        <li class="has-dropdown">

            <a href="#"
                class="dropdown-toggle {{ request()->routeIs('photogallery', 'videogallery') ? 'active' : '' }}">

                <span>Gallery</span>

                <span class="dropdown-arrow"></span>
            </a>

            <ul class="jme-dropdown">

                <li>
                    <a href="{{ route('photogallery') }}"
                        class="{{ request()->routeIs('photogallery') ? 'active' : '' }}">
                        Photo Gallery
                    </a>
                </li>

                <li>
                    <a href="{{ route('videogallery') }}"
                        class="{{ request()->routeIs('videogallery') ? 'active' : '' }}">
                        Video Gallery
                    </a>
                </li>

            </ul>

        </li>


        {{-- BLOG --}}
        <li>
            <a href="{{ route('blog') }}"
               class="{{ request()->routeIs('blog', 'blogdetail') ? 'active' : '' }}">
                Blog
            </a>
        </li>

    </ul>


            {{-- CONTACT --}}
            <a href="{{ route('contactus') }}"
            class="jme-btn">
        
                <span class="jme-btn-text">
                    Contact Us
                </span>
        
                <span class="jme-btn-icon">
        
                    <svg viewBox="0 0 24 24"
                        width="18"
                        height="18"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true">
        
                        <path d="M5 12h14"></path>
                        <path d="M13 6l6 6-6 6"></path>
        
                    </svg>
        
                </span>
        
            </a>

           </nav>

        </div>

    </div>

</header>
