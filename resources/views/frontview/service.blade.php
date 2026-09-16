@extends('layouts.front')
@section('title', 'Service')
@section('content')

    <section class="jme-inner-hero">

        <!-- Dark overlay -->
        <div class="jme-inner-overlay"></div>

        <!-- Decorative left lines -->
        <span class="jme-deco-line deco-line-1"></span>
        <span class="jme-deco-line deco-line-2"></span>

        <div class="container">
            <div class="jme-inner-content">

                <!-- =========================
                         WHITE CONTENT CARD
                    ========================== -->
                <div class="jme-inner-card">

                    <div class="jme-card-tag">
                        <span class="tag-shape"></span>
                        <span>JME GROUP</span>
                    </div>

                    <h1>Service</h1>

                    <!-- Breadcrumb -->
                    <div class="jme-custom-breadcrumb">

                        <a href="index.html" class="jme-home-link">

                            <span class="jme-home-box">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M3 11.5L12 4l9 7.5"></path>
                                    <path d="M5.5 10.5V20h13v-9.5"></path>
                                    <path d="M9.5 20v-6h5v6"></path>
                                </svg>
                            </span>

                            <span>Home</span>

                        </a>

                        <span class="jme-breadcrumb-arrow">
                            <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18l6-6-6-6"></path>
                            </svg>
                        </span>

                        <span class="jme-current-page">
                            <span class="current-dot"></span>
                            Service
                        </span>

                    </div>

                    <!-- Bottom card detail -->
                    <div class="jme-card-bottom">

                        <span class="small-green-line"></span>

                        <span>PEOPLE</span>
                        <i></i>

                        <span>PROJECTS</span>
                        <i></i>

                        <span>PROGRESS</span>

                    </div>

                    <span class="card-green-corner"></span>

                </div>




            </div>
        </div>



        <!-- =========================
                 BOTTOM NAVY STRIP
            ========================== -->
        <div class="jme-bottom-strip">

            <span class="bottom-green-shape"></span>

            <div class="jme-bottom-strip-text">
                <span>ENGINEERING</span>
                <i></i>
                <span>PROCUREMENT</span>
                <i></i>
                <span>CONSTRUCTION</span>
            </div>

        </div>

    </section>

    <main class="jme-services-page">



        <!-- =====================================================
             SERVICES LISTING
        ====================================================== -->

        <section class="jme-services-listing">

            <div class="jme-services-container">

                <div class="jme-services-grid" id="jmeServicesGrid">


                    <!-- =============================================
                         SERVICE 01
                    ============================================== -->

                    <article class="jme-service-card" data-category="engineering" data-title="Process Engineering">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  46.jpg" alt="Process Engineering">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Process Engineering
                                </a>
                            </h3>


                            <p>
                                Delivering optimized, efficient and sustainable
                                process designs for complex industrial facilities.
                            </p>


                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <!-- =============================================
                         SERVICE 02
                    ============================================== -->

                    <article class="jme-service-card" data-category="engineering" data-title="EPC Project Management">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  10.jpg" alt="EPC Project Management">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    EPC Project Management
                                </a>
                            </h3>


                            <p>
                                Integrated execution from concept to commissioning
                                with a focus on safety, quality and delivery.
                            </p>


                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <!-- =============================================
                         SERVICE 03
                    ============================================== -->

                    <article class="jme-service-card" data-category="procurement" data-title="Tank Terminal Solutions">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  24.jpg" alt="Tank Terminal Solutions">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Tank &amp; Terminal Solutions
                                </a>
                            </h3>


                            <p>
                                Engineered storage and handling solutions for
                                petrochemicals, chemicals and clean energy products.
                            </p>


                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <!-- =============================================
                         SERVICE 04
                    ============================================== -->

                    <article class="jme-service-card" data-category="construction" data-title="Construction Fabrication">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  12.jpg" alt="Construction and Fabrication">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Construction &amp; Fabrication
                                </a>
                            </h3>


                            <p>
                                High-quality construction and fabrication
                                services delivered with precision and care.
                            </p>


                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <!-- =============================================
                         SERVICE 05
                    ============================================== -->

                    <article class="jme-service-card" data-category="advisory"
                        data-title="Sustainability Energy Transition">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  25.jpg" alt="Sustainability and Energy Transition">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Sustainability &amp; Energy Transition
                                </a>
                            </h3>


                            <p>
                                Practical solutions to reduce emissions,
                                improve efficiency and enable a cleaner future.
                            </p>


                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <!-- =============================================
                         SERVICE 06
                    ============================================== -->

                    <article class="jme-service-card" data-category="commissioning"
                        data-title="Asset Integrity Lifecycle Support">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  28.jpg" alt="Asset Integrity Lifecycle Support">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Asset Integrity &amp; Lifecycle Support
                                </a>
                            </h3>


                            <p>
                                Maximizing asset performance through inspection,
                                maintenance and lifecycle management.
                            </p>


                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <!-- =================================================
                         EXTRA SERVICES
                         FOR PAGINATION / DYNAMIC LOOP
                    ================================================== -->

                    <article class="jme-service-card" data-category="engineering" data-title="Piping Solutions">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  12.jpg" alt="Piping Solutions">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Piping Solutions
                                </a>
                            </h3>

                            <p>
                                Complete piping design, fabrication and
                                installation for industrial applications.
                            </p>

                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <article class="jme-service-card" data-category="engineering" data-title="Electrical Solutions">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  27.jpg" alt="Electrical Solutions">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Electrical Solutions
                                </a>
                            </h3>

                            <p>
                                Reliable industrial electrical infrastructure
                                designed for safety and performance.
                            </p>

                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>



                    <article class="jme-service-card" data-category="construction"
                        data-title="Industrial Infrastructure">

                        <a href="service-detail.html" class="jme-service-image">

                            <img src="assets/images/J.M.E. image  24.jpg" alt="Industrial Infrastructure">

                        </a>


                        <div class="jme-service-content">

                            <h3>
                                <a href="service-detail.html">
                                    Industrial Infrastructure
                                </a>
                            </h3>

                            <p>
                                Integrated infrastructure solutions for
                                complex industrial environments.
                            </p>

                            <a href="service-detail.html" class="jme-service-read-btn">

                                <span class="jme-service-read-text">
                                    Read More
                                </span>

                                <span class="jme-service-read-arrow">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </span>

                            </a>

                        </div>

                    </article>


                </div>



                <!-- =================================================
                     NO RESULT
                ================================================== -->

                <div class="jme-services-no-result" id="jmeServicesNoResult">
                    No services found.
                </div>



                <!-- =================================================
                     PAGINATION
                ================================================== -->

                <div class="jme-services-pagination" id="jmeServicesPagination"></div>


            </div>

        </section>

        <!-- =========================================================
         SERVICE PAGINATION
    ========================================================== -->

        <div class="jme-service-pagination-wrap">

            <!-- RESULT INFO -->
            <div class="jme-pagination-info">
                Showing
                <strong id="paginationFrom">1</strong>
                –
                <strong id="paginationTo">6</strong>
                of
                <strong id="paginationTotal">42</strong>
                Services
            </div>


            <!-- PAGINATION -->
            <div class="jme-service-pagination" id="jmeServicesPagination">

                <!-- PREVIOUS -->
                <button type="button" class="jme-pagination-control jme-pagination-prev">
                    <svg viewBox="0 0 24 24">
                        <path d="M19 12H5"></path>
                        <path d="M11 18l-6-6 6-6"></path>
                    </svg>
                </button>


                <!-- PAGE NUMBERS -->
                <div class="jme-pagination-numbers">

                    <button type="button" class="jme-pagination-page active">
                        1
                    </button>

                    <button type="button" class="jme-pagination-page">
                        2
                    </button>

                    <button type="button" class="jme-pagination-page">
                        3
                    </button>

                    <span class="jme-pagination-ellipsis">
                        ...
                    </span>

                    <button type="button" class="jme-pagination-page">
                        7
                    </button>

                </div>


                <!-- NEXT -->
                <button type="button" class="jme-pagination-control jme-pagination-next">

                    <svg viewBox="0 0 24 24">
                        <path d="M5 12h14"></path>
                        <path d="M13 6l6 6-6 6"></path>
                    </svg>
                </button>

            </div>

        </div>
    </main>


@endsection
@section('scripts')
@endsection
