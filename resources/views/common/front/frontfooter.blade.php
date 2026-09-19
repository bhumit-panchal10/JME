<style>
  
    .jme-bdx-share-card {
       position: relative !important;
    padding: 19px 0px !important;
     background: none !important; 
     border:0px !important; 
     border-radius: 0px !important@; 
     overflow: hidden; 
     box-shadow:none !important; 
}
.jme-bdx-share-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 18px;
    width: 38px;
    height: 3px;
    background: var(--color-green);
    border-radius: 0 0 4px 4px;
    display: none !important;
}

</style>
<footer class="jme-footer">

    <div class="jme-container footer-cta-container">

        <div class="footer-project-cta">

            <div class="footer-cta-content">

                <span class="footer-cta-label">
                    ENGINEERING • PROCUREMENT • CONSTRUCTION
                </span>

                <h2>
                    Need a Reliable EPC Partner
                    <span>for Your Next Project?</span>
                </h2>

            </div>


            <a href="{{route('contactus')}}" class="jme-btn footer-cta-static-btn">

                <span class="jme-btn-text">
                    Start a Project
                </span>

                <span class="jme-btn-icon">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"></path>
                        <path d="M13 6l6 6-6 6"></path>
                    </svg>
                </span>

            </a>

        </div>

    </div>

    <div class="footer-main">

        <div class="jme-container">

            <div class="footer-grid">
                <div class="footer-brand">

                    <a href="{{route('index')}}" class="footer-logo">

                        <img src="{{ asset('front/images/logo.png') }}" alt="Jay Mahakal Enterprise Group">

                    </a>


                    <p class="footer-brand-text">
                        Delivering complete engineering,
                        procurement and construction solutions
                        with a focus on quality, safety and
                        reliable project execution.
                    </p>


                    <div class="footer-brand-line">

                        <span class="footer-brand-blue"></span>

                        <span class="footer-brand-green"></span>

                    </div>


                    <span class="footer-brand-caption">
                        JME GROUP • COMPLETE ENGINEERING SOLUTIONS
                    </span>
                      <!-- SHARE CARD -->
                            <div class="jme-bdx-share-card">

                                <div class="jme-bdx-share-socials">

                                    <!-- Facebook -->
                                    <a href="#" class="share-facebook" aria-label="Facebook">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M14 8h3V4.5c-.5-.1-2-.2-3.3-.2-3.2 0-5.4 2-5.4 5.6V13H5v4h3.3v7h4.1v-7h3.4l.6-4h-4v-2.7C12.4 9.1 12.8 8 14 8z">
                                            </path>
                                        </svg>
                                    </a>


                                    <!-- LinkedIn -->
                                    <a href="#" class="share-linkedin" aria-label="LinkedIn">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <rect x="4" y="9" width="3.5" height="11"></rect>
                                            <circle cx="5.75" cy="5.5" r="1.75"></circle>
                                            <path
                                                d="M11 20V9h3.4v1.6c.9-1.2 2.1-2 4-2 3 0 4.6 2 4.6 5.5V20h-3.6v-5.2c0-1.7-.7-2.8-2.1-2.8-1.4 0-2.3 1-2.3 2.8V20z">
                                            </path>
                                        </svg>
                                    </a>


                                    <!-- Instagram -->
                                    <a href="#" class="share-instagram" aria-label="Instagram">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <rect x="3" y="3" width="18" height="18" rx="5"></rect>

                                            <circle cx="12" cy="12" r="4"></circle>

                                            <circle cx="17.5" cy="6.5" r="1" class="insta-dot"></circle>
                                        </svg>
                                    </a>


                                    <!-- YouTube -->
                                    <a href="#" class="share-youtube" aria-label="YouTube">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">

                                            <rect x="2.5" y="6" width="19" height="12" rx="4"
                                                class="youtube-box"></rect>

                                            <path d="M10 9l5 3-5 3z" class="youtube-play"></path>

                                        </svg>
                                    </a>

                                </div>

                            </div>

                </div>
                <div class="footer-column">

                    <div class="footer-heading">

                        <span class="footer-heading-mark"></span>

                        <h3>
                            Quick Links
                        </h3>

                    </div>


                    <ul class="footer-links">

                        <li>
                            <a href="{{ route('index') }}">
                                <span>Home</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}">
                                <span>About</span>
                            </a>
                        </li>



                        <li>
                            <a href="{{ route('photogallery') }}">
                                <span>Photo Gallery</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('videogallery') }}">
                                <span>Video Gallery</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('blog') }}">
                                <span>Blog</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contactus') }}">
                                <span>Contact</span>
                            </a>
                        </li>

                    </ul>

                </div>

                <div class="footer-column">

                    <div class="footer-heading">

                        <span class="footer-heading-mark"></span>

                        <h3>
                            Core Services
                        </h3>

                    </div>
                    
                        @php
                            $categories = \App\Models\Category::orderBy('id', 'asc')->take(6)->get();
                        @endphp

                        <ul class="footer-links footer-service-links">

                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ url('service/' . $category->slugname) }}">

                                        <span class="service-dropdown-name">
                                            {{ $category->name }}
                                        </span>

                                    </a>
                                </li>
                            @endforeach

                        </ul>
                </div>
                <div class="footer-column footer-contact-column">

                    <div class="footer-heading">
                        <span class="footer-heading-mark"></span>
                        <h3>Get in Touch</h3>
                    </div>

                    <div class="footer-contact-panel">

                        <!-- CALL -->
                        <a href="tel:+919714123111" class="footer-contact-row">
                            <span class="footer-contact-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M7.2 3.5 9.5 8l-2 1.7c1.4 3 3.8 5.4 6.8 6.8l1.7-2 4.5 2.3v2c0 1.1-.9 2-2 2C10 20.8 3.2 14 3.2 5.5c0-1.1.9-2 2-2h2Z" />
                                </svg>
                            </span>

                            <span class="footer-contact-info">
                                <small>Call Us</small>
                                <strong>+91 97141 23111</strong>
                            </span>

                            <span class="footer-contact-arrow"> <svg viewBox="0 0 24 24" width="18" height="18"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="M13 6l6 6-6 6"></path>
                                </svg></span>
                        </a>


                        <!-- EMAIL -->
                        <a href="mailto:enquiry@jaymahakalenterprisegroup.com" class="footer-contact-row">
                            <span class="footer-contact-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M3 5h18v14H3V5Zm1.8 2 7.2 5.1L19.2 7H4.8Zm14.4 10V9.4L12 14.5 4.8 9.4V17h14.4Z" />
                                </svg>
                            </span>

                            <span class="footer-contact-info">
                                <small>Email Us</small>
                                <strong>enquiry@jaymahakalenterprisegroup.com</strong>
                            </span>

                            <span class="footer-contact-arrow"> <svg viewBox="0 0 24 24" width="18" height="18"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="M13 6l6 6-6 6"></path>
                                </svg></span>
                        </a>


                        <!-- ADDRESS -->
                        <div class="footer-contact-row footer-contact-row-address">
                            <span class="footer-contact-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5Z" />
                                </svg>
                            </span>

                            <div class="footer-contact-info">
                                <small>Primary Office</small>
                                <strong class="footer-contact-address">
                                    49, Om County, Oxygen City, New Geratpur Road, Vinzol,
                                    Ahmedabad - 382445, Gujarat, India.
                                </strong>
                            </div>
                        </div>



                    </div>

                </div>
            </div>

        </div>

    </div>
    <div class="footer-bottom">

        <div class="jme-container">

            <div class="footer-bottom-inner">


                <p>
                    © 2026 Jay Mahakal Enterprise Group.
                    All Rights Reserved.
                </p>
            </div>

        </div>

    </div>

</footer>
