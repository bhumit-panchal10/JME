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
            <a href="index.html" class="jme-logo" aria-label="JME Group Home">

                <img src="{{ asset('assets/front/images/logo.png') }}" alt="Jay Mahakal Enterprise Group Logo">

            </a>
            <button type="button" class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation Menu"
                aria-expanded="false">

                <span></span>

                <span></span>

                <span></span>

            </button>

            <nav class="jme-navigation" id="jmeNavigation">

                <ul class="jme-menu">
                    <li>
                        <a href="{{ route('index') }}" class="active">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">
                            About
                        </a>
                    </li>
                    <li class="has-dropdown service-menu">

                        <a href="{{ route('service') }}" class="dropdown-toggle">

                            <span>
                                Services
                            </span>

                            <span class="dropdown-arrow"></span>

                        </a>
                        <ul class="jme-dropdown service-dropdown">

                            <li>
                                <a href="service.html">



                                    <span class="service-dropdown-name">
                                        Piping Solutions
                                    </span>

                                </a>
                            </li>


                            <!-- ELECTRICAL -->

                            <li>
                                <a href="service.html">



                                    <span class="service-dropdown-name">
                                        Electrical Solutions
                                    </span>

                                </a>
                            </li>


                            <!-- PASSIVE NETWORK -->

                            <li>
                                <a href="service.html">


                                    <span class="service-dropdown-name">
                                        Passive Network Solutions
                                    </span>

                                </a>
                            </li>


                            <!-- TURNKEY -->

                            <li>
                                <a href="service.html">



                                    <span class="service-dropdown-name">
                                        Turnkey Project Solutions
                                    </span>

                                </a>
                            </li>


                            <!-- FIRE -->

                            <li>
                                <a href="service.html">



                                    <span class="service-dropdown-name">
                                        Fire Protection System
                                    </span>

                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="has-dropdown">

                        <a href="#" class="dropdown-toggle">

                            <span>
                                Gallery
                            </span>

                            <span class="dropdown-arrow"></span>

                        </a>


                        <!-- DROPDOWN -->

                        <ul class="jme-dropdown">


                            <!-- PHOTO GALLERY -->

                            <li>

                                <a href="photo-gallery.html">
                                    Photo Gallery
                                </a>

                            </li>



                            <!-- VIDEO GALLERY -->

                            <li>

                                <a href="video-gallery.html">
                                    Video Gallery
                                </a>

                            </li>


                        </ul>

                    </li>



                    <!-- BLOG -->

                    <li>

                        <a href="{{ route('blog') }}">
                            Blog
                        </a>

                    </li>


                </ul>

                <a href="{{ route('contactus') }}" class="jme-btn">
                    <span class="jme-btn-text">Contact Us</span>

                    <span class="jme-btn-icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="M13 6l6 6-6 6"></path>
                        </svg>
                    </span>
                </a>


            </nav>

        </div>

    </div>

</header>
